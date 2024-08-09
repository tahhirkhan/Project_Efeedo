<?php

// First create a database (if you haven't created already) and set the below variables accordingly!

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sublime_pos";

// creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error) {
  die("connection failed: ".$conn -> connect_error);
}
echo "connection established successfully for menu items"."<br>";


// // 1. create categories table:
// $sqlQuery = "CREATE TABLE categories (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     category_name VARCHAR(255)
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : categories";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }



// // 2. create sub_categories table:
// $sqlQuery = "CREATE TABLE sub_categories (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     sub_category_name VARCHAR(255)
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : sub_categories";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }




// // 3. create menu_item_types table:
// $sqlQuery = "CREATE TABLE menu_item_types (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     type_name VARCHAR(255)
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : menu_item_types";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }



// // 4. create menu_item_taxes table:
// $sqlQuery = "CREATE TABLE menu_item_taxes (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     tax_name VARCHAR(50),
//     tax_percentage FLOAT
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : menu_item_taxes";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $taxType = $_POST["tax-name"];
    $taxPercent = $_POST["tax-percent"];
    echo $taxType.$taxPercent;

    $sql = "INSERT INTO menu_item_taxes (tax_name, tax_percentage)
    VALUES ('$taxType', '$taxPercent')";

    if ($conn -> query($sql)===TRUE){
        echo "tax table updated";
    }
    else{
        echo $conn -> error;
    }
}



//added col category_id as fk

// $sql = "ALTER TABLE sub_categories ADD COLUMN category_id INT; ";
// $sql .= "UPDATE sub_categories SET category_id = 1 WHERE id IN (1, 2, 3); ";
// $sql .= "UPDATE sub_categories SET category_id = 2 WHERE id IN (9, 10); ";
// $sql .= "UPDATE sub_categories SET category_id = 3 WHERE id IN (7); ";
// $sql .= "UPDATE sub_categories SET category_id = 4 WHERE id IN (4, 5, 6, 8); ";

// $sql = "alter table sub_categories add constraint fk_cat foreign key (category_id) references categories(id)";

// if ($conn->query($sql) === TRUE) {
//     echo "category id added in sub category";
// } else {
//     echo "Error: " . $conn->error;
// }


//  5. create cuisine table:
// $sqlQuery = "CREATE TABLE cuisine (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     cuisine_name VARCHAR(255)
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : cuisine";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }



// // 6. create order_type table:
// $sqlQuery = "CREATE TABLE order_type (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(100)
// )";

// if ($conn -> query($sqlQuery)) {
//   echo "Table created : order_type";
//   echo "<br>";
// }
// else {
//   echo $conn -> error;
//   echo "<br>";
// }


// // 7. create mrp table:
// $sqlQuery = "CREATE TABLE mrp (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     type_id int,
//     FOREIGN KEY (type_id) REFERENCES order_type(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     price float,
//     incl_of_taxes TINYINT,
//     item_id INT
//     -- FOREIGN KEY (item_id) REFERENCES menu_items(id) ON DELETE CASCADE ON UPDATE CASCASE
//  );";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : mrp";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }


// // 8. create units table:
// $sqlQuery = "CREATE TABLE units (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100)
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : units";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }



// // 9. create menu_items table:
// $sqlQuery = "CREATE TABLE menu_Items (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   name varchar(255),
//   enable_tracking TINYINT,
//   variants TINYINT,
//   extras TINYINT,
//   mfg_cost FLOAT,
//   prep_time FLOAT,
//   demand_only_item TINYINT,
//   status VARCHAR(100),
//   calories FLOAT,
//   made_to_order TINYINT,
//   spicy_level INT,
//   dietary_flags VARCHAR(100),
//   short_desc VARCHAR(100),
//   ingredients VARCHAR(100),
//   allergies VARCHAR(100),
//   total_taxes FLOAT,
//   item_img BLOB,
//   category_id INT,
//   FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
//   sub_category_id INT,
//   FOREIGN KEY (sub_category_id) REFERENCES sub_categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
//   item_type_id INT,
//   FOREIGN KEY (item_type_id) REFERENCES menu_item_types(id) ON DELETE CASCADE ON UPDATE CASCADE,
//   mrp_id INT,
//   FOREIGN KEY (mrp_id) REFERENCES mrp(id) ON DELETE CASCADE ON UPDATE CASCADE,
//   cuisine_id INT,
//   FOREIGN KEY (cuisine_id) REFERENCES cuisine(id) ON DELETE CASCADE ON UPDATE CASCADE,
//   unit_id INT,
//   FOREIGN KEY (unit_id) REFERENCES units(id) ON DELETE CASCADE ON UPDATE CASCADE
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "Table created : menu_items";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
// }


// Add FK to order_type table: (already added above)
// $sqlQuery = "ALTER TABLE mrp ADD FOREIGN KEY (type_id) REFERENCES order_type(id) ON DELETE CASCADE ON UPDATE CASCADE";
// if ($conn -> query($sqlQuery)) {
//     echo "Table created : order_type";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }

// 10. create dietary_flags table:
// $sqlQuery = "CREATE TABLE dietary_Flags (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name varchar(255),
//     item_id INT,
//     FOREIGN KEY (item_id) REFERENCES menu_items (id) ON DELETE CASCADE ON UPDATE CASCADE
// )";

// if ($conn -> query($sqlQuery)) {
//     echo "table created successfully : dietary_flags";
//     echo "<br>";
// }
// else {
//     echo $conn -> error;
//     echo "<br>";
// }



// $conn -> close();
// echo "connection closed";

// ?>