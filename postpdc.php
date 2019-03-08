<html>
<head>
	<link rel="stylesheet" type="text/css" href="new.css">
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
  $(".checkbox1").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.pdcc').val($this.find('.siamtt').val())

    } else {
      $this.find('.pdcc').val('');
      $this.find('.pdcc').attr("placeholder", "0");

    }
	
  });
  
  $(".checkbox2").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.datedcash').val($this.find('.siamtt').val())

    } else {
      $this.find('.datedcash').val('');
      $this.find('.datedcash').attr("placeholder", "0");

    }
	
  });
  
  $(".checkbox3").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.pdcc').val($this.find('.pdcc').val() - $this.find('.ewtt2').val())
      $this.find('.ewtt').val($this.find('.ewtt2').val())
	 
    
	  
    } else {
  
	  $this.find('.pdcc').val('');
      $this.find('.pdcc').attr("placeholder", "0",);
      $this.find('.ewtt').val('');

    }
	
  });
  
  $(".checkbox6").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.datedcash').val($this.find('.datedcash').val() - $this.find('.ewtt2').val())
      $this.find('.ewtt').val($this.find('.ewtt2').val())
	 
    
	  
    } else {
  
	  $this.find('.datedcash').val('');
      $this.find('.datedcash').attr("placeholder", "0",);
      $this.find('.ewtt').val('');

    }
	
  });
  
	$(".copysiamt").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.copysifulamt').val($this.find('.sifulamt').val())
      $this.find('.yescopysiamot').val("Yes")
    
	  
    } else {
  
	  $this.find('.copysifulamt').val('');
	  $this.find('.yescopysiamot').val('');
      $this.find('.copysifulamt').attr("placeholder", "0",);
      $this.find('.yescopysiamot').attr("placeholder", "0",);

    }
	
  });
  
   $(".checkbox5").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.datedcash').val($this.find('.datedcash').val() - $this.find('.ewtt2p1').val())
      $this.find('.ewtt2p').val($this.find('.ewtt2p1').val())
	 
    
	  
    } else {
  
	  $this.find('.datedcash').val('');
      $this.find('.datedcash').attr("placeholder", "0",);
      $this.find('.ewtt2p').val('');

    }
	
  });
  $(".checkbox4").on("click", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.pdcc').val($this.find('.pdcc').val() - $this.find('.ewtt2p1').val())
      $this.find('.ewtt2p').val($this.find('.ewtt2p1').val())
	 
    
	  
    } else {
  
	  $this.find('.pdcc').val('');
      $this.find('.pdcc').attr("placeholder", "0",);
      $this.find('.ewtt2p').val('');

    }
	
  });
  
//OVERPAID ----------------------------------------------------------------------
  
   $(document).on('keyup', '.pdcc', function(){
	  var $this = $(this).parent().parent();  
    var num1 = !isNaN(parseInt($this.find('.pdcc').val())) ? parseInt($this.find('.pdcc').val()) : 0;
    var num2 = !isNaN(parseInt($this.find('.siamtt').val())) ? parseInt($this.find('.siamtt').val()) : 0;
	var num3 = !isNaN(parseInt($this.find('.datedcash').val())) ? parseInt($this.find('.datedcash').val()) : 0;
    var sub = num1 - num2 + num3;
    sub = sub < 0 ? 0 : sub;
    $this.find('.overp').val( sub )
})

	$(document).on('keyup', '.datedcash', function(){
	  var $this = $(this).parent().parent();  
    var num1 = !isNaN(parseInt($this.find('.datedcash').val())) ? parseInt($this.find('.datedcash').val()) : 0;
    var num2 = !isNaN(parseInt($this.find('.siamtt').val())) ? parseInt($this.find('.siamtt').val()) : 0;
    var num3 = !isNaN(parseInt($this.find('.pdcc').val())) ? parseInt($this.find('.pdcc').val()) : 0;
    var sub = num1 - num2 + num3;
    sub = sub < 0 ? 0 : sub;
    $this.find('.overp').val( sub )
})

$(document).on('keyup', '.siamtt', function(){
	 var $this = $(this).parent().parent();
    var num1 = !isNaN(parseInt($this.find('.pdcc').val())) ? parseInt($this.find('.pdcc').val()) : 0;
    var num2 = !isNaN(parseInt($this.find('.siamtt').val())) ? parseInt($this.find('.siamtt').val()) : 0;
	var num3 = !isNaN(parseInt($this.find('.datedcash').val())) ? parseInt($this.find('.datedcash').val()) : 0;
    var sub = num1 - num2 + num3;
    sub = sub < 0 ? 0 : sub;
    $this.find('.overp').val( sub )
})

//------------------------------------------------------------------------------
	
  
	  
//Sum totals ---------------------------o---------------------------------

     $(document).click(".datedcash", function() {
		 
		var sum = 0;
		$(".datedcash").each(function(){

			sum += +$(this).val();
		});
			$(".totalcash").val(sum);
	});
	
	$(document).click(".pdcc", function() {
	
    var sum = 0;
		$(".pdcc").each(function(){
			sum += +$(this).val();
		});
			$(".totalpdcc").val(sum);
			
	});
	
//--------------------------------------------------------------------
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

date_default_timezone_set("Asia/Taipei");

	if(isset($_POST['addpay'])) {
		require 'dbcreate.php';
		$sii = mysqli_real_escape_string($myquery, $_POST['si1']);
		$pdcc = mysqli_real_escape_string($myquery, $_POST['pdcc']);
		$cashdated = mysqli_real_escape_string($myquery, $_POST['datedcash']);
		
		//check if pdc with already exist
			$result = ($myquery->query("Select * from pdc where `si_numb` ='$sii'")) or die($myquery->error);				
		
		if($list = mysqli_fetch_array($result, MYSQLI_NUM)) {
	
			echo "<p style= 'position:absolute;
					top:240;
					left:1120;
					font-size:18;
					border:1px solid black;
					background:white;
					padding:1%;
					font-weight:bold;
					color:red;
					'>ERROR!
					</p>";
						
		}elseif ($pdcc < 0 OR  $cashdated < 0) {
			
			echo "<p style= 'position:absolute;
					top:240;
					left:1120;
					font-size:18;
					border:1px solid black;
					background:white;
					padding:1%;
					font-weight:bold;
					color:red;
					'>ERROR!
					</p>";
		}
		//------------------------------//
	else  {		
		require 'dbcreate.php';
		$id = mysqli_real_escape_string($myquery, $_GET['id']);
		$custonoo = mysqli_real_escape_string($myquery, $_POST['custonoo']);
		$sii = mysqli_real_escape_string($myquery, $_POST['si1']);
		$pdcc = mysqli_real_escape_string($myquery, $_POST['pdcc']);
		$cashdated = mysqli_real_escape_string($myquery, $_POST['datedcash']);
		$chequedatee = mysqli_real_escape_string($myquery, $_POST['chequedatee']);
		$ewtt = mysqli_real_escape_string($myquery, $_POST['ewtt']);
		$datecheck = mysqli_real_escape_string($myquery, $_POST['datecheck']);
		$remarkss = mysqli_real_escape_string($myquery, $_POST['remarkss']);
		$baloverp = mysqli_real_escape_string($myquery, $_POST['baloverp']) ;
		$overp = mysqli_real_escape_string($myquery, $_POST['overp']) + $baloverp;
		$copysifulamt = mysqli_real_escape_string($myquery, $_POST['copysifulamt']);
		$yescopysiamot = mysqli_real_escape_string($myquery, $_POST['yescopysiamot']);
		$identitydays = mysqli_real_escape_string($myquery, $_POST['identitydays']);
		$siamtt = mysqli_real_escape_string($myquery, $_POST['siamtt']) - $pdcc - $cashdated - $ewtt ;
		
			
		$sql= "INSERT INTO `pdc`(`custo_noo`,`si_numb`, `pdc_amount`, `cash_dtdchck`,`cheque_date`,`ewtt`,`date_check`,`remarkss`,`boards_over`,`boards_1`,`bal_due`,`identitydays`) 
					VALUES ('$custonoo','$sii','$pdcc','$cashdated','$chequedatee','$ewtt','$datecheck','$remarkss','$copysifulamt','$yescopysiamot','$siamtt','$identitydays')";
		
		$sqloverpaida = $myquery->query("UPDATE `customerdetails` SET `overpaid`='$overp' WHERE `IDCUST` = '$id'");
		
			if ($myquery->query($sql) AND $sqloverpaida == TRUE) {	
		
			echo "<p style= 'position:absolute;
					top:180;
					left:750;
					font-size:18;
					border:1px solid black;
					background:white;
					padding:1%;
					font-weight:bold;
					color:red;
					'>ADDED!
					</p>";
	
			}
		}

	}
	
	if (isset($_POST['editpdc'])) {

		include 'dbcreate.php';
		
		$id = mysqli_real_escape_string($myquery, $_GET['id']);
		$si1 = mysqli_real_escape_string($myquery, $_POST['si1']);
		$pdcbal = mysqli_real_escape_string($myquery, $_POST['pdcbal']);
		$cashcheqbal = mysqli_real_escape_string($myquery, $_POST['cashcheqbal']);
		$sibal = mysqli_real_escape_string($myquery, $_POST['sibal']);
		
		$pdcc = mysqli_real_escape_string($myquery, $_POST['pdcc']) + $pdcbal;	
		$pdcc1 = mysqli_real_escape_string($myquery, $_POST['pdcc']);	
		
		$cashdated = mysqli_real_escape_string($myquery, $_POST['datedcash']) + $cashcheqbal;
		
		$cashdated1 = mysqli_real_escape_string($myquery, $_POST['datedcash']);
		
		$chequedatee = mysqli_real_escape_string($myquery, $_POST['chequedatee']);
		$ewtt = mysqli_real_escape_string($myquery, $_POST['ewtt']);
		
		$remarkss = mysqli_real_escape_string($myquery, $_POST['remarkss']);
		
		$baloverp = mysqli_real_escape_string($myquery, $_POST['baloverp']) ;
		$overp = mysqli_real_escape_string($myquery, $_POST['overp']) + $baloverp ;
		
		$copysifulamt = mysqli_real_escape_string($myquery, $_POST['copysifulamt']);
		$yescopysiamot = mysqli_real_escape_string($myquery, $_POST['yescopysiamot']);
		
		$siamtt = mysqli_real_escape_string($myquery, $_POST['siamtt']) - $pdcc1 - $cashdated1 - $ewtt;
		
		
		$queryupdate = "UPDATE `pdc` SET `pdc_amount`='$pdcc',`cash_dtdchck`='$cashdated', 
							`cheque_date`='$chequedatee',`ewtt`='$ewtt',`remarkss`='$remarkss',`boards_over`='$copysifulamt',
							`boards_1`='$yescopysiamot', `bal_due` = '$siamtt' 
							WHERE `si_numb` = '$si1' ";
			
			if ($pdcc < 0 OR  $cashdated < 0) {
			
			echo "<p style= 'position:absolute;
					top:240;
					left:1120;
					font-size:18;
					border:1px solid black;
					background:white;
					padding:1%;
					font-weight:bold;
					color:red;
					'>ERROR! 
					</p>";
			}
			else 	{
			
			$myquery->query("UPDATE `customerdetails` SET `overpaid`='$overp' WHERE `IDCUST` = '$id' ");
			
			$myquery->query($queryupdate);	
			
			
			echo "<p style= 'position:absolute;
					top:180;
					left:750;
					font-size:18;
					border:1px solid black;
					background:white;
					padding:1%;
					font-weight:bold;
					color:red;
					'>ADDED!!!
					</p>";
			}					
		
	}
	
	if(isset($_POST['upover'])) {
		include 'dbcreate.php';
		
		$id = mysqli_real_escape_string($myquery, $_GET['id']);
		$overpbal = mysqli_real_escape_string($myquery, $_POST['overpbal']);
		
		$myquery->query("UPDATE `customerdetails` SET `overpaid`='$overpbal' WHERE `IDCUST` = '$id' ");
		
	}
	if(isset($_POST['zeroutt'])) {
		include 'dbcreate.php';
		
		$id = mysqli_real_escape_string($myquery, $_GET['id']);
		
		$myquery->query("UPDATE `customerdetails` SET `overpaid`='0' WHERE `IDCUST` = '$id' ");
		
	}


?>

	<table border ="0" cellspacing="1"  cellpadding="2" class="addtable">
		<thead>
			<tr>
			
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:5%;
							background:#20B2AA;
							border:2px solid black;'>Doc Date
													</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:5%;
							background:#20B2AA;
							border:2px solid black;'>SI </br>
													Number</th>
			
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:7%;
							background:#20B2AA;
							border:2px solid black;'>SI Amount</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:7%;
							background:#20B2AA;
							border:2px solid #FFA07A;'>Balance Due</th>		
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:7%;
							background:#87CEEB;
							border:2px solid black;'>ADD NEW Dated Cheque/Cash</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:12%;
							background:#FFF8DC;
							border:2px solid black;
							line-height:-100;'>ADD PDC</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:7%;
							background:#20B2AA;
							border:3px solid #A52A2A;'>EWT</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0; 
							width:7%;
							background:#FFF8DC;
							border:2px solid black;'>Cheque Date</th>							
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:7%;
							background:#20B2AA;
							border:2px solid black;'>Remarks</th>
					<th style='background-color:white; border-top:0;
							border-left:0;
							border-right:0;
							border-bottom:0;
							width:8%;
							background:#20B2AA;
							border:2px solid black;'>Boards</th>	
					

			
			</tr>
		</thead>
		
		<thead>
		<tr>
		<tr>
		
		
<?php
//-----------------------------------ADDING TABLE 
if(isset($_GET['id'])) {
	require 'dbcreate.php';
	$id = mysqli_real_escape_string($myquery, $_GET['id']);
    $result = $myquery->query("SELECT * FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' ORDER BY `doc_date` ASC");
    
	$queryewt = $myquery->query("Select * FROM `customerdetails` WHERE `IDCUST` = '$id'")->fetch_assoc();
	
	$queryewtt = $queryewt['ewtpercentt'];
	
	//-------------LINK
	echo "<p style='position:absolute; border:1px solid black; background:white; padding:10; left:100; top:-10;'><a href='customercnc.php?id=".$id."'> Back to company </p></a>";
	//------------
	
	echo "<form action='postpdc.php?id=".$id."' method='POST'>
			<div style='position:absolute; border:1px solid black; top:120; left:500; background:#DCDCDC; width:300; padding-left:20;'>
				Overpaid:
				<input type='text' id='overpbal' name='overpbal' placeholder='0' value='".$queryewt['overpaid']."' style='height:30;' autocomplete='off' size='10'>
				<input type='submit' name='upover' style='background-color:white; color:green; height:28; width:35;' value ='✔' >
				<input type='submit' name='zeroutt' placeholder='0' value='Zero' style='height:30;' autocomplete='off' size='10'>
			</div>	
		</form>";
	
	while ($data = $result->fetch_assoc()) {
	
		
		// subtract pdc_amount and cash datecheck first
			$total_current = $data['current'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'] ;
			$total_130 = $data['1_30'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_3160 = $data['31_60'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_6190 = $data['61_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$total_over90 = $data['over_90'] - $data['pdc_amount'] - $data['cash_dtdchck'] - $data['ewtt'];
			$try = max($total_current,0) +  max($total_130,0) + max($total_3160,0) + max($total_6190,0) + max($total_over90,0);
			
			$total_current1 = $data['current'];
			$total_1301 = $data['1_30'];
			$total_31601 = $data['31_60'];
			$total_61901 = $data['61_90'];
			$total_over901 = $data['over_90'];
			$try2 = max($total_current1,0) +  max($total_1301,0) + max($total_31601,0) + max($total_61901,0) + max($total_over901,0);
			
		//-----------------
						
		//display in table total sum with max 0
			@$sum_current += max($total_current,0);
			@$sum_130 += max($total_130,0);
			@$sum_3160 += max($total_3160,0);
			@$sum_6190 += max($total_6190,0);
			@$sum_over90 += max($total_over90,0);
			@$total_pdco += $data['pdc_amount'];
			$sumoverdue = $sum_130 + $sum_3160 + $sum_6190;
			$total_expo = $sumoverdue + $sum_current + $sum_over90 + $total_pdco;		
		//-------------------

		//EWT 
			$numberformattry = $try2 / 112;
			$numberformattry2 = $try2 / 112 * 2;
		//-----------------------------------------------
		
		
		$well = $data['si_numb'];											
												
		
					
			
		echo "
		
		<form action='postpdc.php?id=".$id."' method='POST'>
		
			<input type='text' id='pdcbal' name='pdcbal' placeholder='0' value='".$data['pdc_amount']."' autocomplete='off' size='10' hidden readonly >
			<input type='text' id='cashcheqbal' name='cashcheqbal' value='".$data['cash_dtdchck']."' placeholder='0' autocomplete='off' size='10' hidden readonly>
			<input type='text' name='custonoo' id='custonoo' value='".$data['customer_no']."' autocomplete='off' size='10' readonly hidden>
		
		<td style='border:0;'><input type='text' name='doc_datee' id='sinum' value='".date('m-d-Y', strtotime($data['doc_date']))."' style ='width:90; text-align:center; background-color:#F5F5DC;' autocomplete='off' size='10' readonly  ></td>
		<td style='border:0;'><input type='text' name='si1' id='sinum' value='".$data['si_num']."' style ='width:80; text-align:center; background-color:#F5F5DC;' autocomplete='off' size='10' readonly  ></td>
		<td style='border:0;'><input type='text' name='siamt' class='siamt' value='" . "PHP ". str_replace(".00","",number_format($try2, 2, '.', ','))."' autocomplete='off' size='10' style='background-color:#F5F5DC;' readonly  ></td>
		<td style='border:0;'><input type='text' name='sibal' class='sibal' value='"."PHP ". str_replace(".00","",number_format($try, 2, '.',','))."' style='background-color:#F5F5DC;' autocomplete='off' size='10' readonly  ></td>
		<td style='border:0'><input type='text' class='datedcash' id='datedcash' name='datedcash' placeholder='0' autocomplete='off' size='10' ></td>
		<td style='border:0'><input type='text' class='pdcc' name='pdcc' placeholder='0' autocomplete='off' size='10' ></td>
		";
		
		if($queryewtt == '1%' ) {
			
			echo "<td style='border:0'><input type='text' id='ewtt' name='ewtt' class='ewtt' placeholder='1%' autocomplete='off' size='10' ></td>";
			
			}
		elseif($queryewtt == '2%' ) {
			
			echo "<td style='border:0'><input type='text' id='ewtt' name='ewtt' class='ewtt2p' placeholder='2%' autocomplete='off' size='10'  ></td>";
			
			}	
		else {
			echo "<td style='border:0'><input type='text' id='ewtt' name='ewtt' class='ewtt3p' placeholder='' autocomplete='off' size='10'  ></td>";
				
		}
		
		echo "
		
		<td style='border:0'><input type='date' name='chequedatee' value='".$data['cheque_date']."' autocomplete='off' style='width:140;'></td>
		<td style='border:0'><input type='text' id='remarkss' name='remarkss' class='remarkss' placeholder='Remarks' value = '".$data['remarkss']."' style='width:150;' autocomplete='off' size='10'></td>
		
		 
		<td style='border:0'><input type='text' id='overp' name='overp' class='overp' placeholder='overp' autocomplete='off' size='10' readonly hidden></td>
		<td style='border:0'><input type='text' id='baloverp' name='baloverp' class='baloverp' value ='".$queryewt['overpaid']."'placeholder='overp' autocomplete='off' size='10' readonly hidden></td>";
		
		
		echo "
		<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative; outline:1px solid #FFA07A; left:-532; top:20;' class='checkbox1'></td>
		<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative; outline:1px solid #FFA07A; left:-662; top:20;' class='checkbox2'></td>
		
		
		
		
		<td style='border:0'><input type='text' id='ewtt2' name='ewtt2' value='". str_replace(".00","",number_format($numberformattry, 2, '.','')) ."' class='ewtt2' placeholder='0' autocomplete='off' size='10' readonly hidden></td>
		<td style='border:0'><input type='text' id='ewtt2' name='ewtt2p1' value='". str_replace(".00","",number_format($numberformattry2, 2, '.','')) ."' class='ewtt2p1' placeholder='0' autocomplete='off' size='10' readonly hidden></td>
		<td style='border:0px'><input type='text' name='siamtt'  class='siamtt' value='".$try."' autocomplete='off' size='10' hidden></td>
		<td style='border:0px'><input type='text' name='sifulamt'  class='sifulamt' value='".$try2."' autocomplete='off' size='10'  hidden></td>
		<td style='border:0px'><input type='text' name='copysifulamt'  class='copysifulamt' autocomplete='off' size='10' hidden></td>
		<td style='border:0px'><input type='text' name='yescopysiamot'  class='yescopysiamot' autocomplete='off' size='10' hidden></td>
		"; 
			if($well != null) {
				echo "
					<td style='border:0'> <input type='submit' name='editpdc' style='position:relative; left:-80; width:55;' value='Add' style='position:relative;' 
												autocomplete='off'   ></td>";
			}
			else {
				echo "<td style='border:0px solid black;'><input type='submit' name='addpay' value='Add' style='position:relative; left:-80; width:55;' autocomplete='off' size='1000' ></td>";
			}
			
			
			if($queryewtt == '1%' ) {
				echo "<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative; outline:1px solid red; left:-655; top:20;' class='checkbox3'></td>
					<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative; outline:1px solid red; left:-785; top:20;' class='checkbox6'></td>";
			}
			elseif($queryewtt == '2%' ) {
				echo "<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative;  outline:1px solid red; left:-655; top:20;' class='checkbox4'></td>
					<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:relative; outline:1px solid red; left:-785; top:20;' class='checkbox5'></td>";
			}
			else {
				echo "";		
			}
			
			if($data['current'] != '0' AND $data['current'] != null) {
				echo "<td style='border:0px solid black;'><input type='text' name='identitydays' id='identitydays' style='position:absolute; left:1060;; margin-top:-10; width:30px; height:20px;' value ='3' class='identitydays' hidden></td>";
			}
			elseif ($data['over_90'] != '0' AND $data['over_90'] != null) {
				echo "<td style='border:0px solid black;'><input type='text' name='identitydays' id='identitydays' style='position:absolute; left:1060;; margin-top:-10; width:30px; height:20px;' value ='2' class='identitydays' hidden></td>";
			}
			else {
				echo "<td style='border:0px solid black;'><input type='checkbox' name='checkboxee' id='checkboxee' style='position:absolute; left:1030;; margin-top:-10; width:30px; height:20px;' class='copysiamt'></td>";
				echo "<td style='border:0px solid black;'><input type='text' name='identitydays' id='identitydays' style='position:absolute; left:1060;; margin-top:-10; width:30px; height:20px;' value ='1' class='identitydays' hidden></td>";
			}
			
		echo "
		
		<td style='border:0;'><input type='datetime' name='datecheck' class='datecheck' value='". date('Y-m-d H:i:s')."' id='datecheck' style ='width:90; text-align:center; background-color:#F5F5DC;' autocomplete='off' size='10' readonly hidden ></td>
	
				</form>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
			<tr>
					
		</tr> ";		 	 
	 }
	 


}						

?>


<?php

//----------------------------------------------------Display Table 

if(isset($_GET['id'])) {
	require 'dbcreate.php';
	$id = mysqli_real_escape_string($myquery, $_GET['id']);

	
	$details = $myquery->query("Select * FROM `araging` WHERE `customer_no` = '$id' ORDER BY `doc_date` DESC");
	$display = $details->fetch_assoc();	
	
    $result = $myquery->query("SELECT * FROM `araging` LEFT JOIN `pdc` ON `araging`.`si_num`=`pdc`.`si_numb` WHERE `araging`.`customer_no`= '$id' ORDER BY `doc_date` DESC ");
	
	while($data = $result->fetch_assoc()) {
	
	}
	include 'varcompany2.php';
	
	//Get Total Input
	echo "
		<div style='position:absolute; border:1px gray solid; border-right:0; border-left:0; top:120; left:215; background-color:#DCDCDC; padding:60; padding-top:60; padding-right:150; padding-bottom:40;'>
		<p style='position:absolute; top:0; left:25;'>PDC Total</p><input type='text' name='totalpdcc' class='totalpdcc' style='width:100; position:absolute; top:40; right:10;' id='totalpdcc' readonly><br><br>
		<p style='position:absolute; top:55; left:25; width:200;'>Dated Cheque/Cash Total</p><input type='text' name='totalcash' class='totalcash' style='width:100; position:absolute; top:90; right:10;' id='totalcash' readonly>
		</div>
	";
	echo "<a href='postpdc2.php?id=".$id."'><img src='images/edit.jpg' style='position:absolute; top:67; left:755; height:32; width:32;' ></a>";
	//--------------------------------------
}	 
?>


<div id="Listcompany">
	
	<ul>
		<li class="customer">Customer
	<ul>
	</ul>
	</ul>
	
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
	}

		
?>




</body>
</html>



