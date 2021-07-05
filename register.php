<?php include 'db/db.php'; ?>
<?php include ("functions/functions.php"); ?>
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
          			<li>Regsiter</li>
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
                  <h2>Customer Registration</h2>
                </center>
              </div>
              <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Customer Name</label>
                  <input type="text" name="name" placeholder="Enter Name" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Customer Email</label>
                  <input type="text" name="email" placeholder="Enter Email" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Customer Password</label>
                  <input type="password" name="password" placeholder="Enter Password" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="cpassword" placeholder="Re-enter Password" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Customer Username</label>
                  <input type="text" name="username" placeholder="Enter Message" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" required="" style="height: 34px;" id="country" name="country">
                       <option value="Afganistan">Afghanistan</option>
                       <option value="Albania">Albania</option>
                       <option value="Algeria">Algeria</option>
                       <option value="American Samoa">American Samoa</option>
                       <option value="Andorra">Andorra</option>
                       <option value="Angola">Angola</option>
                       <option value="Anguilla">Anguilla</option>
                       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                       <option value="Argentina">Argentina</option>
                       <option value="Armenia">Armenia</option>
                       <option value="Aruba">Aruba</option>
                       <option value="Australia">Australia</option>
                       <option value="Austria">Austria</option>
                       <option value="Azerbaijan">Azerbaijan</option>
                       <option value="Bahamas">Bahamas</option>
                       <option value="Bahrain">Bahrain</option>
                       <option value="Bangladesh">Bangladesh</option>
                       <option value="Barbados">Barbados</option>
                       <option value="Belarus">Belarus</option>
                       <option value="Belgium">Belgium</option>
                       <option value="Belize">Belize</option>
                       <option value="Benin">Benin</option>
                       <option value="Bermuda">Bermuda</option>
                       <option value="Bhutan">Bhutan</option>
                       <option value="Bolivia">Bolivia</option>
                       <option value="Bonaire">Bonaire</option>
                       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                       <option value="Botswana">Botswana</option>
                       <option value="Brazil">Brazil</option>
                       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                       <option value="Brunei">Brunei</option>
                       <option value="Bulgaria">Bulgaria</option>
                       <option value="Burkina Faso">Burkina Faso</option>
                       <option value="Burundi">Burundi</option>
                       <option value="Cambodia">Cambodia</option>
                       <option value="Cameroon">Cameroon</option>
                       <option value="Canada">Canada</option>
                       <option value="Canary Islands">Canary Islands</option>
                       <option value="Cape Verde">Cape Verde</option>
                       <option value="Cayman Islands">Cayman Islands</option>
                       <option value="Central African Republic">Central African Republic</option>
                       <option value="Chad">Chad</option>
                       <option value="Channel Islands">Channel Islands</option>
                       <option value="Chile">Chile</option>
                       <option value="China">China</option>
                       <option value="Christmas Island">Christmas Island</option>
                       <option value="Cocos Island">Cocos Island</option>
                       <option value="Colombia">Colombia</option>
                       <option value="Comoros">Comoros</option>
                       <option value="Congo">Congo</option>
                       <option value="Cook Islands">Cook Islands</option>
                       <option value="Costa Rica">Costa Rica</option>
                       <option value="Cote DIvoire">Cote DIvoire</option>
                       <option value="Croatia">Croatia</option>
                       <option value="Cuba">Cuba</option>
                       <option value="Curaco">Curacao</option>
                       <option value="Cyprus">Cyprus</option>
                       <option value="Czech Republic">Czech Republic</option>
                       <option value="Denmark">Denmark</option>
                       <option value="Djibouti">Djibouti</option>
                       <option value="Dominica">Dominica</option>
                       <option value="Dominican Republic">Dominican Republic</option>
                       <option value="East Timor">East Timor</option>
                       <option value="Ecuador">Ecuador</option>
                       <option value="Egypt">Egypt</option>
                       <option value="El Salvador">El Salvador</option>
                       <option value="Equatorial Guinea">Equatorial Guinea</option>
                       <option value="Eritrea">Eritrea</option>
                       <option value="Estonia">Estonia</option>
                       <option value="Ethiopia">Ethiopia</option>
                       <option value="Falkland Islands">Falkland Islands</option>
                       <option value="Faroe Islands">Faroe Islands</option>
                       <option value="Fiji">Fiji</option>
                       <option value="Finland">Finland</option>
                       <option value="France">France</option>
                       <option value="French Guiana">French Guiana</option>
                       <option value="French Polynesia">French Polynesia</option>
                       <option value="French Southern Ter">French Southern Ter</option>
                       <option value="Gabon">Gabon</option>
                       <option value="Gambia">Gambia</option>
                       <option value="Georgia">Georgia</option>
                       <option value="Germany">Germany</option>
                       <option value="Ghana">Ghana</option>
                       <option value="Gibraltar">Gibraltar</option>
                       <option value="Great Britain">Great Britain</option>
                       <option value="Greece">Greece</option>
                       <option value="Greenland">Greenland</option>
                       <option value="Grenada">Grenada</option>
                       <option value="Guadeloupe">Guadeloupe</option>
                       <option value="Guam">Guam</option>
                       <option value="Guatemala">Guatemala</option>
                       <option value="Guinea">Guinea</option>
                       <option value="Guyana">Guyana</option>
                       <option value="Haiti">Haiti</option>
                       <option value="Hawaii">Hawaii</option>
                       <option value="Honduras">Honduras</option>
                       <option value="Hong Kong">Hong Kong</option>
                       <option value="Hungary">Hungary</option>
                       <option value="Iceland">Iceland</option>
                       <option value="Indonesia">Indonesia</option>
                       <option value="India">India</option>
                       <option value="Iran">Iran</option>
                       <option value="Iraq">Iraq</option>
                       <option value="Ireland">Ireland</option>
                       <option value="Isle of Man">Isle of Man</option>
                       <option value="Israel">Israel</option>
                       <option value="Italy">Italy</option>
                       <option value="Jamaica">Jamaica</option>
                       <option value="Japan">Japan</option>
                       <option value="Jordan">Jordan</option>
                       <option value="Kazakhstan">Kazakhstan</option>
                       <option value="Kenya">Kenya</option>
                       <option value="Kiribati">Kiribati</option>
                       <option value="Korea North">Korea North</option>
                       <option value="Korea Sout">Korea South</option>
                       <option value="Kuwait">Kuwait</option>
                       <option value="Kyrgyzstan">Kyrgyzstan</option>
                       <option value="Laos">Laos</option>
                       <option value="Latvia">Latvia</option>
                       <option value="Lebanon">Lebanon</option>
                       <option value="Lesotho">Lesotho</option>
                       <option value="Liberia">Liberia</option>
                       <option value="Libya">Libya</option>
                       <option value="Liechtenstein">Liechtenstein</option>
                       <option value="Lithuania">Lithuania</option>
                       <option value="Luxembourg">Luxembourg</option>
                       <option value="Macau">Macau</option>
                       <option value="Macedonia">Macedonia</option>
                       <option value="Madagascar">Madagascar</option>
                       <option value="Malaysia">Malaysia</option>
                       <option value="Malawi">Malawi</option>
                       <option value="Maldives">Maldives</option>
                       <option value="Mali">Mali</option>
                       <option value="Malta">Malta</option>
                       <option value="Marshall Islands">Marshall Islands</option>
                       <option value="Martinique">Martinique</option>
                       <option value="Mauritania">Mauritania</option>
                       <option value="Mauritius">Mauritius</option>
                       <option value="Mayotte">Mayotte</option>
                       <option value="Mexico">Mexico</option>
                       <option value="Midway Islands">Midway Islands</option>
                       <option value="Moldova">Moldova</option>
                       <option value="Monaco">Monaco</option>
                       <option value="Mongolia">Mongolia</option>
                       <option value="Montserrat">Montserrat</option>
                       <option value="Morocco">Morocco</option>
                       <option value="Mozambique">Mozambique</option>
                       <option value="Myanmar">Myanmar</option>
                       <option value="Nambia">Nambia</option>
                       <option value="Nauru">Nauru</option>
                       <option value="Nepal">Nepal</option>
                       <option value="Netherland Antilles">Netherland Antilles</option>
                       <option value="Netherlands">Netherlands (Holland, Europe)</option>
                       <option value="Nevis">Nevis</option>
                       <option value="New Caledonia">New Caledonia</option>
                       <option value="New Zealand">New Zealand</option>
                       <option value="Nicaragua">Nicaragua</option>
                       <option value="Niger">Niger</option>
                       <option value="Nigeria">Nigeria</option>
                       <option value="Niue">Niue</option>
                       <option value="Norfolk Island">Norfolk Island</option>
                       <option value="Norway">Norway</option>
                       <option value="Oman">Oman</option>
                       <option value="Pakistan">Pakistan</option>
                       <option value="Palau Island">Palau Island</option>
                       <option value="Palestine">Palestine</option>
                       <option value="Panama">Panama</option>
                       <option value="Papua New Guinea">Papua New Guinea</option>
                       <option value="Paraguay">Paraguay</option>
                       <option value="Peru">Peru</option>
                       <option value="Phillipines">Philippines</option>
                       <option value="Pitcairn Island">Pitcairn Island</option>
                       <option value="Poland">Poland</option>
                       <option value="Portugal">Portugal</option>
                       <option value="Puerto Rico">Puerto Rico</option>
                       <option value="Qatar">Qatar</option>
                       <option value="Republic of Montenegro">Republic of Montenegro</option>
                       <option value="Republic of Serbia">Republic of Serbia</option>
                       <option value="Reunion">Reunion</option>
                       <option value="Romania">Romania</option>
                       <option value="Russia">Russia</option>
                       <option value="Rwanda">Rwanda</option>
                       <option value="St Barthelemy">St Barthelemy</option>
                       <option value="St Eustatius">St Eustatius</option>
                       <option value="St Helena">St Helena</option>
                       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                       <option value="St Lucia">St Lucia</option>
                       <option value="St Maarten">St Maarten</option>
                       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                       <option value="Saipan">Saipan</option>
                       <option value="Samoa">Samoa</option>
                       <option value="Samoa American">Samoa American</option>
                       <option value="San Marino">San Marino</option>
                       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                       <option value="Saudi Arabia">Saudi Arabia</option>
                       <option value="Senegal">Senegal</option>
                       <option value="Seychelles">Seychelles</option>
                       <option value="Sierra Leone">Sierra Leone</option>
                       <option value="Singapore">Singapore</option>
                       <option value="Slovakia">Slovakia</option>
                       <option value="Slovenia">Slovenia</option>
                       <option value="Solomon Islands">Solomon Islands</option>
                       <option value="Somalia">Somalia</option>
                       <option value="South Africa">South Africa</option>
                       <option value="Spain">Spain</option>
                       <option value="Sri Lanka">Sri Lanka</option>
                       <option value="Sudan">Sudan</option>
                       <option value="Suriname">Suriname</option>
                       <option value="Swaziland">Swaziland</option>
                       <option value="Sweden">Sweden</option>
                       <option value="Switzerland">Switzerland</option>
                       <option value="Syria">Syria</option>
                       <option value="Tahiti">Tahiti</option>
                       <option value="Taiwan">Taiwan</option>
                       <option value="Tajikistan">Tajikistan</option>
                       <option value="Tanzania">Tanzania</option>
                       <option value="Thailand">Thailand</option>
                       <option value="Togo">Togo</option>
                       <option value="Tokelau">Tokelau</option>
                       <option value="Tonga">Tonga</option>
                       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                       <option value="Tunisia">Tunisia</option>
                       <option value="Turkey">Turkey</option>
                       <option value="Turkmenistan">Turkmenistan</option>
                       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                       <option value="Tuvalu">Tuvalu</option>
                       <option value="Uganda">Uganda</option>
                       <option value="United Kingdom">United Kingdom</option>
                       <option value="Ukraine">Ukraine</option>
                       <option value="United Arab Erimates">United Arab Emirates</option>
                       <option value="United States of America">United States of America</option>
                       <option value="Uraguay">Uruguay</option>
                       <option value="Uzbekistan">Uzbekistan</option>
                       <option value="Vanuatu">Vanuatu</option>
                       <option value="Vatican City State">Vatican City State</option>
                       <option value="Venezuela">Venezuela</option>
                       <option value="Vietnam">Vietnam</option>
                       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                       <option value="Wake Island">Wake Island</option>
                       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                       <option value="Yemen">Yemen</option>
                       <option value="Zaire">Zaire</option>
                       <option value="Zambia">Zambia</option>
                       <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" name="city" placeholder="Enter City Name" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Customer Contact Number</label>
                  <input type="text" name="contact" placeholder="Enter Phone Number" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" placeholder="Enter Address" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input method="files" type="file" name="c_img" class="form-control" rerquired="">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-user-md"></i>Create Account
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
  $c_name = $_POST['name'];
  $c_email = $_POST['email'];
  $c_pass = $_POST['password'];
  $c_confirm_pass = $_POST['cpassword'];
  $c_user_name = $_POST['username'];
  $c_country = $_POST['country'];
  $c_city = $_POST['city'];
  $c_contact = $_POST['contact'];
  $c_address = $_POST['address'];
  $c_image = $_FILES['c_img']['name'];
  $c_tmp_image = $_FILES['c_img']['tmp_name'];
  $c_ip = getUserIP();
  move_uploaded_file($c_tmp_image, "customer/images/$c_image");
  $insert_customer = "insert into customers(customer_name, customer_email, customer_password, customer_user, customer_country, customer_city, customer_contact, customer_address, customer_img, customer_ip) values('$c_name', '$c_email', '$c_pass', '$c_user_name', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip')";
  $run_customer = mysqli_query($con, $insert_customer);
  $sel_cart = "select * from cart where ip_add = '$c_ip'";
  $run_cart = mysqli_query($con, $sel_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if($check_cart > 0)
  {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have succesfully registered');</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }
  else
  {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have succesfully registered');</script>";
    echo "<script>window.open('myaccount.php?my_order','_self')</script>";
  }
}

?>