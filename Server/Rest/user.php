<?php

class user extends dbclass {

function getUsers($user_id){
	$sql = "select r1.user_id from request as r1, request as r2 where r1.src_lattitude<r2.src_lattitude+1 and r1.src_lattitude>r2.src_lattitude-1 and r1.src_longitude<r2.src_longitude+1 and r1.src_longitude>r2.src_longitude-1 and r1.dst_lattitude<r2.dst_lattitude+1 and r1.dst_lattitude>r2.dst_lattitude-1 and r1.dst_longitude<r2.dst_longitude+1 and r1.dst_longitude>r2.dst_longitude-1 and r1.user_id!=" . $user_id . " and r2.user_id=" . $user_id;
	$result = parent::execute($sql); 
	$ret = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$ret[] = stripslashes($row['user_id']);
		}
	}
	else {
		echo "NO RESULTS \n";
	}
	return $ret;
}	

}



?>
