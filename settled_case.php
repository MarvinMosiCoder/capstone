<?php include('includes/sidebar.php'); ?>
<div class="main">
<section>
  <div class="container-fluid"> 
        <div class="row"> 
          <div class="panel panel-default">
             <div class="panel-heading"><h3 class="text-center">Settlement Schedule</h3></div>
           <div class="panel-heading">
          
             <a href="schedule_today.php" class="btn btn-default"><i class="fa fa-calendar"></i> Schedule Today</a>
             <a href="resched_settlement.php" class="btn btn-default"><i class="fa fa-calendar"></i> Reschedule Settlement</a>
            <a href="unschedule_settlement.php" class="btn btn-default"><i class="fa fa-calendar"></i> Unschedule Settlement</a>
            <a href="appeal_to_court_cases.php"  class="btn btn-default"><i class="fa fa-check"></i>Appeal to Court Cases</a>
            <a href="settled_case.php"  class="btn btn-primary"><i class="fa fa-check"></i> Settled Cases</a>
            
           </div>
          
           <div class="panel-body" style="overflow-x: auto;"> 
         <table class="table table-bordered">
        
                      <br>
      <thead class="table-dark">
    <tr>
    <th>View</th>
    <th>Blotter_ID</th>
    <th>Status</th>
    <th>BlotterType</th>
    <th>Complainant Name</th>
    <th>Respondent Name</th>
    <th>DateRecorded</th>
    <th>TimeRecorded</th>
    <th>Settled Date</th>

    
      
    </tr>
    </thead>
  
      <tbody>                 
        <?php
  $query = "SELECT blotter_records.blotter_id, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, blotter_records.compFname, blotter_records.respondent_Fullname, blotter_records.status, settlement_records.date_hearing
  FROM blotter_records
  INNER JOIN settlement_records
  ON blotter_records.blotter_id = settlement_records.blotterId
  WHERE status = 'Settled' AND prev_status = 'Settled'";
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
      <td><?php echo $row['date_hearing']; ?></td>
      
      
      </tr>
   
    
  
  <?php } ?>

    </tbody>
  </table>
    
    </div>
    
  </div>
</div><!-- /row -->


  </div>
</section>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
       
    


