<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['delete_cust_order'])){
	$delete_id = $_GET['delete_cust_order'];
	$delete_cust_order = "delete from customer_order where order_id = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_cust_order);
	if($run_delete){
		echo "<script>window.open('index2.php?view_order','_self');</script>";
	}
}
?>
<?php
}
?>