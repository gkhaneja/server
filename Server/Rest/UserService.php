<?php
$path_parts = pathinfo($_SERVER['PHP_SELF']);
$dir =  $path_parts['dirname'] . "";
require_once($dir . "/../autoload.php");

class UserService extends RestService
{
public function __construct()
{
	$this->name = "User";
}
	
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
