<form method="post" action="">
            <div class="box form-group justify-content-center">
              <div class="row">
                <div class="col-md-3">
                  <label class="control-label"><b>Location</b></label>
                  <select style="height: 34px;" name="loc_name" class="form-control">
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
                  <select style="height: 34px;" name="bed_no" class="form-control">
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
                  <select style="height: 34px;" name="price_range" class="form-control">
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