<?php include('includes/header.php'); ?>
<script src='jquery-ui/jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
<link href='jquery-ui/jquery-ui.min.css' rel='stylesheet' type='text/css'>
<script src='jquery-ui/jquery-ui.min.js' type='text/javascript'></script>
<div class="container">
 <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Generate Certificate</div>
            <div class="panel-body">
            <form method="POST" action="barangay_certificates.php">
                <input type='text' name="residence_id" class="form-control" id='selected_id' style="display: none;">
                <input type='text' name="status" class="form-control" id='selectuser_stats' style="display: none;">
              <label>Name</label>
               <input type='text' name="fullname" class="form-control" id='cert_autocomplete'>
               <label>Age</label>
               <input type='text' name="age" class="form-control" id='selectuser_age'>
               <label>Address</label>
               <input type='text' name="address" class="form-control" id='selectuser_address'>
          
               <br>
               <label>Purpose</label>
               <select name="purpose" class="form-control">
                   <option>Educational Assistance</option>
                   <option>Job</option>
                   <option>Work Abroad</option>
               </select>

               <hr>
               <h4>Detailes</h4>
               <label>Community Tax No:</label>
               <input type="text" name="com_tax" class="form-control">
                <label>Issued A:</label>
               <input type="text" name="issued_at" class="form-control">
                <label>Issued On</label>
               <input type="text" name="cert_date_issued" class="form-control" id="cert_datepicker">
                <label>Endorsed By:</label>
               <input type="text" name="endorsed" class="form-control">
               <br>
               <button class="btn btn-info" name="generate"><i class="fa fa-save"></i> Generate Cert</button>
            </form>
            </div>
        </div>
        
    </div>
 </div>
</div>

    

<script type='text/javascript' >
    $( function() {
  
        $( "#cert_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "cert_autocomplete.php",
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
                $('#cert_autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_age').val(ui.item.value); // save selected id to input
                $('#selectuser_address').val(ui.item.add);
                $('#selectuser_stats').val(ui.item.stats);
                $('#selected_id').val(ui.item.id);
                return false;
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "cert_autocomplete.php",
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
    $("#cert_datepicker").datepicker();
   })
 </script>
 <script>
   $(function() {
    $("#orDate").datepicker();
   })
 </script>