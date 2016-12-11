<?php

//Helper


function set_message($msg){

	if(!empty($msg)){

		$_SESSION['message'] = $msg;
	}else{

		$msg = "";
	}

}

function display_message(){

	if(isset($_SESSION['message'])){

		echo $_SESSION['message'];
		unset($_SESSION['message']);

	}
}


function redirect($location){
	header("Location: $location ");
}


function query($sql){

	global $connection;
	return mysqli_query($connection, $sql);

}

function confirm($result){

	global $connection;

	if(!result){

		die("QUERY FAILED " . mysqli_error($connection));

	}
}

function escape($string){

	global $connection;

	return mysqli_real_escape_string($connection,$string);

}

function fetch_query($result){

	return mysqli_fetch_array($result);
}

//Get Products
function get_products(){

	$query = query("SELECT * FROM products");
	confirm($query);

	while($row = fetch_query($query)){

		$product = <<<DELIMETER
			
			 <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?product_id={$row['product_id']}" >
            <img width="100" src="../../resources/uploads/{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4><a href="item.php?product_id={$row['product_id']}">{$row['product_name']}</a></h4>
                <h4 class="pull-left">&#36;{$row['product_price']}</h4>
                <br/><br/>
                <p>{$row['short_desc']}</p>
                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">add to cart</a>
            </div>
            
        </div>
    </div>



DELIMETER;

		echo $product;
	}
}



function get_products_in_type_page(){

	$query = query("SELECT * FROM products WHERE product_type_id = " . escape($_GET['type_id']) . " ");
	confirm($query);

	while($row = fetch_query($query)){

		$product = <<<DELIMETER

               <div class="col-md-4 col-sm-4 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?product_id={$row['product_id']}" ><img width="100" src="../../resources/uploads/{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h3><a href="item.php?product_id={$row['product_id']}">{$row['product_name']}</a></h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!!</a> 
                            <a href="item.php?product_id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

		echo $product;
	}
}

function get_products_in_shop_page(){

	$query = query(" SELECT * FROM products ");
	confirm($query);

	while($row = fetch_query($query)){

		$product = <<<DELIMETER

               <div class="col-md-4 col-sm-4 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?product_id={$row['product_id']}" ><img width="100" src="../../resources/uploads/{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h3><a href="item.php?product_id={$row['product_id']}">{$row['product_name']}</a></h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?product_id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>

                    </div>
                </div>
            </div>

DELIMETER;

		echo $product;
	}
}

//Get Product Types
function get_types(){

	//confirm($query);

	$send_query = query("SELECT * FROM product_types");

	confirm($send_query);

	while($row = fetch_query($send_query)){
		
		$type_link = <<<DELIMETER
			
			 <a href='type.php?type_id={$row['type_id']}' class='list-group-item'>{$row['type_name']}</a>
DELIMETER;
	
	echo $type_link;

	}
}


// Login and logout User

function login_user(){

if(isset($_POST['submit'])){
		$username = escape($_POST['username']);
		$password = escape($_POST['password']);
		$role = $_POST['roleselect'];
	
	if($role == "1"){
			$query = query("SELECT * FROM customers WHERE customer_email = '{$username}'AND customer_pass = '{$password}' ");
			confirm($query);

			while($row = fetch_query($query)){

				$userid = $row['customer_id'];

			}

			 
	}

	if($role == "2"){
			$query = query("SELECT * FROM managers WHERE mgr_email = '{$username}'AND mgr_pass = '{$password}' ");
			confirm($query);

			while($row = fetch_query($query)){

				$userid = $row['mgr_id'];

			}

	}

	if($role == "3"){
			$query = query("SELECT * FROM sales WHERE sale_email = '{$username}'AND sale_pass = '{$password}' ");
			confirm($query);

			while($row = fetch_query($query)){

				$userid = $row['sale_id'];

			}
	}



	if (mysqli_num_rows($query) == 0) {
		set_message("Your username or password is wrong.");
		redirect("login.php");
	}else{
		$_SESSION['user_role'] = $role;

		$_SESSION['current_userid'] = $userid;

 	 	$_SESSION['current_username'] = $username;

		set_message("Welcome {$username}!");
		redirect("admin");
	}

}
}





function register(){
		
		if(isset($_POST['submit']) ){

			$name = $_POST['name'];
			$email = $_POST['email'];
      $age= $_POST['age'];
      $street= $_POST['street'];
      $city= $_POST['city'];
      $state= $_POST['state'];
      $gender= $_POST['gender'];
      $contact= $_POST['contact'];
      $zip= $_POST['zip'];
      $income= $_POST['income'];
      $married= $_POST['married'];
      $password= $_POST['password'];
      $company= $_POST['company'];
      $customer_company= $_POST['company_name'];
      $customer_company_cate= $_POST['company_cate'];
      $customer_company_income= $_POST['company_income'];

      if($company == 0){
			$query = query("INSERT INTO customers(customer_name, customer_age, customer_email, customer_street, customer_city, customer_state, customer_gender, customer_contact, customer_zip, customer_income, customer_martial, customer_pass) VALUES('" . escape($name) . "'," . escape($age) . ",'" . escape($email) ."','" . escape($street) . "','" . escape($city) . "','" . escape($state) . "','" . escape($gender) . "'," . escape($contact) . "," . escape($zip) . "," . escape($income) . ",'" . escape($married) . "'," . escape($password) . ")");

			confirm($query);
			}else{
			 $query = query("INSERT INTO customers(customer_company, customer_company_cate, customer_company_income, customer_name, customer_age, customer_email, customer_street, customer_city, customer_state, customer_gender, customer_contact, customer_zip, customer_income, customer_martial, customer_pass) VALUES('" . escape($customer_company) . "','" . escape($customer_company_cate) . "','" . escape($customer_company_income) . "','" . escape($name) . "'," . escape($age) . ",'" . escape($email) ."','" . escape($street) . "','" . escape($city) . "','" . escape($state) . "','" . escape($gender) . "'," . escape($contact) . "," . escape($zip) . "," . escape($income) . ",'" . escape($married) . "'," . escape($password) . ")");
			 confirm($query);
			}

			if($query){
				echo "<p class='bg-danger'> Successflly registered! </p>";
			}else{
				echo "Oops, something is wrong.";
			}
		}
		
}





function send_message(){

	if(isset($_POST['submit'])){
		
		$to = "bananayoyo@gmail.com";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$headers = "From: {$name} {$email}";
		$result = mail($to, $subject, $message, $headers);

		if(!$result){
			set_message("Oops, something is wrong.");
			redirect("contact.php");
		}else{

			echo "sent";

			set_message("Your message has been sent.");
			redirect("contact.php");
		}
	}

}

function show_stores(){
      # select store id and store name
    $store_name=array();
    $address=array();
    $store_id=array();
    $query_store = query("SELECT store_id, address,store_name FROM store");
    confirm($query_store);

    if($query_store){
        while($row=fetch_query($query_store)){
             $store_name[]=$row['store_name'];
             $address[]=$row['address'];
             $store_id[]=$row['store_id'];
        }
    }

    echo $store_name;
    foreach($store_name as $key => $value){
        echo "<option value=\"$key\">$store_id[$key]. $value in $address[$key]</option>\n";
    }
}


function display_transactions(){

			$query_transaction = query("SELECT * FROM transactions LEFT JOIN products
ON transactions.p_id=products.product_id AND transactions.c_id =" . $_SESSION['current_userid'] . " LEFT JOIN store
ON transactions.s_id=store.store_id ");

			confirm($query_order);

	
while($row_transaction = fetch_query($query_transaction)){
	
	$transaction = <<<DELIMETER

			<tr>
				<td>{$row_transaction['order_id']} </td>
				<td>{$row_transaction['product_name']} </td>
				<td>{$row_transaction['qty']} </td>
				<td>{$row_transaction['product_price']} </td>
				<td>{$row_transaction['sub_price']} </td>
				<td>{$row_transaction['store_name']} at {$row_transaction['address']}</td>
				<td>{$row_transaction['transaction_date']} </td>

			</tr>

DELIMETER;
	
	echo $transaction;

}
}


function update_profile(){

		if(isset($_POST['submit']) ){

		  $name = $_POST['full-name'];
			$address = $_POST['address'];
		 	$city = $_POST['city'];
			$region = $_POST['region'];
			$zip = $_POST['postal-code'];
			$password = $_POST['password'];
			$contact = $_POST['contact'];

			$query = query("UPDATE customers SET customer_name = '" . escape($name) . "', customer_pass= " . escape($password) . ", customer_street = '" . escape($address) . "', customer_city = '" . escape($city) . "', customer_state = '" . escape($region) . "', customer_zip = " . escape($zip) . ", customer_contact = " . escape($contact) . " WHERE customer_id =" . $_SESSION['current_userid'] . "");
			confirm($query);

			//echo "UPDATE customers SET customer_name = '" . escape($name) . "', customer_pass= " . escape($password) . ", customer_street = '" . escape($address) . "', customer_city = '" . escape($city) . "', customer_state = '" . escape($region) . "', customer_zip = " . escape($zip) . ", customer_contact = " . escape($contact) . " WHERE customer_id =" . $_SESSION['current_userid'] . "";


		}

}


function display_products(){

			$query_products = query("SELECT * FROM products LEFT JOIN product_types ON products.product_type_id=product_types.type_id");

			confirm($query_order);

	
while($row_product = fetch_query($query_products)){
	
	$products = <<<DELIMETER

			<tr>
				<td>{$row_product['product_id']} </td>
				<td>{$row_product['type_name']} </td>
				<td>{$row_product['product_name']} <br/> <img width="100" src="../../resources/uploads/{$row_product['product_image']}" alt=""> </td>
				<td>{$row_product['product_price']} </td>
				<td>
				<a class='btn btn-warning' href="../../resources/templates/back/delete_product.php?remove={$row_product['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>
				<a class='btn btn-warning' href="../../ecom/admin/index.php?edit_product&&update_product={$row_product['product_id']}"><span class='glyphicon glyphicon-refresh'></span></a>
				</td>


			</tr>

DELIMETER;
	
	echo $products;

}
}


function display_transactions_admin(){

			$query_transaction = query("SELECT * FROM transactions LEFT JOIN products
ON transactions.p_id=products.product_id LEFT JOIN store ON transactions.s_id=store.store_id ");

			confirm($query_order);

	
while($row_transaction = fetch_query($query_transaction)){
	
	$transaction = <<<DELIMETER

			<tr>
				<td>{$row_transaction['order_id']} </td>
				<td>{$row_transaction['c_id']} </td>
				<td>{$row_transaction['product_name']} </td>
				<td>{$row_transaction['qty']} </td>
				<td>{$row_transaction['product_price']} </td>
				<td>{$row_transaction['sub_price']} </td>
				<td>{$row_transaction['store_name']} at {$row_transaction['address']}</td>
				<td>{$row_transaction['transaction_date']} </td>
				<td>
				<a class='btn btn-warning' href="../../resources/templates/back/delete_trans.php?pid={$row_transaction['product_id']}&&oid={$row_transaction['order_id']}"><span class='glyphicon glyphicon-minus'></span></a>

				</td>
			</tr>

DELIMETER;
	
	echo $transaction;

}
}


function add_product(){

		if(isset($_POST['publish']) ){

		  $name = escape($_POST['product_title']);
			$short = escape($_POST['product_short']);
		 	$long = escape($_POST['product_description']);
			$price = escape($_POST['product_price']);
			$type = escape($_POST['product_category']);
			$file = escape($_FILES['file']['name']);
			$tmp_file = escape($_FILES['file']['tmp_name']);

			move_uploaded_file($tmp_file, UPLOAD_DIR . DS . $file);

			$query = query("INSERT INTO products(product_name, product_price, product_desc, short_desc, product_image, product_type_id) VALUES ('{$name}','{$price}','{$long}','{$short}','{$file}','{$type}')");
			confirm($query);

			//echo "INSERT INTO products(product_name, product_price, product_desc, short_desc, product_image, product_type_id) VALUES ('{$name}','{$price}','{$long}','{$short}','{$file}','{$type}')";

			set_message("New Product Added");
			redirect("../admin/index.php?view_products");

		}

}


function edit_product(){

		if(isset($_POST['publish']) ){

		  $name = escape($_POST['product_title']);
			$short = escape($_POST['product_short']);
		 	$long = escape($_POST['product_description']);
			$price = escape($_POST['product_price']);
			$type = escape($_POST['product_category']);
			$file = escape($_FILES['file']['name']);
			$tmp_file = escape($_FILES['file']['tmp_name']);

			move_uploaded_file($tmp_file, UPLOAD_DIR . DS . $file);

			if(!$file){

				$query = query("UPDATE products SET product_name='{$name}', product_price='{$price}', product_desc='{$long}', short_desc='{$short}', product_type_id='{$type}' where product_id =" . escape($_GET['update_product']) . "");
				confirm($query);

			}else{
				$query = query("UPDATE products SET product_name='{$name}', product_price='{$price}', product_desc='{$long}', short_desc='{$short}', product_image='{$file}', product_type_id='{$type}' where product_id =" . escape($_GET['update_product']) . "");
				confirm($query);


			}

			set_message(" Product Updated");
			redirect("../admin/index.php?view_products");

		}

}



function display_stores(){

			$query_store = query("SELECT * FROM store");

			confirm($query_store);

	
while($row_store = fetch_query($query_store)){
	
	$stores = <<<DELIMETER

			<tr>
				<td>{$row_store['store_id']} </td>
				<td>{$row_store['store_name']} </td>
				<td>{$row_store['address']} <br/>
				<td>{$row_store['region_id']} </td>
				<td>{$row_store['employee_num']} </td>
				<td>
				<a class='btn btn-warning' href="../../resources/templates/back/delete_store.php?remove={$row_store['store_id']}"><span class='glyphicon glyphicon-minus'></span></a>
				<a class='btn btn-warning' href="../../ecom/admin/index.php?edit_store&&update_store={$row_store['store_id']}"><span class='glyphicon glyphicon-refresh'></span></a>
				</td>


			</tr>

DELIMETER;
	
	echo $stores;

}
}


function edit_store(){

		if(isset($_POST['publish']) ){

		  $name = escape($_POST['store_title']);
			$addr = escape($_POST['store_addr']);
		 	$emp = escape($_POST['store_emp']);
			$region = escape($_POST['store_region']);


			$query = query("UPDATE store SET store_name='{$name}', address='{$addr}', employee_num='{$emp}', region_id='{$region}' where store_id =" . escape($_GET['update_store']) . "");
				confirm($query);

			set_message(" Store Updated");
			redirect("../admin/index.php?view_store");

		
}
}

function add_store(){

		if(isset($_POST['publish']) ){

		  $name = escape($_POST['store_title']);
			$addr = escape($_POST['store_addr']);
		 	$emp = escape($_POST['store_emp']);
			$region = escape($_POST['store_region']);


			$query = query("INSERT INTO store(store_name, address, employee_num, region_id) VALUES ('{$name}','{$addr}','{$emp}','{$region}')");
			confirm($query);

			echo "INSERT INTO store(store_name, address, employee_num, region_id) VALUES ('{$name}','{$addr}','{$emp}','{$region}')";
			set_message(" Store Created");
			redirect("../admin/index.php?view_store");

		
}

}


function display_consumers(){

			$query_customer = query("SELECT * FROM customers");

			confirm($query_customer);

	
while($row_c = fetch_query($query_customer)){
	
	$customers = <<<DELIMETER

			<tr>
				<td>{$row_c['customer_id']} </td>
				<td>{$row_c['customer_name']} </td>
				<td>{$row_c['customer_age']} </td>
				<td>{$row_c['customer_gender']} </td>
				<td>{$row_c['customer_company']} </td>
				<td>{$row_c['customer_email']} <br/>
				<td>{$row_c['customer_city']} </td>
				<td>{$row_c['customer_contact']} </td>

				<td>
				<a class='btn btn-warning' href="../../resources/templates/back/delete_consumer.php?remove={$row_c['customer_id']}"><span class='glyphicon glyphicon-minus'></span></a>
				<a class='btn btn-warning' href="../../ecom/admin/index.php?edit_consumer&&update_consumer={$row_c['customer_id']}"><span class='glyphicon glyphicon-refresh'></span></a>
				</td>


			</tr>

DELIMETER;
	
	echo $customers;

}
}


function edit_consumer(){

		if(isset($_POST['submit']) ){

		  $name = escape($_POST['full-name']);
		  $address = escape($_POST['address']);
		  $city = escape($_POST['city']);
		  $region = escape($_POST['region']);
		  $zip = escape($_POST['postal-code']);
		  $password = escape($_POST['password']);
		  $contact = escape($_POST['contact']);


			$query = query("UPDATE customers SET customer_name='{$name}', customer_street='{$address}', customer_city='{$city}', customer_state='{$region}', customer_zip='{$zip}', customer_pass='{$password}', customer_contact='{$contact}' where customer_id =" . escape($_GET['update_consumer']) . "");
				confirm($query);

			set_message(" Consumer Updated");
			redirect("../admin/index.php?view_consumer");

		
}
}


function display_inventory(){

			$query_stock = query("SELECT inventory.store_id, store.store_name, store.address, inventory.p_id, products.product_name, inventory.p_qty FROM inventory LEFT JOIN store ON inventory.store_id = store.store_id LEFT JOIN products ON inventory.p_id = products.product_id");

			confirm($query_stock);

	
while($row_s = fetch_query($query_stock)){
	
	$stock = <<<DELIMETER

			<tr>
				<td>{$row_s['store_id']} </td>
				<td>{$row_s['store_name']} </td>
				<td>{$row_s['address']} </td>
				<td>{$row_s['p_id']} <br/>
				<td>{$row_s['product_name']} </td>
				<td>{$row_s['p_qty']} </td>
				<td>


			</tr>

DELIMETER;
	
	echo $stock;

}
}

function assign_stock(){

		if(isset($_POST['publish']) ){

		  $sid = escape($_POST['store']);
		  $pid = escape($_POST['product']);
		  $pty = escape($_POST['stock']);
		  $flg = escape($_POST['update_on']);


		  if($flg == "on"){
		  		echo "The combination has exist, will update the inventory.";
				  $query_update = query("UPDATE inventory SET p_qty='{$pty}' WHERE store_id='{$sid}' AND p_id ='{$pid}'");
				  confirm($query_update);
		  }else{
		  		echo "Create new inventory record.";
		  		echo "{$flag}";
		  		$query_insert = query("INSERT INTO inventory(store_id,p_id,p_qty) VALUES ('{$sid}','{$pid}','{$pty}')");
		  		confirm($query_insert);

		  }

		 /* $query = $query("SELECT store_id FROM store WHERE store_id = {$sid} ");
		  confirm($query);
		  while( $row_store_check = fetch_query($query)){
		  	$store_check = $row_store_check['store_id'];
		  } 

		  if($store_check == null){
		  		echo "Store not exist.";
		  		return 0;
		  }

		  $query_p = $query("SELECT product_id FROM product WHERE product_id = {$pid}");
		  confirm($query_p);
		  while( $row_p_check = fetch_query($query_p)){
		  	$p_check = $row_p_check['product_id']; 	
		  } 

		  if($p_check == null){
		  		echo "Product not exist.";
		  		return 0;
		  }

		  $query_i = $query("SELECT store_id, p_id FROM inventory WHERE store_id={$sid} AND p_id ={$p_id}");
		  confirm($query_i);
		  while( $row_i_check = fetch_query($query_i)){
		  	$i_check = $row_i_check['store_id'];
		  	$i_check2 = $row_i_check['p_id'];
		  } 

		  if($p_check == null){
		  		echo "The combination has exist, will update the inventory.";
				  $query_update = query("UPDATE inventory SET p_qty='{$pty}' WHERE store_id='{$sid}' AND p_id ='{$pid}'");
				  confirm($query_update);
		  }else{
		  		echo "Create new inventory record.";
		  		$query_insert = query("INSERT INTO inventory(store_id,p_id,p_qty) VALUES ('{$sid}','{$pid}','{$pty}')");
		  		confirm($query_insert);

		  }

		  echo "UPDATE inventory SET p_qty='{$pty}' WHERE store_id='{$sid}' AND p_id ='{$p_id}'";
		  echo "INSERT INTO inventory(store_id,p_id,p_qty) VALUES ('{$sid}','{$pid}','{$pty}')";
			set_message(" Inventory Updated");
			redirect("../admin/index.php?inventory");
		*/
		
}
}


?>
