
<?php
include 'DataBase/mysql.php';
include_once 'Dist/hav_dist.php';

$data=json_decode(file_get_contents('php://input'),true);
#var_dump($data);
$userid = $data['userid'];
$lat = $data['latitude'];
$long = $data['longitude'];
$des_lat = $data['des_latitude'];
$des_long = $data['des_longitude'];
$time  = $data['time'];
$json_string = mysql_real_escape_string(implode($data));
$query = "REPLACE into userupdates VALUES ('$userid','$lat','$long','$des_lat','$des_long','$time','$json_string')";

#var_dump($query);

$my_loc = new Location();
$my_loc->setLocationfromJSON($data);

$resultArray = Array();

$mysql = new Mysql();
$mysql->dbConnect();
$mysql->freeRun($query);
$resultset = $mysql->selectall('userupdates');
while ($row = mysql_fetch_object($resultset)) { 
#echo "$row->latitude \n"; 
$user_location = new Location();
$user_location->setLocationfromObject($row);
array_push($resultArray, $user_location);
}

#print_r(array_values($resultArray));
$reply = Array();
foreach ($resultArray as $res)
{
 if ($my_loc->getVal(LocationType::USERID) != $res->getVal(LocationType::USERID))
  {
   $dist =  $my_loc->getHaversineDis($res);
   $result['userid'] = $res->getVal(LocationType::USERID);
   $result['latitude'] = $res->getVal(LocationType::LATITUDE);
   $result['longitude'] = $res->getVal(LocationType::LONGITUDE);
   $result['destination'] = "dummy";
   $result['des_latitude'] =  $res->getVal(LocationType::DES_LONGITUDE);
   $result['des_longitude'] = $res->getVal(LocationType::DES_LONGITUDE);
   $result['time'] = "3:00 PM";
   array_push($reply,$result);
  # echo "Distance is $dist \n";
  }
}
$json_reply['NearbyUsers'] = $reply;
echo json_encode($json_reply);
$mysql->dbDisconnect();

?>
