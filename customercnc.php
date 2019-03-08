<html>
<head>
	<link rel="stylesheet" type="text/css" href="new.css">
	<script src ="jquery-3.2.1.min.js"></script>
<script src ="autocomplete.js"></script> 
</head>
<body>

<?php

 
?>
<div id="searchcompany1">	
	<form action="search.php" method="post">
		<input type="text" name="searchbox" list="Customers" id="searchcustomers" placeholder="Search Customer Again" autocomplete="off" required>
			<datalist id="Customers">
			</datalist>
		<input type="submit" name="searchbutton" id="buttonme" value="Search">
		<input type="submit" name="searchbyid" id="button-search-id" value="Search by customer id">
	</form>
</div>

							
	
	<?php 
		if(isset($_GET['id'])) {
	 
	 
	include  'dbcreate.php';
	
	$id = mysqli_real_escape_string($myquery, $_GET['id']);
}
	$resultwidth2 = $myquery->query("SELECT * FROM `pdc` WHERE `custo_noo`= '$id' AND `boards_1` != ''");
	
	$resultwidth = $resultwidth2->fetch_assoc();	
	
			
				if($resultwidth['boards_1'] == 'Yes' AND $resultwidth['boards_1'] != '' ) {
					echo "
						<table border ='0' cellspacing='2'  cellpadding='2' style='position:absolute; top:250; left:90; width:105%;'>";
				}   
				else {
					echo "<table border ='0' cellspacing='2'  cellpadding='2' style='position:absolute; top:250; left:90; width:90%;'>";
				}
				 ?> 
				
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
							width:110;
							background:#20B2AA;
							border:2px solid black;
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
							width:8%;background:#FFF8DC;border:2px solid black;'> PDC</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:8%;background:#FFF8DC;border:2px solid black;'> Cheque Date</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:5%;background:#87CEFA;border:2px solid black;'> Dated Check/Cash</th>

			
				
							
	

			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>

<?php

//----------------------------------------------------Display Table 

if(isset($_GET['id'])) {
	
	date_default_timezone_set("Asia/Taipei");
	
	require 'dbcreate.php';
	$id = mysqli_real_escape_string($myquery, $_GET['id']);
	

	
	$details = $myquery->query("Select * FROM `araging` WHERE `customer_no` = '$id' ORDER BY `doc_date` DESC");
	$display = $details->fetch_assoc();	
	
	
	
    $result = $myquery->query("SELECT * FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' ORDER BY `doc_date` DESC ");
	
	//-------------LINK
	echo "<p style='position:absolute; border:1px solid black; background:white; padding:10; left:100; top:-10;'><a href='postpdc.php?id=".$id."'> Add Payment </p></a>";
	//------------
	
	include 'varcompany2.php';
	
	while ($data = $result->fetch_assoc()) {
		
		
		// minus pdc_amount
			$total_current = $data['current'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_130 = $data['1_30'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_3160 = $data['31_60'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_6190 = $data['61_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_boards = $data['boards_over'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_over90 = $data['over_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			
		//-----------------
		
		//total max 0
			@$sum_current += max($total_current,0);
			@$sum_130 += max($total_130,0);
			@$sum_3160 += max($total_3160,0);
			@$sum_6190 += max($total_6190,0);
			@$sum_over90 += max($total_over90,0);
			@$sum_boards += max($total_boards,0);
			@$total_pdco += $data['pdc_amount'];
			$sumoverdue = $sum_130 + $sum_3160 + $sum_6190 - $sum_boards;
			$total_expo = $sumoverdue + $sum_current + $sum_over90 + $total_pdco + $sum_boards;	
		//-------------------
		
		//display table (minus pdc_amount)
		$total = 0;
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		
		$total5 = $total += $data['current'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'] ;
		$total6 = $total1 += $data['1_30'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
		$total7 = $total2 += $data['31_60'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
		$total8 = $total3 += $data['61_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
		$total9 = $total4 += $data['over_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
		//----------------------
		
		$dues_1 = number_format((float)max($data['dues_date'],0), 2, '.', ',');
		$total5_1 = number_format((float)max($total5,0), 2, '.', ',');
		$total6_1 = number_format((float)max($total6,0), 2, '.', ',');
		$total7_1 = number_format((float)max($total7,0), 2, '.', ',');
		$total8_1 = number_format((float)max($total8,0), 2, '.', ',');
		$total9_1 = number_format((float)max($total9,0), 2, '.', ',');
		
		
			echo "<tr>
		
				<td class='cent'style='background-color:white;'> ". $data['si_num'] ." </td>
				";
				
			if($data['doc_date'] != null) {
				echo "
					<td class='cent'style='background-color:white;'>". date('m-d-Y', strtotime($data['doc_date']))."</td>";
			}
			else {
				echo "
					<td class='cent'style='background-color:white;'></td>";
			}
				
			if($data['due_date'] != null) {
				echo "
				<td class='cent'style='background-color:white;'>". date('m-d-Y', strtotime($data['due_date']))."</td>";
			}
			else {
				echo "
					<td class='cent'style='background-color:white;'></td>";
			}
				
				echo "<td class='cent'style='border:1px red solid; background-color:white;'>".  str_replace(".00","",$total5_1)."</td>
				<td class='cent'style='border:1px blue solid;background-color:white;'>".  str_replace(".00","",$total6_1)."</td>
				<td class='cent'style='border:1px blue solid;background-color:white;'>".  str_replace(".00","",$total7_1)."</td>
				<td class='cent'style='border:1px blue solid;background-color:white;'>".  str_replace(".00","",$total8_1)."</td>
				<td class='cent'style='border:1px green solid;background-color:white;'>".  str_replace(".00","",$total9_1)."</td>	
				<td class='cent'style='background-color:white;'>". number_format((float)$data['pdc_amount'])."</td></a>";
				if($data['cheque_date'] != null) {
				echo "
					<td class='cent'style='background-color:white;'>".  date('m-d-Y', strtotime($data['cheque_date']))."</td></a>";			
				}
				else {
					echo "<td class='cent'style='background-color:white;'>". ""."</td></a>";
				}
				
			echo "
				<td class='cent'style='background-color:white;'>". number_format((float)$data['cash_dtdchck'])."</td></a>";
				
				if($data['boards_1'] != null) {
					echo "
						<td class='cent' style='position:absolute; border:0; left:411; left:1115; color:red;  margin-top:-14; display:block; font-size:40; '>•</td>";
				}
				else {
					echo "";
				}
				
			echo "
		
		
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
		</tr> 	
				";	

		
				
	 }
		
		
		 $id = mysqli_real_escape_string($myquery, $_GET['id']);
	 $sqlquery_detailss = $myquery->query("Select * FROM `customerdetails` WHERE `IDCUST` = '$id'");	
	 $rowws = $sqlquery_detailss->fetch_assoc();
	
	$getdatecur = $myquery->query("SELECT min(`doc_date`) as MinDate, max(`doc_date`) as MaxDate FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `customer_no` ='$id' AND `current` != '' AND `current`!= '0' AND `current`> '0' AND `pdc`.`bal_due` IS NULL OR `pdc`.`bal_due` != '0' AND `pdc`.`identitydays` = '3' AND `pdc`.`custo_noo` = '$id' ORDER BY `doc_date`   DESC ")->fetch_assoc();
	
	$getdateover = $myquery->query("SELECT min(`doc_date`) as MinDate, max(`doc_date`) as MaxDate FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' AND `araging`.`current` = '' AND `araging`.`over_90` ='' AND `pdc`.`boards_1` IS NULL OR `pdc`.`boards_1` != '' AND `pdc`.`boards_1` != 'Yes' AND `pdc`.`custo_noo` = '$id' AND `pdc`.`identitydays` = '1'  ORDER BY `doc_date` DESC")->fetch_assoc();
	
	$getdateboards = $myquery->query("SELECT min(`doc_date`) as MinDate, max(`doc_date`) as MaxDate FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' AND `pdc`.`boards_1` = 'Yes' ORDER BY `doc_date` DESC")->fetch_assoc();
	
	$getdateover90 = $myquery->query("SELECT min(`doc_date`) as MinDate, max(`doc_date`) as MaxDate FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' AND `over_90` !='' AND `over_90` > '0' AND `over_90` != '0' AND `pdc`.`bal_due` IS NULL OR `pdc`.`bal_due` != '0' AND `pdc`.`identitydays` = '2'  ORDER BY `doc_date`  DESC")->fetch_assoc();
	
	$getdatepdc = $myquery->query("SELECT min(`cheque_date`) as MinDate, max(`cheque_date`) as MaxDate FROM `pdc` WHERE `custo_noo` ='$id' AND `cheque_date`!= ''")->fetch_assoc();

	
		echo "
		<p style='position:absolute; top:97; left:85; border:1px solid black; border-bottom:0; padding:1; padding-right:840; padding-bottom:1; background:#A9A9A9;'>";
		echo " <form action='customercnc.php?id=".$id."' method='POST'>";
			echo "<input type='text' name='custoname' size='14' readonly style='position:absolute;top:13;' height='100' class='addexpo' value='". $rowws['NAMECUST']."' hidden readonly></br>";
			echo "<input type='text' name='custocode' size='14' readonly style='position:absolute;top:13;' height='100' class='addexpo' value='". $rowws['IDCUST']."' hidden readonly></br>";
			echo "<input type='text' name='subcode' size='14' readonly style='position:absolute;top:13;' height='100' class='addexpo' value='". $rowws['subs_code']."' hidden readonly></br>";
			echo "<input type='text' name='termspay' size='14' readonly style='position:absolute;top:13;' height='100' class='addexpo' value='". $rowws['CODETERM']."' hidden readonly></br>";
			echo "<input type='text' name='credlim' size='14' readonly style='position:absolute;top:13;' height='100' class='addexpo' value='". $rowws['cred_limit']."' hidden readonly></br>";
			echo "<input type='datetime' name='asoff' size='14' readonly style='position:absolute;top:0;' height='100' value='". date('Y-m-d H:i:s')."' class='addexpo' hidden readonly></br>";
			
			echo "<input type='text' name='currenta' size='14' readonly style='position:absolute;top:13; width:115;' height='100' class='addexpo' value='". $sum_current."'></br>";
			echo "<input type='text' 	size='14' readonly style='position:absolute;top:13; border:1px solid red; padding-bottom:2px;  width:115; padding-right:2px;' height='100' class='addexpo' value='". "₱". number_format((float)$sum_current)."'></br>";

				
				if($getdatecur['MaxDate'] != null) {
					echo "<input type='text' name='currentad' tabindex='1' placeholder='Current Date'  autocomplete='off' value='".date('m/d', strtotime($getdatecur['MinDate'])). "-".date('m/d', strtotime($getdatecur['MaxDate'])). "'  style='width:100; text-align:center; position:absolute; top:13; left:320' size ='12' maxlength='15'>";
				}
				else {
					echo "<input type='text' name='currentad' tabindex='1' placeholder='Current Date'  autocomplete='off' style='width:100; text-align:center; position:absolute; top:13; left:320' size ='12' maxlength='15'>";
					
				}
				
				
			echo "<input type='text' name='overduea' size='14' readonly style='position:absolute;top:43; width:115;' class='addexpo' value='".$sumoverdue."'></br>";
			echo "<input type='text' 	size='14' readonly style='position:absolute;top:43; width:115; border:1px solid blue; padding-bottom:2px;  padding-right:2px;' class='addexpo' value='". "₱".number_format((float)$sumoverdue)."'></br>";
				
				if($getdateover['MinDate'] != null) {
					echo "<input type='text' name='overduead' tabindex='2' placeholder='Overdue Date'  autocomplete='off'  value='".date('m/d', strtotime($getdateover['MinDate'])). "-".date('m/d', strtotime($getdateover['MaxDate'])). "' style='width:100; text-align:center; position:absolute; top:43; left:320' size ='12' maxlength='15'>";
				}
				else {
					echo "<input type='text' name='overduead' tabindex='2' placeholder='Overdue Date'  autocomplete='off' style='width:100; text-align:center; position:absolute; top:43; left:320' size ='12' maxlength='15'>";
				}
			echo "<input type='text' name='boardsover' size='14' readonly style='position:absolute;top:71; width:115;' class='addexpo' value='".$sum_boards."'></br>";
			echo "<input type='text' 	size='14' readonly style='position:absolute;top:71; width:115; border:1px solid brown; padding-bottom:2px;  padding-right:2px;' class='addexpo' value='". "₱".number_format((float)$sum_boards)."'></br>";
				if($getdateboards['MinDate'] != null) {
					echo "<input type='text' name='overdueboards' tabindex='2' placeholder='Overdue Date'  autocomplete='off'  value='".date('m/d', strtotime($getdateboards['MinDate'])). "-".date('m/d', strtotime($getdateboards['MaxDate'])). "' style='width:100; text-align:center; position:absolute; top:73; left:320' size ='12' maxlength='15'>";
				}
				else {
					echo "<input type='text' name='overdueboards' tabindex='2' placeholder='Overdue Boards'  autocomplete='off' style='width:100; text-align:center; position:absolute; top:73; left:320' size ='12' maxlength='15'>";
				}
			echo "<input type='text' name='over90a'  size='14' readonly style='position:absolute;top:100; width:115;' class='addexpo' value='".$sum_over90."'></br>";
			echo "<input type='text'	 size='14' readonly style='position:absolute;top:100; width:115; border:1px solid green; padding-bottom:2px;  padding-right:2px;' class='addexpo' value='". "₱". number_format((float)$sum_over90)."'></br>";
				
		
				if($getdateover90['MaxDate'] != null) {
					echo "<input type='text' name='over90ad' tabindex='3' placeholder='Over 90 Date'  autocomplete='off'  value='".date('m/d', strtotime($getdateover90['MinDate'])). "-".date('m/d', strtotime($getdateover90['MaxDate'])). "' style='width:100; position:absolute;top:100; text-align:center; left:320;' size ='12' maxlength='15'>";			
				}
				
				else {
					echo "<input type='text' name='over90ad' tabindex='3' placeholder='Over 90 Date'  autocomplete='off' style='width:100; position:absolute;top:100; left:320;' size ='12' maxlength='15'>";	
				}
				
			echo "<input type='text' name='pdca' size='14' readonly style='position:absolute;top:15; left:595; width:120;' class='addexpo' value='".$total_pdco."'></br></br>";
			echo "<input type='text' 	size='14' readonly style='position:absolute;top:15; left:595; width:120;' class='addexpo' value='".  "₱".number_format((float)$total_pdco)."'></br></br>";
				if($getdatepdc['MaxDate'] != null) {
					echo "<input type='text' name='pdcad' tabindex='4' placeholder='PDC Onhand Date'  autocomplete='off'  value='".date('m/d', strtotime($getdatepdc['MinDate'])). "-".date('m/d', strtotime($getdatepdc['MaxDate'])). "' style='width:100; position:absolute;top:15; left:720;' size ='12' maxlength='15'>";			
				}
				else {
					echo "<input type='text' name='pdcad' tabindex='3' placeholder='PDC Onhand Date'  autocomplete='off' style='width:100; position:absolute;top:15; left:720;' size ='12' maxlength='15'>";	
				}
			
			echo "<input type='text' name='totalexpo' size='14' readonly style='position:absolute;top:43; left:595; width:160;' class='addexpo' hidden value='". $total_expo."'></br></br>";
			echo "<input type='text' size='14' readonly style='position:absolute;top:43; left:595; width:120;' class='addexpo' value='". "₱". number_format((float)$total_expo)."'></br></br>";
			
			echo "<p style='position:absolute; top:195; left:710; width:160; border:1px solid black; padding:7; text-align:center; background:white;'><a href='pastexposure.php?id=".$id."'>See Past Exposure </p></a>";
			echo "<input type='submit' name='postexpo' style='position:absolute; top:210; left:630; height:30; width:60;' value='POST'>";
		echo "</form></p>"	;
		//----------------------------
	echo "<p style='position:absolute; background-color:#778899; padding:150; padding-right:800; top:235; left:20;' >.</p>";
}	 
?>

<div id="Listcompany">
	
	
	<ul>
		<li class="customer">Customer
	<ul>
	</ul>
	</ul>
	
	<div id="moveexpo">
	<ul>
		<li class="currentacc">Current Account
	<ul>
	</ul>
	</ul>
	
	<ul>
		<li class="overdueacc">Overdue Account
	<ul>
	
	</ul>
	</ul>
	
	<ul>
		<li class="pdcon">Over 90 Days
	<ul>
	
	</ul>
	</ul>
	
	<ul>
		<li class="totalexpo">PDC Onhand
	<ul>
		
	</ul>
	</ul>
	
	<ul>
		<li class="totalex">Total Exposure
	<ul>
	</ul>
	</ul>
	
	<ul>
		<li class="boardover">Boards
	<ul>
	</ul>
	</ul>
	
	</div>
	
	<div id="movedetails">
	
	<ul>
		<li class="afflcode">Subsidiary Code
	<ul>
		
	</ul>
	</ul>
	
	<ul>
		<li class="custocode">Customer Code
	<ul> 
		
	</ul>
	</ul>
	
	<ul>
		<li class="credli">Credit Limit
	<ul>
	</ul>
	</ul>
	
	</ul>
	</ul>
	<ul>
		<li class="ewt">EWT Percent
	<ul>
	</ul>
	</ul>
	
	<ul>
		<li class="termsp">Credit Terms
	<ul>
		
	</ul>
	</ul>
	
	</div>
	
</div>


<?php
	
	if (isset($_GET['id'])) {
		
		$clixiddetails = mysqli_real_escape_string($myquery, $_GET['id']);
		include 'dbcreate.php';
		$sqlquery_details = "Select * FROM `customerdetails` WHERE `IDCUST` = '$clixiddetails'";
		$querydetails = $myquery->query($sqlquery_details);
		
		$roww = $querydetails->fetch_assoc();
		
		echo "<div id='moveres-details'>";
			echo "<div id='termsp'>".
					$roww ['CODETERM'].		
				"</div>";
			echo "<div id='custono'>".
					$roww ['IDCUST'].		
				"</div>";
			echo "<div id='subscode'>".
					$roww ['subs_code'].		
				"</div>";
			echo "<div id='ewtper'>".
					$roww ['ewtpercentt'].		
				"</div>";
			echo "<div id='credl'>".
					number_format((float)$roww['cred_limit']).		
				"</div>";
		echo "</div>";

		echo "<a href='branchesexpo.php?subs=".$roww['subs_code']."'><input type='submit' style='position:absolute; top:20; color:red; left:1100; height:30; width:120;' value='See Subsidiaries'></a>";
	
	}
	
if(isset($_POST['postexpo'])) {
	
	include 'dbcreate.php';
	$custocode = mysqli_real_escape_string($myquery, $_POST['custocode']);
	$subcode = mysqli_real_escape_string($myquery, $_POST['subcode']);
	$custoname = mysqli_real_escape_string($myquery, $_POST['custoname']);
	$credlim = mysqli_real_escape_string($myquery, $_POST['credlim']);
	$termspay = mysqli_real_escape_string($myquery, $_POST['termspay']);
	$asoff = mysqli_real_escape_string($myquery, $_POST['asoff']);
	$currenta = mysqli_real_escape_string($myquery, $_POST['currenta']);
	$currentad = mysqli_real_escape_string($myquery, $_POST['currentad']);
	$overduea = mysqli_real_escape_string($myquery, $_POST['overduea']);
	$overduead = mysqli_real_escape_string($myquery, $_POST['overduead']);
	$over90a = mysqli_real_escape_string($myquery, $_POST['over90a']);
	$over90ad = mysqli_real_escape_string($myquery, $_POST['over90ad']);
	$pdca = mysqli_real_escape_string($myquery, $_POST['pdca']);
	$pdcad = mysqli_real_escape_string($myquery, $_POST['pdcad']);
	$totalexpo = mysqli_real_escape_string($myquery, $_POST['totalexpo']);
	
	$querypost=$myquery->query("INSERT INTO `invoice`(`custo_code`, `subsi_code`, `customer_n`, `credi_line`, `terms_pay`, `as_of`, 
						`current_account`, `date_current`, `overdue`, `date_overdue`, `over_90`, `over90_date`, `pdc_onhand`, `date_pdc`, `total_expo`) 
						VALUES 
						('$custocode','$subcode','$custoname','$credlim','$termspay','$asoff','$currenta','$currentad',
						'$overduea','$overduead','$over90a','$over90ad','$pdca','$pdcad','$totalexpo')");
			if ($querypost = TRUE) {
				
				echo "<p style='position:absolute; top:90; left:775; border:1px solid black; background:white; color:red; padding:2px;'> Success! </p>";
			}
			else {
				echo "Error!";
			}

}
?>


</body>
</html>



