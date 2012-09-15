<?php
include 'RestService.php';
require_once("autoload.php");

class UserService extends RestService
{

public function performGet($user_id)
{
	$user = new user();
	$user->user_id = 1;
	$users = $user->getUsers();
	// Create DataBase Connection and return users using GET
	$ret = json_encode($users);
	//echo $ret . "\n";
	return $ret;
}

}


?>
