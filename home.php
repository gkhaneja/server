
<?php
include 'DataBase/mysql.php';
$a= $_GET['user'];
$lat = $_GET['lat'];
$long = $_GET['long'];
echo "$a";
echo "\n";
echo " Your Location is $lat and $long";

$query = "INSERT into userupdates VALUES ('$a','$lat','$long')";
$mysql = new Mysql();
$mysql->dbConnect();
$mysql->freeRun($query);
$mysql->dbDisconnect();

?>
