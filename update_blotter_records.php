<?php 
   require_once 'actions/db_connect.php';

   if (isset($_GET['edit'])) {
    $blotter_id = $_GET['edit'];
    
     $sql = "UPDATE blotter_records SET status = 'settled' WHERE blotter_id = {$blotter_id}";
     $result = mysqli_query($conn,$sql);
    if ($result) {
            echo "<script type=\"text/javascript\">". "alert('Dismiss Case'); window.history.go(-1);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Failed to Dismiss'); window.history.go(-1);" . "</script>";
          }
   
  }
      
 ?>