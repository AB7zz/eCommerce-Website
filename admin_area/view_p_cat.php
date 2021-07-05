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
					Dashboard / View Product
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
					<i class="fa fa-money fa-fw"></i> View Products
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th> Product Category Id</th>
								<th> Product Category Title</th>
								<th> Product Category Description</th>
								<th>Delete Product Category</th>
								<th>Edit Product Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_p_cat = "select * from med_product_category";
							$run_p_cat = mysqli_query($con, $get_p_cat);
							while($fetch_p_cat = mysqli_fetch_array($run_p_cat)){
								$p_cat_id = $fetch_p_cat['p_cat_id'];
								$p_cat_title = $fetch_p_cat['p_cat_title'];
								$p_cat_desc = $fetch_p_cat['p_cat_desc'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $p_cat_title; ?></td>
								<td><?php echo $p_cat_desc; ?></td>
								<td><a href="index2.php?delete_p_cat=<?php echo $p_cat_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
								<td><a href="index2.php?edit_p_cat=<?php echo $p_cat_id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
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