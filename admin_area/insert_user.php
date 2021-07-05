<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
	<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Insert User
				</li>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="list-group box">
  				<a href="#" class="list-group-item list-group-item-action active">
    				<i class="fa fa-money fa-w"></i> Insert User
  				</a>
  				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Name</b></label>
						<div class="col-md-6">
						<input type="text" name="user_name" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Email</b></label>
						<div class="col-md-6">
						<input type="text" name="user_email" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Password</b></label>
						<div class="col-md-6">
						<input type="password" name="user_pass" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Country</b></label>
						<div class="col-md-6">
						<input type="text" name="user_country" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Job</b></label>
						<div class="col-md-6">
						<input type="text" name="user_job" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Contact</b></label>
						<div class="col-md-6">
						<input type="text" name="user_contact" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>User About</b></label>
					<div class="col-md-6">
					<textarea name="user_about" class="form-control" rows="6" cols="19"></textarea>
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>User Image</b></label>
					<div class="col-md-6">
					<input type="file" name="user_img" class="form-control" required="">
				</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control"> 
				</div>
			</div>
			</form>
		</div>
	</div>

<?php
if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];
	$user_country = $_POST['user_country'];
	$user_job = $_POST['user_job'];
	$user_contact = $_POST['user_contact'];
	$user_about = $_POST['user_about'];
	$user_img = $_FILES['user_img']['name'];


	$temp_name = $_FILES['user_img']['tmp_name'];


	move_uploaded_file($temp_name1, "user/images/$user_img");

	$insert_user = "insert into admin(admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about) values('$user_name', '$user_email', '$user_pass', '$user_img', '$user_contact', '$user_country', '$user_job', '$user_about')";
	$run_user = mysqli_query($con, $insert_user);
	if($run_user){
		echo "<script>alert('User Inserted Succesfully')</script>";
		echo "<script>window.open('index2.php?view_user')</script>";
	}
}
?>
<?php
}
?>