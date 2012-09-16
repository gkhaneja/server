<?php

$path_parts = pathinfo($_SERVER['PHP_SELF']);
$dir =  $path_parts['dirname'] . "";
require_once($dir . "/../autoload.php");

class user extends dbclass {

var $user_id;

function getUsers(){
	$sql = "select r1.user_id, u.first_name, u.last_name from request as r1, request as r2, user as u where r1.src_lattitude<r2.src_lattitude+1 and r1.src_lattitude>r2.src_lattitude-1 and r1.src_longitude<r2.src_longitude+1 and r1.src_longitude>r2.src_longitude-1 and r1.dst_lattitude<r2.dst_lattitude+1 and r1.dst_lattitude>r2.dst_lattitude-1 and r1.dst_longitude<r2.dst_longitude+1 and r1.dst_longitude>r2.dst_longitude-1 and r1.user_id!=" . $this->user_id . " and r2.user_id=" . $this->user_id . " and r1.user_id = u.id";
	$result = parent::execute($sql); 
	$ret = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$ret[] = stripslashes($row['user_id']);
			$ret[] = stripslashes($row['first_name']);
			$ret[] = stripslashes($row['last_name']);
		}
	}
	else {
		echo "NO RESULTS \n";
	}
	return $ret;
}	

}



?>
