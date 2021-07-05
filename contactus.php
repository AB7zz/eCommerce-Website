<?php session_start(); ?><?php include 'db/db.php'; ?>
<?php include ("functions/functions.php"); ?>
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
          <li>Contact Us</li>
        </ul>
      </div>
      <div class="row">
          <div class="col-md-3">
            <?php include ("medsidebar.php"); ?>
          </div>
          <div class="col-md-9">
            <div class="mt-3 box">
              <div class="box-header">
                <center>
                  <h2>Contact Us</h2>
                  <p class="text-muted">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
                  <p class="text-center"><i class="fa fa-phone"></i> +971 52 107 8900</p>
                  <p class="text-center"><i class="fa fa-envelope"></i> buymetsell@gmail.com  OR  trader.dubai@gmail.com</p>
                </center>
              </div>
              <form action="contactus.php" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" placeholder="Enter Name" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" placeholder="Enter Email" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" placeholder="Enter Subject" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <input type="text" name="message" placeholder="Enter Message" class="form-control" required="">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-user-md"></i>Submit Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $senderName = $_POST['name'];
  $senderEmail = $_POST['email'];
  $senderSub = $_POST['subject'];
  $senderMess = $_POST['message'];
  $receiverEmail = "abhiksi613@gmail.com";
  mail($receiverEmail, $senderName, $senderSub, $senderMess, $senderEmail);

  $email = $_POST['email'];
  $subject =  "Welcome to our website";
  $msg = "I shall get you soon, thanks for sending email";
  $from = "abhiksi613@gmail.com";
  mail($email, $subject, $msg, $from);
  echo "<h2 align='center'>Your email has been sent</h2>";

}
?>