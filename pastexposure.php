
<html>
<head>
<title> Branches </title>
<link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>

<div class="Manage">
	<table border ="0"cellspacing="4" cellpadding="4" style="width:95%;
	margin-top:20px;
	position:relative;
	left:-130;
	top:20;">
		<thead>
			<tr>
				<th style='
							background-color:white; 							
							border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							text-align:center;
							width:3%;
							'>Customer Code</th>
				<th style='
							background-color:white; 							
							border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							text-align:center;
							width:17%;
							'>Customer Name</th>
				<th style='
							background-color:white; 							
							border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							text-align:center;
							width:8%;
							'>As Of</th>			
				<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:9%;
							'>Current Account</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:7%;'>#</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:9%;'> Overdue Account</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
						width:7%;'> #</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:9%;'> Over 90 Days</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
						width:7%;'> #</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:8%;'> PDC Onhand</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:7%;'> #</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:8%;'> Total Exposure</th>

				
				
						
	
			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>

<?php

include 'dbcreate.php';



	if (isset($_GET['id'])) {
	
	$id = mysqli_real_escape_string($myquery, $_GET['id']);

	$sql = "select * from `invoice` tal1 where tal1.`custo_code` LIKE '".$id."' and tal1.`as_of` = (select max(tal2.`as_of`) 
		from `invoice` tal2 where tal2.`custo_code` = tal1.`custo_code`) ORDER BY tal1.`customer_n` ";

	$result1= $myquery->query($sql);	
	$datas = $result1->fetch_assoc();
	
	$result = $myquery->query($sql);
	
		echo "<div style='
			position:absolute;
			top:-70;
			left:-110;
			background:#E0FFFF;
			padding:5;
			font-size:24;
			color:black;
			width:400;
			text-align:center;
			'>".$datas['customer_n']. "</div>";
	
		echo "<div style='
			position:absolute;
			top:-30;
			left:-110;
			background:#E0FFFF;
			padding:5;
			font-size:24;
			color:black;
			'>".date("m/d/Y")."</div>";

		while ($data = $result->fetch_assoc()) {
			echo "<tr>					
				<td class='cent'style='background-color:white;'><a href='customercnc.php?id=".$data['custo_code']."'>".$data['custo_code']."</td></a>		
				<td class='cent'style='background-color:white;'>".$data['customer_n']."</td>
				<td class='cent'style='background-color:white;'>".date('m-d-Y', strtotime($data['as_of']))."</td>
				<td class='cent'style='background-color:white;'>". "₱".number_format((float)$data['current_account'])."</td>
				<td class='cent'style='background-color:white;'>".$data['date_current']."</td>
				<td class='cent'style='background-color:white;'>"."₱".number_format((float)$data['overdue'])."</td>
				<td class='cent'style='background-color:white;'>".$data['date_overdue']."</td>
				<td class='cent'style='background-color:white;'>"."₱".number_format((float)$data['over_90'])."</td>
				<td class='cent'style='background-color:white;'>".$data['over90_date']."</td>
				<td class='cent'style='background-color:white;'>"."₱".number_format((float)$data['pdc_onhand'])."</td>
				<td class='cent'style='background-color:white;'>".$data['date_pdc']."</td>
				<td class='cent'style='background-color:white;'>"."₱".number_format((float)$data['total_expo'])."</td>						
			";		
		}
	
	
}


?>

</body>

</html>

