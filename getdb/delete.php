<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$connect = mysqli_connect("localhost", "root", "", "pdo_test");
$data = json_decode(file_get_contents("php://input"));

if (count($data) > 0) {
  $id = $data->id;

  $query = "DELETE FROM users WHERE id = '$id'";

  if (mysqli_query($connect, $query)) {
    echo json_encode("data deleted!");
  } else {
    echo json_encode("error!");
  }
}
?>
