<div class="box">
	<center>
		<h1>Do you really want to delete your account</h1>
	<form action="" method="post">
		<input type="submit" name="yes" value="Yes, I want to delete" class="btn btn-danger">
		<input type="submit" name="no" value="No, I do not want to delete" class="btn btn-success">
	</form>
	</center>
</div>

<?php
if(isset($_POST['yes'])){
	$customer_email = $_SESSION['customer_email'];
	$delete_customer = "delete from customers where customer_email = '$customer_email'";
	$run_customer = mysqli_query($con, $delete_customer);
	if($run_customer){
		session_destroy();
		echo "<script>alert('Your account has been deleted');</script>";
		echo "<script>window.open('index.php','_self');</script>";
	}
}
if(isset($_POST['no'])){
	echo "<script>alert('Your account has not been deleted');</script>";
	echo "<script>window.open('myaccount.php','_self');</script>";
}
?>