<?php include('includes/sidebar.php'); ?>
<style>
  .display {
   padding: 1em 1em;
   cursor: pointer;
  }
</style>
 <!-- Script -->
    <script src='jquery-ui/jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
    <link href='jquery-ui/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui/jquery-ui.min.js' type='text/javascript'></script>
<section>
  <div class="container-fluid"> 
  <div class="reg-form"> 
    <div class="row">
      
    <div class="col-md-12">
      <h3>Suspect Name</h3>
      <form class="cmxform form-horizontal style-form" method="post" action="actions/save_residence.php">
      <div class="form-group">
      <label for="" class="control-label col-lg-12">Respondent Reg_Entry</label>
      <div class="col-lg-12">
        <input type="text" name="residence_id" id='selectuser_id' class="form-control"  placeholder="Enter Entry"/>
      </div>
      </div>
    <div class="form-group">
      <label for="FirstName" class="control-label col-lg-12">Name OF Suspect</label>
      <div class="col-lg-12">
        <input type="text" name="susp_fullname" id='autocomplete'  class="form-control input-lg"  placeholder="Enter Fullname"/>
      </div>
      </div>

    <div class="form-group">
      <label for="" class="control-label col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="susp_age" class="form-control" placeholder="Enter Age" required/>
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="susp_gender" required/>  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
       <div class="form-group">
      <label for="" class="control-label col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="susp_nat" class="form-control" placeholder="Enter Nat" required/>
      </div>
      </div>
      <div class="form-group">
        <label for="Address" class="control-label col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="susp_address" class="form-control" placeholder="Enter Address" required/></textarea>
      </div>
    </div>

      
  
    </div>
  </div>
    </div><!--first col-->

    <hr>
    <div class="row">
      <div class="col-md-6">
       <div class="form-group">
      <label for="" class="control-label col-lg-12">Date of Incedent</label>
        <div class="col-lg-12">
        <input type="text" id="case_datepicker" name="c_date" class="form-control" placeholder="" required/>
      </div>
      </div>

      <div class="form-group">
      <label for="" class="control-label col-lg-12">Time of Incedent</label>
        <div class="col-lg-12">
        <input type="time" name="r_time" class="form-control" placeholder="Enter Cellphone Number" required/>
      </div>
      </div>
</div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Record Type</label>
        <div class="col-lg-12">
        <input type="text" name="record_type" class="form-control" placeholder="Enter blotter type">
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
      <label for="Cellphone Number" class="control-label col-lg-12">Statement</label>
        <div class="col-lg-12">
        <textarea class="form-control" name="susp_statement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    </div>     
      
</div>

<hr>

        
        <div class="form-group">
          <div class="container">
           <button type="submit" name="save_other_case" class="btn btn-primary" value="Save"> <i class="fa fa-save"></i> Save Blotter Records</button>
          </div>
        </div>
          


    </form>   
    </div>     
      </div>
   </div><!--con-fluid-->
</section>

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
<!-- jQuery datepicker -->
 <script>
   $(function() {
    $("#case_datepicker").datepicker();
   })
 </script>
