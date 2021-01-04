<?php   
  require_once 'actions/db_connect.php';
  if (isset($_GET['edit'])) {
    $blotter_id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT blotter_records.blotter_id, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, blotter_records.compFname, blotter_records.respondent_Fullname, blotter_records.status, blotter_records.serial_number, blotter_records.location, blotter_records.compStatement, blotter_records.resStatement, settlement_records.date_hearing, settlement_records.prev_status
    FROM blotter_records
    LEFT JOIN settlement_records
    ON blotter_records.blotter_id = settlement_records.blotterId  
    WHERE blotter_id = $blotter_id");
    $record = mysqli_fetch_array($rec);
    $resStatement = $record ['resStatement'];
    $compStatement = $record ['compStatement'];
    $compFname = $record ['compFname'];
    $respondent_Fullname = $record ['respondent_Fullname'];
    $serial_number = $record ['serial_number'];
    $location = $record ['location'];
    $blotterType = $record ['blotterType'];
    $status = $record ['status'];
    $b_date = $record ['b_date'];
    $b_time = $record ['b_time'];
    $blotter_id = $record ['blotter_id'];
  }
?>



                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>

                               </div>         
                               <div class="modal-body">                         
                                               
                              
  <div class="container-fluid">  
    <div class="row"> 
       
       <div class="col-md-6">
         <div class="form-group">
           <label>Complainant Statement</label>
           <textarea class="form-control input-lg" name="resStatement"  ><?php echo $compStatement; ?></textarea>
         </div>
          <div class="form-group">
           <label>Complainant Name</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $compFname; ?>" >
         </div>
       </div><!-- /col -->

       <div class="col-md-6">
          <div class="form-group">
           <label>Respondent Statement</label>
           <textarea class="form-control input-lg" name="resStatement" ><?php echo $resStatement; ?></textarea>
         </div>
          <div class="form-group">
           <label>Respondent Name</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $respondent_Fullname; ?>" >
         </div>
       </div><!-- /col -->
    </div><!-- /row -->
<hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
           <label>Serial Number</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $serial_number; ?>" >
         </div>
         <div class="form-group">
           <label>Date Recorded</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $b_date; ?>" >
         </div>
         <div class="form-group">
           <label>Time Recorded</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $b_time; ?>" >
         </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
           <label>Blotter Type</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $blotterType; ?>" >
         </div>
         <div class="form-group">
           <label>Location</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $location; ?>" >
         </div>
         <div class="form-group">
           <label>Status</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $status; ?>" >
         </div>
      </div>
    </div>
<!-- 3rd Row -->
     <div class="row">
                   
                       <h4><strong>Settlement History</strong></h4>
                       <div class="col-lg-12">

                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Blotter Type</th>                        
                              <th>Date Recorded</th>
                              <th>Time Recorded</th>
                              <th>Date Settlements</th>
                              <th>Officer</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php 
                             $query_settle = "SELECT blotter_records.blotter_id, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, blotter_records.compFname, blotter_records.respondent_Fullname, blotter_records.status, blotter_records.serial_number, blotter_records.location, blotter_records.compStatement, blotter_records.resStatement, settlement_history.date_hearing, settlement_history.prev_status, settlement_history.officer
    FROM blotter_records
    LEFT JOIN settlement_history
    ON blotter_records.blotter_id = settlement_history.blotterId
     
      WHERE blotter_id = $blotter_id";
                               $settle = mysqli_query($conn, $query_settle);

                            while ($rowSet = mysqli_fetch_array($settle)) {
                              ?>
                              <tr>
                              <td><?php echo $rowSet['blotterType']; ?></td>
                              <td><?php echo $rowSet['b_date']; ?></td>
                              <td><?php echo $rowSet['b_time']; ?></td>
                              <td><?php echo $rowSet['date_hearing']; ?></td>
                              <td><?php echo $rowSet['officer']; ?></td>
                              <td><?php echo $rowSet['prev_status']; ?></td>
                              
                            </tr>
                            <?php } ?>
                          </tbody>
                       
                         </table>

                       </div>
                   
                   </div><!--4thROW-end -->

  </div><!-- /container -->

<!--end of wrapper-->
                             </div>

                         
       
    


