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
$query = sprintf("SELECT satrtdate, enddate FROM sprout WHERE 1");
$result = $mysqli->query($query);
$end=0;
foreach ($result as $row) {
   $start=$row["satrtdate"];
   $end=$row["enddate"];
}
if (strlen($end)>4) {
    $date = "$start:$end";
} else {
     $date=0;
}

$result->close();
$mysqli->close();
print json_encode($date);
?>
