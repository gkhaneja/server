<?php
require_once  'hav_dist.php';

$my_loc = new Location();

$loc = $my_loc->getLocation();
#var_dump($loc);

$curr_location = array("latitude" =>'55',"longitude" =>'44',"des_latitude" =>'55',"des_longitude" =>'44');

$my_loc->setLocation($curr_location);

$dummy_loc = new Location();
$new_location = array("latitude" =>'50',"longitude" =>'40',"des_latitude" =>'55',"des_longitude" =>'44');
$dummy_loc->setLocation($new_location);

var_dump(json_encode($dummy_loc));
$dist =  $my_loc->getHaversineDis($dummy_loc);
echo "Distance is $dist";
#var_dump($my_loc->getLocation());
?>

