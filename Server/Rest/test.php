<?php
$path_parts = pathinfo($_SERVER['PHP_SELF']);
$dir =  $path_parts['dirname'] . "";
require_once($dir . "/../autoload.php");
$service = new UserService("GET");
$output = $service->performGet("1");
echo $output . "\n";

?>
