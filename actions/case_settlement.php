<?php 
   $conn = mysqli_connect('localhost' , 'root' , '', 'bms');

   if (isset($_POST['send_case_report'])) {
     $case_id = $_POST['case_id'];
     $status = $_POST['status'];
     $sql = "UPDATE case_records SET active = '$status' 
     WHERE case_id = '$case_id'";
     $result = mysqli_query($conn,$sql);
    if ($result) {
           $case_id = $_POST['case_id'];
           $residence_id = $_POST['residence_id'];
           $record_type = $_POST['record_type'];
           $status = $_POST['status'];
           $date_hearing = date('Y-m-d', strtotime($_POST['date_hearing']));
           $officer = $_POST['officer'];
           $case_settle = "INSERT INTO case_history(case_id, residence_id, record_type, status, date_hearing, officer) VALUES ('$case_id', '$residence_id', '$record_type', '$status' ,'$date_hearing','$officer')";
           $case_result = mysqli_query($conn, $case_settle);

            echo "<script type=\"text/javascript\">". "alert('Schedule Set'); window.history.go(-1);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Failed to Set'); window.history.go(-1);" . "</script>";
          }
   
  }
      
 ?>