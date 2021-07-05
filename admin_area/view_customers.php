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
					Dashboard / View Customers
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
					<i class="fa fa-money fa-fw"></i> View Customers
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th> Customer Id</th>
								<th> Customer Name</th>
								<th> Customer Email</th>
								<th>Customer Password</th>
								<th>Customer Username</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer Contact</th>
								<th>Customer Address</th>
								<th>Customer Image</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_cat = "select * from customers";
							$run_cust = mysqli_query($con, $get_cust);
							while($fetch_cust = mysqli_fetch_array($run_cust)){
								$customer_id = $fetch_cust['customer_id'];
								$cust_name = $fetch_cust['customer_name'];
								$cust_email = $fetch_cust['customer_email'];
								$cust_password = $fetch_cust['customer_password'];
								$cust_user = $fetch_cust['customer_user'];
								$cust_country = $fetch_cust['customer_country'];
								$cust_city = $fetch_cust['customer_city'];
								$cust_contact = $fetch_cust['customer_contact'];
								$cust_address = $fetch_cust['customer_address'];
								$cust_img = $fetch_cust['customer_img'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $cust_name; ?></td>
								<td><?php echo $cust_email; ?></td>
								<td><?php echo $cust_password; ?></td>
								<td><?php echo $cust_user; ?></td>
								<td><?php echo $cust_country; ?></td>
								<td><?php echo $cust_city; ?></td>
								<td><?php echo $cust_contact; ?></td>
								<td><?php echo $cust_address; ?></td>
								<td><img style="height: 100px; width: 100px;" src="../images/<?php echo $cust_img; ?>"></td>
								<td><a href="index2.php?delete_customer=<?php echo $customer_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
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