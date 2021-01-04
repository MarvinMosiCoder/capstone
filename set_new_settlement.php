<?php include('includes/header.php'); ?>
<?php   
  require_once 'actions/db_connect.php';
  if (isset($_GET['edit'])) {
    $blotter_id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT * FROM blotter_records  
      WHERE blotter_id = $blotter_id");
    $record = mysqli_fetch_array($rec);    
    $blotter_id = $record ['blotter_id'];
    $residence_id = $record ['residence_id'];
    $blotterType = $record ['blotterType'];

  }

?>


  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
         <h3 class="text-center">Set Settlement Report</h3>
   </div>         
      <div class="modal-body">
        <form action="actions/new_settlement_schedule.php" method="POST">
          <input type="text" name="blotter_id" value="<?php echo $blotter_id; ?>" style="display: none;">
          <input type="text" name="residence_id" value="<?php echo $residence_id; ?>" style="display: none;">
           <input type="text" name="blotter_type" value="<?php echo $blotterType; ?>" style="display: none;">

          <select name="status" class="form-control">
            <option>Ongoing</option>
            <option>Settled</option>
            <option>Appeal to Court</option>
          </select>
          <br>
          <label>Date of Hearing</label>
          <input type="text" name="date_hearing" id="datehearing" class="form-control">
          <br>
          <label>Officer</label>
          <input type="text" name="officer" class="form-control">
          <br>
          <input type="submit" name="send_settle" value="Submit" class="btn btn-primary">
        </form>
    
</div>
</div>

<!-- jQeury datepicker -->
<script>
   $(function() {
    $("#datehearing").datepicker();
   })
 </script>