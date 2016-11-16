<?php

preserve_log(value1,value2,value3);
echo "Log preserved\n";

function preserve_log(value1,value2,value3){
	$ch = curl_init();                    
  $url = "web scrapper URI";
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_POST, true);  
  curl_setopt($ch, CURLOPT_POSTFIELDS, "var1=value1&var2=value2&var3=value3"); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  $output = curl_exec ($ch); 
  curl_close ($ch); 
  var_dump($output);
}

?>
