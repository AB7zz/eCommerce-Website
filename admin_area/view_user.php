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
								<th> User Id</th>
								<th> User Name</th>
								<th> User Email</th>
								<th> User Image</th>
								<th> User Country</th>
								<th> User Job</th>
								<th>Delete User</th>
								<th>Edit User</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_user = "select * from admin";
							$run_user = mysqli_query($con, $get_user);
							while($fetch_user = mysqli_fetch_array($run_user)){
								$user_id = $fetch_user['admin_id'];
								$admin_name = $fetch_user['admin_name'];
								$admin_email = $fetch_user['admin_email'];
								$admin_image = $fetch_user['admin_image'];
								$admin_country = $fetch_user['admin_country'];
								$admin_job = $fetch_user['admin_job'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $admin_name; ?></td>
								<td><?php echo $admin_email; ?></td>
								<td><img style="height: 100px; width: 100px;" src="user/images/<?php echo $admin_image; ?>"></td>
								<td><?php echo $admin_country; ?></td>
								<td><?php echo $admin_job; ?></td>
								<td><a href="index2.php?delete_user=<?php echo $user_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
								<td><a href="index2.php?user_profile=<?php echo $user_id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
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