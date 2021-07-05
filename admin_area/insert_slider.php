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
					Dashboard / Insert Slider
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
					<i class="fa fa-money fa-fw"></i> Insert Slider
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Slider Name</label>
						<div class="col-md-6">
							<input type="text" name="slider_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><b> Slider Image</b></label>
						<div class="col-md-6">
							<input type="file" name="slider_img" class="form-control"required="">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Insert Slider" class="btn btn-primary form-control">
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
	echo $slider_name;

	move_uploaded_file($temp_name, "../images/$slider_img");

	$insert_slider = "insert into slider(slider_name, slider_image) values('$slider_name', '$slider_img')";
	$run_slider = mysqli_query($con, $insert_slider);
	if($run_slider){
		echo "<script>alert('Slider Inserted Succesfully');</script>";
		echo "<script>window.open('index2.php?view_slider');</script>";
	}
}
?>
<?php
}
?>