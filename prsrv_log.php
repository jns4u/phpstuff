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

// Some business logic in email templating
function emailAdmin($some_var,$total,$recDate,$FileName){	
	$fileatt_type = "text/csv";
	$file_size = filesize($FileName);
	$handle = fopen($FileName, "r");
	$content = fread($handle, $file_size);
	fclose($handle);
    	$content = chunk_split(base64_encode($content));
	$uid = md5(uniqid(time()));	
	$msg='Your Heading for '.$recDate."\r\n";
	$msg.='<table border="0.9" style="width:350px;text-align:center;"><tr><th bgcolor="#00FF00">Heading First</th></tr><tr><td bgcolor="#E8E8E8">'.$total.'</td></tr></table><br>'."\r\n";	
	$msg.='Heading Two:'."\r\n";
	$msg.='<table border="0.9" style="width:500px;text-align:center;"><tr><th bgcolor="#00FF00">Heading First</th><th bgcolor="#00FF00">Some Header</th></tr><tr><td bgcolor="#E8E8E8">'.count($some_var).'</td><td bgcolor="#E8E8E8">'.count($some_var).'</td></tr></table><br>'."\r\n";		  
	
	$msg.='Heading 3:'."\r\n";
	$SmVr = calltoSomeAPI_defMissing();
	$msg.='<table border="0.9" style="width:500px;text-align:center;"><tr><th bgcolor="#00FF00">Heading 4</th><th bgcolor="#00FF00">Heading</th></tr>'."\r\n";
	
	foreach($SmVr as $recNm){		
		if(in_array(trim($recNm->var2),array(25,9))){
			$clntName="ABC";
		}elseif(in_array(trim($recNm->var2),array(54,55,57,58,68,69,70,71)))
		{
			$clntName="XYZ";
		}else{
			$clntName=trim($recNm->var2);
		}
		$msg.='<tr><td bgcolor="#E8E8E8">'.$clntName.'</td>'."\r\n";
		$msg.='<td bgcolor="#E8E8E8">'.trim($recNm->var5).'</td></tr>'."\r\n";
	}
	$msg.='</table><br>'."\r\n";
	$msg.='Heading 6:'."\r\n";
	$msg.='<table border="0.9" style="width:700px;text-align:center;"><tr><th bgcolor="#00FF00">Heading 7</th><th bgcolor="#00FF00">Submitted To</th><th bgcolor="#00FF00">Your Heading</th><th  bgcolor="#00FF00">Datetime</th></tr>'."\r\n";		  
	foreach($sm_rec as $filename){		
		$msg.='<tr><td bgcolor="#E8E8E8">'.trim($filename['var1']).'</td>'."\r\n";
		$msg.='<td bgcolor="#E8E8E8">'.trim($filename['var2']).'</td>'."\r\n";
		$msg.='<td bgcolor="#E8E8E8">'.trim($filename['var3']).'</td>'."\r\n";
		$msg.='<td bgcolor="#E8E8E8">'.trim($filename['var4']).'</td></tr>'."\r\n";
	}
	$msg.='</table>'."\r\n";	
	$headers = 'From:emailid@domain.com'."\r\n";
	$headers .= 'Cc:emailid1@domain.com'."\r\n";	
	$subject = 'Some Heading for '.$recDate."\r\n";
	$headers = "MIME-Version: 1.0"."\r\n";
	$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$headers .= "Multi-part message in MIME format.\r\n";
	$headers .= "--".$uid."\r\n";
	$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
	$headers .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	$headers .= $msg."\r\n\r\n";
	$headers .= "--".$uid."\r\n";
	$headers .= "Content-Type: text/csv; name=\"".$FileName."\"\r\n";
	$headers .= "Content-Transfer-Encoding: base64\r\n";
	$headers .= "Content-Disposition: attachment; filename=\"".$FileName."\"\r\n\r\n";
	$headers .= $content."\r\n\r\n";
	$headers .= "--".$uid."--";
	
	$mail_sent = mail("recepient@domain.com",$subject,$msg,$headers);
	echo $mail_sent ? "Mail sent to recepient@domain.com" : "Mail failed";
}
?>
