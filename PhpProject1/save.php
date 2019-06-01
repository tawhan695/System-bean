<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arduino";
$s = $_GET['s'];
$e = $_GET['e'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//INSERT INTO `sprout` (`id`, `satrtdate`, `enddate`) VALUES (4'0000000001', '2019-06-05', '2019-06-05');
$sql = "UPDATE sprout SET  satrtdate = '$s', enddate = '$e' WHERE sprout.id = 1";
//UPDATE `sprout` SET `id` = '1', `satrtdate` = '2-6-2019', `enddate` = '4-6-2019' WHERE `sprout`.`id` = 14;
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();