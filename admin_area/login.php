<?php
session_start();
include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--Animate.css link1-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!--Animate.css link2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
<link   rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="container">
		<form class="form-login" action="" method="post">
			<h2 class="form-login-heading"> Admin Login</h2>
			<input type="text" name="admin_email" class="form-control" placeholder="Enter Email" required>
			<input type="password" name="admin_pass" class="form-control" placeholder="Enter Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
				Log in
			</button>
			<h4 class="forgot_password">
				Lost your password? <a href="forgot_password">Click here</a>
			</h4>
		</form>
	</div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
	$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
	$get_admin = "select * from admin where admin_email = '$admin_email' AND admin_pass = '$admin_pass'";
	$run_admin = mysqli_query($con, $get_admin);
	$count = mysqli_num_rows($run_admin);
	if($count == 1){
		$_SESSION['admin_email'] = $admin_email;
		echo "<script>alert('You have succesfully logged in');</script>";
		echo "<script>window.open('index2.php?dashboard2' , '_self');</script>";
	}
	else{
		echo "<script>alert('No such account exists');</script>";
	}
}
?>