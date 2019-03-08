<html>
<head>
<link rel="stylesheet" type="text/css" href="new.css">
<title>Clix.Sys</title>	
</head>
<body>




<div id="outstandingsearchmenu">
	<ul>
		<li><a href="profile.php" >Back to Home Page</a></li>
	<ul>
	
	</ul>
	</ul>
	
</div>


<div class="Manage">
	<table border ="0" cellspacing="3" cellpadding="2" class="tableouts">
		<thead>
			<tr>
				<th style='
							background-color:white; 
							font-size:17;
							width:150;
							'>Customer Number</th>
				<th style='background-color:white; 
							font-size:17;
							width:260;
							'>Customer</th>
				<th style='background-color:white;
							font-size:17;
							width:120;'>SI Num</th>
				<th style='background-color:white;
							width:160;
							font-size:17;'>PDC Amount</th>	
				<th style='background-color:white;
							width:110;
							font-size:17;'>Cheque Date</th>	
				<th style='background-color:white;
							width:160;
							font-size:17;'>Balance Due</th>			
				<th style='background-color:white;
							font-size:17;
							width:110;'>SI Amount</th>	
				<th style='background-color:white;
							width:10;
							font-size:17;'></th>			
				<th style='background-color:white;
							font-size:17;
							width:10;'></th>
	

				
				
	
			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>
<?php



		include 'dbcreate.php';
		
		$disp = $myquery->query("SELECT * FROM `pdc` LEFT JOIN `araging` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE DATE(`cheque_date`) = CURDATE() ORDER BY `doc_date` DESC ");
		
	while($rows = mysqli_fetch_array($disp))
		{
			
		// subtract pdc_amount and cash datecheck first
			$total_current = $rows['current'] - $rows['pdc_amount'] - $rows['cash_dtdchck'];
			$total_130 = $rows['1_30'] - $rows['pdc_amount'] - $rows['cash_dtdchck'];
			$total_3160 = $rows['31_60'] - $rows['pdc_amount'] - $rows['cash_dtdchck'];
			$total_6190 = $rows['61_90'] - $rows['pdc_amount'] - $rows['cash_dtdchck'];
			$total_over90 = $rows['over_90'] - $rows['pdc_amount'] - $rows['cash_dtdchck'];
			$try = max($total_current,0) +  max($total_130,0) + max($total_3160,0) + max($total_6190,0) + max($total_over90,0);
			
			$total_current1 = $rows['current'];
			$total_1301 = $rows['1_30'];
			$total_31601 = $rows['31_60'];
			$total_61901 = $rows['61_90'];
			$total_over901 = $rows['over_90'];
			$try2 = max($total_current1,0) +  max($total_1301,0) + max($total_31601,0) + max($total_61901,0) + max($total_over901,0);
			
		//-----------------
						
		//display in table total sum with max 0
			@$sum_current += max($total_current,0);
			@$sum_130 += max($total_130,0);
			@$sum_3160 += max($total_3160,0);
			@$sum_6190 += max($total_6190,0);
			@$sum_over90 += max($total_over90,0);
			@$total_pdco += $rows['pdc_amount'];
			$sumoverdue = $sum_130 + $sum_3160 + $sum_6190;
			$total_expo = $sumoverdue + $sum_current + $sum_over90 + $total_pdco;			
		//-------------------
		
		echo "<tr>	
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black; color:red'>".$rows['custo_noo']."</td>
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black;'>".$rows['customer']."</td>
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black;'>".$rows['si_numb']."</td>
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black;'>".str_replace(".00","",number_format($rows['pdc_amount'], 2, '.', ','))."</td>
			<td style='background-color:white; text-align:center; font-size:17; border:1px solid black;'><input type='date' name='chequedatee' value='".$rows['cheque_date']."' autocomplete='off' style='width:140;'></td>	
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black;'>".str_replace(".00","",number_format($try, 2, '.', ','))."</td>
			<td class='cent'style='background-color:white; font-size:17; border:1px solid black;'>".str_replace(".00","",number_format($try2, 2, '.', ','))."</td>
			<td style='border:0px solid black;'><input type='submit' name='addpay' value='Delete'  autocomplete='off' size='1000' ></td>
			<td style='border:0px solid black;'><input type='submit' name='addpay' value='Edit'  autocomplete='off' size='1000' ></td>
								
		";			
	}

	 
?>
			
			</tr>
		</thead>
	</table>
</div>
	
			
	
</body>
</html>
		
		