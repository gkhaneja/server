<?php
echo "Wecome to SB";

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';
 
switch($page)
{
    case 'home':           break;
    case 'mail':           break;
    case 'contact':        break;
    default:
        $page = 'home';
}
 
include("$page.php");

?>

