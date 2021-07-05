<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<nav style="background-color: black !important;" class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Admin Panel</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav navbar-right top-nav ml-auto">
            <li class="nav-item dropdown">
              <a style="color: white !important;" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name; ?>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a style="color: white !important;" href="index.php?user_profile">
                    <i class="fa fa-fw-user"></i>
                  </a> Profile
                </li>
                <li>
                  <a style="color: white !important;" href="index.php?view_product">
                    <i class="fa fa-fw-envelope"></i>
                  </a> Product
                </li>
                <li>
                  <a style="color: white !important;" href="index.php?view_customers">
                    <i class="fa fa-fw-user"></i>
                  </a> Customers
                </li>
                <li>
                  <a style="color: white !important;" href="index.php?pro_cat">
                    <i class="fa fa-fw-gear"></i>
                  </a> Product Categories
                </li>
                <li class="divider"></li>
                <li>
                  <a style="color: black !important;" href="logout.php"> Logout
                    <i class="fa fa-fw fa-power-off"></i>
                  </a>
                </li>
              </ul>
            </li>
        </ul>
        <ul style="background-color: black !important;" class="navbar-nav nav mr-auto">
            <li class="nav-item">
              <a  style="color: white !important;" class="nav-link" href="index.php?dashboard">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard
              </a>
            </li>
            <li class="nav-item dropdown">
              <a style="color: white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>Product
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?insert_product">Insert Product</a>
                  <a class="dropdown-item" href="index.php?view_product">View Product</a>
              </div>
            </li>
            <li class="nav-item  dropdown">
              <a style="color: white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>Cateogries
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?insert_cat">Insert Cateogry</a>
                  <a class="dropdown-item" href="index.php?view_cat">View Cateogry</a>
              </div>
            </li>
            <li class="nav-item  dropdown">
              <a style="color: white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>Product Cateogries
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?insert_product_cat">Insert Product Cateogry</a>
                  <a class="dropdown-item" href="index.php?view_product_cat">View Product Cateogry</a>
              </div>
            </li>
            <li class="nav-item  dropdown">
              <a style="color: white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>Slider
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?insert_slider">Insert Slider</a>
                  <a class="dropdown-item" href="index.php?view_slider">View Slider</a>
              </div>
            </li>
            <li class="nav-item">
              <a style="color: white !important;" class="nav-link" href="index.php?view_customer">
                <i class="fa fa-fw fa-edit"></i>View Customer
              </a>
            </li>
            <li class="nav-item">
              <a style="color: white !important;" class="nav-link" href="index.php?view_order">
                <i class="fa fa-fw fa-list"></i>View Order
              </a>
            </li>
            <li class="nav-item">
              <a style="color: white !important;" class="nav-link" href="index.php?view_payment">
                <i class="fa fa-fw fa-pencil"></i>View Payments
              </a>
            </li>
            <li class="nav-item  dropdown">
              <a style="color: white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>Users
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?insert_user">Insert User</a>
                  <a class="dropdown-item" href="index.php?view_user">View User</a>
                  <a class="dropdown-item" href="index.php?edit_user">Edit User</a>
              </div>
            </li>
        </ul>
      </div>
  </nav>
  <?php } ?>