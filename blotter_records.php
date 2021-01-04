<?php include('includes/sidebar.php'); ?>
<div class="main">
<section>
  <div class="container-fluid"> 
        <div class="row"> 
          <div class="panel panel-default">
           <div class="panel-heading"><h3 class="text-center">Blotter Records</h3></div>
           <div class="panel-heading">
            <!-- add blotter -->
             <a class="btn btn-primary" href="file_blotter.php" ><i class="fa fa-plus-circle"></i> Add New Blotter</a>
             <!-- /add blotter -->
           </div>
          
           <div class="panel-body" style="overflow-x: auto;"> 
         <table class="table table-bordered" id="blotterRecord">
        <!--Modal Blotter Add-->
     
                    <div class="modal fade" id="blotterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">

                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                 <h3 class="text-center">Case Incedent Records</h3>
                               </div>         
                               <div class="modal-body">                         
                                 <?php include('file_blotter_modal.php'); ?>             
                               </div>

                          </div>
                        </div>
                      </div>
                      <!--Modal-end-->

                      
        
                      <br>
      <thead class="table-dark">
    <tr>
  
    <th>Action</th>
    <th>Blotter_ID</th>
    <th>BlotterStatus</th>
    <th>Complainant Name</th>
    <th>Respondent Name</th>
    <th>BlotterType</th>
    <th>DateRecorded</th>
    <th>TimeRecorded</th>

    
      
    </tr>
    </thead>
  
      <tbody>                 
        <?php
  $query = "SELECT * FROM blotter_records
  ";
     $results = mysqli_query($conn, $query);

    while ($row =mysqli_fetch_array($results)) { 

      ?>
      <tr>
      <td>
        <a class="btn btn-primary" data-toggle="modal" data-target="#viewblotterModal"  href="view_modal_blotter.php?edit=<?php echo $row['blotter_id'];?>"><i class="fa fa-eye"></i> View</a> 
        <!--View Modal Blotter-->
     
                    <div class="modal fade" id="viewblotterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">

                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                 <h3 class="text-center">View Blotter Records</h3>
                               </div>         
                               <div class="modal-body">                         
                                  <?php include('view_modal_blotter.php'); ?>             
                               </div>

                          </div>
                        </div>
                      </div>
                      <!--Modal-end-->
      </td>
      
      <td scope="col"><?php echo $row['blotter_id']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['blotterType']; ?></td>
      <td><?php echo $row['compFname']; ?></td>
      <td><?php echo $row['respondent_Fullname']; ?></td>
      <td><?php echo $row['b_date']; ?></td>
      <td><?php echo $row['b_time']; ?></td>
      
      
      
      </tr>
   
  <?php } ?>




    </tbody>
  </table>
    
    </div>
    
  </div>
</div><!-- /row -->

<!-- OTHER RECORDS-->
<div class="row"> 
          <div class="panel panel-default">
             <div class="panel-heading"><h3 class="text-center">Incedents Details and Narrative</h3></div>
           <div class="panel-heading">
             <!-- add other records -->
              <a href="case_records.php" class="btn btn-danger" ><i class="fa fa-plus-circle"></i> Add Other Records</a>
              <!-- /add other records -->
           </div>
          
           <div class="panel-body" style="overflow-x: auto;"> 
         <table class="table table-bordered">
        <!--Modal Blotter Add-->
     
                    <div class="modal fade" id="otherRecords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">

                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                 <h3 class="text-center">Case Incedent Records</h3>
                               </div>         
                               <div class="modal-body">                         
                                 <?php include('modal_case_records.php'); ?>             
                               </div>

                          </div>
                        </div>
                      </div>
                      <!--Modal-end-->

                      <table class="table table-bordered">
        
                      <br>
      <thead class="table-dark">
    <tr>
    <th>View</th>
    <th>Case No.</th>
    <th>Record Name</th>
    <th>Record Type</th>
    <th>DateRecorded</th>
    <th>TimeRecorded</th>
    
      
    </tr>
    </thead>
  
      <tbody>                 
        <?php
  $query = "SELECT * FROM case_records";
     $results = mysqli_query($conn, $query);

    while ($row =mysqli_fetch_array($results)) { 
      ?>
      <tr>
      <td>
        <a class="btn btn-primary" data-toggle="modal" data-target="#viewblotterModal"   href="view_modal_case.php?edit=<?php echo $row['case_id'];?>"><i class="fa fa-eye"></i></a> 
        <!--View Modal Blotter-->
     
                    <div class="modal fade" id="viewblotterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">

                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                 <h3 class="text-center">View Case Records</h3>
                               </div>         
                               <div class="modal-body">                         
                                 <?php include('view_modal_case.php'); ?>             
                               </div>

                          </div>
                        </div>
                      </div>
                      <!--Modal-end-->
      </td>
           
      <td scope="col"><?php echo $row['case_id']; ?></td>
      <td><?php echo $row['susp_fullname']; ?></td>
      <td><?php echo $row['record_type']; ?></td>
      <td><?php echo $row['c_date']; ?></td>
      <td><?php echo $row['r_time']; ?></td>
      
      
      </tr>
   
    
  
  <?php } ?>

    </tbody>
  </table>
    
    </div><!-- /row -->



 
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
  <script>
    $(document).ready(function(){
     var table = $('#blotterRecord').DataTable({
    
   });
    });  
  </script>


</div>
   


</script>

