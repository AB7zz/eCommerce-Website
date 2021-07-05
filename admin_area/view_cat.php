<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard">
					Dashboard / View Categories
				</i>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="#" class="list-group-item list-group-item-action active">
					<i class="fa fa-money fa-fw"></i> View Categories
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th> Category Id</th>
								<th> Category Title</th>
								<th> Category Description</th>
								<th>Delete Category</th>
								<th>Edit Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_cat = "select * from medcategories";
							$run_cat = mysqli_query($con, $get_cat);
							while($fetch_cat = mysqli_fetch_array($run_cat)){
								$cat_id = $fetch_cat['cat_id'];
								$cat_title = $fetch_cat['cat_title'];
								$cat_desc = $fetch_cat['cat_desc'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $cat_title; ?></td>
								<td><?php echo $cat_desc; ?></td>
								<td><a href="index2.php?delete_categories=<?php echo $cat_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
								<td><a href="index2.php?edit_categories=<?php echo $cat_id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>