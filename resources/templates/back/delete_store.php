<?php require_once("../../config.php");


if(isset($_GET['remove'])){

	$query = query("DELETE FROM store WHERE store_id=" . escape($_GET['remove']) . "");
	confirm($query);

	set_message("Store Deleted");
	redirect("../../../ecom/admin/index.php?view_store");

}else{
	redirect("../../../ecom/admin/index.php?view_store");
}



?>