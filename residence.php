<?php include('includes/sidebar.php'); ?>
<div class="main">
  <div class="container-fluid">
    <div class="row">  
      <?php include('includes/navbar.php'); ?>
        <!-- table section -->
        <div class="panel panel-default">
           <div class="panel-heading"><h3 class="text-center">Residence Information</h3></div>
         <div class="panel-heading">      
          <!-- addModal -->
         <?php include('errors.php')  ?>
         <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
          <form method="post" action="documents/export_file.php"> 
           <input type="text" name="process_name" value="<?php echo $login_user;?>" style="display: none;">         
         <a class="btn btn-primary" data-toggle="modal" data-target="#regModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Add Residence</a>              
             <input type="submit" name="export" class="btn btn-success" value="Excel" /> 
             <input type="submit" name="generate_pdf" class="btn btn-success" value="PDF" />
          </form>
         <!-- endAddModal -->
         </div><!-- /panel-head -->
        
          <div class="panel-body" style="overflow-x: auto;">
           <div class="col-lg-12">         

        <table class="table table-bordered" id="residenceTable" width="100%" cellspacing="1"> 

            <!--Modal Add-->
     
                    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">

                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                 <h3 class="text-center">Add New Residence</h3>
                               </div>         
                               <div class="modal-body">                         
                                <?php include('add_residence.php'); ?>             
                               </div>

                          </div>
                        </div>
                      </div>
                      <!--Modal-end-->

    <thead class="table-dark">
    <tr>
    <th>View</th>
    <th>Edit</th>
    <th>ID</th>
    <th>FULL NAME</th>
    <th>AGE</th>
    <th>ADDRESS</th>
    <th>BIRTHDAY</th>
    <th>CIVIL STATUS</th>
    <th>CONTACT</th>
    <th>AREA</th>
    <th>REGISTER VOTERS</th>
   <!--  <th>Records</th>
    <th>DateRecorded</th>
    <th>TimeRecorded</th> -->
    <th style="display: none;">BLOTTER STATUS</th>

      
    </tr>
    </thead>
  
      <tbody>             
  <?php
  $query = "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' ,residences.LastName) AS residentName, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday, residences.Year, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, case_records.record_type, blotter_records.status, case_records.c_date, case_records.r_time, case_records.active 
    FROM residences 
    LEFT JOIN blotter_records ON residences.residenceID = blotter_records.residence_id 
    LEFT JOIN case_records ON residences.residenceID = case_records.residence_id
    ORDER BY FirstName ASC
    ";
     $results = mysqli_query($conn, $query);

    while ($row =mysqli_fetch_array($results)) { 
     
     $status = $row['status'];
     $records = $row['active'];
     if ($status == 'Ongoing' || $status == "Pending") {
       echo '<tr class="record" bgcolor="#f44336" style="color:white;">';
     }
     elseif($records == "active") {
       echo '<tr class="record" bgcolor="#f44336" style="color:#000;">';
     }
       else {
        echo '<tr class="record">';
       }
     

      ?>
      
      <td>
        <a class="btn btn-primary"  href="view_residence.php?edit=<?php echo $row ['residenceID'];?>"><i class="fa fa-eye"></i></a> 
      </td>
      <td class="edit">
        <!--ModalUpdateStart-->
        <a class="btn btn-warning" href="residence_edit.php?edit=<?php echo $row['residenceID'];?>"><i class="fa fa-edit"></i></a>
        <!-- <form action="residence_edit.php" method="POST">
          <input type="hidden" name="edit_id" value="<?php echo $row['residenceID']?>">
        <button type="submit" name="edit_data_btn" class="btn btn-warning" ><i class="fa fa-edit"></i></button> 
        </form>  -->
      </td>

      <td scope="col"><?php echo $row['residenceID']; ?></td>
      <td><?php echo $row['residentName']; ?></td>
      <td><?php echo intval(date("Y"))-intval(substr($row['Year'], 0,4)); ?></td>
      <td><?php echo $row['Address']; ?></td>
      <td><?php echo $row['birthday']; ?></td>
      <td><?php echo $row['CivilStatus']; ?></td>
      <td><?php echo $row['Contact']; ?></td>
      <td><?php echo $row['Area']; ?></td>
      <td><?php echo $row['VoterStatus']; ?></td>
     
      
      <td style="display: none;"><?php echo $row['blotterType']; ?></td>
     
   
    
  
  <?php } ?>

    </tbody>
  </table>


      </div>
     </div>
    </div>
  </div>

</div><!--Row-End-->
</div><!--container-fluid-end-->
</div><!--Main-End-->


<!-- MODAL UPDATE -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                             <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">

                               <div class="modal-header">
                              <button type="button" class="close" onclick="closeModal()" aria-label="close"><span aria-hidden="true">&times;</span></button>
                              <h4>Update Info</h4>
                              </div>
          
                           <div class="modal-body">
                                 <?php include('modalUpdateresidence.php'); ?>                             
                            </div>       
                          </div>
                        </div>
                      </div>
                      <!--END-MODAL-->

<?php include('includes/script.php'); ?>
  <script>
    $(document).ready(function(){
     var table = $('#residenceTable').DataTable({
     
     /* "RowCallback":function(nrow, adata, iDisplayIndex,iDisplayIndexFull ){
        if (aData[10] == "NO") {
         $('td' , nRow).css('background-color','Red');
        }
        else if (aData[10] == "YES") {
          $('td' , nRow).css('background-color','Green');
        }
      }*/
   });
    });  
  </script>
  <style>
    .red {
      background-color: red !important;
    }
  </style>
    


