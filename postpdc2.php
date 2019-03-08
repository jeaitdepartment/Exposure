<html>
<head>
	<link rel="stylesheet" type="text/css" href="new.css">
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
  $(".checkbox1").on("change", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.pdcc').val($this.find('.si2').val())

    } else {
      $this.find('.pdcc').val('');
      $this.find('.pdcc').attr("placeholder", "0");

    }
	
  });
  
  $(".checkbox2").on("change", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.si3').val($this.find('.si2').val())

    } else {
      $this.find('.si3').val('');
      $this.find('.si3').attr("placeholder", "0");

    }
	
  });

});
</script>
	
</head>
<body>

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
	include 'dbcreate.php';
	$id = mysqli_real_escape_string($myquery, $_GET['id']);
	
	if (isset($_POST['tryit'])) {
				
				$subs = mysqli_real_escape_string($myquery, $_POST['subs']);
				$divi = mysqli_real_escape_string($myquery, $_POST['divi']);
				$creds = mysqli_real_escape_string($myquery, $_POST['creds']);
				$codeterm = mysqli_real_escape_string($myquery, $_POST['codeterm']);
				$ewtp = mysqli_real_escape_string($myquery, $_POST['ewtp']);
				
				
				include 'dbcreate.php';	
				
				//update details
				$queryupdate = "UPDATE `customerdetails` SET `CODETERM`= '$codeterm',`cred_limit`= '$creds',
											`subs_code`= '$subs', `ewtpercentt` ='$ewtp' WHERE `clixidcustomer` = '$divi' ";
					
					if ($myquery->query($queryupdate)) {
						
						echo "<p style='position:absolute; left:750; top:90; color:red; background:white; padding:3px;' > Updated! </p> ";
					}
					else {
						echo "Fail";
					}
				//-----------------------------------
				
				//invoice update
				$queryupdate2 = $myquery->query("UPDATE `invoice` SET `terms_pay`= '$codeterm',`credi_line`= '$creds',
											`subsi_code`= '$subs' WHERE `custo_code` = '$id' ");	
				//-------------------------
			}
}

//----------------------------------------------------Display Table 

if(isset($_GET['id'])) {
	require 'dbcreate.php';
	$id = mysqli_real_escape_string($myquery, $_GET['id']);
	
	//-------------LINK
	echo "<p style='position:absolute; border:1px solid black; background:white; padding:10; left:100; top:-10;'><a href='customercnc.php?id=".$id."'> Back to company </p></a>";
	echo "<p style='position:absolute; border:1px solid black; background:white; padding:10; left:230; top:-10;'><a href='postpdc.php?id=".$id."'> Add Payment </p></a>";
	//------------

	
	$details = $myquery->query("Select * FROM `araging` WHERE `customer_no` = '$id' ORDER BY `doc_date` DESC");
	$display = $details->fetch_assoc();	
	
    $result = $myquery->query("SELECT * FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' ORDER BY `doc_date` DESC ");
	
	while($data = $result->fetch_assoc()) {
	
	}
	include 'varcompany2.php';
	

}	 
?>

<div id="Listcompany">
	
	<ul>
		<li class="customer">Customer
	<ul>
	</ul>
	</ul>
	

	
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


<?php
	
	if (isset($_GET['id'])) {
		
		$clixiddetails = mysqli_real_escape_string($myquery, $_GET['id']);
		
		include 'dbcreate.php';
		
		$sqlquery_details = "Select * FROM `customerdetails` WHERE `IDCUST` = '$clixiddetails'";
		$querydetails = $myquery->query($sqlquery_details);
			
		$roww = $querydetails->fetch_assoc();
		
		
		echo "<form action='postpdc2.php?id=".$clixiddetails."' method='POST'>";
		
			
			echo "<div id='custono'>".
					$roww ['IDCUST'].		
				"</div>";
				
				echo "<input type='text' name='divi' value='" .$roww['clixidcustomer']."' hidden readonly></div>";	
	
				echo "<input type='text' name='subs' style='position:absolute; left:1012; top:111; text-align:center; width:100;' placeholder='Insert affiliates code here' value='" .$roww['subs_code']."'>";
			
				echo "<input type='text' name='creds' style='position:absolute; left:1012; top:143; text-align:center; width:100;' placeholder='Insert credit limit here' value='" .$roww['cred_limit']."'>";
				
				echo "<select name='ewtp' style='position:absolute; left:1012; top:173; text-align:center; width:100;'>
					  <option value=''></option>";
					  
				echo "<option value='1%'"; if (preg_match('/1%/',$roww['ewtpercentt'])) {
											echo 'selected';
											} echo ">1%</option>";
											
				echo "<option value='2%'"; if (preg_match('/2%/',$roww['ewtpercentt'])) {
											echo 'selected';
											} echo ">2%</option>";
											
				echo "<input type='text' name='codeterm' style='position:absolute; left:1012; top:202; text-align:center; width:180;' placeholder='Insert terms of payment here'  value='" .$roww['CODETERM']."'>";
				
			echo "<input type='submit' style='position:absolute; top:67; left:795; height:32; width:32; background-color:white; color:green; font-size:20;' value ='✔' name='tryit' >";
			
		echo "</form>";
		
		
	}


?>


</body>
</html>



