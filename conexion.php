<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "663401993";
$connect = mysqli_connect($db_host, $db_user, $db_pass) or die('Database Not Connected. Please Fix the Issue! ' . mysqli_error($connect));
$dbName = "mavid";
mysqli_select_db($connect, $dbName);

# However the User's Query will be passed to the DB:
$sql = 'SELECT * from users';
$query = mysqli_query($connect, $sql);
$features = [];
$i = 0;


while ($row = mysqli_fetch_array($query)) {
  $lat = $row['lat'];
  $long = $row['lng'];
  $propiedades1 = array('title' => $row['name'], 'description' => $row['email']);
  $arreglo_datos = array('type' => 'Feature', 'properties' => $propiedades1, 'geometry' =>  array('type' => 'Point', 'coordinates' => array(0 => $long, 1 => $lat)));
  $features += ["$i" => $arreglo_datos];
  $i++;
}
$array_multi = $features;
$data = array('type' => 'FeatureCollection', 'features' => $features);



echo json_encode($data);
