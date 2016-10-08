<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$connect = mysqli_connect("localhost", "root", "", "pdo_test");
$data = json_decode(file_get_contents("php://input"));

if (count($data) > 0) {
  $name = mysqli_real_escape_string($connect, $data->name);
  $city = mysqli_real_escape_string($connect, $data->city);
  $country = mysqli_real_escape_string($connect, $data->country);
  $btnName = $data->btnName;

  if ($btnName == "ADD") {
    $query = "INSERT INTO users(name, city, country) VALUES ('$name', '$city', '$country')";

    if (mysqli_query($connect, $query)) {
      echo json_encode("data inserted!");
    } else {
      echo json_encode("error!");
    }
  }

  if ($btnName == "UPDATE") {
    $id = $data->id;
    $query = "UPDATE users SET name = '$name', city = '$city', country = '$country' WHERE id = '$id'";

    if (mysqli_query($connect, $query)) {
      echo json_encode("data updated!");
    } else {
      echo json_encode("error!");
    }
  }


}
?>
