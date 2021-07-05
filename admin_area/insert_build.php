<?php include '../db/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Buy Met Sell</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Animate.css link1-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <!--Animate.css link2-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

  <script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://use.fontawesome.com/265b5bff8c.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Insert Apartment/Building
				</li>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="list-group box">
  				<a href="#" class="list-group-item list-group-item-action active">
    				<i class="fa fa-money fa-w"></i> Insert Apartment/Building
  				</a>
  				<div class="form-group">
						<label class="col-md-3 control-label"><b>Enter Title</b></label>
						<div class="col-md-6">
						<input type="text" placeholder="Enter Title" name="build_name" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Choose Location</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="loc_name" class="form-control">
						<option>Select location</option>
							<?php
							$get_loc = "select * from locations";
							$run_loc = mysqli_query($con, $get_loc);
							while($row = mysqli_fetch_array($run_loc)){
								$id = $row['loc_id'];
								$loc_name = $row['loc_name'];
								echo "<option value='$id'>$loc_name</option>";
							}
							?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Choose Number of Beds</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="bed_no" class="form-control">
						<option>Select the number of beds</option>
						<?php
						$get_bed = "select * from bedroom";
						$run_bed = mysqli_query($con, $get_bed);
						while($row = mysqli_fetch_array($run_bed)){
							$id = $row['bed_id'];
							$bed_no = $row['bed_no'];
							echo "<option value='$id'>$bed_no</option>";
						}
						?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Choose Number of Bathrooms</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="bath_n" cloass="form-control">
						<option>Select the number of bathrooms</option>
							<?php
							$get_bath = "select * from bathroom";
							$run_bath = mysqli_query($con, $get_bath);
							while($row = mysqli_fetch_array($run_bath)){
								$id = $row['bath_id'];
								$bath_no = $row['bath_no'];
								echo "<option value='$id'>$bath_no</option>";
							}
							?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Choose Price Range</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="price_range" class="form-control">
						<option>Select the Price Range</option>
						<?php
						$get_price = "select * from price_range";
						$run_price = mysqli_query($con, $get_price);
						while($row = mysqli_fetch_array($run_price)){
							$id = $row['price_id'];
							$price_range = $row['price_range'];
							echo "<option value='$id'>$price_range</option>";
						}
						?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Rent Per Month</b></label>
					<div class="col-md-6">
					<input type="text" name="build_price" class="form-control"required="">
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Contact Number</b></label>
					<div class="col-md-6">
					<input type="text" name="phone" class="form-control"required="">
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 1</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img1" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 2</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img2" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 3</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img3" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 4</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img4" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 5</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img5" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 6</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img6" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 7</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img7" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 8</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img8" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 9</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img9" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Building Image 10</b></label>
					<div class="col-md-6">
					<input type="file" name="build_img10" class="form-control" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Description</b></label>
					<div class="col-md-6">
					<textarea name="build_desc" class="form-control" rows="6" cols="19"></textarea>
				</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Insert Apartment/Building" class="btn btn-primary form-control"> 
				</div>
			</div>
			</form>
		</div>
	</div>

<?php
if(isset($_POST['submit'])){
	$loc_id = $_POST['loc_name'];
	$bed_no = $_POST['bed_no'];
	$price_range = $_POST['price_range'];
	$bath_no = $_POST['bath_no'];
	$build_name = $_POST['build_name'];
	$build_desc = $_POST['build_desc'];
	$build_price = $_POST['build_price'];
	$phone = $_POST['phone'];

	$build_img1 = $_FILES['build_img1']['name'];
	$build_img2 = $_FILES['build_img2']['name'];
	$build_img3 = $_FILES['build_img3']['name'];
	$build_img4 = $_FILES['build_img4']['name'];
	$build_img5 = $_FILES['build_img5']['name'];
	$build_img6 = $_FILES['build_img6']['name'];
	$build_img7 = $_FILES['build_img7']['name'];
	$build_img8 = $_FILES['build_img8']['name'];
	$build_img9 = $_FILES['build_img9']['name'];
	$build_img10 = $_FILES['build_img10']['name'];


	$temp_name1 = $_FILES['build_img1']['tmp_name'];
	$temp_name2 = $_FILES['build_img2']['tmp_name'];
	$temp_name3 = $_FILES['build_img3']['tmp_name'];
	$temp_name4 = $_FILES['build_img4']['tmp_name'];
	$temp_name5 = $_FILES['build_img5']['tmp_name'];
	$temp_name6 = $_FILES['build_img6']['tmp_name'];
	$temp_name7 = $_FILES['build_img7']['tmp_name'];
	$temp_name8 = $_FILES['build_img8']['tmp_name'];
	$temp_name9 = $_FILES['build_img9']['tmp_name'];
	$temp_name10 = $_FILES['build_img10']['tmp_name'];


	move_uploaded_file($temp_name1, "../images/$build_img1");
	move_uploaded_file($temp_name2, "../images/$build_img2");
	move_uploaded_file($temp_name3, "../images/$build_img3");
	move_uploaded_file($temp_name4, "../images/$build_img4");
	move_uploaded_file($temp_name5, "../images/$build_img5");
	move_uploaded_file($temp_name6, "../images/$build_img6");
	move_uploaded_file($temp_name7, "../images/$build_img7");
	move_uploaded_file($temp_name8, "../images/$build_img8");
	move_uploaded_file($temp_name9, "../images/$build_img9");
	move_uploaded_file($temp_name10, "../images/$build_img10");

	$insert_build = "insert into buildprod(loc_id, bed_id, price_id, bath_id, build_name, date, build_price, phone, build_img1, build_img2, build_img3, build_img4, build_img5, build_img6, build_img7, build_img8, build_img9, build_img10, build_desc) values('$loc_id', '$bed_no', '$price_range', '$bath_no', '$build_name', NOW(), '$build_price', '$phone', '$build_img1', '$build_img2', '$build_img3', '$build_img4', '$build_img5', '$build_img6', '$build_img7', '$build_img8', '$build_img9', '$build_img10', '$build_desc')";
	$run_build = mysqli_query($con, $insert_build);
	if($run_build){
		echo "<script>alert('Apartment/Building Inserted Succesfully')</script>";
		echo "<script>window.open('../buildprod.php', '_self')</script>";
	}
}
?>
</body>
</html>