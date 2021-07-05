<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['edit_product'])){
	$edit_id = $_GET['edit_product'];
	$get_pro = "select * from medproducts where product_id = '$edit_id'";
	$run_pro = mysqli_query($con, $get_pro);
	$fetch_pro = mysqli_fetch_array($run_pro);
	$pro_title = $fetch_pro['product_title'];
	$pro_cat = $fetch_pro['p_cat_id'];
	$cat = $fetch_pro['cat_id'];
	$pro_img1 = $fetch_pro['product_img1'];
	$pro_img2 = $fetch_pro['product_img2'];
	$pro_img3 = $fetch_pro['product_img3'];
	$pro_price = $fetch_pro['product_price'];
	$pro_keyword = $fetch_pro['product_keyword'];
	$pro_desc = $fetch_pro['product_desc'];

	$get_p_cat = "select * from product_category where p_cat_id = '$pro_cat'";
	$run_p_cat = mysqli_query($con, $get_p_cat);
	$fetch_cat_title = mysqli_fetch_array($run_p_cat);
	$p_cat_title = $fetch_cat_title['p_cat_title'];

	$get_cat = "select * from categories where cat_id = '$cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$fetch_cat_title = mysqli_fetch_array($run_cat);
	$cat_title = $fetch_cat_title['cat_title'];

}
?>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Edit Product
				</li>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			
		</div>
		<div class="col-lg-6">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="list-group box">
  				<a href="#" class="list-group-item list-group-item-action active">
    				<i class="fa fa-money fa-w"></i> Edit Product
  				</a>
  				<div class="form-group">
						<label class="col-md-3 control-label"><b>Product Title</b></label>
						<input type="text" value="<?php echo $pro_title;?>" name="product_title" class="form-control"required="">
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Cateogry</b></label>
					<select style="height: 34px;" value="<?php echo $p_cat_title;?>" name="product_cat" class="form-control">
							<?php
							$get_p_cats = "select * from product_category";
							$run_p_cats = mysqli_query($con, $get_p_cats);
							while($row = mysqli_fetch_array($run_p_cats)){
								$pid = $row['p_cat_id'];
								$p_cat_title = $row['p_cat_title'];
								echo "<option value='$pid'>$p_cat_title</option>";
							}
							?>
					</select>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Categories</b></label>
					<select style="height: 34px;" value="<?php echo $cat_title;?>" name="cat" class="form-control">
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
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 1</b></label>
					<input type="file" name="product_img1" class="form-control"required="">
					<img style="height: 50px; width: 50px;" src="../images/<?php echo $pro_img1; ?>">
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 2</b></label>
					<input type="file" name="product_img2" class="form-control"required="">
					<img style="height: 50px; width: 50px;" src="../images/<?php echo $pro_img2; ?>">
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Image 3</b></label>
					<input type="file" name="product_img3" class="form-control"required="">
					<img style="height: 50px; width: 50px;" src="../images/<?php echo $pro_img3; ?>">
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Price</b></label>
					<input type="text" value="<?php echo $pro_price;?>" name="product_price" class="form-control"required="">
				</div>
				<div class="form-group">
				<label class="col-md-3 control-label"><b>Product Keyword</b></label>
					<input type="text" value="<?php echo $pro_keyword;?>" name="product_keyword" class="form-control"required="">
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Product Description</b></label>
					<textarea name="product_desc" class="form-control" rows="6" cols="19"><?php echo $pro_desc; ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Edit Product" class="btn btn-primary form-control"> 
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

	$edit_product = "update medproducts set p_cat_id='$product_cat', cat_id='$cat', date=NOW(), product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_price='$product_price', product_desc='$product_desc', product_keyword='$product_keyword' where product_id = '$edit_id'";
	$run_product = mysqli_query($con, $edit_product);
	if($run_product){
		echo "<script>alert('Product Edited Succesfully')</script>";
		echo "<script>window.open('index2.php?view_product','_self')</script>";
	}
}
?>
<?php
}
?>