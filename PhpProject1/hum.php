<?php
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'arduino');
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}
$query = sprintf("SELECT humidity FROM temp ORDER BY id DESC LIMIT 1");
$result = $mysqli->query($query);
$data = array();
foreach ($result as $row) {
   $hum=$row["humidity"];
}
$result->close();
$mysqli->close();
print json_encode($hum);
?>
