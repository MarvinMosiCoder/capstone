<?php 
require_once 'db_connect.php'; 
 

if(isset($_POST['update']))
    { 
    $residenceID =$_POST ['residenceID'];
    $profile_image = $_FILES['profileImage']['name'];
    $FirstName =$_POST ['FirstName'];
    $MiddleName =  $_POST ['MiddleName'];
    $LastName =  $_POST ['LastName'];
    /*$Age = $_POST ['Age'];*/
    $Gender =  $_POST ['Gender'];
    $Month = $_POST ['Month'];
    $Day = $_POST ['Day'];
    $Year = $_POST ['Year'];
    $Address = $_POST ['Address'];
    $BirthPlace = $_POST ['BirthPlace'];
    $Contact = $_POST ['Contact'];
    $Email = $_POST ['Email'];
    $area = $_POST ['area'];
    $CivilStatus = $_POST ['CivilStatus'];
    $VoterStatus = $_POST ['VoterStatus'];


    $sql = "UPDATE residences SET profile_image = '$profile_image', FirstName = '$FirstName', MiddleName = '$MiddleName', LastName = '$LastName', Gender = '$Gender', Month = '$Month', Day = '$Day', Year = '$Year', Address = '$Address', BirthPlace = '$BirthPlace', Contact = '$Contact', Email = '$Email', area = '$area', CivilStatus = '$CivilStatus', VoterStatus = '$VoterStatus' WHERE residenceID = '$residenceID' ";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        //insert process method
        $process_name = $_POST['process_name'];
        $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Updated Residence Information')";
        $proc_result = mysqli_query($conn,$proc_sql);
        //upload image
            move_uploaded_file($_FILES['profileImage']['tmp_name'], "images/".$_FILES['profileImage']['name']);
            echo "<script type=\"text/javascript\">". "alert('Update Success'); window.history.go(-2);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Update Failed'); window.history.go(-2);" . "</script>";
          }
}

?>