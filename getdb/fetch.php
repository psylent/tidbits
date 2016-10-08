<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$connect = mysqli_connect("localhost", "root", "", "pdo_test");

$result = mysqli_query($connect, "SELECT * FROM users");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}

$connect->close();
print json_encode($data);
?>
