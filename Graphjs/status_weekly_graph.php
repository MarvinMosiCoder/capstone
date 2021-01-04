<?php
	$conn = new mysqli("localhost", "root", "", "bms");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$weekly = date('d');
	$stats=array();
	for ($month = 1; $month <= 12; $month ++){
		$sub_sql="select  status, count(*) as stats from blotter_records
        RIGHT JOIN settlement_records ON blotter_records.blotter_id = settlement_records.blotterId
		 WHERE prev_status = 'Settled' 
		 AND month(date_hearing) = '$month'
         AND year(date_hearing) = '$year'
		GROUP BY status
		ORDER BY blotter_id ASC
		";
		$query=$conn->query($sub_sql);
		$row=$query->fetch_array();

		$stats[]=$row['stats'];
	}

	$sjan = $stats[0];
	$sfeb = $stats[1];
	$smar = $stats[2];
	$sapr = $stats[3];
	$smay = $stats[4];
	$sjun = $stats[5];
	$sjul = $stats[6];
	$saug = $stats[7];
	$ssept = $stats[8];
	$soct = $stats[9];
	$snov = $stats[10];
	$sdec = $stats[11];
	
    

	
?>