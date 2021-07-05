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
					Dashboard / View Slider
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
					<i class="fa fa-money fa-fw"></i> View Slider
					</a>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th> Slider Id</th>
								<th> Slider Name</th>
								<th> Slider Image</th>
								<th>Delete Slider</th>
								<th>Edit Slider</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$get_slider = "select * from slider";
							$run_slider = mysqli_query($con, $get_slider);
							while($fetch_slider = mysqli_fetch_array($run_slider)){
								$slider_id = $fetch_slider['id'];
								$slider_name = $fetch_slider['slider_name'];
								$slider_img = $fetch_slider['slider_image'];
								$i++;
							?>
							<tr>
								<td>#<?php echo $i; ?></td>
								<td><?php echo $slider_name; ?></td>
								<td><img style="height: 70px; width: 150px;" src="../images/<?php echo $slider_img; ?>"></td>
								<td><a href="index2.php?delete_slider=<?php echo $slider_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
								<td><a href="index2.php?edit_slider=<?php echo $slider_id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
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