<?php include('includes/sidebar.php'); ?>
<div class="main">
<section>
  <div class="container">
     <div class="panel panel-default">
       <div class="panel-heading"><h4>User's Activity</h4></div>
          <div class="panel-body">
             
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>User</th>
          <th>User Activity</th>
          <th>Date|Time</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $process_query = "SELECT * FROM activity_log";
        $result = mysqli_query($conn, $process_query);

        while ($userlog = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><?php echo $userlog['process_name']; ?></td>
            <td><?php echo $userlog['process_type']; ?></td>
            <td><?php echo $userlog['process_time']; ?></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

  </div>
 </div>
</div>

  </div>        
</section>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
       
    


