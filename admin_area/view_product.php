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
								<th> Product Id</th>
								<th> Product Title</th>
								<th> Product Image</th>
								<th> Product Price</th>
								<th> Product Keyword</th>
								<th> Product Date</th>
								<th> Product Delete</th>
								<th> Product Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_prod = "select * from medproducts";
							$run_prod = mysqli_query($con, $get_prod);
							while($fetch_prod = mysqli_fetch_array($run_prod)){
								$pro_id = $fetch_prod['product_id'];
								$pro_title = $fetch_prod['product_title'];
								$pro_img = $fetch_prod['product_img1'];
								$pro_price = $fetch_prod['product_price'];
								$pro_keyword = $fetch_prod['product_keyword'];
								$pro_date = $fetch_prod['date'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $pro_title; ?></td>
								<td><img style="height: 50px; width: 50px;" src="../images/<?php echo $pro_img; ?>"></td>
								<td><?php echo $pro_price; ?></td>
								<td><?php echo $pro_keyword; ?></td>
								<td><?php echo $pro_date; ?></td>
								<td><a href="index2.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
								<td><a href="index2.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
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