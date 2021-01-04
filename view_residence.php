<?php include('includes/sidebar.php'); ?>
<?php   
  
  if (isset($_GET['edit'])) {
    $residenceID = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' , residences.LastName) AS residentName, residences.profile_image, residences.Gender, residences.BirthPlace, residences.Email, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday, residences.Year, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, case_records.record_type, case_records.c_date, case_records.r_time 
      FROM residences 
      LEFT JOIN blotter_records ON residences.residenceID = blotter_records.residence_id 
      LEFT JOIN case_records ON residences.residenceID = case_records.residence_id  
      WHERE residenceID = $residenceID");
    $record = mysqli_fetch_array($rec);
    $profile_image = $record ['profile_image'];
    $FirstName = $record ['residentName'];
    $Gender = $record ['Gender'];
    $Year = $record ['birthday'];
    $Address = $record ['Address'];
    $BirthPlace = $record ['BirthPlace'];
    $Contact = $record ['Contact'];
    $Email = $record ['Email'];
    $Year = $record ['Year'];
    $CivilStatus = $record ['CivilStatus'];
    $VoterStatus = $record ['VoterStatus'];
    $blotterType = $record ['blotterType'];
    $b_date = $record ['b_date'];
    $c_date = $record ['c_date'];
    $r_time = $record ['r_time'];
    $b_time = $record ['b_time'];
    $residenceID = $record ['residenceID'];
    $record_type = $record['record_type'];
  }
?>
<div class="main">
<section>
  <div class="container-fluid">  
    <div class="row"> 
      <?php include('includes/navbar.php'); ?>
       <!--display subjects-->
        <div class="panel panel-default">
         <div class="panel-heading">Residence Personal Information</div>
          <div class="panel-body">
             <div class="card bg-white">
              <div class="card-title my-5">
                <div class="media">
                  <div class="media-body">
                               
               <div class="col-lg-3">
                  <img src="actions/images/<?php echo $profile_image; ?>" width="250" height="250">                                
                  </div><!--image-end-->               
                  <div class="col-lg-4">                   
                      <table class="table table-responsive">
                        <tr>
                          <td class="text-muted">ResidenceID</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $residenceID;  ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">FULLNAME</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $FirstName;  ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td class="text-muted">Age</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo intval(date("Y"))-intval(substr($Year, 0,4)); ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Birth Day</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $Year ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Address</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $Address; ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">BirthPlace</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $BirthPlace;  ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">First Name</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $FirstName;  ?></td>
                        </tr>
                        
                      </table>                      
                    </div><!--2nd-col-end-->

                    <div class="col-lg-4">                   
                      <table class="table table-responsive">
                        <tr>
                          <td class="text-muted">Civil Statues</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $CivilStatus;  ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Registered Voters</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $VoterStatus; ?></td>
                        </tr>
                        
                        
                      </table>                      
                    </div><!--3rd-col-end-->
                    </div><!--row-end-->
                   <hr>
                   <!--3rdROW-->
                   <div class="row">
                     <div class="container">
                       <h4><strong>Contact Details</strong></h4>
                       <div class="col-lg-12">

                         <table class="table table-responsive">
                        <tr>
                          <td class="text-muted col-lg-2">Contact</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $Contact;  ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Email</td>
                          <td>:</td>
                          <td style="font-weight: bold;"><?php echo $Email;  ?></td>
                        </tr>
                      </table>

                       </div>
                     </div>
                   </div><!--3rdROW-end -->

<hr>

                    <!--4thROW-->
                   <div class="row">
                     <div class="container">
                       <h4><strong>Blotter Records Involved</strong></h4>
                       <div class="col-lg-12">

                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Blotter Type</th>
                              
                              <th>Date Recorded</th>
                              <th>Time Recorded</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php 
                             $query_blotter = "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' ,residences.LastName) AS residentName, residences.profile_image, residences.Gender, residences.BirthPlace, residences.Email, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday, blotter_records.blotterType, blotter_records.b_date, blotter_records.b_time, blotter_records.status 
      FROM residences 
      LEFT JOIN blotter_records ON residences.residenceID = blotter_records.residence_id 
     
      WHERE residenceID = $residenceID";
                               $blotter = mysqli_query($conn, $query_blotter);

                            while ($row = mysqli_fetch_array($blotter)) {
                              ?>
                              <tr>
                              <td><?php echo $row['blotterType']; ?></td>
                              <td><?php echo $row['b_date']; ?></td>
                              <td><?php echo $row['b_time']; ?></td>
                               <td style="display: none;"><?php echo $row['status']; ?></td>
                              <?php if ($row['status'] == 'Settled'): ?>
                                <td style="background-color: #00FF7F; color: #000;"><?php echo $row['status']; ?></td>
                               <?php elseif ($row['status'] == 'Pending'): ?>
                                <td style="background-color: yellow; color: #000;"><?php echo $row['status']; ?></td>
                              <?php elseif ($row['status'] == 'Ongoing'  || $row['status'] == 'Onhearing'): ?>
                                <td style="background-color: #f44336; color: #000;"><?php echo $row['status']; ?></td>
                              <?php endif ?>
                            </tr>
                            <?php } ?>
                          </tbody>
                       
                         </table>

                       </div>
                     </div>
                   </div><!--4thROW-end -->
<hr>
                   <!--5thROW-->
                   <div class="row">
                     <div class="container">
                       <h4><strong>Other Records Involved</strong></h4>
                       <div class="col-lg-12">
                       
                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Case Type</th>
                              <th>Date Recorded</th>
                              <th>Time Recorded</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                        
                          <tbody>
                            <tr>
                              <?php 
                              $query_case =  "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' ,residences.LastName) AS residentName, residences.profile_image, residences.Gender, residences.BirthPlace, residences.Email, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday,    case_records.record_type, case_records.c_date, case_records.r_time, case_records.active 
      FROM residences 
      LEFT JOIN case_records ON residences.residenceID = case_records.residence_id  
      WHERE residenceID = $residenceID";
                                $case = mysqli_query($conn, $query_case);
                                
                              while ($caserow = mysqli_fetch_array($case)):?>
                              <td><?php echo $caserow['record_type']; ?></td>
                              <td><?php echo $caserow['c_date']; ?></td>
                              <td><?php echo $caserow['r_time']; ?></td>
                              <td style="display: none;"><?php echo $caserow['active']; ?></td>
                              <?php if ($caserow['active'] == 0): ?>
                                <td style="background-color: #00FF7F; color: #fff;">Dismiss Case</td>
                              <?php endif ?>
                              <?php if ($caserow['active'] == 1): ?>
                                <td style="background-color: #f44336; color: #fff;">Ongoing</td>
                              <?php endif ?>
                              
                            
                            </tr>
                          <?php endwhile; ?>
                          </tbody>
                          
                         </table>

                       </div>
                     </div>
                   </div><!--5thROW-end -->
<hr>
                   <!--6thROW-->
                   <div class="row">
                     <div class="container">
                       <h4><strong>Blotter Records Settlement History</strong></h4>
                       <div class="col-lg-12">
                       
                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>BlotterType</th>
                              <th>Officer</th>
                              <th>Date Hearing</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                        
                          <tbody>
                            <tr>
                              <?php 
                              $set_query =  "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' ,residences.LastName) AS residentName, residences.profile_image, residences.Gender, residences.BirthPlace, residences.Email, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday, settlement_history.prev_status, settlement_history.date_hearing, settlement_history.officer, settlement_history.blotter_type 
      FROM residences 
      LEFT JOIN settlement_history ON residences.residenceID = settlement_history.residence_id  
      WHERE residenceID = $residenceID";
                                $settled = mysqli_query($conn, $set_query);
                                
                              while ($setrow = mysqli_fetch_array($settled)):?>
                              <td><?php echo $setrow['blotter_type']; ?></td>
                              <td><?php echo $setrow['officer']; ?></td>
                              <td><?php echo $setrow['date_hearing']; ?></td>
                              <td><?php echo $setrow['prev_status']; ?></td>
                 
                            </tr>
                          <?php endwhile; ?>
                          </tbody>
                          
                         </table>

                       </div>
                     </div>
                   </div><!--6thROW-end -->



                   <hr>
                   <!--7thROW-->
                   <div class="row">
                     <div class="container">
                       <h4><strong>Issued Certificates</strong></h4>
                       <div class="col-lg-12">
                       
                         <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Certificate</th>
                              <th>Purpose</th>
                              <th>Issued Date</th>
                              <th>Endorsed</th>
                              
                            </tr>
                          </thead>
                        
                          <tbody>
                            <tr>
                              <?php 
                              $cert_query =  "SELECT residences.residenceID, CONCAT(residences.FirstName,'&nbsp',  residences.MiddleName,'&nbsp' ,residences.LastName) AS residentName, residences.profile_image, residences.Gender, residences.BirthPlace, residences.Email, residences.Address, residences.CivilStatus, residences.Contact, residences.Area, residences.VoterStatus, CONCAT(residences.Month,'&nbsp',residences.Day,'&nbsp',residences.Year) As birthday,
                                issued_cert.cert_type, issued_cert.purpose, issued_cert.cert_date_issued, issued_cert.endorsed 
      FROM residences 
      LEFT JOIN issued_cert ON residences.residenceID = issued_cert.residence_id  
      WHERE residenceID = $residenceID";
                                $cert = mysqli_query($conn, $cert_query);
                                
                              while ($certrow = mysqli_fetch_array($cert)):?>
                              <td><?php echo $certrow['cert_type']; ?></td>
                              <td><?php echo $certrow['purpose']; ?></td>
                              <td><?php echo $certrow['cert_date_issued']; ?></td>
                              <td><?php echo $certrow['endorsed']; ?></td>
                 
                            </tr>
                          <?php endwhile; ?>
                          </tbody>
                          
                         </table>

                       </div>
                     </div>
                   </div><!--7thROW-end -->

                              
                            


                  </div>                 
                </div>               
              </div>
            </div>
          </div>
        </div>
      </div><!--panel-end-->
    

  </div>
</section>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
       
    


