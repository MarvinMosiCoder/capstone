<?php include('includes/sidebar.php'); ?>
    <div class="main">
    <!-- Script -->
    <script src='jquery-ui/jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
    <link href='jquery-ui/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui/jquery-ui.min.js' type='text/javascript'></script>
    
<section>
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="text-center">File Blotter Records</h3></div>
    <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Complainant</h3>

         <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>

<form class="cmxform form-horizontal style-form" method="post" action="actions/save_blotter_record.php">
   <input type="text" name="process_name" value="<?php echo $login_user;?>" style="display: none;">
      
       <div class="form-group">
      <label for="" class="col-lg-12">Name OF Complainant</label>
      <div class="col-lg-12">
        <input type="text" name="compFname" class="form-control"   placeholder="Enter Fullname"/>
        
      </div>
      </div>

      <div class="form-group">
        <label for="Age" class="col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="compAge" class="form-control" pattern="[0-9]{2}" placeholder="Enter AGe">
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="">Gender</label>
      <select class="btn btn-default" name="compGender" required/>  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
    <div class="form-group">
        <label for="NAT" class="col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="compNat" class="form-control" placeholder="Enter Nat" required/>
      </div>
    </div>

    <div class="form-group">
        <label for="Address" class="col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="compAddress" class="form-control" placeholder="Enter Address" required/></textarea>
      </div>
    </div>
  </div>


   <div class="col-md-6">
      <h3>Respondent</h3>
     
        <input type='text' id='selectuser_id' name="residence_id" class="form-control" style="display: none;">
      
      <label class="col-lg-11">Respondent Name</label>
      <div class="col-lg-11">
        <input type='text' id='autocomplete' name="respondent_Fullname" class="form-control input-lg" >
        </div>

        <div class="form-group">
      <label for="Age" class="col-lg-12">Age</label>
         <div class="col-lg-11">
        <input type="text" name="resAge" class="form-control" pattern="[0-9]{2}" placeholder="Enter Age">

      </div>
      </div>

       <div class="form-group">
        <div class="col-lg-11">
      <label for="Gender" class="">Gender</label>
      <select class="btn btn-default" name="resGender">  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>

       <div class="form-group">
      <label for="" class="col-lg-12">NAT</label>
        <div class="col-lg-11">
        <input type="text" name="resNat" class="form-control" placeholder="Enter Nat">
      </div>
      </div>

      <div class="form-group">
        <label for="Address" class="col-lg-12">Address</label>
        <div class="col-lg-11">
        <textarea name="resAddress" class="form-control" placeholder="Enter Address"></textarea>
      </div>
    </div>

  </div>
</div><!-- 2ndcol -->
       
   <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
      <label for="" class="control-label col-lg-12">Serial Number</label>
        <div class="col-lg-12">
        <input type="text" name="serial_number"  class="form-control" placeholder="Enter Serial Number" required/>
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
        <div class="col-lg-11">
       <select class="btn btn-default" name="blotterType" required/>  
          <option>Thief</option>
          <option>Violence</option>
          <option>Abuse</option>
        </select>
      </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Location</label>
        <div class="col-lg-11">
        <input type="text" name="location" class="form-control" placeholder="Enter location">
      </div>
      </div>
       
    </div><!--first col-->        
 </div><!-- row -->

  <hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Complainant Statement</label>
        <div class="col-lg-11">
        <textarea class="form-control" name="compStatement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>

    </div><!--first col-->        
 </div><!-- row -->     
         
<hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Respondent Statement</label>
        <div class="col-lg-11">
        <textarea class="form-control" name="resStatement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    
    </div><!--first col-->        
 </div><!-- row -->

<hr>
        
        <div class="form-group">
          <div class="container">
           <button type="submit" name="saveBlotter" class="btn btn-primary" value="Save"> <i class="fa fa-save"></i> Save Blotter Records</button>
          </div>
        </div>


    
</form>
 
   
 </div>
</div>
  </section>
</div>
    <!-- Script -->
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
    
<script>
   $(function() {
    $("#blotter_datepicker").datepicker();
   })
 </script>
