<?php
$data = array("userid" => "test1" , "latitude" => "55.1300", "longitude" => "44.4453" , "des_latitude" => "33.3455",  "des_longitude" => "55.6789" ,"time" => "23445");                                                                    
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('http://127.0.0.1/SB/home_post.php');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: text/html',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
 
$result = curl_exec($ch);
echo $result;
?>

