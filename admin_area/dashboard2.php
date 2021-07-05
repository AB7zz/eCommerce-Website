<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro; ?></div>
						<div>Products</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_cust; ?></div>
						<div>Customers</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro_cat ?></div>
						<div>Product Categories</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_cust_order; ?></div>
						<div>Orders</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product Id:</th>
								<th>Total: </th>
								<th>Date: </th>
								<th>Status: </th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 0;
								$get_order = "select * from customer_order order by 1 DESC LIMIT 0,5";
								$run_order = mysqli_query($con, $get_order);
								while($fetch_order = mysqli_fetch_array($run_order)){
									$order_id = $fetch_order['order_id'];
									$customer_id = $fetch_order['customer_id'];
									$product_id = $fetch_order['product_id'];
									$invoice_no = $fetch_order['invoice_no'];
									$qty = $fetch_order['qty'];
									$color = $fetch_order['color'];
									$date = $fetch_order['order_date'];
									$amount = $fetch_order['due_amount'];
									$status = $fetch_order['order_status'];
									$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php 
										$get_cust_email = "select * from customers where customer_id = '$customer_id'";
										$run_cust_email = mysqli_query($con, $get_cust_email);
										$fetch_cust_email = mysqli_fetch_array($run_cust_email);
										$customer_email = $fetch_cust_email['customer_email'];
										echo $customer_email;
									?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_id; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $date; ?></td>
								<td><?php echo $status; ?></td>
							</tr>
							<?php
									}
							?>
						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img style="height:100px; width:100px;" src="user/images/<?php echo $admin_image; ?>"><br>
					<span class="thumb-info-title">
						<span class="thumb-info-inner"><?php echo $admin_name; ?></span><br>
						<span class="thumb-info-type"><?php echo $admin_job; ?></span>
					</span>
				</div>
				<div class="mb-md">
					<div class="widget-content-expanded">
						<i class="fa fa-user"></i> <span>Email: </span><?php echo $user_email;?> <br>
						<i class="fa fa-user"></i> <span>Country: </span><?php echo $user_country?> <br>
						<i class="fa fa-user"></i> <span>Contact: </span><?php echo $user_contact;?> <br>
					</div>
					<hr class="dottet short">
					<h5 class="text-muted">About</h5>
					<p>Admin About</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>