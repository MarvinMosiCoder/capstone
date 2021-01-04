<?php   
  require_once 'actions/db_connect.php';
  if (isset($_GET['edit'])) {
    $case_id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT case_records.case_id, CONCAT(residences.FirstName, residences.MiddleName, residences.LastName) AS residentName,  residences.Address,  residences.Contact, residences.Area,  case_records.record_type, case_records.c_date, case_records.r_time, case_records.susp_statement FROM residences 
      LEFT JOIN case_records 
      ON residences.residenceID = case_records.residence_id  
      WHERE case_id = $case_id");
    $record = mysqli_fetch_array($rec);
    $residentName = $record ['residentName'];
    $susp_statement = $record ['susp_statement'];
    $FirstName = $record ['residentName'];
    $Address = $record ['Address'];
    $Contact = $record ['Contact'];
    $record_type = $record ['record_type'];
    $c_date = $record ['c_date'];
    $r_time = $record ['r_time'];
    $case_id = $record ['case_id'];

  }
?>



                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                
                               </div>         
                               <div class="modal-body">                         
                                               
                              
  <div class="container-fluid">  
    <div class="row"> 
       
       <div class="col-md-12">
         <div class="form-group">
           <label>Suspect Statement</label>
           <textarea class="form-control input-lg" name="resStatement"><?php echo $susp_statement; ?></textarea>
       
         </div>       
       </div><!-- /row -->

       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
           <label>Respondent Name</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $FirstName; ?>" >
           </div>
         <div class="form-group">
           <label>Date Recorded</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $c_date; ?>" >
         </div>
         <div class="form-group">
           <label>Time Recorded</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $r_time; ?>" >
         </div>
         </div>

         <div class="col-md-6">
        <div class="form-group">
           <label>Case Type</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $record_type; ?>" >
         </div>
         <div class="form-group">
           <label>Location</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $location; ?>" >
         </div>
         <div class="form-group">
           <label>Status</label>
           <input type="text" class="form-control input-lg" name="resStatement" value="<?php echo $active; ?>" >
         </div>
        </div>
       </div>
 
 <div class="row">
   <div class="panel panel-default">
     <div class="panel-body">
       
                   
                       <h4><strong>Case History</strong></h4>
                       <div class="col-lg-12">

                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Case Type</th>                        
                              <th>Date Recorded</th>
                              <th>Time Recorded</th>
                              <th>Date Settlements</th>
                              <th>Officer</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php 
                             $query_settle = "SELECT case_records.case_id, case_records.record_type, 
                               case_records.c_date, case_records.r_time, case_records.susp_fullname, case_records.active, case_history.date_hearing, 
                               case_history.status,
                               case_history.officer
    FROM case_records
    LEFT JOIN case_history
    ON case_records.case_id = case_history.case_id
    WHERE case_id = $case_id";
                               $settle = mysqli_query($conn, $query_settle);

                            while ($rowSet = mysqli_fetch_array($settle)) {
                              ?>
                              <tr>
                              <td><?php echo $rowSet['record_type']; ?></td>
                              <td><?php echo $rowSet['c_date']; ?></td>
                              <td><?php echo $rowSet['r_time']; ?></td>
                              <td><?php echo $rowSet['date_hearing']; ?></td>
                              <td><?php echo $rowSet['officer']; ?></td>
                              <td><?php echo $rowSet['status']; ?></td>
                              
                            </tr>
                            <?php } ?>
                          </tbody>
                       
                         </table>

                       </div>
                   
                   
     </div>
   </div>
 </div>


  </div>

<!--end of wrapper-->
                         

                         
       
    


