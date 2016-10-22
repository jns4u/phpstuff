<?php
require_once("mysql_connect.php");

$interval = "1";
if(date("N") == "1"){
	$interval = "3";
}

$sql = "SELECT `recordingDetails`.* FROM (SELECT `phone`,`second_phone`,`submitted_to`,`datetime` FROM `finish_call_data` WHERE DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL ". $interval ." DAY) and `submitted_to` in ('campus_explorer','degree_match','NCU',25,9,'course_advisor',54,55,57,58,68,69,70,71, 'degree_america','becker','media_spike','degree_match_hd','education_spots','BTL','CA','DM','WWP','Higher_Ed','Becker','Achieve_Career','ES','Moat_CRM','ERN','ITT_Tech','RM','DO') UNION SELECT `phone`,`second_phone`,`submitted_to`,`datetime` FROM `lead_submit_agents` WHERE DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL ". $interval ." DAY) and `submitted_to` in ('campus_explorer','degree_match','NCU',25,9,'course_advisor',54,55,57,58,68,69,70,71, 'degree_america','becker','media_spike','degree_match_hd','education_spots','BTL','CA','DM','WWP','Higher_Ed','Becker','Achieve_Career','ES','Moat_CRM','ERN','ITT_Tech','RM','DO')) AS `recordingDetails` GROUP BY `recordingDetails`.`phone`,`recordingDetails`.`datetime`";

// echo $sql;die;
$result = mysql_query($sql);

while($row = mysql_fetch_assoc($result)){
	if(!empty($row['phone']) && !empty($row['submitted_to'])){
		$encode[] = $row;
	}
}
//echo date('Y-m-d H:i:s');
echo json_encode($encode);
?>
