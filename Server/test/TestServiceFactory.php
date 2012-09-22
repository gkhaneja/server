<?php
include_once '../ServiceFactory.php';

foreach ($_REQUEST as $key=>$val) {
	${$key}=$val;
}
$url = 'http://www.mooov.co.in/User/?id=1';

$serviceFactory =  new ServiceFactory($url);

$service =  $serviceFactory->getService();

echo  $service->name;
