<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<nav style="background-color: black !important;" class="navbar navbar-inverse navbar-fixed-top">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
 		</button>
 		<div class="navbar-header">
 			<a href="index2.php?dashboard2" class="active navbar-brand">Admin Panel</a>
		</div>
	<ul class="nav navbar-right top-nav">
	  	<li class="dropdown">
		  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  		<i class="fa fa-user"></i> <?php echo $admin_name; ?>
		  	</a>
		    <ul class="dropdown-menu">
		        <li>
			     <a href="index2.php?user_profile">
			     	<i class="fa fa-fw-user"></i>Profile
			     </a>
		        </li>
	            <li>
			     <a href="index2.php?view_product">
			     	<i class="fa fa-fw-envelope"></i>Medical Products
			     </a>
	            </li>
                <li>
			     <a href="index2.php?view_customer">
			     	<i class="fa fa-fw-users"></i>Customer
			     </a>
			    </li>
		        <li>
			     <a href="index2.php?pro_cat">
			     	<i class="fa fa-fw-gear"></i>Medical Product Categories
			     </a>
	           </li>
	           <li class="divider"></li>
	           <li>
	           	<a href="logout.php">Logout
	           		<i class="fa fa-fw fa-power-off"></i>
	           	</a>
	           </li>
			</ul>
		</li>
	</ul><!-- navbar right top -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav sidebar-nav">
		<li>
			<a href="index2.php?dashboard2">
				<i class="fa fa-fw fa-dashboard">  </i> Dashboard
			</a>
		</li>
		<li><!-- start here -->			
			<a href="#" data-toggle="collapse" class="dropdown-toggle" data-target="#products"><i class="fa fa-fw fa-table"></i>Medical Products</a>
		
		<ul id="products" class="collapse">
			<li> 
				<a href="index2.php?insert_product">Insert Medical Product</a>
			</li>
			<li>
				<a href="index2.php?view_product">View Medical Products</a>
			</li>
		</ul>
	</li><!-- end here -->		

			<li><!-- start here -->			
			<a href="#" data-toggle="collapse" class="dropdown-toggle" data-target="#product_cat"><i class="fa fa-fw fa-table"></i>Medical Product Categories</a>
		
		<ul id="product_cat" class="collapse">
			<li> 
				<a href="index2.php?insert_product_cat">Insert Medical Product Categories</a>
			</li>
			<li>
				<a href="index2.php?view_product_cat">View Medical Product Categories</a>
			</li>
		</ul>
	</li><!-- end here -->	
			<li><!-- start here -->			
			<a href="#" data-toggle="collapse" class="dropdown-toggle" data-target="#category"><i class="fa fa-fw fa-table"></i>Medical Categories</a>
		
		<ul id="category" class="collapse">
			<li> 
				<a href="index2.php?insert_categories">Insert Medical Categories</a>
			</li>
			<li>
				<a href="index2.php?view_categories">View Medical Categories</a>
			</li>
		</ul>
	</li><!-- end here -->	
			<li><!-- start here -->			
				<a href="#" data-toggle="collapse" class="dropdown-toggle" data-target="#slider"><i class="fa fa-fw fa-table"></i>Slider</a>
				<ul id="slider" class="collapse">
					<li> 
					<a href="index2.php?insert_slider">Insert Slider</a>
					</li>
					<li>
					<a href="index2.php?view_slider">View Slider</a>
					</li>
				</ul>
			</li><!-- end here -->	
	<li>
		<a href="index2.php?view_customer">
			<i class="fa fa-fw fa-edit"></i>View Customer
		</a>
	</li>
	<li>
		<a href="index2.php?view_order">
			<i class="fa fa-fw fa-list"></i>View Order
		</a>
	</li>
	<li>
		<a href="index2.php?view_payments">
			<i class="fa fa-fw fa-pencil"></i>View Payments
		</a>
	</li>
	<li><!-- start here -->			
			<a href="#" data-toggle="collapse" class="dropdown-toggle" data-target="#users"><i class="fa fa-fw fa-table"></i>Users</a>
		
		<ul id="users" class="collapse">
			<li> 
				<a href="index2.php?insert_user">Insert User</a>
			</li>
			<li>
				<a href="index2.php?view_user">View User</a>
			</li>
			<li>
				<a href="index2.php?user_profile=<?php echo $admin_id; ?>">Edit Profile</a>
			</li>
		</ul>
	</li><!-- end here -->	
</ul>
</div>
</nav> 
<?php } ?>