<?php

//CURL to interchange Info between two Servers	
$ch = curl_init();			
curl_setopt($ch, CURLOPT_URL,"http://");			        //type intended url here
curl_setopt($ch, CURLOPT_POST, true);			
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
$response = curl_exec($ch);			
curl_close($ch);
$res=json_decode($response);
echo $res;die;

?>
