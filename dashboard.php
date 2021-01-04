<?php include('includes/sidebar.php'); ?>
<div class="main">
<section>
  <div class="container-fluid">  
    <div class="row"> 
      <?php  include('includes/navbar.php'); ?>
      <div class="col-lg-7 ml-auto">
        <div class="row">
          <div class="col-sm-12 p-2">
            <div class="row">
              <div class="col-12">
                <?php include('includes/headerlogo.php'); ?>
                <div class="panel panel-default"> 
                 <div class="panel-heading"><h3>Current Barangay Officials</h3></div>
                 <div class="panel-body">
                   <table class="table table-bordered">
                  <thead class="bg-dark">
                    <tr>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                      <th>Offcommittee</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php   
            $query = "SELECT * FROM officials";

            $query_run = mysqli_query($conn, $query);

            while ($row =mysqli_fetch_array($query_run)) { ?>
                         
          
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
          </div>
        </div>
      </div>


 <?php 
       $resident = mysqli_query($conn,"select * from residences ")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
      <div class="col-lg-5 ml-auto">
        <div class="row mt-3 mb-2">
          <!--Residence-->
          <div class="col-sm-12 p-2">
            <div class="card card-common">
              <div class="card-body box">
                <div class="d-flex justify-content-between">
                  <i class="fa fa-users fa-3x text-white"></i>              
                <div class="text-right text-secondary">
                  <h4 class="text-white">Registered Residence</h4>
                  <h2 class="text-white"><?php echo $resident; ?></h2>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="residence.php">View</a>
              <i class="fa fa-arrow-right mr-3 text-success"></i>
              <span></span>
            </div>
          </div>
        </div>

        <!--Registered Voters-->
        <?php 
       $resident = mysqli_query($conn,"select * from residences WHERE VoterStatus = 'YES'")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
          <div class="col-sm-12 p-2">
            <div class="card card-common">
              <div class="card-body box2">
                <div class="d-flex justify-content-between">
                  <i class="fa fa-cog fa-3x text-white"></i>              
                <div class="text-right text-secondary">
                  <h5 class="text-white">Registered Voters</h5>
                  <h3 class="text-white"><?php echo $resident; ?></h3>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <i class="fa fa-arrow-right mr-3 text-success"></i>
              <span>View</span>
            </div>
          </div>
        </div>
      
      <!--Male-->
      <?php 
       $resident = mysqli_query($conn,"select * from residences WHERE Gender = 'Male'")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
          <div class="col-sm-6 p-2">
            <div class="card card-common">
              <div class="card-body box3">
                <div class="d-flex justify-content-between">
                  <i class="fa fa-male fa-3x text-white"></i>              
                <div class="text-right text-secondary">
                  <h5 class="text-white">Male</h5>
                  <h3 class="text-white"><?php echo $resident; ?></h3>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <i class="fa fa-arrow-right mr-3 text-success"></i>
              <span>View</span>
            </div>
          </div>
        </div>

        <!--female-->
         <?php 
       $resident = mysqli_query($conn,"select * from residences WHERE Gender = 'Female'")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
          <div class="col-sm-6 p-2">
            <div class="card card-common">
              <div class="card-body box4">
                <div class="d-flex justify-content-between">
                  <i class="fa fa-female fa-3x text-white"></i>              
                <div class="text-right text-secondary">
                  <h5 class="text-white">Female</h5>
                  <h3 class="text-white"><?php echo $resident; ?></h3>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <i class="fa fa-arrow-right mr-3 text-success"></i>
              <span>View</span>
            </div>
          </div>
        </div>
         
      </div>
    </div>
  </div>
</section>

<!--end of wrapper-->
<?php include('includes/script.php'); ?>
<!-- ChartLink -->
<!-- <script src="charts/bar.js"></script> -->
       
    


