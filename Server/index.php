<?php
include 'Rest/UserService.php';
echo "Wecome";
$service = new UserService("GET");
$service->handleRawRequest($_SERVER, $_GET, $_POST);
?>