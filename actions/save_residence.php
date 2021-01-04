<?php 
    
  $conn = mysqli_connect('localhost' , 'root' , '', 'bms');
  $residenceID = "";
  $FirstName = "";
  $MiddleName = "";
  $LastName = "";
  $Age = "";
  $Gender = "";
  $Month = "";
  $Day = "";
  $Year = "";
  $Address = "";
  $Birthplace = "";
  $Contact = "";
  $Email = "";
  $CivilStatus = "";
  $area = "";
  $VoterStatus = "";
  $edit_state = false;

  $errors = array();
  

  
  
//student registration
    if (isset($_POST ['save']))
    { 
    $profile_image = mysqli_real_escape_string($conn, $_FILES['profileImage']['name']);
    $FirstName = mysqli_real_escape_string($conn, $_POST ['FirstName']);
    $MiddleName = mysqli_real_escape_string($conn, $_POST ['MiddleName']);
    $LastName = mysqli_real_escape_string($conn, $_POST ['LastName']);
 
    $Gender = mysqli_real_escape_string($conn, $_POST ['Gender']);
    $Month = mysqli_real_escape_string($conn, $_POST ['Month']);
    $Day = mysqli_real_escape_string($conn, $_POST ['Day']);
    $Year = mysqli_real_escape_string($conn, $_POST ['Year']);
    $Address = mysqli_real_escape_string($conn, $_POST ['Address']);
    $BirthPlace = mysqli_real_escape_string($conn, $_POST ['BirthPlace']);
    $Contact = mysqli_real_escape_string($conn, $_POST ['Contact']);
    $Email = mysqli_real_escape_string($conn, $_POST ['Email']);
    $area = mysqli_real_escape_string($conn, $_POST ['area']);
    $CivilStatus = mysqli_real_escape_string($conn, $_POST ['CivilStatus']);
    $VoterStatus = mysqli_real_escape_string($conn, $_POST ['VoterStatus']);

    $check = mysqli_query($conn, "SELECT * FROM residences where FirstName = '$FirstName' and LastName = '$LastName'");
    $checkrows = mysqli_num_rows($check);
      if ($checkrows > 0) {
         echo "<script type=\"text/javascript\">". "alert('Already Exist'); window.history.go(-1);" . "</script>";
      }
     

    /*   if (!preg_match("/^[a-zA-Z\s]+$/", $FirstName)) {
           echo "<script type=\"text/javascript\">". "alert('Please Enter Letters Only'); window.history.go(-1);" . "</script>";
          }
           
           if (!preg_match("/^[a-zA-Z\s]+$/", $LastName)) {
           echo "<script type=\"text/javascript\">". "alert('Please Enter Letters Only'); window.history.go(-1);" . "</script>";
          }
           
          if (!preg_match('/^[0-9]*$/', $Contact)) {
           echo "<script type=\"text/javascript\">". "alert('Please Enter Numbers Only'); window.history.go(-1);" . "</script>";
          }*/
         /* //check length of the contact
          if (strlen($Contact)<11) {
            echo "<script type=\"text/javascript\">". "alert('Your Mobile Number is too Short'); window.history.go(-1);" . "</script>";
          }
          if (strlen($Contact)>11) {
            echo "<script type=\"text/javascript\">". "alert('Your Mobile Number is too Large'); window.history.go(-1);" . "</script>";
          }*/
         /* if(file_exists( "images/" .($_FILES['profileImage']['tmp_name']))) {
           $store = $_FILES['profileImage']['tmp_name'];
           echo "<script type=\"text/javascript\">". "alert('Already Exist');". $store. "</script>";
          //end validation
         }*/
      else
          {
         $target = 'images/' .$profileImageName;
         move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
         $sql = "INSERT INTO residences (residenceID, profile_image, FirstName, MiddleName, LastName, Gender, Month, Day, Year, Address, BirthPlace, Contact, Email, area, CivilStatus, VoterStatus) VALUES ('$residenceID', '$profileImageName' , '$FirstName' , '$MiddleName' , '$LastName', '$Gender', '$Month', '$Day', '$Year', '$Address', '$BirthPlace', '$Contact', '$Email', '$area','$CivilStatus',  '$VoterStatus')";

      
          $result = mysqli_query($conn,$sql) or die('Error querying database.');
          if ($result) {    
           //insert process method
           $process_name = $_POST['process_name'];
           $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Added Residence Information')";
           $proc_result = mysqli_query($conn,$proc_sql);     
            move_uploaded_file($_FILES['profileImage']['tmp_name'], "actions/images/".$_FILES['profileImage']['name']);
            echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
          }
     
      
  $residenceID = "";
  $FirstName = "";
  $MiddleName = "";
  $LastName = "";
  $Age = "";
  $Gender = "";
  $Month = "";
  $Day = "";
  $Year = "";
  $Address = "";
  $Birthplace = "";
  $Contact = "";
  $Email = "";
  $CivilStatus = "";
  $VoterStatus = "";
      
    }
      
      }

/*//Store Blotter records
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
      $b_date = date('Y-m-d', strtotime($_POST['b_date']));
      $b_time = $_POST ['b_time'];
      $blotterType = $_POST ['blotterType'];
      $compStatement = $_POST ['compStatement'];
      $resStatement = $_POST ['resStatement'];
      $status = $_POST ['status'];

      $query = "INSERT IGNORE INTO blotter_records(compFname, compAge, compGender, compNat, compAddress, residence_id, respondent_Fullname, resAge, resGender, resNat, resAddress, b_date, b_time, blotterType, compStatement, resStatement, status) VALUES ('$compFname', '$compAge', '$compGender', '$compNat', '$compAddress', '$residence_id', '$respondent_Fullname', '$resAge', '$resGender', '$resNat', '$resAddress', '$b_date', '$b_time', '$blotterType', '$compStatement', '$resStatement', 'ongoing')";

     $blt_result = mysqli_query($conn,$query);

      if ($blt_result) {
         //insert process method
           $process_name = $_POST['process_name'];
           $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Added Blotter Record')";
        echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
      }
      else {
          echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
      }

      
      }*/




      //OTHER CASE RECORDS
      if (isset($_POST['save_other_case'])) {
        $residence_id = $_POST['residence_id'];
        $susp_fullname = $_POST['susp_fullname'];
        $susp_age = $_POST['susp_age'];
        $susp_gender = $_POST['susp_gender'];
        $susp_nat = $_POST['susp_nat'];
        $susp_address = $_POST['susp_address'];
        $c_date = date('Y-m-d', strtotime($_POST['c_date']));
        $r_time = $_POST['r_time'];
        $record_type = $_POST['record_type'];
        $susp_statement = $_POST['susp_statement'];
      


        $case_query = "INSERT IGNORE INTO case_records(residence_id, susp_fullname, susp_age, susp_gender, susp_nat, susp_address, c_date, r_time, record_type, susp_statement, active) VALUES('$residence_id', '$susp_fullname', '$susp_age', '$susp_gender', '$susp_nat', '$susp_address', '$c_date', '$r_time', '$record_type', '$susp_statement', 'Active')";

        $case_result = mysqli_query($conn,$case_query);

      if ($case_result) {
        echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
      }
      else {
          echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
      }
      }

     
   ?>
