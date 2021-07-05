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
					Dashboard / Insert Category
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
					<i class="fa fa-money fa-fw"></i> Insert Category
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label"> Category Title</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Category Description</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" class="form-control">
							</textarea>
						</div>
					</div>
					<div class="form-group">
							<input type="submit" name="submit" value="Insert Category" class="btn btn-primary form-control">
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

	$insert_cat = "insert into medcategories(cat_title, cat_desc) values('$cat_title', '$cat_desc')";
	$run_cat = mysqli_query($con, $insert_cat);
	if($run_cat){
		echo "<script>alert('Category Inserted Succesfully')</script>";
		echo "<script>window.open('index2.php?view_categories')</script>";
	}
}
?>
<?php
}
?>