<?php 	
$conn = mysqli_connect('localhost' , 'root' , '', 'bms');
 //Save Barangay Offials
      if (isset($_POST['submit_officials'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $offcommitte = $_POST['offcommitte'];
        $position = $_POST['position'];
        
        $check = mysqli_query($conn, "SELECT * FROM officials where fname = '$fname' and lname = '$lname'");
        $checkrows = mysqli_num_rows($check);
        if ($checkrows > 0) {
         echo "<script type=\"text/javascript\">". "alert('Already Exist'); window.history.go(-1);" . "</script>";
      }
        $offial_query = "INSERT INTO officials (fname, mname, lname, offcommitte, position) VALUES ('$fname','$mname','$lname','$offcommitte','$position')";

        $officials_result = mysqli_query($conn,$offial_query);

      if ($officials_result) {
        echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
      }
      else {
          echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
      }
      }

 ?>