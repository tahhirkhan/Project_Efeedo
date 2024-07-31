<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sublime_Pos";

//1. creating connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn -> connect_error) {
  die("connection failed: ".$conn -> connect_error);
}
echo "connected";

//2. creating db
// $sql = "CREATE DATABASE Sublime_Pos";

// if ($conn -> query($sql) === TRUE){
//   echo "DB created with name $sql";
// } else {
//   echo "Error: ".$conn -> error;
// }

//creating Tables - orders(parent), order_items, order_taxes, order_discounts, order_additionals

// orders

// $sqlQuery = "CREATE TABLE ORDERS 
// (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// order_date DATE NOT NULL,
// total_qty INT,
// total_amt DECIMAL(2),
// discounted_amt DECIMAL(2),
// discounted_percent DECIMAL(2),
// taxes_amt DECIMAL(2),
// cgst_amt DECIMAL(2),
// sgst_amt DECIMAL(2),
// server_name VARCHAR(50),
// special_instructions TEXT,
// order_type VARCHAR(10) NOT NULL)";

// if ($conn -> query($sqlQuery) === True) {
//   echo "table created with name $sqlQuery";
// }
// else {
//   echo $conn -> error;
// }

$sqlQuery = "CREATE TABLE ORDER_ITEMS
(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
item_name VARCHAR(100),
qty INT,
rate DECIMAL(2),
item_amt DECIMAL(2),
order_id INT UNSIGNED,
FOREIGN KEY (order_id) REFERENCES ORDERS (id) ON DELETE CASCADE ON UPDATE CASCADE
)";

if ($conn -> query($sqlQuery) === True) {
  echo "table created";
}
else {
  echo $conn -> error;
}


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


  function getOrderArrary (){
      // Data preparation
      $orderData = $_POST['order-data'];
      $orderArray = json_decode($orderData,true);
      print "<pre>";
      print_r($orderArray);
      print "</pre>";

      $i=0;
      foreach($orderArray["items"] as $key => $val){
        $item_array[$i] = $val;
        $i++;
      }
      $special_instructions = $orderArray["specialInstructions"];
      $taxes_amount = $orderArray["totalTaxes"];
      $order_type = $orderArray["type"];
      $server_name = $orderArray["server"];
      $total_qty = $orderArray["totalQuantity"];
      $total_amount = $orderArray["grossAmount"];
      $discounted_amount = $orderArray["discountedAmount"];
      $discounted_percent = $orderArray["discountedPercent"];
      $cgst_amount = $sgst_amount = number_format($taxes_amount/2,2);

      echo "<pre/>";
      print_r($item_array);

      // Data storing



  }

  getOrderArrary();


}









?>