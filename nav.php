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