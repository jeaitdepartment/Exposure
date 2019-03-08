<?php
	
	
	$rowcustom[] = $display['customer'] ;
	$rows = array_unique($rowcustom);
	
	$rowcustno[] = $display['customer_no'] ;
	$rows2 = array_unique($rowcustno);
	

	
	foreach($rows as $cust){
		
	echo "<div id='customer'>";
	print_r($cust);
	echo "</div>";
	
	}
	
	


?>