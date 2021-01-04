<?php
	$conn = new mysqli("localhost", "root", "", "bms");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$Kapres=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(residenceID) as Kapres from residences where area = 'Kapitbahayan' and month(date_register)='$month' and year(date_register)='$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Kapres[]=$row['Kapres'];
	}

	$tjan = $Kapres[0];
	$tfeb = $Kapres[1];
	$tmar = $Kapres[2];
	$tapr = $Kapres[3];
	$tmay = $Kapres[4];
	$tjun = $Kapres[5];
	$tjul = $Kapres[6];
	$taug = $Kapres[7];
	$tsep = $Kapres[8];
	$toct = $Kapres[9];
	$tnov = $Kapres[10];
	$tdec = $Kapres[11];


//Phase 1A
	$Phasea=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(residenceID) as Phasea from residences where area = 'Phase 1A' and month(date_register)='$month' and year(date_register)='$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phasea[]=$row['Phasea'];
	}

	$ajan = $Phasea[0];
	$afeb = $Phasea[1];
	$amar = $Phasea[2];
	$aapr = $Phasea[3];
	$amay = $Phasea[4];
	$ajun = $Phasea[5];
	$ajul = $Phasea[6];
	$aaug = $Phasea[7];
	$asep = $Phasea[8];
	$aoct = $Phasea[9];
	$anov = $Phasea[10];
	$adec = $Phasea[11];

//Phase1B
	$Phaseb=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(residenceID) as Phaseb from residences where area = 'Phase 1B' and month(date_register)='$month' and year(date_register)='$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phaseb[]=$row['Phaseb'];
	}

	$bjan = $Phaseb[0];
	$bfeb = $Phaseb[1];
	$bmar = $Phaseb[2];
	$bapr = $Phaseb[3];
	$bmay = $Phaseb[4];
	$bjun = $Phaseb[5];
	$bjul = $Phaseb[6];
	$baug = $Phaseb[7];
	$bsep = $Phaseb[8];
	$boct = $Phaseb[9];
	$bnov = $Phaseb[10];
	$bdec = $Phaseb[11];

//Phase1C
	$Phasec=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(residenceID) as Phasec from residences where area = 'Phase 1C' and month(date_register)='$month' and year(date_register)='$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phasec[]=$row['Phasec'];
	}

	$cjan = $Phasec[0];
	$cfeb = $Phasec[1];
	$cmar = $Phasec[2];
	$capr = $Phasec[3];
	$cmay = $Phasec[4];
	$cjun = $Phasec[5];
	$cjul = $Phasec[6];
	$caug = $Phasec[7];
	$csep = $Phasec[8];
	$coct = $Phasec[9];
	$cnov = $Phasec[10];
	$cdec = $Phasec[11];


	$pyear = $year - 1;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sql="select *, count(residenceID) as totalres from residences where area = 'Phase 1A' and month(date_register)='$month' GROUP BY date_register";
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