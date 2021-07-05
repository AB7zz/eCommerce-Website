<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['edit_slider'])){
	$edit_id = $_GET['edit_slider'];
	$get_slider = "select * from slider where id = '$edit_id'";
	$run_slider = mysqli_query($con, $get_slider);
	$fetch_slider = mysqli_fetch_array($run_slider);
	$slider_name = $fetch_slider['slider_name'];
	$slider_img = $fetch_slider['slider_image'];
}
?>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Edit Slider
				</li>
			</div>
		</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="#" class="list-group-item list-group-item-action active">
					<i class="fa fa-money fa-fw"></i> Edit Slider
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category Title</label>
						<div class="col-md-6">
							<input value="<?php echo $slider_name; ?>" type="text" name="slider_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><b>Slider Image</b></label>
						<div class="col-md-6">
						<input type="file" name="slider_img" class="form-control"required="">
						<img style="height: 50px; width: 50px;" src="../images/<?php echo $slider_img; ?>">
						</div>
					</div>
					<div class="form-group">
							<input type="submit" name="submit" value="Edit Product Category" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($_POST['submit'])){
	$slider_name = $_POST['slider_name'];
	$slider_img = $_FILES['slider_img']['name'];

	$temp_name = $_FILES['slider_img']['tmp_name'];

	move_uploaded_file($temp_name, "../images/$slider_img");

	$edit_slider = "update slider set slider_name = '$slider_name', slider_image='$slider_img' where id = '$edit_id'";
	$run_slider = mysqli_query($con, $edit_slider);
	if($run_slider){
		echo "<script>alert('Slider Edited Succesfully')</script>";
		echo "<script>window.open('index2.php?view_slider','_self')</script>";
	}
}
?>
<?php
}
?>