<?php
	$conn = new mysqli("localhost", "root", "", "bms");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$weekly = date('d');
	$Kapres=array();
	for ($week1 = 1; $week1 <= 7; $week1 ++){
		$sql="select *, count(residenceID) as Kapres from residences where area = 'Kapitbahayan' and week(date_register) = '$week1' and year(date_register) = '$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Kapres[]=$row['Kapres'];
	}

	$tmon = $Kapres[0];
	$ttues = $Kapres[1];
	$twed = $Kapres[2];
	$tthurs = $Kapres[3];
	$tfri = $Kapres[4];
	$tsat = $Kapres[5];
	$tsun = $Kapres[6];
	


//Phase 1A
	$Phasea=array();
	for ($week2 = 1; $week2 <= 7; $week2 ++){
		$sql="select *, count(residenceID) as Phasea from residences where area = 'Phase 1A' and week(date_register) = '$week2' and year(date_register) = '$year' ";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phasea[]=$row['Phasea'];
	}

	$amon = $Phasea[0];
	$atues = $Phasea[1];
	$awed = $Phasea[2];
	$athurs = $Phasea[3];
	$afri = $Phasea[4];
	$asat = $Phasea[5];
	$asun = $Phasea[6];
	

//Phase1B
	$Phaseb=array();
	for ($week3 = 1; $week3 <= 7; $week3 ++){
		$sql="select *, count(residenceID) as Phaseb from residences where area = 'Phase 1B' and week(date_register) = '$week3' and year(date_register) = '$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phaseb[]=$row['Phaseb'];
	}

	$bmon = $Phaseb[0];
	$btues = $Phaseb[1];
	$bwed = $Phaseb[2];
	$bthurs = $Phaseb[3];
	$bfri = $Phaseb[4];
	$bsat = $Phaseb[5];
	$bsun = $Phaseb[6];

//Phase1C
	$Phasec=array();
	for ($week4 = 1; $week4 <= 7; $week4 ++){
		$sql="select *, count(residenceID) as Phasec from residences where area = 'Phase 1C' and week(date_register) = '$week4' and year(date_register) = '$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$Phasec[]=$row['Phasec'];
	}

	$cmon = $Phasec[0];
	$ctues = $Phasec[1];
	$cwed = $Phasec[2];
	$cthurs = $Phasec[3];
	$cfri = $Phasec[4];
	$csat = $Phasec[5];
	$csun = $Phasec[6];


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