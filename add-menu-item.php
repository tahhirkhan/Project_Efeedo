<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Menu Item</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <style>
      .image-upload i {
        cursor: pointer;
      }

      .image-upload > input {
        display: none;
      }
      .star {
        color: red;
      }
    </style>

  </head>
  <body class="bg-light">
    <div class="container bg-white my-3 rounded-3">

      <!--php-->
      <?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "sublime_pos";

      // creating connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn -> connect_error) {
        die("connection failed: ".$conn -> connect_error);
      }



      ?>


      <form class="p-2" action="processMenuItems.php" method="post">
        <!--category-row-->

        <div class="category-row mb-2">
          <div class="row">
            <div class="col">
              <label for="" class="form-label"
                >Category<span class="star">*</span></label
              >
            </div>
            <div class="col">
              <label for="" class="form-label">Sub Category</label>
            </div>
            <div class="col">
              <label for="" class="form-label">SKU</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <select
                class="col-3 form-select border border-secondary-subtle"
                name="category"
                id="validationCustom04"
                onChange="changeSubCategory(this.value)"
                required
              >
                <option selected disabled value="">--Select--</option>
                <?php

                    $sql = "select * from categories";

                    $result = $conn -> query($sql);

                    if($result -> num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        $val = $row['id'];
                        $cat = $row['category_name'];
                        echo "<option value=$val >$cat</option>";
                      }

                      
                    }
                    else{
                      echo $conn -> error;
                    }


                ?>
              </select>
            </div>
            <div class="col">
              <select
                class="col-3 form-select border border-secondary-subtle form-select rounded"
                name="sub_category"
                id="subCat"
              >
                <option selected disabled>--Select--</option>
                <!-- <option value="1">Restaurant</option>
                <option value="2">Confectionary</option>
                <option value="3">Kitchen</option> -->


                <script>
                    // const subCat = document.querySelectorAll('.sub-cat')
                    // console.log(subCat);
                    // subCat.forEach(element => {
                    //   val = element.getAttribute('value')
                    //   console.log(val)
                    // });

                    function changeSubCategory(id){
                      var xmlhttp = new XMLHttpRequest();
                      xmlhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200) {
                              document.getElementById("subCat").innerHTML = this.responseText;
                            
                        }
                      };
                      xmlhttp.open("GET", "subCat.php?q="+id);
                      xmlhttp.send();
                    }

                  </script>

                <?php

                    // $sql = "select * from sub_categories";

                    // $result = $conn -> query($sql);

                    // if($result -> num_rows > 0){
                    //   while($row = $result->fetch_assoc()){
                    //     $val = $row['category_id'];
                    //     $subCat = $row['sub_category_name'];
                    //     echo "<option value=$val
                    //     class='sub-cat'>$subCat</option>";
                    //   }

                      
                    // }
                    // else{
                    //   echo $conn -> error;
                    // }


                ?>
              </select>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <input
                    type="text"
                    name="sku_id"
                    class="form-control border border-secondary-subtle"
                    id=""
                    placeholder=""
                  />
                </div>
                <div class="col d-grid">
                  <button type="button" class="btn btn-sm btn-primary active rounded-2">
                    Generate Id
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Menu item row-->

        <div class="menu-item-row mb-2">
          <div class="row">
            <div class="col">
              <label for="" class="form-label"
                >Menu Item Name<span class="star">*</span></label
              >
            </div>
            <div class="col">
              <label for="" class="form-label"
                >Menu Item Type<span class="star">*</span></label
              >
            </div>
            <div class="col">
              <label for="" class="form-label"
                >Unit<span class="star">*</span></label
              >

            </div>
          </div>

          <div class="row">
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                name="menu_item_name"
                id=""
                placeholder=""
                name="menu_item_name"
                required
              />
            </div>
            <div class="col">
              <select
                class="form-select form-select border border-secondary-subtle"
                 name="menu_item_type"
                required
              >
                <option selected disabled value="">--Select--</option>
                <?php
                    $sql = "select * from menu_item_types";

                    $result = $conn -> query($sql);

                    if($result -> num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        $subCat = $row['type_name'];
                        $val = $row['id'];
                        echo "<option  value=$val>$subCat</option>";
                      }

                      
                    }
                    else{
                      echo $conn -> error;
                    }


                ?>
              </select>
            </div>
            <div class="col">
              <select
                class="form-select form-select border border-secondary-subtle"
                name="unit_name"
                required
              >
                <option selected disabled value="">--Select--</option>
                <?php

                    $sql = "select * from units";

                    $result = $conn -> query($sql);

                    if($result -> num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        $subCat = $row['name'];
                        $val = $row['id'];
                        echo "<option 
                         value=$val>$subCat</option>";
                      }

                      
                    }
                    else{
                      echo $conn -> error;
                    }


                ?>
              </select>
            </div>
          </div>
        </div>

        <!--Time and Cost-->
        <div class="time-cost mb-2">
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Manufacturing Cost</label>
            </div>
            <div class="col">
              <label for="" class="form-label"
                >Preparation time (in minutes)</label
              >
            </div>
            <div class="col">
              <label for="" class="form-label">Demand Only Item</label>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                id=""
                name="mfg_cost"
                placeholder=""
              />
            </div>
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                id=""
                name="prep_time"
                placeholder=""
              />
            </div>
            <div class="col">
              <select
                class="form-select form-select border border-secondary-subtle"
                name="demand_only_item"
              >
                <option selected value="No">NO</option>
                <option  value="Yes">YES</option>
              </select>
            </div>
          </div>
        </div>

        <!--Btns-->
        <div class="variants-trackings d-flex justify-content-between mb-4">
          <div class="styles">
            <label for="" class="form-label">Styles/Variants/Extras</label>
            <br />
            <input
              class="form-check-input me-2 border border-dark"
              type="checkbox"
              id="var"
              name="variants"
            />
            <label for="var" class="form-check-label me-5">Variants</label>
            <input
              class="form-check-input me-2 border border-dark"
              type="checkbox"
              id="extras"
              name="extra"
            />
            <label for="extras" class="form-check-label">Toppings/Extras</label>
          </div>

          <!--enable tracking-->

          <div class="tracking">
            <label for="" class="form-label"
              >Enable Tracking<span class="star">*</span></label
            >
            <br />
            <div class="form-check-inline">
              <input
                class="form-check-input me-2 border border-dark"
                type="radio"
                id="eY"
                name="enable_tracking"
                value="Yes"
                required
              />
              <label for="eY" class="form-check-label"> Yes </label>
            </div>
            <div class="form-check-inline">
              <input
                class="form-check-input me-2 border border-dark"
                type="radio"
                name="enable_tracking"
                value="no"
                id="eN"
                required
              />
              <label for="eN" class="form-check-label"> No </label>
            </div>
          </div>
        </div>

        <div class="mrp mb-4 py-2">Maximum Retail Price (MRP)</div>

        <!--mode of food-->

        <div class="mb-2 mode-type col-12 border border-1 rounded-1">
          <!-- <div class="col">
            <div class="row">
              <h6>Delivery</h6>
            </div>
            <div class="row"></div>
          </div>
          <div class="col">
            <div class="row">
              <h6>Dine-in</h6>
            </div>
            <div class="row"></div>
          </div>
          <div class="col">
            <div class="row">
              <h6>Take-away</h6>
            </div>
            <div class="row"></div>
          </div>
          <div class="col">
            <div class="row">
              <h6>Incl. of tax</h6>
            </div>
            <div class="row"></div>
          </div> -->

          <div class="container-fluid ms-0 row px-2 pt-2">
            <div class="col">
              <h6>Delivery</h6>
            </div>
            <div class="dine-in col">
              <h6>Dine-in</h6>
            </div>
            <div class="take-away col">
              <h6>Take-away</h6>
            </div>
            <div class="col">
              <div class="col">
                <h6>Incl. of tax</h6>
              </div>
            </div>
          </div>

          <div class="row p-2 container-fluid ms-0 bg-secondary-subtle border">
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                id=""
                name="delivery"
                placeholder="100"
              />
            </div>
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                id=""
                name="dine_in"
                placeholder="100"
              />
            </div>
            <div class="col">
              <input
                type="text"
                class="form-control border border-secondary-subtle"
                id=""
                name="take_away"
                placeholder="100"
              />
            </div>
            <div class="col">
              <input
                type="checkbox"
                name="incl_of_taxes"
                class="form-check-input border border-dark"
              />
            </div>
          </div>
        </div>

        <!--calory-cuisine-spicy-->
        <div class="ingredients mb-2">
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Spicy Level</label>
            </div>
            <div class="col">
              <label for="" class="form-label">Calories</label>
            </div>
            <div class="col">
              <label for="" class="form-label">Cuisine</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <select
              class="col-3 form-select form-select border border-secondary-subtle"
              name="spicy_level"
            >
              <option selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            </div>
            <div class="col">
            <input
              type="text"
              class="form-control border border-secondary-subtle"
              id=""
              placeholder=""
              name="calories"
            />
            </div>
            <div class="col">
            <select
            
              class="col-3 mb-2 form-select form-select border border-secondary-subtle"
              name="cuisine"
            >
              <option selected disabled>--Select--</option>
              <?php

                    $sql = "select * from cuisine";

                    $result = $conn -> query($sql);

                    if($result -> num_rows > 0){
                      
                      while($row = $result->fetch_assoc()){
                        $cuisine = $row['cuisine_name'];
                        $val=$row['id'];
                        echo "<option value=$val>$cuisine</option>";
                      }

                      
                    }
                    else{
                      echo $conn -> error;
                    }


                ?>
            </select>
            </div>
          </div>

        <!--status-order-->
        <div class="status-order d-flex mb-2 justify-content-between">
          <div class="status">
            <label class="form-label">Status<span class="star">*</span></label>
            <br />
            <div class="form-check-inline">
              <input
                class="form-check-input me-2 border border-dark"
                type="radio"
                name="radioStatus"
                id="pub"
                name="item_status"
                required
              />
              <label for="pub" class="form-check-label"> Pulished </label>
            </div>
            <div class="form-check-inline">
              <input
                class="form-check-input me-2 border border-dark"
                type="radio"
                name="radioStatus"
                id="draft"
                name="item_status"
                required
              />
              <label for="draft" class="form-check-label"> Draft </label>
            </div>
          </div>

          <div class="order">
            <label class="form-label"
              >Made to order<span class="star">*</span></label
            >
            <br />
            <div class="form-check-inline">

              <input
                class="form-check-input me-2 border border-dark"
                type="radio"
                id="mY"
                value="Yes"
                name="made_to_order"
                required
              />
              <label for="mY" class="form-check-label"> Yes </label>
            </div>
            <div class="form-check-inline me-2">
              <input
                class="form-check-input border border-dark"
                type="radio"
                id="mN"
                value="No"
                name="made_to_order"
                required
              />
              <label for="mN" class="form-check-label"> No </label>
            </div>
          </div>
        </div>

        <!--dietary flags-->
        <div class="dietary-flags mb-2">
          <div class="flags">
            <label class="form-label">Dietary Flags</label>
            <br />
            <input
              class="form-check-input me-2 border border-dark"
              name="dietaryFlags[]"
              value="Dairy-free"
              type="checkbox"
              id="d-f"
            />
            <label for="d-f" class="form-check-label me-5">Dairy-free</label>
            <input class="form-check-input me-2 border-dark" name="dietaryFlags[]" 
            value="Gluten-free"
            type="checkbox" id="g-f"/>
            <label for="g-f" class="form-check-label me-5">Gluten-free</label>
            <input class="form-check-input me-2 border-dark" name="dietaryFlags[]"
            value="Halal" 
            type="checkbox" id="h"/>
            <label for="h" class="form-check-label me-5 me-2">Halal</label>
            <input class="form-check-input me-2 border-dark" name="dietaryFlags[]"
            value="Keto" type="checkbox" id="ke"/>
            <label for="ke" class="form-check-label me-5 me-2">Keto</label>
            <input class="form-check-input me-2 border-dark" name="dietaryFlags[]"
            value="Kosher" type="checkbox" 
            value="Kosher"
            id="ko"/>
            <label for="ko" class="form-check-label me-5">Kosher</label>
            <input class="form-check-input me-2 border-dark" name="dietaryFlags[]" type="checkbox"
            value="Vegan" id="v"/>
            <label for="v" class="form-check-label me-5">Vegan</label>
          </div>
        </div>

        <!--description-->
        <div class="discription mb-2">
          <label>Short Description</label>
          <input
            type="text"
            class="form-control border border-secondary-subtle"
            id=""
            name="short_desc"
            placeholder="Hand-made spicy chicken"
          />
        </div>
        <div class="discription mb-2">
          <label>Ingredients</label>
          <textarea
            class="form-control border border-secondary-subtle"
            name="ingredients"
          ></textarea>
        </div>
        <div class="discription mb-2">
          <label>Allergies</label>
          <textarea
            class="form-control border border-secondary-subtle"
            name="allergies"
          ></textarea>
        </div>

        <!--taxes-->
        <div class="taxes d-flex mb-2">
          <div class="col-6">
            <div class='row'>
            <h6>Select Taxes</h6>
            </div>
          

            <!--taxes get added-->
            <?php

              $sql = "select * from menu_item_taxes";
              $result = $conn -> query($sql);
              if($result -> num_rows > 0){
                while($row = $result->fetch_assoc()){
                  $tax_name = $row['tax_name'];
                  $tax_percent = $row['tax_percentage'];
                  echo "
                  <div class='row'>
                  <div class='col'>
                    <input class='form-check-input border-dark me-2' type='checkbox'>
                    $tax_name
                  </div>
                  <div class='input-group col me-5 mb-2'>
                    <input type='text' class='form-control border border-secondary-subtle percent-input' value= $tax_percent><span class='input-group-text bg-secondary-subtle border border-secondary-subtle'>%</span>
                  </div>
                  </div>";
                } 
              }
              else{
                echo $conn -> error;
              }

              

            ?>

            
    <?php

        // if ($_SERVER["REQUEST_METHOD"]=="POST"){
        // $taxType = $_POST["tax-name"];
        // $taxPercent = $_POST["tax-percent"];
        // echo "
        //           <div class='row'>
        //           <div class='col'>
        //             <input class='form-check-input border-dark me-2' type='checkbox'>
        //             $taxType
        //           </div>
        //           <div class='input-group col me-5 mb-2'>
        //             <input type='text' class='form-control border border-secondary-subtle percent-input' value= $taxPercent><span class='input-group-text bg-secondary-subtle border border-secondary-subtle'>%</span>
        //           </div>
        //           </div>";
        // }



    ?>
          </div>

          <!--img-->
          <div class="img-upload-div col-6">
            <h6>Select Image</h6>


            <div class="image-upload">
              <label class="btn btn-primary active" for="file-input">
                <i class="fa-solid fa-image"></i>
              </label>
              <input type="file" id="file-input" />
            </div>
          </div>
        </div>

        <!--buttons-->
        <div>
          <button type="submit" class="btn btn-primary active">Save</button>
          <button type="reset" class="btn btn-danger ">Cancel</button>
        </div>
      </form>
    </div>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/d14f6bc67a.js"
      rossorigin="anonymous"
    ></script>
  </body>
</html>
