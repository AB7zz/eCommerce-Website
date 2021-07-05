<?php include 'db/db.php'; ?>
<?php include ("functions/medfunctions.php"); ?>
<?php session_start(); ?>
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
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

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
  <div id="carouselExampleIndicators" class="ml-4 mb-4 mt-4 carousel carousel-1 slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="m-auto carousel-inner carousel-inner-index">
        <?php
        $get_slider = "select * from slider LIMIT 0,1";
        $run_slider = mysqli_query($con, $get_slider);
        while($row = mysqli_fetch_array($run_slider)){
          $slider_name = $row['slider_name'];
          $slider_image = $row['slider_image'];
          echo "<div class='carousel-item carousel-item-index active'>
                  <img style='height: 475px !important;
  width: 1250px !important;' class='d-block w-100' src='images/$slider_image' alt='Rice'>
                </div>";
        }
        ?>
        <?php
        $get_slider = "select * from slider LIMIT 1,3";
        $run_slider = mysqli_query($con, $get_slider);
        while($row = mysqli_fetch_array($run_slider)){
          $slider_name = $row['slider_name'];
          $slider_image = $row['slider_image'];
          echo "<div class='carousel-item carousel-item-index'>
                  <img style='height: 475px !important;
  width: 1250px !important;' class='d-block w-100' src='images/$slider_image' alt='Rice'>
                </div>";
        }
        ?>
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
  <section class="medsec bg-light">
    <div class="row">
      <div class="col-md-6">
        <img style="height: 500px; width: 500px;" class="ml-5 mt-5 mb-5" src="images/mdeicalprod.png">
      </div>
      <div class="col-md-6">
        <h1 class="text-center mt-5 font-1">Medcial Products</h1>
        <p class="mt-5 ml-4">We supply all types of Medical Products ranging from all types of Medical Masks, Sanitizers to surgical equipments. <a href="medicalprod.php">Click Here</a> to view all products we have.</p>

<div class="your-class">
  <div>your content</div>
  <div>your content</div>
  <div>your content</div>
</div>
      </div> 
  </section>
  <section class="ricesec">
    <div class="row">
      <div class="col-md-6">
        <h1 class="text-center mt-5 font-1">Rice</h1>
        <p class="mt-5 ml-4">We supply rice in bulk quantity. <a href="rice.php">Click Here</a> to view all types of Rice available with us.</p>
      </div>
      <div class="col-md-6">
        <img style="height: 500px; width: 500px;" class="ml-5 mt-5 mb-5" src="images/rice.jpg">
      </div>
    </div>
  </section>
  <section class="propertysec bg-light">
    <div class="row">
      <div class="col-md-6">
        <img style="height: 500px; width: 500px;" class="ml-5 mt-5 mb-5" src="images/properties.jpg">
      </div>
      <div class="col-md-6">
        <h1 class="text-center mt-5 font-1">Properties</h1>
        <p class="mt-5 ml-4">We sell properties and lands in Dubai. <a href="buildprod.php">Click Here</a> to view all properties that are available with us.</p>
      </div>
    </div>
  </section>
  <section>
    <?php include 'footer.php'; ?>
  </section>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.your-class').slick({
    setting-name: setting-value
  });
});
</script>
</body>
</html>