<?php   
  if (isset($_GET['edit'])) {
    $residenceID = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT * FROM residence WHERE residenceID = $residenceID");
    $record = mysqli_fetch_array($rec);
    $FirstName = $record ['FirstName'];
    $MiddleName = $record ['MiddleName'];
    $LastName = $record ['LastName'];
    $Age = $record ['Age'];
    $Gender = $record ['Gender'];
    $Month = $record ['Month'];
    $Day = $record ['Day'];
    $Year = $record ['Year'];
    $Address = $record ['Address'];
    $BirthPlace = $record ['BirthPlace'];
    $Contact = $record ['Contact'];
    $Email = $record ['Email'];
    $CivilStatus = $record ['CivilStatus'];
    $VotersStatus = $record ['VotersStatus'];
    $residenceID = $record ['residenceID'];
  }
?>


<section>
  <div class="container-fluid"> 
  <div class="reg-form"> 
    <div class="row">
      <div class="col-md-4">
         <?php include('errors.php')  ?>
         <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
        <form class="cmxform form-horizontal style-form" method="post" action="actions/save_residence.php" enctype="multipart/form-data">
          <!-- add user's activity -->
          <input type="text" name="process_name" value="<?php echo $login_user;?>" style="display: none;">
      <img id="profileDisplay" src="images/avatar.png  " height="250" width="270"> 
      <button onclick="triggerClick()" class="btn btn-default btn-block"><i class="fa fa-save"></i> Upload Picture</button>  
                           <?php if(!empty($msg)): ?>
                            <div class="alert <?php echo $css_class; ?>">
                              <?php echo $msg; ?>
                              
                            </div>
                          <?php endif; ?>
                             <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">  
      </div>
      

      <div class="col-md-8">
       <div class="form-group">
      <label for="FirstName" class="control-label col-lg-2">FirstName</label>
      <div class="col-lg-12">
        <input type="text" name="FirstName" class="form-control" placeholder="Enter Firstname" required>
      </div>
      </div>

      <div class="form-group">
        <label for="MiddleName" class="control-label col-lg-2">Middlename</label>
        <div class="col-lg-12">
        <input type="text" name="MiddleName" class="form-control" placeholder="Enter Middlename">
      </div>
      </div>
      <div class="form-group">
        <label for="LastName" class="control-label col-lg-2">Lastname</label>
        <div class="col-lg-12">
        <input type="text" name="LastName" class="form-control"  placeholder="Enter Lastname" required>
      </div>
    </div>
    <!-- <div class="form-group">
        <label for="Age" class="control-label col-lg-2">Age</label>
        <div class="col-lg-12">
        <input type="text" name="Age" class="form-control" placeholder="Enter Age" required/>
      </div>
    </div> -->

    <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-2">Contact</label>
        <div class="col-lg-12">
        <input type="text" name="Contact" class="form-control"  pattern="[0-9]{11}" placeholder="Enter Cellphone Number" required/>
      </div>
      </div>

    </div>
  </div>
    </div><!--2nd col-->
<hr>
<div class="row">
    <div class="col-md-5">     
      <div class="form-group">
      <label for="Birthday" class="control-label col-lg-12">Birthday</label>
      <div class="col-lg-12">

      <span>
      <select name="Month" class="btn btn-default">
        <?php for( $m=1; $m<=12; ++$m ) { 
          $month_label = date('F', mktime(0, 0, 0, $m, 1));
        ?>
          <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
        <?php } ?>
      </select> 
    </span>
    <span>

    
          <span>
      <select name="Day" class="btn btn-default">
        <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
            echo '<option value='.$j.'>'.$j.'</option>';
          }
        ?>
      </select>
    </span>

          <span>
      <select name="Year" class="btn btn-default">
        <?php 
          $year = date('Y');
          $min = $year - 60;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
            echo '<option value='.$i.'>'.$i.'</option>';
          }
        ?>
      </select>
    </span>

    </div>
  </div>
</div>

<div class="col-lg-7">
    <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">BirthPlace</label>
       
        <div class="col-lg-12">
        <input type="text" name="BirthPlace" class="form-control" placeholder="Enter Birth Place" required/>
      </div>
  
      </div>
    </div>
    </div><!--/2nd col-->
<hr>
<!--3rd col start-->
<div class="row">

  <div class="col-md-3">
      <div class="form-group">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="Gender" required/>  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
      
      <div class="col-md-3">
      <div class="form-group">
      <label for="Gender" class="control-label">VotersStatus</label>
      <select class="btn btn-default" name="VoterStatus" required/>         
          <option>YES</option>
          <option>NO</option>
        </select>
      </div>
    </div>  
    
    <div class="col-md-3">
    <div class="form-group">
      <label for="CivilStatus" class="control-label">CivilStatus</label>
      <select class="btn btn-default" name="CivilStatus" required/>         
          <option>Single</option>
          <option>Married</option>
        </select>
      </div>
    </div>

    <div class="col-md-3">
    <div class="form-group">
      <label for="area" class="control-label">Area</label>
      <select class="btn btn-default" name="area" required/> 
          <option>Kapitbahayan</option>        
          <option>Phase 1A</option>
          <option>Phase 1B</option>
          <option>Phase 1C</option>
        </select>
      </div>
    </div>  

</div><!--/3rd row-end-->
<hr>
<div class="row">

   <div class="col-lg-12">
    <div class="form-group">
      <label for="Address" class="control-label col-lg-2">Address</label>
       <div class="col-lg-12">      
        <input type="text" name="Address" class="form-control" placeholder="Enter Address" required/>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label for="MotherName" class="control-label col-lg-2">Email</label>
      <div class="col-lg-12">     
        <input type="text" name="Email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Email" required/>
      </div>
    </div>
  </div>
</div> <!--last row end-->
 
     
<hr>
        
       <div class="input-group">
        
          <button type="submit" name="save" class="btn btn-primary" value="Save"> <i class="fa fa-save"></i> Save Records</button>
        
          

      </div>

    </form>   
    </div>     
      </div>
   </div><!--con-fluid-->
</section>
</div>
<!--end of main-->

 <script>
    $(document).ready(function() {
      $('#insert').click(function() {
         var image_name = $('#image').val ();
         if (image_name == '') {
            alert("Please Select image");
            return false;
         }
         else {
          var extension = $('#image').val().split('.').pop().toLowerCase();
          if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {
            alert('Invalid Image File');
            $('#image').val('');
            return false;
          }
         }
      });
    });
  </script>
<script>
  $(document).ready(function(){
    $("#numeric").numeric();
  });
</script>
       
    


