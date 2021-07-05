<?php session_start(); ?><?php include 'db/db.php'; ?>
<?php include ("functions/functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy Met Sell</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Animate.css link1-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <!--Animate.css link2-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

  <script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://use.fontawesome.com/265b5bff8c.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
  <div id="top"><!--Top Bar Start-->
    <div class="row container-fluid"><!--Container Start-->
      <div class="col-md-6 offer"><!--col-md-6 offer Start-->
        <a href="index.php" class="navbar-brand">E-commerce made by Abhinav CV</a>
        <form style="display:inline-block;" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div><!--col-md-6 offer End-->
      <div class="col-md-6 offer">
        <ul class="menu">
          <li>
            <a href="index.php"> +971 52 107 8900</a>
          </li>
          <li>
            <a href="index.php"> trader.dubai@gmail.com</a>
          </li>
          <li>
            <a href="register.php"> Register</a>
          </li>
          <li>
            <?php
            if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>My Account</a>";
            }else{
              echo "<a href='myaccount.php?my_order'>My Account</a>";
            }
            ?>
          </li>
          <li>
            <a href="cart.php"> Go to Cart</a>
          </li>
          <li>
            <?php 
            if(!isset($_SESSION['customer_email']))
            {
              echo "<a href='checkout.php'>Log in</a>"; 
            }
            else
            {
                echo "<a href='logout.php'>Log out</a>";
            }
            ?>
          </li>
        </ul>
      </div>
    </div><!--Container End-->
  </div><!--Top Bar End-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand btn btn-success btn-sm" href="register.php">
        <?php
            if(!isset($_SESSION['customer_email'])){
              echo "Log in";
            }else{
              echo "Welcome: " . $_SESSION['customer_email'] . "";
            }
          ?>
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item  dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="medicalprod.php">Medical Products</a>
                  <a class="dropdown-item" href="rice.php">Rice</a>
                  <a class="dropdown-item" href="buildprod.php">Properties</a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="aboutus.php">Services</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <?php
            if(!isset($_SESSION['customer_email'])){
              echo "<a class='nav-link' href='checkout.php'>My Account</a>";
            }else{
              echo "<a class='nav-link' href='myaccount.php?my_order'>My Account</a>";
            }
            ?>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="cart.php">My Cart</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a id="carttt" href="cart.php" class="my-2 my-sm-0 form-control mr-sm-2 btn navbar-btn btn-primary right"><i class="fa fa-shopping-cart"></i> <?php item(); ?> items in Cart</a>
        </form>
      </div>
  </nav>
	<div id="content">
    	<div class="mt-3 container">
      		<div class="col-md-12">
	        	<ul class="breadcrumb">
	          		<li><a href="index.php">Home</a></li>
	          		<li>My Cart</li>
	        	</ul>
	    	</div>
        <div class="row">
	    	<div class="col-md-9" id="cart">
	    		<div class="mt-3 box">
	    			<form action="cart.php" method="post" enctype="multipart-form-data">
	    				<h1>Shopping Cart</h1>
	    				<p class="text-muted">Currently You have <?php item(); ?> item(s) in your cart</p>
	    				<div class="table-responsive">
	    					<table class="table">
	    						<thead>
	    							<tr>
	    								<th colspan="1">Product</th>
	    								<th>Quantity</th>
	    								<th>Unit Price</th>
                      <th>Color</th>
	    								<th colspan="1">Delete</th>
	    								<th colspan="1">Sub Total</th>
	    							</tr>
	    						</thead>
	    						<?php cart_prod(); ?>
	    						<tfoot>
	    							<tr>
	    								<th colspan="5">Total</th>
	    								<th colspan="2"><?php total(); ?> AED</th>
	    							</tr>
	    						</tfoot>
	    					</table>
	    				</div>
	    				<div class="box-footer">
	    					<div class="pull-left">
	    						<a href="medicalprod.php" class="btn btn-default">
	    							<i class="fa fa-chevron-left"></i> Continue Shopping
	    						</a>
	    					</div>
	    					<div class="pull-right">
	    						<button class="btn btn-default" type="submit" name="update" value="Update Cart">
	    							<i class="fa fa-refresh"> Update Cart</i>
	    						</button>
	    						<a href="checkout.php" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
	    					</div>
	    				</div>
	    			</form>
	    		</div>
          <?php
          function update_cart(){
            global $con;
            if(isset($_POST['update'])){
              foreach($_POST['remove'] as $remove_id){
                $delete_product = "delete from cart where p_id='$remove_id'";
                $run_delete = mysqli_query($con, $delete_product);
                if($run_delete){
                  echo "<script>window.open('cart.php','_self')</script>";
                }
              }
            }
          }
          echo @$up_cart = update_cart();
          ?>
	    	</div>
	    	<div class="col-md-3">
	    		<div class="mt-3 box" id="order-summary">
	    			<div class="box-header">
	    				<h3>Order Summary</h3>
	    			</div>
	    			<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered</p>
	    			<div class="trable-responsive">
		    			<table class="table">
		    				<tbody>
		    					<tr>
		    						<td>Order Subtotal</td>
		    						<th><?php total(); ?> AED</th>
		    					</tr>
		    					<tr>
		    						<td>Shipping and handling</td>
		    						<td>0 AED</td>
		    					</tr>
		    					<tr>
		    						<td>Tax</td>
		    						<td>0 AED</td>
		    					</tr>
		    					<tr class="total">
		    						<td>Total</td>
		    						<th><?php total(); ?> AED</th>
		    					</tr>
		    				</tbody>
		    			</table>
		    		</div>
	    		</div>
	    	</div>
      </div>
	    	<div class="col-md-12">
        		<div class="mt-3 box">
          		<h3 class="text-center">You might also be interested in these products</h3>
        	</div>
        	<div class="mt-3 row">
          		<div class="col-md-4 col-sm-6 center-responsive">
            		<div class="box product">
              			<a href="details.php">
                			<img style="height: 250px; width: 250px;" class="img-responsive" src="images/3ply.jpg">
              			</a>
              			<div class="text">
                			<h3>
                  			<a href="details.php">3ply Disposable Mask</a>
                			</h3>
                			<p class="price">4.35 AED</p>
                			<p class="buttons">
                  			<a href="details.php" class="btn btn-default">View Details</a>
                  				<a href="details" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                			</p>
              			</div>
            		</div>
          		</div>
          		<div class="col-md-4 col-sm-6">
            		<div class="box product">
              			<a href="details.php">
                			<img style="height: 250px; width: 250px;" class="img-responsive" src="images/1860.jpg">
              			</a>
              			<div class="text">
                			<h3>
                  				<a href="details.php">3M N95 1860</a>
                			</h3>
                			<p class="price">260 AED</p>
                			<p class="buttons">
                  				<a href="details.php" class="btn btn-default">View Details</a>
                  				<a href="details" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                			</p>
              			</div>
            		</div>
          		</div>
          		<div class="col-md-4 col-sm-6">
            		<div class="box product">
              			<a href="details.php">
                			<img style="height: 250px; width: 250px;" class="img-responsive" src="images/8210.jpg">
              			</a>
              			<div class="text">
                			<h3>
                  			<a href="details.php">3M N95 8210</a>
                			</h3>
                			<p class="price">300 AED</p>
                			<p class="buttons">
                  				<a href="details.php" class="btn btn-default">View Details</a>
                  				<a href="details" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                			</p>
              			</div>
            		</div>
          		</div>
      		</div>
    	</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>