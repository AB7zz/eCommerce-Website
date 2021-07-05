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
								<th> Order No.</th>
								<th>Customer Email</th>
								<th> Invoice No.</th>
								<th> Product Title</th>
								<th> Product Qty</th>
								<th> Product Color</th>
								<th> Order Date</th>
								<th> Total Amount</th>
								<th> Order Status</th>
								<th>Delete Order</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_cust_order = "select * from customer_order";
							$run_cust_order = mysqli_query($con, $get_cust_order);
							while($fetch_cust_order = mysqli_fetch_array($run_cust_order)){
								$order_id = $fetch_cust_order['order_id'];
								$customer_id = $fetch_cust_order['customer_id'];
								$get_cust_email = "select * from customers where customer_id = '$customer_id'";
								$run_cust_email = mysqli_query($con, $get_cust_email);
								$fetch_cust_email = mysqli_fetch_array($run_cust_email);
								$customer_email = $fetch_cust_email['customer_email'];
								$invoice_no = $fetch_cust_order['invoice_no'];
								$product_id = $fetch_cust_order['product_id'];
								$get_prod = "select * from products where product_id = '$product_id'";
								$run_prod = mysqli_query($con, $get_prod);
								$fetch_prod = mysqli_fetch_array($run_prod);
								$prod_title = $fetch_prod['product_title'];
								$qty = $fetch_cust_order['qty'];
								$color = $fetch_cust_order['color'];
								$date = $fetch_cust_order['order_date'];
								$amount = $fetch_cust_order['due_amount'];
								$status = $fetch_cust_order['order_status'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $customer_email; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $prod_title; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $color; ?></td>
								<td><?php echo $date; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $status; ?></td>
								<td><a href="index2.php?delete_cust_order=<?php echo $order_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
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