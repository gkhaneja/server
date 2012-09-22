<?php
include 'Rest/UserService.php';
echo "Welcome";
//$service = new UserService("GET");
//$service->handleRawRequest($_SERVER, $_GET, $_POST);
$url = $_SERVER['REQUEST_URI'];
$serviceFactory =  new ServiceFactory($url);
$service =  $serviceFactory->getService();

?>