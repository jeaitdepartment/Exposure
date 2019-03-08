<html>
<head>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>
<body>
<div id="Listcompany">
	
	<ul>
		<li class="customer">Customer
	<ul>
	</ul>
	</ul>
	
	<ul>
		<li class="localationli">Location
	<ul>
	</ul>
	</ul>
	
	<ul>
		<li class="headof">Head Office
	<ul>
	
	</ul>
	</ul>
	
	<ul>
		<li class="credli">Credit Line
	<ul>
		
	</ul>
	</ul>
	
	<ul>
		<li class="termsp">Terms Payment
	<ul>
		
	</ul>
	</ul>
</div>
	
	<table border ="0" cellspacing="2"  cellpadding="2" class="newtable">
		<thead>
			<tr>
				<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:7%;
							background:#20B2AA;
							border:2px solid black;'>SI Number</th>
				<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;background:#20B2AA;border:2px solid black;
							width:8%;'>Doc. Date</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:8%;background:#20B2AA;border:2px solid black;'>Due Date</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:110;background:#20B2AA;border:2px solid black;
							width:8%;'> Current</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
						width:7%;background:#20B2AA;border:2px solid black;'> 1 to 30 Days</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;border:2px solid black;
							width:7%;'> 31 to 60 Days</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
						width:7%;background:#20B2AA;border:2px solid black;'>61 to 90 Days</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							background:#20B2AA;
							border:2px solid black;
							width:8%;'> Over 90 Days</th>
			
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:5%;background:#20B2AA;border:2px solid black;'> Paid</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:1%;background:#20B2AA;border:2px solid black;'> ******EDIT
							</th>
			
				
							
	

			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>

<?php
	require 'dbcreate.php';	
	 
	
	
	
	
	$details = $myquery->query("Select * FROM `araging` WHERE `customer_no` = '2797' ORDER BY `doc_date` DESC");
	$display = $details->fetch_assoc();	
    $result = $myquery->query("SELECT * FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '2797' ORDER BY `doc_date` DESC ");
	include 'varcompany.php';
	
	while ($data = $result->fetch_assoc()) {
		
		echo "<tr>
		
			<td class='cent'style='background-color:white;'> ". $data['si_num'] ." </td>	
			<td class='cent'style='background-color:white;'>". date('m-d-Y', strtotime($data['doc_date']))."</td>
			<td class='cent'style='background-color:white;'>". date('m-d-Y', strtotime($data['due_date']))."</td>
			<td class='cent'style='background-color:white;'>". number_format((float)$data['current'])."</td>
			<td class='cent'style='background-color:white;'>". number_format((float)$data['1_30'])."</td>
			<td class='cent'style='background-color:white;'>".number_format((float)$data['31_60'])."</td>
			<td class='cent'style='background-color:white;'>".number_format((float)$data['61_90'])."</td>
			<td class='cent'style='background-color:white;'>".number_format((float)$data['over_90'])."</td>	
			<td class='cent'style='background-color:white;'>".number_format((float)$data['amount'])."</td>
		
		<form action='editpdcc.php?id=".$data['clixidpdc']."' method='POST'>
		<td style='border:0;'><input type='text' name='pdcc' autocomplete='off' size='10' >
		<td style='border:0;'><input type='submit' name='edit' value='edit'autocomplete='off' size='10' >
		
		</form>
		
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
		</tr> ";		 	 
	 }
	 
	 
	 if(isset($_GET['id'])) {
		 
		 if(isset($_POST['edit'])) {
			 $clixid = $_GET['id'];
		$pdcc = mysqli_real_escape_string($myquery, $_POST['pdcc']);
		
		$query2 = $myquery->query("UPDATE `pdc` SET `amount` = '$pdcc' WHERE `pdc`.`clixidpdc` = '$clixid'");
	 
	 
		}
	 }	 
?>





</body>
</html>



