<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['delete_customer'])){
	$delete_id = $_GET['delete_customer'];
	$delete_cust = "delete from customers where customer_id = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_cust);
	if($run_delete){
		echo "<script>window.open('index2.php?view_customer','_self');</script>";
	}
}
?>
<?php
}
?>