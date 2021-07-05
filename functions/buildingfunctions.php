<?php
$db = mysqli_connect("localhost", "root", "", "ecom");
//for getting user ip start
function getUserIP(){
	switch(true){
		case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_C_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) : return $_SERVER['HTTP_FORWARDED_FOR'];
		default : return $_SERVER['REMOTE_ADDR'];
	}
}

function item(){
	global $db;
	$ip_add = getUserIP();
	$get_item = "select * from cart where ip_add = '$ip_add'";
	$run_item = mysqli_query($db, $get_item);
	$count = mysqli_num_rows($run_item);
	echo $count;
}

function addCart(){
	global $db;
	if(isset($_GET['add_cart'])){
		$ip_add = getUserIP();
		$p_id = $_GET['add_cart'];
		$product_qty = $_POST['product_qty'];
		$product_color = $_POST['product_color'];
		$check_check = "select * from cart where ip_add = '$id_add' and p_id = '$p_id'";
		$run_check = mysqli_query($db, $check_check);
		if(mysqli_num_rows($run_check) > 0){
			echo "<script> alert('This product has been already added')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}else{
			$query = "insert into cart(p_id, ip_add, qty, color) values('$p_id', '$ip_add', '$product_qty', '$product_color')";
			$run = mysqli_query($db, $query);
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}

//for getting user ip end
function getBuild()
{
  global $db;
  if(isset($_POST['search']))
  {
    $loc_name = $_POST['loc_name'];
    $bed_no = $_POST['bed_no'];
    $price_range = $_POST['price_range'];

    $get_loc = "select * from locations where loc_name = '$loc_name'";
    $run_loc = mysqli_query($db, $get_loc);
    $row_loc = mysqli_fetch_array($run_loc);
    $loc_id = $row_loc['loc_id'];

    $get_bed = "select * from bedroom where bed_no = '$bed_no'";
    $run_bed = mysqli_query($db, $get_bed);
    $row_bed = mysqli_fetch_array($run_bed);
    $bed_id = $row_bed['bed_id'];

    $get_range = "select * from price_range where price_range = '$price_range'";
    $run_range = mysqli_query($db, $get_range);
    $row_range = mysqli_fetch_array($run_range);
    $price_id = $row_range['price_id'];

    $get_build = "select * from buildprod where loc_id = '$loc_id' and bed_id = '$bed_id' and price_id = '$price_id'";
    $run_build = mysqli_query($db, $get_build);
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
      $run_bed = mysqli_query($db, $get_bed);
      $row_bed = mysqli_fetch_array($run_bed);
      $bed_no = $row_bed['bed_no'];
      $bath_id = $row_build['bath_id'];
      $get_bath = "select * from bathroom where bath_id = '$bath_id'";
      $run_bath = mysqli_query($db, $get_bath);
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
  }
}


//Right side start
function getBuildwtf(){
	global $db;
	if(isset($_GET['loc_name']))
  {
    $loc_name = $_GET['loc_name'];
    $get_loc = "select * from locations where loc_name = '$loc_name'";
    $run_loc = mysqli_query($db, $get_loc);
    $row_loc = mysqli_fetch_array($run_loc);
    $loc_id = $row_loc['loc_id'];
		$_SESSION['loc_id'] = $loc_id;
		$get_build = "select * from buildprod where loc_id = '$loc_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build))
    {
      $build_id = $row_build['build_id'];
      $build_name = $row_build['build_name'];
      $build_price = $row_build['build_price'];
      $build_img1 = $row_build['build_img1'];
      $date = $row_build['date'];
      $bed_id = $row_build['bed_id'];
      $get_bed = "select * from bedroom where bed_id = '$bed_id'";
      $run_bed = mysqli_query($db, $get_bed);
      $row_bed = mysqli_fetch_array($run_bed);
      $bed_no = $row_bed['bed_no'];
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
	}
	else if(isset($_GET['price_id']))
  {
		$price_id = $_GET['price_id'];
		$_SESSION['price_id'] = $price_id;
		$get_build = "select * from buildprod where price_id = '$price_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
	else if(isset($_GET['bede_id'])){
		$bed_id = $_GET['bed_id'];
		$_SESSION['bed_id'] = $bed_id;
		$get_build = "select * from buildprod where bed_id = '$bed_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
	else if( (isset($_GET['loc_id'])) && isset($_GET['price_id'])){
		$loc_id = $_GET['loc_id'];
		$_SESSION['loc_id'] = $loc_id;
		$price_id = $_GET['price_id'];
		$_SESSION['price_id'] = $price_id;
		$get_build = "select * from buildprod where loc_id = '$loc_id' and price_id = '$price_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
	else if( (isset($_GET['loc_id'])) && isset($_GET['bed_id'])){
		$loc_id = $_GET['loc_id'];
		$_SESSION['loc_id'] = $loc_id;
		$bed_id = $_GET['bed_id'];
		$_SESSION['bed_id'] = $bed_id;
		$get_build = "select * from buildprod where loc_id = '$loc_id' and bed_id = '$bed_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
	else if( (isset($_GET['price_id'])) && isset($_GET['bed_id'])){
		$price_id = $_GET['price_id'];
		$_SESSION['price_id'] = $price_id;
		$bed_id = $_GET['bed_id'];
		$_SESSION['bed_id'] = $bed_id;
		$get_build = "select * from buildprod where price_id = '$price_id' and bed_id = '$bed_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
	else if( (isset($_GET['price_id'])) && isset($_GET['bed_id']) && isset($_GET['loc_id'])){
		$loc_id = $_GET['loc_id'];
		$_SESSION['loc_id'] = $loc_id;
		$price_id = $_GET['price_id'];
		$_SESSION['price_id'] = $price_id;
		$bed_id = $_GET['bed_id'];
		$_SESSION['bed_id'] = $bed_id;
		$get_build = "select * from buildprod where price_id = '$price_id' and bed_id = '$bed_id' and loc_id = '$loc_id'";
		$run_build = mysqli($db, $get_build);
		while($row_build = mysqli_fetch_array($run_build)){
                  $build_id = $row_build['build_id'];
                  $build_name = $row_build['build_name'];
                  $build_price = $row_build['build_price'];
                  $build_img1 = $row_build['build_img1'];
                  $date = $row_build['date'];
                  $bed_id = $row_build['bed_id'];
                  $get_bed = "select * from bedroom where bed_id = '$bed_id'";
                  $run_bed = mysqli_query($db, $get_bed);
                  $row_bed = mysqli_fetch_array($run_bed);
                  $bed_no = $row_bed['bed_no'];
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
	}
}
//Right side end




function cart_prod(){
	global $db;
	$get_cart = "select * from cart";
	$run_cart = mysqli_query($db, $get_cart);
	while($fetch_cart = mysqli_fetch_array($run_cart)){
		$p_id = $fetch_cart['p_id'];
		$product_id = $p_id;
		$get_img = "select * from medproducts where product_id = '$product_id'";
		$run_img = mysqli_query($db, $get_img);
		$run_again_img = mysqli_fetch_array($run_img);
		$img = $run_again_img['product_img1'];
		$quantity = $fetch_cart['qty'];
		$price = $run_again_img['product_price'];
		$color = $fetch_cart['color'];
		$sub_tot = $price*$quantity;
		echo "<tbody>
	    							<tr>
	    								<td><img style='height: 100px; width: 100px;' src='images/$img'></td>
	    								<td>$quantity</td>
	    								<td>$price AED</td>
	    								<td>$color</td>
	    								<td><input type='checkbox' name='remove[]' value=$product_id></td>
	    								<td>$sub_tot AED</td>
	    							</tr>
	    						</tbody>";
	}
}

function total(){
	global $db;
	$tot = 0;
	$get_cart = "select * from cart";
	$run_cart = mysqli_query($db, $get_cart);
	$num_row = mysqli_num_rows($run_cart);
	while($fetch_cart = mysqli_fetch_array($run_cart)){
		$p_id = $fetch_cart['p_id'];
		$product_id = $p_id;
		$get_prod = "select * from medproducts where product_id = '$product_id'";
		$run_prod = mysqli_query($db, $get_prod);
		$fetch_prod = mysqli_fetch_array($run_prod);
		$quantity = $fetch_cart['qty'];
	$price = $fetch_prod['product_price'];
	$sub_tot = $price*$quantity;
		$tot += $sub_tot;
	}
	echo $tot;
}
?>