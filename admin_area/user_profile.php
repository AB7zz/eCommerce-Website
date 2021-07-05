<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['user_profile'])){
	$edit_id = $_GET['user_profile'];
	$get_user = "select * from admin where admin_id = '$edit_id'";
	$run_user = mysqli_query($con, $get_user);
	$fetch_user = mysqli_fetch_array($run_user);
	$admin_name = $fetch_user['admin_name'];
	$admin_email = $fetch_user['admin_email'];
	$admin_pass = $fetch_user['admin_pass'];
	$admin_image = $fetch_user['admin_image'];
	$admin_country = $fetch_user['admin_country'];
	$admin_job = $fetch_user['admin_job'];
	$admin_about = $fetch_user['admin_about'];
	$admin_contact = $fetch_user['admin_contact'];
}
?>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Edit User
				</li>
			</div>
		</div>
</div>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="list-group box">
  				<a href="#" class="list-group-item list-group-item-action active">
    				<i class="fa fa-money fa-w"></i> Edit User
  				</a>
  				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Name</b></label>
						<div class="col-md-6">
						<input type="text" value="<?php echo $admin_name; ?>" name="user_name" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Email</b></label>
						<div class="col-md-6">
						<input type="text" value="<?php echo $admin_email; ?>" name="user_email" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Password</b></label>
						<div class="col-md-6">
						<input type="password" value="<?php echo $admin_pass; ?>" name="user_pass" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Country</b></label>
						<div class="col-md-6">
						<input type="text" value="<?php echo $admin_country; ?>" name="user_country" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Job</b></label>
						<div class="col-md-6">
						<input type="text" value="<?php echo $admin_job; ?>" name="user_job" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-3 control-label"><b>User Contact</b></label>
						<div class="col-md-6">
						<input type="text" value="<?php echo $admin_contact; ?>" name="user_contact" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>User About</b></label>
					<div class="col-md-6">
					<textarea name="user_about" class="form-control" rows="6" cols="19"><?php echo $admin_about; ?></textarea>
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>User Image</b></label>
					<div class="col-md-6">
					<input type="file" name="user_img" class="form-control" required="">
					<img style="height: 50px; width: 50px;" src="user/images/<?php echo $admin_image; ?>">
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
	$_SESSION['admin_email'] = $user_email;
	$user_pass = $_POST['user_pass'];
	$user_country = $_POST['user_country'];
	$user_job = $_POST['user_job'];
	$user_contact = $_POST['user_contact'];
	$user_about = $_POST['user_about'];
	$user_img = $_FILES['user_img']['name'];


	$temp_name = $_FILES['user_img']['tmp_name'];


	move_uploaded_file($temp_name, "user/images/$user_img");

	$edit_user = "update admin set admin_name='$user_name', admin_email='$user_email', admin_pass='$user_pass', admin_country='$user_country', admin_job='$user_job', admin_contact='$user_contact', admin_about='$user_about', admin_image='$user_img' where admin_id='$edit_id'";
	$run_user = mysqli_query($con, $edit_user);
	if($run_user){
		echo "<script>alert('User Edited Succesfully')</script>";
		echo "<script>window.open('index2.php?view_user')</script>";
	}
}
?>
<?php
}
?>