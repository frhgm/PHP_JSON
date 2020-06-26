<?php
include_once 'conexion.php';

$sql = 'SELECT * from users';
$query = mysqli_query($conn, $sql);
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
