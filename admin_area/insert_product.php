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
					Dashboard / Insert Product
				</li>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="list-group box">
  				<a href="#" class="list-group-item list-group-item-action active">
    				<i class="fa fa-money fa-w"></i> Insert Product
  				</a>
  				<div class="form-group">
						<label class="col-md-3 control-label"><b>Product Title</b></label>
						<div class="col-md-6">
						<input type="text" name="product_title" class="mt-3 form-control"required="">
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Cateogry</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="product_cat" class="form-control">
						<option>Select a product category</option>
							<?php
							$get_p_cats = "select * from product_category";
							$run_p_cats = mysqli_query($con, $get_p_cats);
							while($row = mysqli_fetch_array($run_p_cats)){
								$id = $row['p_cat_id'];
								$cat_title = $row['p_cat_title'];
								echo "<option value='$id'>$cat_title</option>";
							}
							?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Categories</b></label>
					<div class="col-md-6">
					<select style="height: 34px;" name="cat" class="form-control">
						<option>Select Cateogry</option>
						<?php
						$get_cats = "select * from categories";
						$run_cats = mysqli_query($con, $get_cats);
						while($row = mysqli_fetch_array($run_cats)){
							$id = $row['cat_id'];
							$cat_title = $row['cat_title'];
							echo "<option value='$id'>$cat_title</option>";
						}
						?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 1</b></label>
					<div class="col-md-6">
					<input type="file" name="product_img1" class="form-control"required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 2</b></label>
					<div class="col-md-6">
					<input type="file" name="product_img2" class="form-control"required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 3</b></label>
					<div class="col-md-6">
					<input type="file" name="product_img3" class="form-control" required="">
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Price</b></label>
					<div class="col-md-6">
					<input type="text" name="product_price" class="form-control"required="">
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-3 control-label"><b>Product Keyword</b></label>
				<div class="col-md-6">
					<input type="text" name="product_keyword" class="form-control"required="">
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Description</b></label>
					<div class="col-md-6">
					<textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
				</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control"> 
				</div>
			</div>
			</form>
		</div>
	</div>

<?php
if(isset($_POST['submit'])){
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$cat = $_POST['cat'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keyword = $_POST['product_keyword'];
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];


	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];


	move_uploaded_file($temp_name1, "../images/$product_img1");
	move_uploaded_file($temp_name2, "../images/$product_img2");
	move_uploaded_file($temp_name3, "../images/$product_img3");

	$insert_product = "insert into medproducts(p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keyword) values('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keyword')";
	$run_product = mysqli_query($con, $insert_product);
	if($run_product){
		echo "<script>alert('Product Inserted Succesfully')</script>";
		echo "<script>window.open('index2.php?view_product')</script>";
	}
}
?>
<?php
}
?>