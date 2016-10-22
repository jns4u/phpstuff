<?php
require_once("mysql_connect.php");

if(isset($_POST["submit"])){
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
		$phone = $filesop[0];
				
		echo $phone."<br>";
		$sql = mysql_query("INSERT INTO missing_recordings (phone) VALUES ('$phone')");
	}
 
if($sql){
	echo "<br>Missing recordings has imported successfully.";
}else{
	echo "<br>There is some problem.";
}
}
?>
<form name="import" method="post" enctype="multipart/form-data" action="missing_import.php">
     <input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
</form>
