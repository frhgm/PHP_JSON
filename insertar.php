<?php
include_once 'conexion.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $latitude = $_POST['lat'];
  $longitude = $_POST['lng'];



  $sql = "INSERT INTO users (id,name,email,password,lat,lng)
     VALUES (3,'$name','$email','$pass','$latitude','$longitude')";

  if (mysqli_query($connect, $sql)) {
    echo "New record has been added successfully !";
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($connect);
  }
  mysqli_close($connect);
}
