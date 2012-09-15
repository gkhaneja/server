<?php
include 'RestService.php';
//require("autoload.php");

class UserService extends RestService
{

public function performGet($user_id)
{
	$user = new user();
	$users = $user->getUsers($user_id);
	// Create DataBase Connection and return users using GET
	$ret = json_encode($users);
	echo $ret . "\n";
	return $ret;
}

}


?>
