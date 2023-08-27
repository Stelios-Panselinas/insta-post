<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshop";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query("SELECT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop;");
$shops = array();
$shop = array();
$i = 0;


while($row = $result->fetch_assoc()){
    $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longtitude']);
    $i++;
}
$shops = json_encode($shops);
echo $shops;

?>