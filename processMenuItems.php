<?php

echo "<pre>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sublime_pos";

// creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error) {
  die("connection failed: ".$conn -> connect_error);
}
echo "connection established successfully for process menu items"."<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $item_data = $_POST['item-data'];
  // $itemDataArray = ''; // dummy array

  // variables for menu_items table:
  $name = $_POST["menu_item_name"];
  echo "name: ". $name. "<br>";

  // $enable_tracking = $_POST["enable_tracking"] == "Yes" ? 1 : 0;
  $enable_tracking = isset($_POST['enable_tracking']) ? $_POST['enable_tracking'] : 'Not Selected';
  // echo "enable tracking: ". ($enable_tracking == "Yes" ? 1 : 0). "<br>";
  $enable_tracking = $enable_tracking == "Yes" ? 1 : 0;
  echo "enable tracking: ".$enable_tracking."<br>";

  // $variants = $_POST["variants"] == true ? 1 : 0;
  $variants = isset($_POST["variants"]) ? 1 : 0;
  echo "variants: ". $variants. "<br>";

  // $extras = $_POST["extra"] == true ? 1 : 0;
  $extras = isset($_POST["extra"]) ? 1 : 0;
  echo "extras: ". $extras. "<br>";

  $mfg_cost = $_POST["mfg_cost"];
  echo "mfg_cost: ". $mfg_cost. "<br>";

  $prep_time = $_POST["prep_time"];
  echo "prep_time: ". $prep_time. "<br>";

  $demand_only_item = $_POST["demand_only_item"] == "Yes" ? 1 : 0;
  echo "demand_only_item: ". $demand_only_item. "<br>";

  $status = isset($_POST['item_status']) ? $_POST['item_status'] : 'Not Selected';
  echo "status: ". $status ."<br>";

  $calories = $_POST["calories"];
  echo "calories: ". $calories. "<br>";

  // $made_to_order = $_POST["made_to_order"] == "Yes" ? 1 : 0;
  $made_to_order = isset($_POST['made_to_order']) ? $_POST['made_to_order'] : 'Not selected';
  $made_to_order = $made_to_order == "Yes" ? 1 : 0;
  echo "made_to_order: ". $made_to_order. "<br>";

  $spicy_level = $_POST["spicy_level"];
  echo "spicy_level: ". $spicy_level. "<br>";

  // $dietary_flags = isset($_POST['dietary_flags']) ? $_POST['dietary_flags'] : [];
  // $dietary_flags = ($_POST['dietary_flags']);

  // if (!empty($_POST['dietary_flags'])) {
  //   foreach ($_POST['dietary_flags'] as $selected) {
  //     echo $selected. "<br>";
  //   }
  // }
  

  $dietary_flags = '';
  if (isset($_POST['dietaryFlags']) && is_array($_POST['dietaryFlags'])) {
    $dietary_flags = $_POST['dietaryFlags'];

    // Loop through the array and print each selected dietary flag
    // if (!empty($dietary_flags)) {
    //     foreach ($dietary_flags as $selected) {
    //         echo htmlspecialchars($selected) . "<br>";
    //     }
    // } 
    // else {
    //     echo "No dietary flags selected.";
    // }
    print_r($dietary_flags);
  } 
  else {
    echo "No dietary flags selected or the data is not in the expected format.";
    echo "<br>";
  }


  $short_desc = $_POST["short_desc"];
  echo "short desc: ". $short_desc. "<br>";

  $ingredients = $_POST["ingredients"];
  echo "ingredients: ". $ingredients. "<br>";

  $allergies = $_POST["allergies"];
  echo "allergies: ". $allergies. "<br>";
  
  $total_taxes = "";
  
  $item_img = "";

  $category_id = getCategoryId($conn, $_POST["category"]);
  echo "category id: ".$category_id;
  echo "<br>";
  $sub_category_id = getSubCategoryId($conn, $_POST["sub_category"]);
  echo "sub Category id: ".$sub_category_id;
  echo "<br>";

  $sku_id = $_POST["sku_id"];
  echo "sku_id: ".$sku_id;
  echo "<br>";
  
  $item_type_id = getItemTypeId($conn, $_POST["menu_item_type"]);
  echo "menu item type ID: ".$item_type_id;
  echo "<br>";

  // $mrp_id = ""; // FK (get the last id of the )
  $cusine_id = getCusineId($conn, $_POST["cuisine"]);
  echo "cuisine name: ".$_POST["cuisine"];
  echo "<br>"; 
  $unit_id = getUnitId($conn, $_POST["unit_name"]);
  echo "Unit id: ".$unit_id;
  echo "<br>";

  // variables for mrp table:
  // $type_id = getOrderTypeId($conn, "Delivery");
  $deliveryPrice = $_POST["delivery"];
  $takeAwayPrice = $_POST["take_away"];
  $dineInPrice = $_POST["dine_in"];
  // echo "delivery price: ". $deliveryPrice;
  // echo "<br>"; 
  // echo "dine_in price: ".$dineInPrice;
  // echo "<br>";
  // echo "take_away price: ".$takeAwayPrice;
  // echo "<br>";

  $prices = [
    'Dine-in' => $dineInPrice,
    'Take-out' => $takeAwayPrice,
    'Delivery' => $deliveryPrice
  ];

  print_r($prices);

  $incl_of_taxes = isset($_POST["incl_of_taxes"]) ? 1 : 0;
  echo "incl_of_taxes: ". $incl_of_taxes;
  echo "<br>";

  //call function to insert data into menu_items table:
  $item_id = insertIntoMenuItems($conn, $name, $enable_tracking, $variants, $extras, $mfg_cost, $prep_time, $demand_only_item, $status, $calories, $made_to_order, $spicy_level, $short_desc, $ingredients, $allergies, $total_taxes, $item_img, $category_id, $sub_category_id, $item_type_id, $cusine_id, $unit_id);

  echo "item_id : ".$item_id;
  echo "<br>";

  // call function to insert data into mrp table:
  insertIntoMRP($conn, $incl_of_taxes, $item_id, $prices);

  // function insertIntoDietaryFlags($conn, $item_id, $dietary_flags)
  // call function to insert data into dietary_falgs table:
  insertIntoDietaryFlags($conn, $item_id, $dietary_flags);

}



// Function to insert data into menu_items table:
function insertIntoMenuItems($conn, $name, $enable_tracking, $variants, $extras, $mfg_cost, $prep_time, $demand_only_item, $status, $calories, $made_to_order, $spicy_level, $short_desc, $ingredients, $allergies, $total_taxes, $item_img, $category_id, $sub_category_id, $item_type_id, $cusine_id, $unit_id) {

  var_dump($unit_id);

  $last_record_id = '';

  $sqlQuery = "INSERT INTO menu_items (name, enable_tracking, variants, extras, mfg_cost, prep_time, demand_only_item, status, calories, made_to_order, spicy_level, short_desc, ingredients, allergies, total_taxes, item_img, category_id, sub_category_id, item_type_id, cuisine_id, unit_id)
  VALUES ('$name', '$enable_tracking', '$variants', '$extras', '$mfg_cost', '$prep_time', '$demand_only_item', '$status', '$calories', '$made_to_order', '$spicy_level', '$short_desc', '$ingredients', '$allergies', '$total_taxes', '$item_img', '$category_id', '$sub_category_id', '$item_type_id', '$cusine_id', '$unit_id')";


  if ($conn -> query($sqlQuery) === TRUE) {
    $last_record_id = $conn -> insert_id;
    echo "data inserted into menu_items table";
    echo "<br>";
  }
  else {
    echo $conn -> error;
    echo "<br>";
  }

  return $last_record_id;
}


// Function to insert data into mrp table:
function insertIntoMRP($conn, $incl_of_taxes, $item_id, $prices) 
{

  $typeId = '';
  foreach ($prices as $key => $val) {
    $query1 = "SELECT id as typeId FROM order_type WHERE name = '$key'";
    $result = $conn -> query($query1);
    if ($result) {
      $row = $result -> fetch_assoc();
      $typeId = $row['typeId'];
      echo "id fetched from order_type table";
      echo "<br>";
      echo "type ID : ". $typeId;
      echo "<br>";
    }

    $query2 = "INSERT INTO mrp (type_id, price, incl_of_taxes, item_id)
    VALUES ('$typeId', '$val', '$incl_of_taxes', '$item_id')";

    if ($conn -> query($query2) === TRUE) {
      echo "data inserted into mrp table";
      echo "<br>";
    }
    else {
      echo $conn -> error;
      echo "<br>";
    }

  }

}



// Function to insert data into dietary_flags table:
function insertIntoDietaryFlags($conn, $item_id, $dietary_flags) {
  foreach($dietary_flags as $df) {
    $query = "INSERT INTO dietary_flags (name, item_id) VALUES ('$df', '$item_id')";
    if ($conn -> query($query) === TRUE) {
      echo "data inserted into dietary_flags table.";
      echo "<br>";
    }
    else {
      echo $conn -> error;
      echo "<br>";
    }
    
  }
}


// Get Category ID:
function getCategoryId($conn, $catgName) {
  $sqlQuery = "SELECT id as categoryId FROM categories WHERE id = '$catgName'";
  $result = $conn -> query($sqlQuery);

  if ($result) {
    $row = $result -> fetch_assoc();
    echo $row['categoryId'];
    return $row['categoryId'];
    echo "<br>";
  }
  else {
    echo "error in getCategoryFunction";
    echo "<br>";
    echo $conn -> error;
  }
}


// Get Sub Category ID:
function getSubCategoryId($conn, $subCatgName) {
  $sqlQuery = "SELECT id as subCategoryId FROM sub_categories WHERE id = '$subCatgName'";
  $result = $conn -> query($sqlQuery);

  if ($result) {
    $row = $result -> fetch_assoc();
    return $row['subCategoryId'];
    echo "<br>";
  }
  else {
    echo $conn -> error;
  }
}


// Get Menu Item Type ID:
function getItemTypeId($conn, $itemTypeName) {
  $sqlQuery = "SELECT id as menuItemTypeId FROM menu_item_types WHERE id = '$itemTypeName'";
  $result = $conn -> query($sqlQuery);
  var_dump($itemTypeName);

  if ($result) {
    $row = $result -> fetch_assoc();
    return $row['menuItemTypeId'];
    echo "<br>";
  }
  else {
    echo $conn -> error;
  }
}

// Get Cuisine ID:
function getCusineId($conn, $cuisineName) {
  $sqlQuery = "SELECT id as cuisineId FROM cuisine WHERE id = '$cuisineName'";
  $result = $conn -> query($sqlQuery);

  var_dump($cuisineName);

  if ($result) {
    $row = $result -> fetch_assoc();
    return $row['cuisineId'];
    echo "<br>";
  }
  else {
    echo $conn -> error;
  }
}



// Get Unit ID:
function getUnitId($conn, $unitName) {
  $sqlQuery = "SELECT id as unitId FROM units WHERE id = '$unitName'";

  var_dump($unitName);
  $result = $conn -> query($sqlQuery);

  if ($result) {
    $row = $result -> fetch_assoc();
    return $row['unitId'];
    echo "<br>";
  }
  else {
    echo $conn -> error;
  }
}


// Get Order Type ID:
function getOrderTypeId($conn, $orderTypeName) {
  $sqlQuery = "SELECT id as typeId FROM order_type WHERE name = '$orderTypeName'";
  $result = $conn -> query($sqlQuery);

  if ($result) {
    $row = $result -> fetch_assoc();
    return $row['typeId'];
    echo "<br>";
  }
  else {
    echo $conn -> error;
  }
}







//========================= TEST OUTPUT ========================
// echo "name: ".$name;
// echo "<br>";
// echo "Category ID: ".$category_id;
// echo "<br>";
// echo "Sub Category ID: ".$sub_category_id;
// echo "<br>";
// echo "Item Type ID: ".$item_type_id;
// echo "<br>";
// echo "Cuisine ID: ".$cusine_id;
// echo "<br>";
// echo "Unit ID: ".$unit_id;
// echo "<br>";


// echo "Type ID: ".$type_id;
// echo "<br>";
echo "</pre>";

?>