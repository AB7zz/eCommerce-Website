<?php
session_start();
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
	$admin_email = $_SESSION['admin_email'];
	$get_admin = "select * from admin where admin_email = '$admin_email'";
	$run_admin = mysqli_query($con, $get_admin);
	$admin = mysqli_fetch_array($run_admin);
	$admin_image = $admin['admin_image'];
	$admin_name = $admin['admin_name'];
	$admin_job = $admin['admin_job'];
	$admin_id = $admin['admin_id'];
	$user_email = $admin['admin_email'];
	$user_country = $admin['admin_country'];
	$user_contact = $admin['admin_contact'];

	$get_pro = "select * from medproducts";
	$run_pro = mysqli_query($con, $get_pro);
	$count_pro = mysqli_num_rows($run_pro);

	$get_cust = "select * from customers";
	$run_cust = mysqli_query($con, $get_cust);
	$count_cust = mysqli_num_rows($run_cust);

	$get_pro_cat = "select * from med_product_category";
	$run_pro_cat = mysqli_query($con, $get_pro_cat);
	$count_pro_cat = mysqli_num_rows($run_pro_cat);

	$get_cust_order = "select * from customer_order";
	$run_cust_order = mysqli_query($con, $get_cust_order);
	$count_cust_order = mysqli_num_rows($run_cust_order);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--Animate.css link1-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!--Animate.css link2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
<link   rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style2.css?v=<?php echo time(); ?>">
</head>
<body>
		<div class="col-md-2 col-sm-6" id="wrapper">
			<?php include 'includes/sidebar2.php'; ?>
		</div>
		<div class="col-md-10 col-sm-6">
			<div id="page-wrapper">
				<div class="container-fluid">
					<?php
					if(isset($_GET['dashboard2'])){
						include 'dashboard2.php';
					}
					if(isset($_GET['insert_product'])){
						include 'insert_product.php';
					}
					if(isset($_GET['view_product'])){
						include 'view_product.php';
					}
					if(isset($_GET['delete_product'])){
						include 'delete_product.php';
					}
					if(isset($_GET['edit_product'])){
						include 'edit_product.php';
					}
					if(isset($_GET['insert_product_cat'])){
						include 'insert_p_cat.php';
					}
					if(isset($_GET['view_product_cat'])){
						include 'view_p_cat.php';
					}
					if(isset($_GET['delete_p_cat'])){
						include 'delete_p_cat.php';
					}
					if(isset($_GET['edit_p_cat'])){
						include 'edit_p_cat.php';
					}
					if(isset($_GET['insert_categories'])){
						include 'insert_cat.php';
					}
					if(isset($_GET['view_categories'])){
						include 'view_cat.php';
					}
					if(isset($_GET['delete_categories'])){
						include 'delete_cat.php';
					}
					if(isset($_GET['edit_categories'])){
						include 'edit_cat.php';
					}
					if(isset($_GET['insert_slider'])){
						include 'insert_slider.php';
					}
					if(isset($_GET['view_slider'])){
						include 'view_slider.php';
					}
					if(isset($_GET['delete_slider'])){
						include 'delete_slider.php';
					}
					if(isset($_GET['edit_slider'])){
						include 'edit_slider.php';
					}
					if(isset($_GET['view_customer'])){
						include 'view_customers.php';
					}
					if(isset($_GET['delete_customer'])){
						include 'delete_customer.php';
					}
					if(isset($_GET['view_order'])){
						include 'view_order.php';
					}
					if(isset($_GET['delete_cust_order'])){
						include 'delete_cust_order.php';
					}
					if(isset($_GET['view_payments'])){
						include 'view_payments.php';
					}
					if(isset($_GET['delete_payment'])){
						include 'delete_payment.php';
					}
					if(isset($_GET['insert_user'])){
						include 'insert_user.php';
					}
					if(isset($_GET['view_user'])){
						include 'view_user.php';
					}
					if(isset($_GET['delete_user'])){
						include 'delete_user.php';
					}
					if(isset($_GET['user_profile'])){
						include 'user_profile.php';
					}
					?>
				</div>
			</div>
		</div>
</body>
</html>
<?php 
}
?>