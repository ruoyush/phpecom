<?php require_once("config.php"); ?>

<?php
	

	if(isset($_GET['add'])){

	/*
		$query = query("SELECT * FROM products p, inventory i WHERE i.p_id = p.product_id AND p.product_id = " . escape($_GET['add']) . "");
		confirm($query);
		
		while($row = mysqli_fetch_array($query)){
			if($row['p_qty'] != $_SESSION['product_' . $_GET['add']]){
					$_SESSION['product_' . $_GET['add']] +=1;
					redirect("checkout.php");
			}else{
				set_message("We only have" . $row['p_qty'] . " " . "Available");
				redirect("checkout.php");
		  }

	  }
  */

	
		$query = query("SELECT * FROM products WHERE product_id=" . escape($_GET['add']) . " ");
		confirm($query);

		while($row = fetch_query($query)){
			if($row['product_qty']!= $_SESSION['product_' . $_GET['add']]){

					$_SESSION['product_' . $_GET['add']] +=1;

					redirect("../ecom/checkout.php");

			}else{

				set_message("We only have" . $row['product_qty'] . " " . "Available");

				redirect("../ecom/checkout.php");
		  }

	  }
	}


	
		//$_SESSION['product_' . $_GET['add']] += 1;
		//redirect("index.php");
		
	if(isset($_GET['remove'])){
		$_SESSION['product_' . $_GET['remove']]--;

		if($_SESSION['product_' . $_GET['remove']] <1) {
			redirect("../ecom/checkout.php");
			unset($_SESSION['item_total']);
	  	unset($_SESSION['item_qty']);
		}else{
			redirect("../ecom/checkout.php");
		}


	}
	
	if(isset($_GET['delete'])){
		$_SESSION['product_' . $_GET['delete']] = '0';

		redirect("../ecom/checkout.php");
		unset($_SESSION['item_total']);
		unset($_SESSION['item_qty']);



	}


function cart() {

	$total = 0;
	$item_qty =0;

	foreach($_SESSION as $name => $value){

		if($value > 0){

		if(substr($name, 0, 8) == "product_"){

				$length = strlen($name - 8);
				$id =substr($name, 8, $length);

				$query = query("SELECT * FROM products WHERE product_id = " . escape($id) . "");
				confirm($query);

				while($row = fetch_query($query)){

				$sub = $row['product_price']*$value;
				$item_qty +=$value;
					
				$product = <<<DELIMETER
		      <tr>
		          <td>{$row['product_name']}</td>
		          <td>&#36;{$row['product_price']}</td>
		          <td>{$value}</td>
		          <td>&#36;{$sub}</td>
		          <td>
		          <a class='btn btn-warning' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>
		          <a class='btn btn-success' href="../resources/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a>
		           <a class='btn btn-danger' href="../resources/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
		        
		      </tr>
DELIMETER;

			echo $product;


			}

			$_SESSION['item_total'] = $total +=$sub;
			$_SESSION['item_qty'] = $item_qty;

		}
	}

}
}



function check_order(){
	if($_SESSION['current_userid']){
		if(isset($_POST['submit']) ){
			$store_number = $_POST['store']+1 ;

			foreach($_SESSION as $name_2 => $value_2){
				if($value_2 > 0){
					if(substr($name_2, 0, 8) == "product_"){
						$length_2 = strlen($name_2 - 8);
						$id_2 =substr($name_2, 8, $length_2);

						
						$query_product = query("SELECT * FROM products WHERE product_id = " . escape($id_2) . "");
					  confirm($query_product);

						while($row_product = fetch_query($query_product)){
							$product_price = $row_product['product_price'];	
							$product_name	= $row_product['product_name'];				
						}

						$query_inventory = query("SELECT * FROM inventory WHERE p_id = " . escape($id_2) . " AND store_id = " . escape($store_number). "");
						confirm($query_inventory);
							

						if(fetch_query($query_inventory) == null){

							echo "This store doesn't have $product_name . <br/>";
							return 0;

						}

						$query_inventory2 = query("SELECT * FROM inventory WHERE p_id = " . escape($id_2) . " AND store_id = " . escape($store_number). "");
						confirm($query_inventory2);


						while($row_inventory2 = fetch_query($query_inventory2)){
								$store_qty = $row_inventory2['p_qty'];	
								
						}
							
						if($store_qty < $value_2){
							echo "This store only has $store_qty $product_name. <br/>";
							return 0;
						}


					}
				}
			}//end of foreach 
			add_order();
		}
	}else{
		echo "Not login(please login <a href='login.php'>here</a>.)";
	}
}


function add_order(){


			$store_number = $_POST['store']+1 ;
			$query = query("INSERT INTO orders(c_id, qty, total_price) VALUES('{$_SESSION['current_userid']}','{$_SESSION['item_qty']}', '{$_SESSION['item_total']}')");

			confirm($query);

			$query_order = query("SELECT * FROM orders WHERE c_id =" . $_SESSION['current_userid'] . "");
			confirm($query_order);

			while($row_order = fetch_query($query_order)){
				$current_order_id = $row_order['order_id'];								
			}		

			foreach($_SESSION as $name_2 => $value_2){


					if($value_2 > 0){


						if(substr($name_2, 0, 8) == "product_"){
							

								$length_2 = strlen($name_2 - 8);
								$id_2 =substr($name_2, 8, $length_2);

								$query_product = query("SELECT * FROM products WHERE product_id = " . escape($id_2) . "");
							  confirm($query_product);

								while($row_product = fetch_query($query_product)){
									$product_price = $row_product['product_price'];	
									$product_name	= $row_product['product_name'];				
								}
														

								$query_inventory = query("SELECT * FROM inventory WHERE p_id = " . escape($id_2) . " AND store_id = " . escape($store_number). "");
								confirm($query_inventory);

								while($row_inventory = fetch_query($query_inventory)){
										$store_qty = $row_inventory['p_qty'];				
								}
								$sub_price_2 = $product_price * $value_2;
								$query_transaction = query("INSERT INTO transactions (order_id, p_id, s_id, qty, sub_price, c_id) VALUES ('{$current_order_id}','{$id_2}','$store_number','{$value_2}','{$sub_price_2}', '{$_SESSION['current_userid']}')");
								confirm($query_transaction);

								$store_qty_update = $store_qty - $value_2;

								$query_update_inventory = query("UPDATE inventory SET p_qty = " . escape($store_qty_update) . " WHERE store_id = $store_number AND p_id = $id_2");

								confirm($query_update_inventory);

						}
					}

			}#end of foreach


			if($query && $query_transaction && $_SESSION['item_qty']!=0){
						echo "Successfuly submited";
						unset($_SESSION['item_qty']);
						unset($_SESSION['item_total']);
					  redirect("thank_you.php");

				}else{

							echo "Empty Cart.";
				}

}



?>