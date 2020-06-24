<?php

$connect = mysqli_connect("localhost", "root", "663401993") or die('Database Not Connected. Please Fix the Issue! ' . mysqli_error($connect));
$dbName = "mavid";
mysqli_select_db($connect, $dbName);

# However the User's Query will be passed to the DB:
$sql = 'SELECT * from users';
$data = array(); //setting up an empty PHP array for the data to go into

if ($result = mysqli_query($connect, $sql)) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
}

$jsonData = json_encode($data);
$original_data = json_decode($jsonData, true);
$features = array();
foreach ($original_data as $key => $value) {
  $features[] = array(
    'type' => 'Feature',
    'properties' => array('Nombre' => $value['name']),
    'geometry' => array(
      'type' => 'Point',
      'coordinates' => array(
        $value['lat'],
        $value['lng']
      ),
    ),
  );
}
$new_data = array(
  'type' => 'FeatureCollection',
  'features' => $features
);


$final_data = json_encode($new_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

$variable = extract(json_decode($final_data, true));


header('Content-Type: application/json charset=UTF-8');


$file = 'geoJSON.js';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current = $final_data;
// Write the contents back to the file
file_put_contents($file, $current, FILE_TEXT);
print_r($final_data);
