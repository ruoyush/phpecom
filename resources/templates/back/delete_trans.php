<?php require_once("../../config.php");


if(isset($_GET['pid']) && isset($_GET['oid'])){

	$query_trans = query("SELECT * FROM transactions WHERE order_id=" . escape($_GET['oid']) . " AND p_id=" . escape($_GET['pid']) ."");
  confirm($query_trans);
  while($row_trans = fetch_query($query_trans)){
  	$trans_qty = $row_trans['qty'];
  }

	$query = query("DELETE FROM transactions WHERE order_id=" . escape($_GET['oid']) . " AND p_id=" . escape($_GET['pid']) ."");
	confirm($query);

	set_message("Transaction Deleted");

	$query_order = query("SELECT * FROM orders WHERE order_id=" . escape($_GET['oid']) . "");
  confirm($query_order);

  $row_order = fetch_query($query_order);
  $order_qty = $row_order['qty'] - $trans_qty;

  if($order_qty <=0 ){
  	$query_delete_order = query("DELETE FROM orders WHERE order_id=" . escape($_GET['oid']) . "");
  }

  if($$order_qty >0) {
  	$query_deduct_order = query("UPDATE orders SET qty =" . escape($order_qty) . " WHERE order_id=" . escape($_GET['oid']) . "");
  }


	redirect("../../../ecom/admin/index.php?view_trans");

}else{
	redirect("../../../ecom/admin/index.php?view_trans");
}



?>