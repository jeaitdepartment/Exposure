<html>
<head>

<script src ="jquery-3.2.1.min.js"></script>
<script src ="autocomplete.js"></script> 


<link rel="stylesheet" type="text/css" href="new.css">
<title>Clix.Sys</title>	
</head>
<body>




<div id="searchmove">

	
<div id="searchcompany">	
	<form action="search.php" method="post" name="searching">
		<input type="text" name="searchbox" id="searchcustomers" placeholder="Search Customer Here" list="Customers" required autocomplete="off">
	<datalist id="Customers">
	
	</datalist>
		<input type="submit" name="searchbutton" id="buttonme" value="Search">
		<input type="submit" name="searchbyid" id="button-search-id" style="position:absolute; right:370;" value="Search by customer id">
	</form>
</div>
	

<div class="Manage">
	<table border ="0"cellspacing="3" cellpadding="4" class="tablesearch">
		<thead>
			<tr>
				<th style='
							background-color:white; 							
							border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							text-align:center;
							width:5%'></th>
				<th style='
							background-color:white; 							
							border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							text-align:center;
							width:5%'>Customer No.</th>
				<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							width:5%;
							border-bottom:0;'>Customer</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:5%;'>Credit Line</th>
				<th style='background-color:white;border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:5%;'>Terms Payment</th>

			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>
<?php

include 'dbcreate.php';
	if (isset($_POST['searchbutton'])) 
	{
		include 'dbcreate.php';
	
			
		$valuesearch = mysqli_real_escape_string($myquery, $_POST['searchbox']);
		$disp = $myquery->query("SELECT * FROM `customerdetails` LEFT JOIN `araging` ON `araging`.`customer_no`=`customerdetails`.`IDCUST` WHERE `customer` LIKE '".$valuesearch."%' GROUP BY `customer_no`");

		
		
	while($rows = mysqli_fetch_array($disp))
		{
			echo "<tr>	
				<td class='cent'style='background-color:white;'><a href='postpdc.php?id=".$rows['customer_no']."'>".'ADD PDC' ."</td></a>	
				<td class='cent'style='background-color:white;'>".$rows['customer_no']."</td>			
				<td class='cent'style='background-color:white;'><a href='customercnc.php?id=".$rows['customer_no']."'>".$rows['customer']."</td></a>				
				<td class='cent'style='background-color:white;'>".number_format((float)$rows['cred_limit'])."</td>	
				<td class='cent'style='background-color:white;'>".$rows['CODETERM']."</td>						
			";		
	}
}

	if(isset($_POST['searchbyid'])) {
		
		$valuesearch = mysqli_real_escape_string($myquery, $_POST['searchbox']);
		
			$check = ($myquery->query("SELECT * FROM `araging` WHERE `customer_no` = '".$valuesearch."'")) or die($myquery->error);				
			$list = mysqli_fetch_array($check, MYSQLI_NUM);
		
		if($list [0] > 1) {
	
			header("location: customercnc.php?id=". $valuesearch."");
						
		}
		
		else {
			
			echo "<p style='color:red; position:absolute; top:-55; left:330;'> *Customer code does not exist.</p>";
		}
	
		
			
		
			
	}

?>
			
				
			
			</table>
		</div>
	</div>
</div>
	

</body>
</html>
		
		