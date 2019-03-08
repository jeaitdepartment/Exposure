<?php
    require_once ('dbcreate.php');
	
    $customer = $_GET['searchname'];	
    $sql="SELECT DISTINCT `customer` FROM `araging` WHERE `customer` like '$customer%' ORDER By `customer`";
    $result = $myquery->query($sql);
	
    while($row = $result->fetch_assoc()) {
      echo "<option value='".$row['customer']."'>";
    }

?>