<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['delete_payment'])){
	$delete_id = $_GET['delete_payment'];
	$delete_payment = "delete from payment where payment_id = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_payment);
	if($run_delete){
		echo "<script>window.open('index2.php?view_payments','_self');</script>";
	}
}
?>
<?php
}
?>