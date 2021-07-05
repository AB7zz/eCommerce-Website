<?php
session_start();
include("db/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['c_id'])){
	$customer_id = $_GET['c_id'];
}
echo $customer_id;
$ip_add = getUserIP();
$status = "pending";
$invoice_no = rand();
$select_cart = "select * from cart where ip_add = '$ip_add'";
$run_cart = mysqli_query($con, $select_cart);
while($row_cart = mysqli_fetch_array($run_cart)){
	$pro_id = $row_cart['p_id'];
	$color = $row_cart['color'];
	$qty = $row_cart['qty'];
	$select_product = "select * from medproducts where product_id = '$pro_id'";
	$get_product = mysqli_query($con, $select_product);
	while($row_product = mysqli_fetch_array($get_product)){
		$sub_total = $row_product['product_price'] * $qty;
		$insert_customer_order = "insert into customer_order(customer_id, product_id, due_amount, invoice_no, qty, order_date, order_status) values('$customer_id', '$pro_id','$sub_total', '$invoice_no', '$qty',now(), '$status')";
		$run_insert_customer_order = mysqli_query($con, $insert_customer_order);
		$insert_pending_order = "insert into pending_order(customer_id, invoice_no, product_id, qty, color, order_status) values('$customer_id', '$invoice_no', $pro_id, '$qty', '$color', '$status')";
		$run_insert_pending_order = mysqli_query($con, $insert_pending_order);
		$delete_cart = "delete from cart where ip_add = '$ip_add'";
		$run_del = mysqli_query($con, $delete_cart);
		echo "<script>alert('Your order has been submitted, Thanks');</script>";
		echo "<script>window.open('myaccount.php?my_order','_self');</script>";
	}
}
?>