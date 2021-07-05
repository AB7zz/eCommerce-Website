<form method="post" enctype="multipart/form-data">
<div class="box">
	<center>
		<h3>Change your password</h3>
	</center>
	<div class="form-group">
		<label>Enter your current password</label>
		<input type="password" name="old_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Enter New Password</label>
		<input type="password" name="new_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Confirm new passowrd</label>
		<input type="password" name="c_n_password" class="form-control">
	</div>	
	<div class="text-center">
		<button name="update" class="btn btn-primary tbn-lg">Update Now</button>
	</div>
</div>
</form>

<?php
if(isset($_POST['update'])){
	$get_customer_email = $_SESSION['customer_email'];
	$get_customer_pass = "select * from customers where customer_email = '$get_customer_email'";
	$run_customer_pass = mysqli_query($con, $get_customer_pass);
	$fetch_customer_pass = mysqli_fetch_array($run_customer_pass);
	$update_id = $fetch_customer_pass['customer_id'];
	$customer_pass = $fetch_customer_pass['customer_password'];
	$entered_pass = $_POST['old_password'];
	if($entered_pass == $customer_pass){
		$new_pass = $_POST['new_password'];
		$confirm_new_pass = $_POST['c_n_password'];
		if($new_pass == $confirm_new_pass){
			$update_pass = "update customers set customer_password = '$new_pass' where customer_id = '$update_id'";
			$run_pass = mysqli_query($con, $update_pass);
			if($run_pass){
				echo "<script>alert('Your password has been updated');</script>";
				echo "<script>window.open('myaccount.php');</script>";
			}
		}else{
				echo "<script>alert('You did not confirm the password properly, please re-enter again');</script>";
		}
	}else{
		echo "<script>alert('You did not enter the right current password, please check again and re-enter');</script>";
	}
}
?>

