<?php
require_once("mysql_connect.php");

$interval = "1";
if(date("N") == "1"){
	$interval = "3";
}

/**
 $sql="SELECT dailyUploadSummary.* FROM (SELECT dailuUpldCESummry.submitted_to, SUM(dailuUpldCESummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpld.* FROM(SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN ('campus_explorer','CE') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN ('campus_explorer','CE') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpld ORDER BY subqrydailyUpld.submitted_to DESC) AS dailuUpldCESummry UNION SELECT dailuUpldDMSummry.submitted_to, SUM(dailuUpldDMSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUplddm.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to='degree_match' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to='degree_match' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUplddm ORDER BY subqrydailyUplddm.submitted_to DESC) AS dailuUpldDMSummry UNION SELECT dailuUpldNCUSummry.submitted_to, SUM(dailuUpldNCUSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldncu.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN ('NCU',25,9) AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN ('NCU',25,9) AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldncu ORDER BY subqrydailyUpldncu.submitted_to DESC) AS dailuUpldNCUSummry UNION SELECT dailuUpldBTLSummry.submitted_to, SUM(dailuUpldBTLSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldbtl.* FROM(SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to = 'BTL' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to = 'BTL' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldbtl ORDER BY subqrydailyUpldbtl.submitted_to DESC) AS dailuUpldBTLSummry UNION SELECT dailuUpldCEHESummry.submitted_to, SUM(dailuUpldCEHESummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldcehe.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN (54,55,57,58,68,69,70,71,'CEHE') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN (54,55,57,58,68,69,70,71,'CEHE') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldcehe ORDER BY subqrydailyUpldcehe.submitted_to DESC) AS dailuUpldCEHESummry UNION SELECT dailuUpldDgrMatchHDSummry.submitted_to, SUM(dailuUpldDgrMatchHDSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldDMHD.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to = 'degree_match_hd' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to = 'degree_match_hd' AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldDMHD ORDER BY subqrydailyUpldDMHD.submitted_to DESC) AS dailuUpldDgrMatchHDSummry UNION SELECT dailuUpldCASummry.submitted_to, SUM(dailuUpldCASummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldCA.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN ('course_advisor','CA') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN ('course_advisor','CA') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldCA ORDER BY subqrydailyUpldCA.submitted_to DESC) AS dailuUpldCASummry UNION SELECT dailyUpldESSummry.submitted_to, SUM(dailyUpldESSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldES.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN ('education_spots','ES') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN ('education_spots','ES') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldES ORDER BY subqrydailyUpldES.submitted_to DESC) AS dailyUpldESSummry UNION SELECT dailyUpldRMSummry.submitted_to, SUM(dailyUpldRMSummry.ToTalUploaded) AS ToTUpld FROM (SELECT subqrydailyUpldRM.* FROM (SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM finish_call_data WHERE submitted_to IN ('REVO','RM') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) UNION SELECT submitted_to, COUNT('submitted_to') AS TotalUploaded FROM lead_submit_agents WHERE submitted_to IN ('REVO','RM') AND recording_uploaded_to_client=1 AND DATE(`datetime`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)) AS subqrydailyUpldRM ORDER BY subqrydailyUpldRM.submitted_to DESC) AS dailyUpldRMSummry) AS dailyUploadSummary ORDER BY dailyUploadSummary.submitted_to DESC";
Test URI end point at portal is dailyRecUploadSummary
 */

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
