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
function getMedPro() {
	global $db;
	$get_med_product = "select * from medproducts order by 1 DESC LIMIT 0,6";
	$run_med_products = mysqli_query($db, $get_med_product);
	while($row_med_product = mysqli_fetch_array($run_med_products)){
		$pro_id = $row_med_product['product_id'];
		$pro_title = $row_med_product['product_title'];
		$pro_price = $row_med_product['product_price'];
		$pro_img1 = $row_med_product['product_img1'];

		echo "<div class='col-md-4 col-sm-6 center-responsive'>
            <div class='box mt-5 product'>
              <a href='details.php?pro_id=$pro_id'>
                <img style='height: 250px; width: 250px;' class='img-thumbnail img-responsive' src='images/$pro_img1'>
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
}

//Sidebar Start
function getPCats(){
	global $db;
	if(isset($_GET['cat_id']))
	{
		$cat_id = $_GET['cat_id'];
		$_SESSION['cat_id'] = $cat_id;
		$cat_id = $_SESSION['cat_id'];
		$get_p_cats = "select * from med_product_category where cat_id = '$cat_id'";
		$run_p_cats = mysqli_query($db, $get_p_cats);
		while($row_p_cats = mysqli_fetch_array($run_p_cats)){
			$p_cat_id = $row_p_cats['p_cat_id'];
			$p_cat_title = $row_p_cats['p_cat_title'];

			echo "<a href='medicalprod.php?p_cat=$p_cat_id' class='list-group-item list-group-item-action'>$p_cat_title</a>";
		}
	}
	else if(isset($_GET['p_cat']))
	{
		$cat_id = $_SESSION['cat_id'];
		$p_cat = $_GET['p_cat'];
		$get_p_cats = "select * from med_product_category where cat_id = '$cat_id'";
		$run_p_cats = mysqli_query($db, $get_p_cats);
		while($row_p_cats = mysqli_fetch_array($run_p_cats)){
			$p_cat_id = $row_p_cats['p_cat_id'];
			$p_cat_title = $row_p_cats['p_cat_title'];

			echo "<a href='medicalprod.php?p_cat=$p_cat_id' class='list-group-item list-group-item-action'>$p_cat_title</a>";
		}
	}
	else{
		$get_p_cats = "select * from med_product_category";
		$run_p_cats = mysqli_query($db, $get_p_cats);
		while($row_p_cats = mysqli_fetch_array($run_p_cats)){
			$p_cat_id = $row_p_cats['p_cat_id'];
			$p_cat_title = $row_p_cats['p_cat_title'];

			echo "<a href='medicalprod.php?p_cat=$p_cat_id' class='list-group-item list-group-item-action'>$p_cat_title</a>";
		}
	}
}


function getCats(){
	global $db;
	$get_cats = "select * from medcategories";
	$run_cats = mysqli_query($db, $get_cats);
	while($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<a href='medicalprod.php?cat_id=$cat_id' class='list-group-item list-group-item-action'>$cat_title</a>";
	}
}
//Sidebar End


//Right side start
function getProCat(){
	global $db;
	if(isset($_GET['p_cat'])){
		$p_cat_id = $_GET['p_cat'];
		$get_p_cat = "select * from med_product_category where p_cat_id = '$p_cat_id'";
		$run_p_cat = mysqli_query($db, $get_p_cat);
		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title  =  $row_p_cat['p_cat_title'];
		$p_cat_desc  =  $row_p_cat['p_cat_desc'];

		$get_products = "select * from medproducts where p_cat_id = '$p_cat_id'";
		$run_products = mysqli_query($db, $get_products);
		$count = mysqli_num_rows($run_products);
		if($count == 0){
			echo "<div class='box'>
			<h1>No Product Found In This Product Category</h1>
			</div>";
		}
		else{
				echo "<div class='box'>
				<h1>$p_cat_title</h1>
				<p>$p_cat_desc</p>
				</div>";
				while($row_product = mysqli_fetch_array($run_products)){
					$pro_id = $row_product['product_id'];
		            $pro_title = $row_product['product_title'];
		            $pro_price = $row_product['product_price'];
		            $pro_img1 = $row_product['product_img1'];

		            echo "<div class='col-md-4 col-sm-6 center-responsive'>
		                      <div class='box mt-5 product'>
		                       <a href='details.php?pro_id=$pro_id'>
		                          <img style='height: 250px; width: 250px;' class='img-thumbnail img-responsive' src='images/$pro_img1'>
		                        </a>
		                        <div class='text'>
		                          <h3>
		                            <a href='details.php?pro_id=$pro_id'>$pro_title</a>
		                          </h3>
		                          <p class='price'>$pro_price AED</p>
		                          <p class='buttons'>
		                            <a href='details.php?pro_id=$pro_id' class='btn btn-outline-dark mb-2'>View Details</a>
		                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class=fa-shopping-cart'></i>Add to cart</a>
		                          </p>
		                        </div>
		                      </div>
		                  </div>";
		        }
			}
	}
}

function getCatPro(){
	global $db;
	if(isset($_GET['cat_id'])){
		$cat_id = $_GET['cat_id'];
		$get_cat = "select * from medcategories where cat_id = '$cat_id'";
		$run_get_cat = mysqli_query($db, $get_cat);
		$row_cat = mysqli_fetch_array($run_get_cat);
		$cat_title = $row_cat['cat_title'];
		$cat_desc = $row_cat['cat_desc'];
		$get_products = "select * from medproducts where cat_id = '$cat_id'";
		$run_products = mysqli_query($db, $get_products);
		$count = mysqli_num_rows($run_products);
		if($count == 0){
			echo "<div class='box'>
			<h1>No Product Found In This Product Category</h1>
			</div>";
		}
		else{
				echo "<div class='box'>
				<h1>$cat_title</h1>
				<p>$cat_desc</p>
				</div>";
				while($row_product = mysqli_fetch_array($run_products)){
					$pro_id = $row_product['product_id'];
		            $pro_title = $row_product['product_title'];
		            $pro_price = $row_product['product_price'];
		            $pro_img1 = $row_product['product_img1'];

		            echo "<div class='col-md-4 col-sm-6 center-responsive'>
		                      <div class='box mt-5 product'>
		                       <a href='details.php?pro_id=$pro_id'>
		                          <img style='height: 250px; width: 250px;' class='img-thumbnail img-responsive' src='images/$pro_img1'>
		                        </a>
		                        <div class='text'>
		                          <h3>
		                            <a href='details.php?pro_id=$pro_id'>$pro_title</a>
		                          </h3>
		                          <p class='price'>$pro_price AED</p>
		                          <p class='buttons'>
		                            <a href='details.php?pro_id=$pro_id' class='btn btn-outline-dark mb-2'>View Details</a>
		                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class=fa-shopping-cart'></i>Add to cart</a>
		                          </p>
		                        </div>
		                      </div>
		                  </div>";
		        }
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