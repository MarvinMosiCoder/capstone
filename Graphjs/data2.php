<?php
	$conn = new mysqli("localhost", "root", "", "bms");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$tblot=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(blotterType) as tblot, blotterType from blotter_records where blotterType = 'Abuse' and month(b_date)='$month' GROUP BY b_date";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$tblot[]=$row['tblot'];
	}

	$tjan = $tblot[0];
	$tfeb = $tblot[1];
	$tmar = $tblot[2];
	$tapr = $tblot[3];
	$tmay = $tblot[4];
	$tjun = $tblot[5];
	$tjul = $tblot[6];
	$taug = $tblot[7];
	$tsep = $tblot[8];
	$toct = $tblot[9];
	$tnov = $tblot[10];
	$tdec = $tblot[11];

	$pyear = $year - 1;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sql="select *, count(blotterType) as ptblot, blotterType from blotter_records where blotterType = 'Mataba' and month(b_date)='$pmonth' GROUP BY b_date";
		$pquery=$conn->query($sql);
		$prow=$pquery->fetch_array();

		$ptblot[]=$prow['ptblot'];
	}
	
	$pjan = $ptblot[0];
	$pfeb = $ptblot[1];
	$pmar = $ptblot[2];
	$papr = $ptblot[3];
	$pmay = $ptblot[4];
	$pjun = $ptblot[5];
	$pjul = $ptblot[6];
	$paug = $ptblot[7];
	$psep = $ptblot[8];
	$poct = $ptblot[9];
	$pnov = $ptblot[10];
	$pdec = $ptblot[11];
?>