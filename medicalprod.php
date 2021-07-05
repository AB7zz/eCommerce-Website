<?php session_start(); ?><?php include 'db/db.php'; ?>
<?php include ("functions/medfunctions.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy Met Sell</title>
  <script src="https://use.fontawesome.com/265b5bff8c.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time(); ?>">
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
          <li>Medical Products</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-3">
          <?php include ("medsidebar.php"); ?>
        </div>
        <div class="col-md-9">
          <?php
          if(!isset($_GET['p_cat']))
          {
            if(!isset($_GET['cat_id']))
            {
              echo "<div class='mt-3 box'>
              <h1>Shop</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>";
            }
          }
          ?>
          <div class="row">
            <?php
            if(!isset($_GET['p_cat']))
            {
              if(!isset($_GET['cat_id']))
              {
                $per_page = 6;
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else
                {
                    $page = 1;
                }
                $start_from = ($page-1) * $per_page;
                $get_product = "select * from medproducts order by 1 DESC LIMIT $start_from, $per_page";
                $run_products = mysqli_query($db, $get_product);
                while($row_product = mysqli_fetch_array($run_products))
                {
                  $pro_id = $row_product['product_id'];
                  $pro_title = $row_product['product_title'];
                  $pro_price = $row_product['product_price'];
                  $pro_img1 = $row_product['product_img1'];
                  $pro_img2 = $row_product['product_img2'];
                  $pro_img3 = $row_product['product_img3'];
                  echo "<div class='col-md-4 col-sm-6 center-responsive'>
                            <div class='box mt-5 product'>
                              <a href='details.php?pro_id=$pro_id'>
                                <div id='carouselExampleSlidesOnly' class='carousel slide' data-ride='carousel'>
                                  <div class='m-auto carousel-inner carousel-inner-medprod'>
                                    <div class='carousel-item carousel-item-medprod active'>
                                        <img class = 'img-thumbnail' style='height: 250px !important; width: 150px !important;' src='images/$pro_img1'>
                                    </div>
                                    <div class='carousel-item carousel-item-medprod'>
                                        <img class = 'img-thumbnail' style='height: 250px !important; width: 150px !important;' src='images/$pro_img2'>
                                    </div>
                                    <div class='carousel-item carousel-item-medprod'>
                                        <img class = 'img-thumbnail' style='height: 250px !important; width: 150px !important;' src='images/$pro_img3'>
                                    </div>
                                  </div>
                                </div>
                              </a>
                              <div class='text'>
                                <h3>
                                  <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                </h3>
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
          <center>
            <ul class="pagination">
            <?php
              $query = "select * from medproducts";
              $result = mysqli_query($con, $query);
              $total_record = mysqli_num_rows($result);
              $total_pages = ceil($total_record / $per_page);
              echo "
              <li><a href='shop.php?page=1'>First Page</a></li>";
              for($i = 1; $i<=$total_pages; $i++){
                echo "<li><a href='shop.php?page=$i'>$i</a></li>";
              }
              echo "<li><a href='shop.php?$total_pages'>Last Page</a></li>";
              }
            }
            ?>
            </ul>
          </center>
          <?php
          getProCat();
          getCatPro();
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>