<?php session_start(); ?><?php include 'db/db.php'; ?>
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
        </ul>
      </div>
  </nav>
  <div id="content">
    <div class="mt-3 container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li>Buildings / Apartments</li>
        </ul>
      </div>
        <div class="col-md-12">
          <form method="post" action="">
            <div class="box form-group justify-content-center">
              <div class="row">
                <div class="col-md-3">
                  <label class="control-label"><b>Location</b></label>
                  <select style="height: 34px;" name="loc_id" class="form-control">
                    <option>Select location</option>
                      <?php
                      $get_loc = "select * from locations";
                      $run_loc = mysqli_query($con, $get_loc);
                      while($row = mysqli_fetch_array($run_loc)){
                        $id = $row['loc_id'];
                        $loc_name = $row['loc_name'];
                        echo "<option value='$id'>$loc_name</option>";
                      }
                      ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="control-label"><b>Number of Beds</b></label>
                  <select style="height: 34px;" name="bed_id" class="form-control">
                    <option>Select the number of beds</option>
                    <?php
                    $get_bed = "select * from bedroom";
                    $run_bed = mysqli_query($con, $get_bed);
                    while($row = mysqli_fetch_array($run_bed)){
                      $id = $row['bed_id'];
                      $bed_no = $row['bed_no'];
                      echo "<option name='bed_no' value='$id'>$bed_no</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="control-label"><b>Price Range</b></label>
                  <select style="height: 34px;" name="price_id" class="form-control">
                    <option>Select the Price Range</option>
                    <?php
                    $get_price = "select * from price_range";
                    $run_price = mysqli_query($con, $get_price);
                    while($row = mysqli_fetch_array($run_price)){
                      $id = $row['price_id'];
                      $price_range = $row['price_range'];
                      echo "<option name='price_range' value='$id'>$price_range</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="mt-4 col-md-3">
                  <input style="background-color: rgb(224, 0, 0); border: none;" method="post" type="submit" name="search" value="Search" class="btn btn-secondary btn-lg"> 
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-12">
          <?php
          if(!isset($_POST['search']))
          {
              echo "<div class='mt-3 box'>
              <h1>Properties</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>";
          }
          ?>
          <div class="row">
            <?php
            if(!isset($_POST['search']))
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
              $get_build = "select * from buildprod order by 1 DESC LIMIT $start_from, $per_page";
              $run_build = mysqli_query($con, $get_build);
              while($row_build = mysqli_fetch_array($run_build))
              {
                $build_id = $row_build['build_id'];
                $build_name = $row_build['build_name'];
                $build_price = $row_build['build_price'];
                $build_img1 = $row_build['build_img1'];
                $build_img2 = $row_build['build_img2'];
                $build_img3 = $row_build['build_img3'];
                $build_img4 = $row_build['build_img4'];
                $build_img5 = $row_build['build_img5'];
                $build_img6 = $row_build['build_img6'];
                $build_img7 = $row_build['build_img7'];
                $build_img8 = $row_build['build_img8'];
                $build_img9 = $row_build['build_img9'];
                $build_img10 = $row_build['build_img10'];
                $date = $row_build['date'];
                $phone = $row_build['phone'];
                $bed_id = $row_build['bed_id'];
                $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                $run_bed = mysqli_query($con, $get_bed);
                $row_bed = mysqli_fetch_array($run_bed);
                $bed_no = $row_bed['bed_no'];
                $bath_id = $row_build['bath_id'];
                $get_bath = "select * from bathroom where bath_id = '$bath_id'";
                $run_bath = mysqli_query($con, $get_bath);
                $row_bath = mysqli_fetch_array($run_bath);
                $bath_no = $row_bath['bath_no'];
                echo "          
                <div class='col-md-12 col-sm-12 center-responsive'>
                  <div class='mt-5 buildbox'>
                    <div class='product'>
                      <div class='row'>
                        <div class='col-md-4'>
                          <div id='carouselExampleSlidesOnly' class='mb-4 carousel slide' data-ride='carousel'>
                            <div class='m-auto carousel-inner carousel-inner-test'>
                              <div class='carousel-item carousel-item-test active'>
                                  <img class='d-block w-100' src='images/$build_img1' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img2' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img3' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img4' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img5' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img6' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img7' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img8' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img9' alt='Building'>
                              </div>
                              <div class='carousel-item carousel-item-test'>
                                  <img class='d-block w-100' src='images/$build_img10' alt='Building'>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-8'>
                          <div class='text'>
                            <h3>
                              <a style='color: black; text-decoration:none;' href='builddetails.php?build_id=$build_id'>$build_name</a>
                            </h3>
                            <h4 style='color: rgb(224, 0, 0);' class='price'>AED $build_price</h4>
                            <p>
                              <i class='fa fas fa-bed'></i> $bed_no Bedrooms
                              <i class='ml-4 fa fas fa-bath'></i> $bath_no Bathroom
                            </p>
                            <p class='buttons'>
                              <a href='buildprod.php' class='btn btn-outline-dark mb-2'>View Details</a>
                              <a href='buildprod.php' class='btn btn-outline-danger mb-2'><i class='fa fas fa-phone'></i> $phone</a>
                            </p>
                            <p>Uploaded on $date</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
              }
            ?>
          </div>
          <center>
            <nav aria-label="Page navigation example">
              <ul class="mt-5 pagination justify-content-center">
              <?php
                $query = "select * from buildprod";
                $result = mysqli_query($con, $query);
                $total_record = mysqli_num_rows($result);
                $total_pages = ceil($total_record / $per_page);
                echo "
                <li class='page-item'><a class='page-link' href='buildprod.php?page=1'>First Page</a></li>";
                for($i = 1; $i<=$total_pages; $i++)
                {
                  echo "<li class='page-item'><a class='page-link' href='buildprod.php?page=$i'>$i</a></li>";
                }
                echo "<li class='page-item'><a class='page-link' href='buildprod.php?$total_pages'>Last Page</a></li>";
              }
              ?>
            </ul>
            </nav>
          </center>
            <div class="row">
            <?php
            if(isset($_POST['search']))
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
                $loc_id = $_POST['loc_id'];
                $bed_id = $_POST['bed_id'];
                $price_id = $_POST['price_id'];

                $get_build = "select * from buildprod where loc_id = '$loc_id' and bed_id = '$bed_id' and price_id = '$price_id'";
                $run_build = mysqli_query($con, $get_build);
                $count = mysqli_num_rows($run_build);
                if($count == 0){
                  echo "
                  <div class='col-md-12'>
                    <div class='container'>
                      <div class='box'>
                        <div class='mt-5 mb-5 row'>
                          <div class='col-md-3'>
                          </div>
                          <div class='col-md-3'>
                            <img style='height: 200px; width: 200px;' class='img-responsive' src='images/empty.png'>
                          </div>
                          <div class='col-md-6'>
                            <h4>Sorry! We could not find any thing based on your search</h4>
                            <p>What you can do: -</p>
                            <ol class='text-muted'>
                              <li>Try removing some filters</li>
                              <li>Try making it less specific and make it more broad to see more options</li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
                }
                else{
                  while($row_build = mysqli_fetch_array($run_build))
                  {
                    $build_id = $row_build['build_id'];
                    $build_name = $row_build['build_name'];
                    $build_price = $row_build['build_price'];
                    $build_img1 = $row_build['build_img1'];
                    $build_img2 = $row_build['build_img2'];
                    $build_img3 = $row_build['build_img3'];
                    $build_img4 = $row_build['build_img4'];
                    $build_img5 = $row_build['build_img5'];
                    $build_img6 = $row_build['build_img6'];
                    $build_img7 = $row_build['build_img7'];
                    $build_img8 = $row_build['build_img8'];
                    $build_img9 = $row_build['build_img9'];
                    $build_img10 = $row_build['build_img10'];
                    $date = $row_build['date'];
                    $phone = $row_build['phone'];
                    $bed_id = $row_build['bed_id'];
                    $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                    $run_bed = mysqli_query($con, $get_bed);
                    $row_bed = mysqli_fetch_array($run_bed);
                    $bed_no = $row_bed['bed_no'];
                    $bath_id = $row_build['bath_id'];
                    $get_bath = "select * from bathroom where bath_id = '$bath_id'";
                    $run_bath = mysqli_query($con, $get_bath);
                    $row_bath = mysqli_fetch_array($run_bath);
                    $bath_no = $row_bath['bath_no'];
                    echo "          
                    <div class='col-md-12 col-sm-12 center-responsive'>
                      <div class='mt-5 buildbox'>
                        <div class='product'>
                          <div class='row'>
                            <div class='col-md-4'>
                              <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                                <ol class='carousel-indicators'>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='3'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='4'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='5'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='6'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='7'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='8'></li>
                                  <li data-target='#carouselExampleIndicators' data-slide-to='9'></li>
                                </ol>
                                <div class='m-auto carousel-inner carousel-inner-test'>
                                  <div class='carousel-item carousel-item-test active'>
                                      <img class='d-block w-100' src='images/$build_img1' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img2' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img3' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img4' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img5' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img6' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img7' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img8' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img9' alt='Building'>
                                  </div>
                                  <div class='carousel-item carousel-item-test'>
                                      <img class='d-block w-100' src='images/$build_img10' alt='Building'>
                                  </div>
                                  <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    <span class='sr-only'>Previous</span>
                                  </a>
                                  <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                    <span class='sr-only'>Next</span>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-8'>
                              <div class='text'>
                                <h3>
                                  <a style='color: black; text-decoration:none;' href='builddetails.php?build_id=$build_id'>$build_name</a>
                                </h3>
                                <h4 style='color: rgb(224, 0, 0);' class='price'>AED $build_price</h4>
                                <p>
                                  <i class='fa fas fa-bed'></i> $bed_no Bedrooms
                                  <i class='ml-4 fa fas fa-bath'></i> $bath_no Bathroom
                                </p>
                                <p class='buttons'>
                                  <a href='builddetails.php?build_id=$build_id' class='btn btn-outline-dark mb-2'>View Details</a>
                                  <a href='builddetails.php?build_id=$build_id' class='btn btn-outline-danger mb-2'><i class='fa fas fa-phone'></i> $phone</a>
                                </p>
                                <p>Uploaded on $date</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>";
                  }
                  ?>
          </div>
          <center>
            <nav aria-label="Page navigation example">
              <ul class="mt-5 pagination justify-content-center">
              <?php
                $query = "select * from buildprod";
                $result = mysqli_query($con, $query);
                $total_record = mysqli_num_rows($result);
                $total_pages = ceil($total_record / $per_page);
                echo "
                <li class='page-item'><a class='page-link' href='buildprod.php?page=1'>First Page</a></li>";
                for($i = 1; $i<=$total_pages; $i++)
                {
                  echo "<li class='page-item'><a class='page-link' href='buildprod.php?page=$i'>$i</a></li>";
                }
                echo "<li class='page-item'><a class='page-link' href='buildprod.php?$total_pages'>Last Page</a></li>";
              }
              }
              ?>
            </ul>
            </nav>
            </center>
        </div>
      </div>
    </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>