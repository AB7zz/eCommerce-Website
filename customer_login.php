<div class="box">
	<div class="box-header">
		<center>
			<h2>Login</h2>
			<p class="lead">Already our customer</p>
		</center>
	</div>
	<form action="checkout.php" method="post">
		<div class="form-group">
			<label>Email: </label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Password: </label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="text-center">
			<button name="login" value="Login" class="btn btn-primary"><i class="fa fa-sign-in"> Log in</i></button>
		</div>
	</form>
	<center>
		<a href="register.php"><br>
			<p>New? Register here Now<p>
		</a>
	</center>
</div>

<?php
if(isset($_POST['login'])){
	$customer_email = $_POST['email'];
	$customer_pass = $_POST['password'];
	$select_customers = "select customer_email from customers where customer_email = '$customer_email' AND customer_password = '$customer_pass'";
	$run_customers = mysqli_query($con, $select_customers);
	$check_customer = mysqli_num_rows($run_customers);
	$get_ip = getUserIP();
	echo $check_customer;
	$select_cart = "select * from cart where ip_add = '$get_ip'";
	$run_cart = mysqli_query($con, $select_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_customer == 0){
		echo "<script>alert('Password/Email wrong, please enter again');</script>";
		exit();
	}
	if($check_customer == 1 AND $check_cart==0)
	{
		$_SESSION['customer_email'] = $customer_email;
		echo "<script>alert('You have logged in succesfully');</script>";
		echo "<script>window.open('myaccount.php','_self');</script>";
	}
	else
	{
		$_SESSION['customer_email'] = $customer_email;
		echo "<script>alert('You have logged in succesfully');</script>";
		echo "<script>window.open('checkout.php' , '_self');</script>";
	}
}
?>