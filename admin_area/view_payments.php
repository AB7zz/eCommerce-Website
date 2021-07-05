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
					Dashboard / View Payments
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
					<i class="fa fa-money fa-fw"></i> View Payments
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th> Payment No.</th>
								<th> Invoice No.</th>
								<th> Amount Paid</th>
								<th> Payment Method</th>
								<th> Reference No</th>
								<th> Payment Date</th>
								<th>Delete Payment</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_payment = "select * from payment";
							$run_payment = mysqli_query($con, $get_payment);
							while($fetch_payment = mysqli_fetch_array($run_payment)){
								$payment_id = $fetch_payment['payment_id'];
								$invoice_id = $fetch_payment['invoice_id'];
								$amount = $fetch_payment['amount'];
								$payment_mode = $fetch_payment['payment_mode'];
								$ref_no = $fetch_payment['ref_no'];
								$payment_date = $fetch_payment['payment_date'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $invoice_id; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $payment_mode; ?></td>
								<td><?php echo $ref_no; ?></td>
								<td><?php echo $payment_date; ?></td>
								<td><a href="index2.php?delete_payment=<?php echo $payment_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
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