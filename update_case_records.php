<?php include('includes/header.php'); ?>
<?php   
  require_once 'actions/db_connect.php';
  if (isset($_GET['edit'])) {
    $case_id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT * FROM case_records  
      WHERE case_id = $case_id");
    $record = mysqli_fetch_array($rec);    
    $case_id = $record ['case_id'];
    $residence_id = $record ['residence_id'];
    $record_type = $record ['record_type'];
  }
?>


  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
         <h3 class="text-center">Set Settlement Report</h3>
   </div>         
      <div class="modal-body">
        <form action="actions/case_settlement.php" method="POST">
          <input type="text" name="case_id" value="<?php echo $case_id; ?>" style="display: none;">
          <input type="text" name="residence_id" value="<?php echo $residence_id; ?>" style="display: none;">
           <input type="text" name="record_type" value="<?php echo $record_type; ?>" style="display: none;">

          <select name="status" class="form-control">
            <option>Hold</option>
            <option>Dismiss</option>
          </select>
          <br>
          <label>Date of Hearing</label>
          <input type="text" name="date_hearing" id="datehearing" class="form-control">
          <br>
          <label>Officer</label>
          <input type="text" name="officer" class="form-control">
          <br>
          <input type="submit" name="send_case_report" value="Submit" class="btn btn-primary">
        </form>
    
</div>
</div>

<!-- jQeury datepicker -->
