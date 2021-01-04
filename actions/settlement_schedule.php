<?php 
   $conn = mysqli_connect('localhost' , 'root' , '', 'bms');

   if (isset($_POST['send_settle'])) {
     $blotter_id = $_POST['blotter_id'];
     $status = $_POST['status'];
     $sql = "UPDATE blotter_records SET status = '$status' WHERE blotter_id = '$blotter_id'";
     $result = mysqli_query($conn,$sql);
    if ($result) {
           $blotter_id = $_POST['blotter_id'];
           $residence_id = $_POST['residence_id'];
           $blotter_type = $_POST['blotter_type'];
           $status = $_POST['status'];
           $date_hearing = date('Y-m-d', strtotime($_POST['date_hearing']));
           $officer = $_POST['officer'];
           $settle_sql = "INSERT INTO settlement_records(blotterId, residence_id, blotter_type, prev_status, date_hearing, officer) VALUES ('$blotter_id', '$residence_id', '$blotter_type', '$status' ,'$date_hearing','$officer')";
           $settle_result = mysqli_query($conn, $settle_sql);

           $settle_history_sql = "INSERT INTO settlement_history(blotterId, residence_id, blotter_type, prev_status, date_hearing, officer) VALUES ('$blotter_id', '$residence_id', '$blotter_type', '$status' ,'$date_hearing','$officer')";
           $settle_result = mysqli_query($conn, $settle_history_sql);
            echo "<script type=\"text/javascript\">". "alert('Schedule Set'); window.history.go(-1);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Failed to Set'); window.history.go(-1);" . "</script>";
          }
   
  }
      
 ?>