<?php include('includes/header.php'); ?>
<style>
  .display {
   padding: 1em 1em;
   cursor: pointer;
  }
</style>
  

    <!-- jQuery UI -->
    <link href='jquery-ui/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui/jquery-ui.min.js' type='text/javascript'></script>
<link href="jquery-ui/jquery-ui.min.css" rel="stylesheet">
<section>
  <div class="container-fluid"> 
  <div class="reg-form"> 
    <div class="row">
      <div class="col-md-6">
        <h3>Complainant</h3>

         <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>

        <form class="cmxform form-horizontal style-form" method="post" action="actions/save_blotter_record.php">

          <!-- add user's activity -->
          <input type="text" name="process_name" value="<?php echo $login_user;?>" style="display: none;">
      
       <div class="form-group">
      <label for="FirstName" class="control-label col-lg-12">Name OF Complainant</label>
      <div class="col-lg-12">
        <input type="text" name="compFname" class="form-control"  placeholder="Enter Fullname"/>
        
      </div>
      </div>

      <div class="form-group">
        <label for="Age" class="control-label col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="compAge" class="form-control" placeholder="Enter AGe">
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="compGender" required/>  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
    <div class="form-group">
        <label for="NAT" class="control-label col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="compNat" class="form-control" placeholder="Enter Nat" required/>
      </div>
    </div>

    <div class="form-group">
        <label for="Address" class="control-label col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="compAddress" class="form-control" placeholder="Enter Address" required/></textarea>
      </div>
    </div>

  </div>

    <div class="col-md-6">
      <h3>Respondent</h3>
      <div class="form-group">
      <label for="" class="control-label col-lg-12">Respondent Reg_Entry</label>
      <div class="col-lg-12">
        <input type="text" name="residence_id" id="selectuser_id" class="form-control"  />
      </div>
      </div>
    <div class="form-group">
      <label for="autocomplete" class="control-label col-lg-12">Name OF Respondent</label>
      <div class="col-lg-12">
        <input type="text" name="respondent_Fullname" id="autocomplete" class="form-control input-lg" >
      </div>
      </div>

    <div class="form-group">
      <label for="" class="control-label col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="resAge" class="form-control" placeholder="Enter Age">
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="resGender">  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
       <div class="form-group">
      <label for="" class="control-label col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="resNat" class="form-control" placeholder="Enter Nat">
      </div>
      </div>
      <div class="form-group">
        <label for="Address" class="control-label col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="resAddress" class="form-control" placeholder="Enter Address"></textarea>
      </div>
    </div>

      
  
    </div>
  </div>
    </div><!--first col-->

    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
      <label for="" class="control-label col-lg-12">Serial Number</label>
        <div class="col-lg-12">
        <input type="text" name="serial_number" class="form-control" placeholder="Enter Serial Number" required/>
      </div>
      </div>
       <div class="form-group">
      <label for="" class="control-label col-lg-12">Date of Incedent</label>
        <div class="col-lg-12">
        <input type="text" id="blotter_datepicker" name="b_date" class="form-control" placeholder="" required/>
      </div>
      </div>

      <div class="form-group">
      <label for="" class="control-label col-lg-12">Time of Incedent</label>
        <div class="col-lg-12">
        <input type="time" name="b_time" class="form-control" placeholder="Enter Cellphone Number" required/>
      </div>
      </div>
</div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Blotter Type</label>
        <div class="col-lg-12">
        <input type="text" name="blotterType" class="form-control" placeholder="Enter blotter type">
      </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Location</label>
        <div class="col-lg-12">
        <input type="text" name="location" class="form-control" placeholder="Enter location">
      </div>
      </div>
      
  </div>
  
 
    </div>
  </div>
    </div><!--first col-->
    <hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Complainant Statement</label>
        <div class="col-lg-12">
        <textarea class="form-control" name="compStatement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    </div>     
      
</div>

<hr>
<hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Respondent Statement</label>
        <div class="col-lg-12">
        <textarea class="form-control" name="resStatement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    </div>      
      
</div>

<hr>
        
        <div class="form-group">
          <div class="container">
           <button type="submit" name="saveBlotter" class="btn btn-primary" value="Save"> <i class="fa fa-save"></i> Save Blotter Records</button>
          </div>
        </div>
          
    </form>   

    </div>     
      </div>
   </div><!--con-fluid-->
</section>

<script src="jquery-ui/jquery-ui.min.js" type='text/javascript'></script>
  <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "autocomplete.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "fetchData.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                var terms = split( $('#multi_autocomplete').val() );
                
                terms.pop();
                
                terms.push( ui.item.label );
                
                terms.push( "" );
                $('#multi_autocomplete').val(terms.join( ", " ));

                // Id
                var terms = split( $('#selectuser_ids').val() );
                
                terms.pop();
                
                terms.push( ui.item.value );
                
                terms.push( "" );
                $('#selectuser_ids').val(terms.join( ", " ));

                return false;
            }
           
        });
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script>
<!-- jQeury datepicker -->
<script>
   $(function() {
    $("#blotter_datepicker").datepicker();
   })
 </script>