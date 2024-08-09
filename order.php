<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sublime_pos";

//1. creating connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn -> connect_error) {
  die("connection failed: ".$conn -> connect_error);
}
echo "connected";

//2. creating db
// $sql = "CREATE DATABASE sublime_pos";

// if ($conn -> query($sql) === TRUE){
//   echo "DB created with name $sql";
// } else {
//   echo "Error: ".$conn -> error;
// }

//creating Tables - orders(parent), order_items, order_taxes, order_discounts, order_additionals

// orders

// $sqlQuery = "CREATE TABLE ORDERS 
// (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
// updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE    CURRENT_TIMESTAMP,
// updated_by VARCHAR(50) DEFAULT(NULL),
// total_qty INT,
// total_amt FLOAT,
// discounted_amt FLOAT,
// discounted_percent FLOAT,
// taxes_amt FLOAT,
// cgst_amt FLOAT,
// sgst_amt FLOAT,
// server_name VARCHAR(100),
// special_instructions TEXT,
// order_type VARCHAR(10) NOT NULL)";

// if ($conn -> query($sqlQuery) === True) {
//   echo "table created orders";
// }
// else {
//   echo $conn -> error;
// }


// order_items

// $sqlQuery = "CREATE TABLE ORDER_ITEMS
// (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// item_name VARCHAR(100),
// qty INT,
// rate FLOAT,
// item_amt FLOAT,
// order_id INT UNSIGNED,
// FOREIGN KEY (order_id) REFERENCES ORDERS (id) ON DELETE CASCADE ON UPDATE CASCADE
// )";

// if ($conn -> query($sqlQuery) === True) {
//   echo "table created";
// }
// else {
//   echo $conn -> error;
// }


// php function to get order data

// echo $_POST["id"]

$orderArray = array();
$item_array = array();
$itemName = '';
$qty = 0;
$rate = 0;
$item_amount = 0;


// validation
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
      // Data preparation
      $orderData = $_POST['order-data'];
      $orderArray = json_decode($orderData,true);
      print "<pre>";
      print_r($orderArray);
      print "</pre>";

      $special_instructions = $orderArray["specialInstructions"];
      $taxes_amount = $orderArray["totalTaxes"];
      $order_type = $orderArray["type"];
      $server_name = $orderArray["server"];
      $total_qty =  $orderArray["totalQuantity"];
      $total_amount = $orderArray["grossAmount"];
      $discounted_amount = $orderArray["discountedAmount"];
      $discounted_percent = $orderArray["discountedPercent"];
      $cgst_amount = $sgst_amount = number_format($taxes_amount/2,2);


      // Data storing in orders table 
      $sqlQuery = "INSERT INTO ORDERS (total_qty, total_amt, discounted_amt, discounted_percent, taxes_amt, cgst_amt, sgst_amt, server_name, special_instructions, order_type) VALUES('$total_qty', '$total_amount', '$discounted_amount', '$discounted_percent', '$taxes_amount', '$cgst_amount', '$sgst_amount', '$server_name', '$special_instructions', '$order_type')";

      $last_record_id = '';


      if ($conn -> query($sqlQuery) === TRUE) {
       echo "Data inserted into orders table";
       echo "<br/>";
       $lastRecordId = $conn -> insert_id;
      }
      else {
       echo $conn -> error."<br>";
        echo $sqlQuery;

      }  

//Data storing into order_items table:
 foreach ($orderArray["items"] as $item) {

   $itemName = $item['itemName'];
   $itemQty = $item['qty'];
   $itemRate = $item['rate'];
   $totalItemAmount = $item['totalItemAmount'];
   $discountedPercent = $discounted_percent;
   $taxableAmount = $totalItemAmount - ($discountedPercent/100)*$totalItemAmount;
   $totalTaxPercent = 5;
   $totalTaxAmount = ($totalTaxPercent/100)*$taxableAmount;

   echo $itemName." ".$itemQty." ".$itemRate." ".$totalItemAmount." ".$discounted_percent." ".$taxableAmount." ".$totalTaxPercent." ".$totalTaxAmount;

   echo "<br>";



  $sqlQuery2 = "INSERT INTO order_items (item_name, qty, rate, item_amt, order_id)
  VALUES ('$itemName', '$itemQty', '$itemRate', '$totalItemAmount', '$lastRecordId')";

  if ($conn -> query($sqlQuery2) === TRUE) {
    echo "Data inserted into order_items table";
  }
  else {
    echo $conn -> error."<br>";
  }

  
}

}










?>