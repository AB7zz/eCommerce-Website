<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['edit_p_cat'])){
	$edit_id = $_GET['edit_p_cat'];
	$get_p_cat = "select * from med_product_category where p_cat_id = '$edit_id'";
	$run_p_cat = mysqli_query($con, $get_p_cat);
	$fetch_p_cat = mysqli_fetch_array($run_p_cat);
	$p_cat_title = $fetch_p_cat['p_cat_title'];
	$p_cat_desc = $fetch_p_cat['p_cat_desc'];
}
?>
<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dashboard / Edit Product Category
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
					<i class="fa fa-money fa-fw"></i> Edit Product Category
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category Title</label>
						<div class="col-md-6">
							<input value="<?php echo $p_cat_title; ?>" type="text" name="p_cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category Description</label>
						<div class="col-md-6">
							<textarea type="text" name="p_cat_desc" class="form-control">
							<?php echo $p_cat_desc; ?></textarea>
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
	$p_cat_title = $_POST['p_cat_title'];
	$p_cat_desc = $_POST['p_cat_desc'];

	$edit_product = "update med_product_category set p_cat_title = '$p_cat_title', p_cat_desc = '$p_cat_desc' where p_cat_id = '$edit_id'";
	$run_product = mysqli_query($con, $edit_product);
	if($run_product){
		echo "<script>alert('Product Category Edited Succesfully')</script>";
		echo "<script>window.open('index2.php?view_product_cat','_self')</script>";
	}
}
?>
<?php
}
?>