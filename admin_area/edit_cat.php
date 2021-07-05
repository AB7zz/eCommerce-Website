<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['edit_categories'])){
	$edit_id = $_GET['edit_categories'];
	$get_cat = "select * from medcategories where cat_id = '$edit_id'";
	$run_cat = mysqli_query($con, $get_cat);
	$fetch_cat = mysqli_fetch_array($run_cat);
	$cat_title = $fetch_cat['cat_title'];
	$cat_desc = $fetch_cat['cat_desc'];
}
?>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Edit Category
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
					<i class="fa fa-money fa-fw"></i> Edit Category
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category Title</label>
						<div class="col-md-6">
							<input value="<?php echo $cat_title; ?>" type="text" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category Description</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" class="form-control">
							<?php echo $cat_desc; ?></textarea>
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
	$cat_title = $_POST['cat_title'];
	$cat_desc = $_POST['cat_desc'];

	$edit_product = "update medcategories set cat_title = '$cat_title', cat_desc = '$cat_desc' where cat_id = '$edit_id'";
	$run_product = mysqli_query($con, $edit_product);
	if($run_product){
		echo "<script>alert('Category Edited Succesfully')</script>";
		echo "<script>window.open('index2.php?view_categories','_self')</script>";
	}
}
?>