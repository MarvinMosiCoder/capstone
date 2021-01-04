<?php 
$conn = mysqli_connect('localhost' , 'root' , '', 'bms');
//Store Blotter records
      if (isset($_POST['saveBlotter'])) {
      $compFname = $_POST['compFname'];
      $compAge =$_POST ['compAge'];
      $compGender =  $_POST ['compGender'];
      $compNat =  $_POST ['compNat'];
      $compAddress = $_POST ['compAddress'];
      $residence_id =  $_POST ['residence_id'];
      $respondent_Fullname =  $_POST ['respondent_Fullname'];
      $resAge = $_POST ['resAge'];
      $resGender = $_POST ['resGender'];
      $resNat = $_POST ['resNat'];
      $resAddress = $_POST ['resAddress'];
      $serial_number = $_POST ['serial_number'];
      $b_date = date('Y-m-d', strtotime($_POST['b_date']));
      $b_time = date('h:i A', strtotime($_POST['b_time']));
      $blotterType = $_POST ['blotterType'];
      $location = $_POST ['location'];
      $compStatement = $_POST ['compStatement'];
      $resStatement = $_POST ['resStatement'];
      

      $query = "INSERT IGNORE INTO blotter_records(compFname, compAge, compGender, compNat, compAddress, residence_id, respondent_Fullname, resAge, resGender, resNat, resAddress, serial_number, b_date, b_time, blotterType, location, compStatement, resStatement, status) VALUES ('$compFname', '$compAge', '$compGender', '$compNat', '$compAddress', '$residence_id', '$respondent_Fullname', '$resAge', '$resGender', '$resNat', '$resAddress', '$serial_number', '$b_date', '$b_time', '$blotterType', '$location', '$compStatement', '$resStatement', 'Pending')";

     $blt_result = mysqli_query($conn,$query);

      if ($blt_result) {
         //insert process method
           $process_name = $_POST['process_name'];
           $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Added Blotter Record')";
           $proc_result = mysqli_query($conn,$proc_sql); 
        echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
      }
      else {
          echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
      }

      
      }

 ?>