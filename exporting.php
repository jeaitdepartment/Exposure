<?php

	if(isset($_POST['export'])) { 
		include 'dbcreate.php';
		
		$araging = "araging" . date("m-d-Y") . ".csv";
		
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename= '.$araging.'');	
		$output = fopen('php://output', 'w');
		fputcsv($output, array('customer_no', 'customer', 'si_num', 'doc_date', 'due_date', 'current', '1_30', '31_60', '61_90', 'over_90'));	
		mysql_connect('localhost', 'root', '');
		mysql_select_db('cnc');
		$rows = mysql_query('SELECT `customer_no`, `customer`, `si_num`, `doc_date`, `due_date`, `current`, `1_30`, `31_60`, `61_90`, `over_90` FROM `araging`');

		while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
		
		
		$pdcc = "pdc" . date("m-d-Y") . ".csv";
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename= '.$pdcc.'');	
		$output2 = fopen('php://output', 'w');
		fputcsv($output2, array('custo_noo', 'si_numb', 'pdc_amount', 'cash_dtdchck', 'dues_date', 'cheque_date', 'ewtt', 'date_check', 'boards_over', 'remarkss'));	
		mysql_connect('localhost', 'root', '');
		mysql_select_db('cnc');
		$rows2 = mysql_query('SELECT `custo_noo`, `si_numb`, `pdc_amount`, `cash_dtdchck`, `dues_date`, `cheque_date`, `ewtt`, `date_check`, `boards_over`, `remarkss`');

		while ($row2 = mysql_fetch_assoc($rows2)) fputcsv($output2, $row2);
		
		
	

	}



?>

