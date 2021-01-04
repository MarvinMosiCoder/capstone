<?php include('includes/sidebar.php'); 
require_once 'actions/db_connect.php';

/*//Update Residence
if(isset($_POST['update']))
    { 
    $residenceID =$_POST ['residenceID'];
    $profile_image = $_FILES['profileImage']['name'];
    $FirstName =$_POST ['FirstName'];
    $MiddleName =  $_POST ['MiddleName'];
    $LastName =  $_POST ['LastName'];
    $Age = $_POST ['Age'];
    $Gender =  $_POST ['Gender'];
    $Month = $_POST ['Month'];
    $Day = $_POST ['Day'];
    $Year = $_POST ['Year'];
    $Address = $_POST ['Address'];
    $BirthPlace = $_POST ['BirthPlace'];
    $Contact = $_POST ['Contact'];
    $Email = $_POST ['Email'];
    $CivilStatus = $_POST ['CivilStatus'];
    $VoterStatus = $_POST ['VoterStatus'];


    $sql = "UPDATE residences SET profile_image = '$profile_image', FirstName = '$FirstName', MiddleName = '$MiddleName', LastName = '$LastName', Age = '$Age', Gender = '$Gender', Month = '$Month', Day = '$Day', Year = '$Year', Address = '$Address', BirthPlace = '$BirthPlace', Contact = '$Contact', Email = '$Email', CivilStatus = '$CivilStatus', VoterStatus = '$VoterStatus' WHERE residenceID = '$residenceID' ";
    $result = mysqli_query($conn,$sql);
    if ($result) {
            move_uploaded_file($_FILES['profileImage']['tmp_name'], "actions/images/".$_FILES['profileImage']['name']);
            echo "<script type=\"text/javascript\">". "alert('Update Success'); window.history.go(-2);" . "</script>";
          } else{
            echo "<script type=\"text/javascript\">". "alert('Update Failed'); window.history.go(-2);" . "</script>";
          }
}
*/

?>

<div class="main">
<section>
  <div class="container-fluid"> 
  <div class="reg-form"> 
      <div class="panel panel-default">
         <div class="panel-heading">Update Personal Information</div>
          <div class="panel-body">
    <div class="row">
      <div class="col-md-4">

        <?php 
  if (isset($_GET['edit'])) {
    $residenceID = $_GET['edit'];

    /*$query = "SELECT * FROM residences WHERE residenceID = $residenceID";
    $query_run = mysqli_query($conn, $query);

    foreach ($query_run as $row) {*/
      $rec = mysqli_query($conn, "SELECT * FROM residences WHERE residenceID = $residenceID");
    $record = mysqli_fetch_array($rec);
    $FirstName = $record ['FirstName'];
    $MiddleName = $record ['MiddleName'];
    $LastName = $record ['LastName'];
    $Gender = $record ['Gender'];
    $Month = $record ['Month'];
    $Day = $record ['Day'];
    $Year = $record ['Year'];
    $Address = $record ['Address'];
    $BirthPlace = $record ['BirthPlace'];
    $Contact = $record ['Contact'];
    $Email = $record ['Email'];
    $area = $record ['area'];
    $CivilStatus = $record ['CivilStatus'];
    $VoterStatus = $record ['VoterStatus'];
    $residenceID = $record ['residenceID'];
  }
      
 ?>
 <!-- fetch data of user -->
 <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
 <form class="cmxform form-horizontal style-form" method="POST" action="actions/update_records.php" enctype="multipart/form-data">
          <!--displaying data of procceser  -->
          <input type="text" name="process_name" value="<?php echo $login_user;?>" style="display: none;">
          <input type="hidden" name="residenceID" class="form-control" placeholder="" value="<?php echo $residenceID; ?>">

                             <input type="file" name="profileImage" id="profileImage"  class="form-control">  
      </div>
      

      <div class="col-md-8">
       <div class="form-group">
      <label for="FirstName" class="control-label col-lg-2">FirstName</label>
      <div class="col-lg-12">
        <input type="text" name="FirstName" class="form-control" placeholder="Enter Firstname" value="<?php echo $FirstName; ?>">
      </div>
      </div>
      
      <div class="form-group">
        <label for="MiddleName" class="control-label col-lg-2">Middlename</label>
        <div class="col-lg-12">
        <input type="text" name="MiddleName" class="form-control" placeholder="Enter Middlename" value="<?php echo $MiddleName; ?>">
      </div>
      </div>
      <div class="form-group">
        <label for="LastName" class="control-label col-lg-2">Lastname</label>
        <div class="col-lg-12">
        <input type="text" name="LastName" class="form-control" placeholder="Enter Lastname" value="<?php echo $LastName; ?>">
      </div>
    </div>
    <!-- <div class="form-group">
        <label for="Age" class="control-label col-lg-2">Age</label>
        <div class="col-lg-12">
        <input type="text" name="Age" class="form-control" placeholder="Enter Age" value="<?php echo $Age; ?>">
      </div>
    </div> -->

    <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-2">Contact</label>
        <div class="col-lg-12">
        <input type="text" name="Contact" class="form-control" placeholder="Enter Cellphone Number" value="<?php echo $Contact; ?>">
      </div>
      </div>

    </div>
  </div>
    </div><!--first col-->
<hr>
<div class="row">
    <div class="col-md-5">     
      <div class="form-group">
      <label for="Birthday" class="control-label col-lg-12">Birthday</label>
      <div class="col-lg-12">
      <span>
      <select name="Month" class="btn btn-default" ">
        <?php for( $m=1; $m<=12; ++$m ) { 
          $month_label = date('F', mktime(0, 0, 0, $m, 1));
        ?>
          <option value="<?php echo $month_label; ?>" <?php if ($Month == $month_label) echo 'selected'; ?>><?php echo $month_label; ?></option>
        <?php } ?>
      </select> 
    </span>
    <span>

    
          <span>
      <select name="Day" class="btn btn-default" value="<?php echo $Day; ?>">
        <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
           ?>

           <option value="<?php echo $j; ?>" <?php if ($Day == $j) echo 'selected'; ?>><?php echo $j; ?></option>

         <?php }?>
      </select>
    </span>

          <span>
      <select name="Year" class="btn btn-default" value="<?php echo $Year; ?>">
        <?php 
          $year = date('Y');
          $min = $year - 60;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
           ?>


           <option value="<?php echo $i; ?>" <?php if ($Year == $i) echo 'selected'; ?>><?php echo $i; ?></option>

         <?php }?>
      </select>
    </span>
    </div>
  </div>
</div>

<div class="col-lg-7">
    <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">BirthPlace</label>
       
        <div class="col-lg-12">
        <input type="text" name="BirthPlace" class="form-control" placeholder="Enter Birth Place" value="<?php echo $BirthPlace; ?>">
      </div>
      </div>

    </div>
    </div><!--2nd col-->
<hr>
<div class="row">
  <div class="container">

  <div class="col-md-3">
    <div class="form-group">
      <label>Gender</label>
      <select class="btn btn-default" name="Gender"  >  
          <option <?php if ($Gender == 'Male') echo 'selected'; ?>>Male</option>
          <option <?php if ($Gender == 'Female') echo 'selected'; ?>>Female</option>
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label>Registered Voter</label>
      <select class="btn btn-default" name="VoterStatus" >  
          <option <?php if ($VoterStatus == 'YES') echo 'selected'; ?>>YES</option>
          <option <?php if ($VoterStatus == 'NO') echo 'selected'; ?>>NO</option>
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label>Civil Status</label>
      <select class="btn btn-default" name="CivilStatus"  >  
          <option <?php if ($CivilStatus == 'Single') echo 'selected'; ?>>Single</option>
          <option <?php if ($CivilStatus == 'Married') echo 'selected'; ?>>Married</option>
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label>Area</label>
      <select class="btn btn-default" name="area"  >  
          <option <?php if ($area == 'Kapitbahayan') echo 'selected'; ?>>Kapitbahayan</option>        
          <option <?php if ($area == 'Phase 1A') echo 'selected'; ?>>Phase 1A</option>
          <option <?php if ($area == 'Phase 1B') echo 'selected'; ?>>Phase 1B</option>
          <option <?php if ($area == 'Phase 1C') echo 'selected'; ?>>Phase 1C</option>
      </select>
    </div>
  </div>

  </div><!-- /container -->
</div><!-- 3rd row -->

<hr>
<div class="row">

   <div class="col-lg-12">
    <div class="form-group">
      <label for="Address" class="control-label col-lg-2">Address</label>
       <div class="col-lg-12">      
        <input type="text" name="Address" class="form-control" placeholder="Enter Address" value="<?php echo $Address; ?>">
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label for="MotherName" class="control-label col-lg-2">Email</label>
      <div class="col-lg-12">     
        <input type="text" name="Email" class="form-control" placeholder="Enter Email" value="<?php echo $Email; ?>">
      </div>
    </div>
  </div>
</div> <!--last row end-->

<hr>

        <div class="form-group">
          <div class="container">
            <button type="submit" name="update" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
          </div>
        </div>
      

      </div>
      <br>
      
    </form>   
 

</div>
</div>
</div><!-- Panel -->
        
    </div>     
      </div>
   </div><!--con-fluid-->
</section>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
       
<script>
  
$('select[name=year]').on('change', function(){
    checkTotalDay();
});
$('select[name=month]').on('change', function(){
    checkTotalDay();
});

function checkTotalDay() {
    var year = $('select[name=year]').val();
    var month = $('select[name=month]').val();
    var totalDate = 31;
    if(year !== '' && month !== '') {
        totalDate = new Date(year, month, 0).getDate();
    }
    $('select[name=date]').empty();
    for(var i = 1; i <= totalDate; i++) {
       $('select[name=date]').append("<option value='"+i+"'>"+i+"</option>");
    }
}

</script>


