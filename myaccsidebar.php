<div class="card">
	<div clas="card-header">
		<?php
		$session_customer = $_SESSION['customer_email'];
		$get_customer = "select * from customers where customer_email = '$session_customer'";
		$run_customer = mysqli_query($con, $get_customer);
		$fetch_customer = mysqli_fetch_array($run_customer);
		$img = $fetch_customer['customer_img'];
		$name = $fetch_customer['customer_name'];
		if(!isset($_SESSION['customer_email']))
		{
			echo "";
		}else
		{
			echo "<center>
				<img style='height: 300px; width: 251px;' src='customer/images/$img' class='img-responsive'>
			</center>
			<br>
			<h4 align='center' class='panel-title'>Name: $name</h4>";
		}
		?>
	</div>
		<ul class="list-group">
			<li class="<?php if(isset($_GET['my_order'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?my_order"><i class="fa fa-list"></i> My Order</a>
			</li>
			<li class="<?php if(isset($_GET['pay_offline'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
			</li>
			<li class="<?php if(isset($_GET['edit_account'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?edit_account"><i class="fa fa-pencil"></i> Edit Account</a>
			</li>
			<li class="<?php if(isset($_GET['change_password'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?change_password"><i class="fa fa-user"></i> Change Password</a>
			</li>
			<li class="<?php if(isset($_GET['my_wish_list'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?my_wish_list"><i class="fa fa-heart"></i> My Wish List</a>
			</li>
			<li class="<?php if(isset($_GET['delete-account'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?delete-account"><i class="fa fa-trash"></i> Delete Account</a>
			</li>
			<li class="<?php if(isset($_GET['logout'])){echo "active"; } ?> list-group-item">
				<a href="myaccount.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
			</li>
		</ul>
</div>