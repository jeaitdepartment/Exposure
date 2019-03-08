<?php

include 'dbcreate.php';

date_default_timezone_set("Asia/Taipei");

	if(isset($_POST['submitone'])) {
		
		
		$queryempty = $myquery->query("TRUNCATE TABLE `araging`") or die($queryempty->error);
		if($queryempty) {
			echo " Emptied Successfully!";
		}
		else{
			echo "Error! Please contact administrator";
			
		}
	}
	if(isset($_POST['import'])) {
		$filen = $_POST['filename'];
		$soo = '"';
		$queryimport = $myquery->query("LOAD DATA LOCAL INFILE 'C:/Users/Nico_I.T/Desktop/Import/$filen'
										REPLACE
										INTO TABLE `araging`
										FIELDS TERMINATED BY ',' 
										ENCLOSED BY '$soo' 
										LINES TERMINATED BY '\r\n' 
										IGNORE 1 lines;") 
										or die($queryimport->error);
		if($queryimport) {
			
			echo "Harvested Successfully!";
			
		}
		else {
			
			echo "Error! Please contact administrator.";
		}	
	}
	
?>

<html>
<head>
<title> </title>
</head>

<body>

<form action="exporting.php" method="POST">
		
	<p style= "position:absolute; top:95;">Step 1>>>>>>>>>>>>>> Harvest</p><input type="submit" name="export" value="Export" style= " position:absolute; top:105; left:250;" tabindex="1" >
</form>

<form action="harvest.php" method="POST">
	
	
	<input type="file" name="filename" style="position:absolute; top:175; left:230;">
	<p style= " position:absolute; top:165;">Step 2>>>>>>>>>>>>>> Plant</p><input type="submit" name="import" style="position:absolute; top:175; left:510;" value="Import">
	
	
</form>














</body>
</html>
