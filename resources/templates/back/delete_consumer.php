<?php require_once("../../config.php");


if(isset($_GET['remove'])){

	$query = query("DELETE FROM customers WHERE customer_id=" . escape($_GET['remove']) . "");
	confirm($query);

	set_message("Customer Deleted");
	redirect("../../../ecom/admin/index.php?view_consumer");

}else{
	redirect("../../../ecom/admin/index.php?view_consumer");
}



?>