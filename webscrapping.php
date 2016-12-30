<?php
/** source function for encoding
function utf8ize($dat) {
    if (is_array($dat)) {
        foreach ($dat as $key => $val) {
            $dat[$key] = utf8ize($val);
        }
    } else if (is_string ($dat)) {
        return utf8_encode($dat);
    }
    return $dat;
}
 
CURL to interchange Info between two Servers	
*/
$ch = curl_init();			
curl_setopt($ch, CURLOPT_URL,"http://");			        //type intended url here
curl_setopt($ch, CURLOPT_POST, true);			
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
$response = curl_exec($ch);			
curl_close($ch);
$res=json_decode($response);
echo $res;die;

?>
