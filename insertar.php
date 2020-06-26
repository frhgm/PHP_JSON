<?php

include_once 'conexion.php';

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);
$latitude = mysqli_real_escape_string($conn, $_REQUEST['lat']);
$longitude = mysqli_real_escape_string($conn, $_REQUEST['lng']);



$sql = "INSERT INTO users (name,email,password,lat,lng)
     VALUES ('$name','$email','$pass','$latitude','$longitude')";

if (mysqli_query($conn, $sql)) {
  echo "New record has been added successfully !";
} else {
  echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: index.php");
