<?php session_start(); ?><?php include 'db/db.php'; ?>
<?php include ("functions/functions.php"); ?>
<?php 
if(isset($_GET['pro_id'])){
  $pro_id = $_GET['pro_id'];
  $get_product = "select * from medproducts where product_id =  '$pro_id'";
  $run_product = mysqli_query($con, $get_product);
  $row_product = mysqli_fetch_array($run_product);
  $p_cat_id = $row_product['p_cat_id'];
  $p_title = $row_product['product_title'];
  $p_price = $row_product['product_price'];
  $p_desc = $row_product['product_desc'];
  $p_img1 = $row_product['product_img1'];
  $p_img2 = $row_product['product_img2'];
  $p_img3 = $row_product['product_img3'];
  $get_p_cat = "select * from med_product_category where p_cat_id = '$p_cat_id'";
  $run_p_cat = mysqli_query($con, $get_p_cat);
  $row_p_cat = mysqli_fetch_array($run_p_cat);
  $p_cat_id = $row_p_cat['p_cat_id'];
  $p_cat_title = $row_p_cat['p_cat_title'];
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy Met Sell</title>
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
  <!--<?php //include 'styles/link.php'; ?>-->
  <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>
  <div id="top"><!--Top Bar Start-->
    <div class="row container"><!--Container Start-->
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
            <li><a href="medicalprod.php">Medical Products</a></li>
            <li><a href="medicalprod.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
            <li><?php echo $p_title; ?></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-3">
          <?php include ("medsidebar.php"); ?>
        </div>
        <div class="col-md-9">
          <div class="row" id="productmain">
            <div class="col-md-6">
              <div id="mainimage">
                <div id="carouselExampleIndicators" class=" carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="m-auto carousel-inner carousel-inner-detail">
                    <div class="carousel-item carousel-item-detail active">
                        <?php echo "<img style='height: 355px !important; width: 234px !important;' src='images/$p_img1'>"; ?>
                    </div>
                    <div class="carousel-item carousel-item-detail">
                        <?php echo "<img style='height: 355px !important; width: 234px !important;' src='images/$p_img2'>"; ?>
                    </div>
                    <div class="carousel-item carousel-item-detail">
                        <?php echo "<img style='height: 355px !important; width: 234px !important;' src='images/$p_img3'>"; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <h1 class="text-center"><?php echo $p_title; ?></h1>
                <?php addCart(); ?>
                <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-md-5 control-label">Product Quantity</label>
                    <div class="col-md-7">
                      <input type="text" name="product_qty" placeholder="Enter Quantity">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-5 control-label">Product Color</label>
                    <div class="col-md-7">
                      <select style="height: 35px !important; width: 178px !important;" name="product_color" class="form-control">
                        <option>None</option>
                        <option>Blue</option>
                        <option>Black</option>
                        <option>White</option>
                      </select>
                    </div>
                  </div>
                  <p class="price"><?php echo $p_price; ?> AED</p>
                  <p class="text-center">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                  </p>
                </form>
              </div>
              <div class="mt-3 row">
                <div class="mr-2 col-xs-4">
                  <a href="#" class="thumb">
                    <?php echo "<img style='height: 130px; width:130px;' src='images/$p_img1' class='img-responsive'>"; ?>
                  </a>
                </div>
                <div class="mr-2 col-xs-4">
                  <a href="#" class="thumb">
                    <?php echo "<img style='height: 130px; width:130px;' src='images/$p_img2' class='img-responsive'>"; ?>
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="#" class="thumb">
                    <?php echo "<img style='height: 130px; width:130px;' src='images/$p_img3' class='img-responsive'>"; ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box" id="details">
          <h4 class="text-center">Product Details</h4>
          <p><?php echo $p_desc; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="mt-5 box same-height headline">
            <h3 class="text-center">You may also like these products</h3>
          </div>
        </div>
        <div class='col-md-9'>
          <div class='row'>
        <?php
          $get_products = "select * from medproducts order by 1 LIMIT 0,3";
          $run_products = mysqli_query($db, $get_products);
          while($row_products = mysqli_fetch_array($run_products))
          {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            echo "
            <div class='mt-5 center-repsonsive col-md-3'>
              <div class='product box same-height'>
                <a href=''>
                  <img src='images/$pro_img1' class='img-thumbnail img-responsive'>
                </a>
                <div class='text'>
                  <h3><a href='details.php'>$pro_title</a></h3>
                  <p class='price'>$pro_price AED</p>
                  <p class='buttons'>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-outline-dark mb-2'>View Details</a>
                                  <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                  </p>
                </div>
              </div>
            </div>";
              }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>