<?php include('includes/sidebar.php'); ?>
<div class="main">
<section>
  <div class="container-fluid">  
    <div class="row"> 
      <?php include('includes/navbar.php'); ?>
    
      <div class="panel panel-default">
        <div class="panel-heading">Add Barangay Officials</div>
          <div class="panel-body">
            <div class="col-md-4">
            <form method="post" action="actions/save_officials.php" enctype="multipart/form-data">
              <label>FirstName</label>
              <input type="text" name="fname" class="form-control">
              <label>MiddleName</label>
              <input type="text" name="mname" class="form-control">
              <label>LastName</label>
              <input type="text" name="lname" class="form-control">
              <label>OffCommittee</label>
              <input type="text" name="offcommitte" class="form-control">
              <label>Barangay Position</label>
              <input type="text" name="position" class="form-control">
              <br>
              <input type="submit" value="submit" name="submit_officials" class="btn btn-primary">
            </form>
          </div>
          <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>OffCommittee</th>
            <th>Position</th>
          </tr>
        </thead>
        <tbody>
          <?php   
            $query = "SELECT * FROM officials";

            $query_run = mysqli_query($conn, $query);

            while ($row =mysqli_fetch_array($query_run)) { ?>
                         
          <tr>
            <td>
        <a class="btn btn-warning"  href="edit_offcials.php?edit=<?php echo $row ['id'];?>"><i class="fa fa-edit"></i></a> 
            </td>
            <td>
        <a class="btn btn-danger"  href="delete_officials.php?edit=<?php echo $row ['id'];?>"><i class="fa fa-trash"></i></a> 
            </td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['mname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['offcommitte']; ?></td>
            <td><?php echo $row['position']; ?></td>

            <?php } ?>
          </tr>
        </tbody>
      </table>
    </div>
      </div>
    </div>
    </div>
    
  </div><!-- row -->
</section>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
       
    


