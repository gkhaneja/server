<?php
#$data=array('status'=>'live','now'=>time());
$data=json_decode(file_get_contents('php://input'),true);
#print $data->name;
var_dump($data);
//foreach ($data as $name => $value) {
//    print $name . ':'
//    foreach ($value as $entry) {
//        print '  ' . $entry->firstName;
//    }
//}
if(false!==strpos($_SERVER['HTTP_ACCEPT'],'text/html'))

 {header('Content-Type:text/html');
   echo"<pre>";
       print_r("Hi");
    echo"</pre>";
 }
else{
   //returnjson
   header('Content-Type:application/json');
   echo json_encode($data);}
?>
