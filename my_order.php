<div class="box">
	<center>
		<h1>
			My Order
		</h1>
		<p>If you have any questions, please feel free to <a href="contactus.php"> contact us</a>, our customer service center is working for you 24/7.</p>
	</center>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>St.no.</th>
					<th>Due Amount</th>
					<th>Invoice</th>
					<th>Quantity</th>
					<th>Color</th>
					<th>Order Date</th>
					<th>Paid/Unpaid</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$c_email = $_SESSION['customer_email'];
						$select_customer_id = "select customer_id from customers where customer_email = '$c_email'";
						$run_customer_id = mysqli_query($con, $select_customer_id);
						$c_id = mysqli_fetch_array($run_customer_id);
						$customer_id = $c_id['customer_id'];

						$select_customer_order = "select * from customer_order where customer_id = '$customer_id'";
						$run_customer_order = mysqli_query($con, $select_customer_order);

						$i=0;
						while($fetch_customer_order = mysqli_fetch_array($run_customer_order))
						{
							$order_id = $fetch_customer_order['order_id'];
							$due_ammount = $fetch_customer_order['due_amount'];
							$invoice = $fetch_customer_order['invoice_no'];
							$qty = $fetch_customer_order['qty'];
							$color = $fetch_customer_order['color'];
							$order_date = substr($fetch_customer_order['order_date'], 0, 11);
							$order_status = $fetch_customer_order['order_status'];
							$i++;
							if($order_status == 'pending'){
								$paid_unpaid = 'Unpaid';
							}else{
								$paid_unpaid = 'Paid';
							}
							?>
							<tr>
									<td>#<?php echo $i; ?></td>
									<td><?php echo $due_ammount; ?> AED</td>
									<td><?php echo $invoice; ?></td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $color; ?></td>
									<td><?php echo $order_date; ?></td>
									<td><?php echo $paid_unpaid; ?></td>
									<td><?php echo $order_status; ?></td>
									<?php
									if($order_status == 'Complete'){
										?>
										<td><a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-primary btn-sm'>Confirmed</a></td>
										<?php
									}else{
										?>
										<td><a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-primary btn-sm'>Confirm If Paid</a></td>
										<?php
									}?>
							</tr><?php
						}
				?>
			</tbody>
		</table>
	</div>
</div>