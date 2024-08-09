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

$cat_id = $_REQUEST["q"];  // or use $GET

$sql = "select * from sub_categories where category_id = $cat_id order by sub_category_name";

$result = $conn -> query($sql);

if($result -> num_rows > 0){
    while($row = $result->fetch_assoc()){
        $val = $row['id'];
        $subCat = $row['sub_category_name'];
        echo "<option value=$val
        class='sub-cat'>$subCat</option>";
    }                    
}
else{
 echo $conn -> error;
}



?>