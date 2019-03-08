<?php

$host ='localhost';
$user ='root';
$pass ='';
$dbname ='try';

$myquery= new mysqli($host,$user,$pass,$dbname) or die($myquery->error);


	if (isset($_POST['submityo'])) {
		
		$dateone = $_POST['dateone'];
		
		$sql= "INSERT INTO `one`(`numone`, `numtwo`, `numthree`) VALUES ('$dateone','','')";
		
		if($myquery->query($sql) or die($myquery->error)) {
			
			echo "Added bratha";
		}
		else {
			echo "No No No not like that";
		}
	}






?>


<html>
<head>

<body>

<form action='try.php' method='POST'>
<input type='date' name='dateone'>
<input type='submit' name='submityo'>
</form>



</body>
</html>