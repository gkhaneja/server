<?php
require("autoload.php");
$service = new UserService("GET");
$output = $service->performGet("1");
echo $output . "\n";

?>
