  <?php include('check.php'); ?>
  <?php include('header.php'); ?>
  <style>
    /* The container <div> - needed to position the dropdown content */ 
.dropdown {   
      position: relative;   
      display: inline-block; }
/* Dropdown Content (Hidden by Default) */ 
.dropdown-content {
  display: none;
  position: absolute;
  background-color:  #222222;
  min-width: 250px;   
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1; 
} /* Links inside the dropdown */ 
.dropdown-content a {
  color: black;   
  padding: 12px 16px;   
  text-decoration: none;
  display: block; } 
/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: 
  black} /* Show the dropdown menu on hover */ 
  .dropdown:hover .dropdown-content {   
    display: block; 
}
/* Change the background color of the dropdown button when the dropdown content is shown */ 
.dropdown:hover .dropbtn {   
  background-color: #3e8e41; 
}
.dashboard {
  background-color: #f44336;
  padding: 1em 1em;
}
  </style>
       
        <div class="wrapper d-flex">
          <?php $query= mysqli_query($conn,"select * from admin where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
           <!--sidebar-->
                    <div class="sidebar" style="overflow-y: auto;">
                        <img src="images/logo.jpg" class="rounded-circle mr-3 py-4">
                        <div class="bottom-border">
                        <h4 class="text-white text-center">Welcome! <strong style="color: #00FF7F"> <?php echo $login_user;?></strong></h4>
                        </div>
                    
                        <ul>
                          <li>
                          <div class="dash">
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw fa-2x font"></i>Dashboard</a>
                        </div>
                        </li>
                        <li>
                            <a href="residence.php"><i class="fa fa-users fa-fw fa-2x font"></i>Resident Information</a>
                        </li> 
                        <li>
                            <a href="blotter_records.php"><i class="fa fa-book fa-fw fa-2x font"></i>Blotter Records</a>
                        </li>
                        <li>
                            <a href="schedule_today.php"><i class="fa fa-calendar fa-fw fa-2x font"></i>Settlement Schedules</a>
                        </li>
                        <li>
                            <a href="generate_cert.php"><i class="fa fa-calendar fa-fw fa-2x font"></i>Certificate Issuance</a>
                        </li>
                        <li>
                            <a href="brgyofficials.php"><i class="fa fa-users fa-fw fa-2x font"></i>Barangay Officials</a>
                        </li>
                        <li>
                            <a href="report.php"><i class="fa fa-bar-chart-o fa-fw fa-2x font"></i>Reports</a>
                        </li>
                                            
                        <li>
                         <div class="dropdown"> 
                          <span><i class="fa fa-cog fa-fw fa-2x font"></i> Account</span> 
                         <div class="dropdown-content">
                         <ul>
                          <li>
                          <a href="history_log.php"><i class="fa fa-bar-chart-o fa-fw fa-2x font"></i>History Log</a>
                        </li>
                        <li>
                          <a href="activity_log.php"><i class="fa fa-bar-chart-o fa-fw fa-2x font"></i>Activity Log</a>
                          </li>
                          <li>
                        <a href=""><i class="fa fa-database fa-fw fa-2x font"></i> Barangay Config</a> 
                        </li>
                        <li>
                          <a href="logout.php"><i class="fa fa-sign-out fa-fw fa-2x font"></i>Logout</a>
                          </li>
                          </ul> 
                           </div> 
                          </div>
                          </li> 

                         </ul>
           <!--end of sidebar-->
           <!--top navbar-->
       </div>
   </div>
 <?php include('script.php'); ?>      
 <script type="text/javascript">
  $(function(){
    $('li a').filter(function(){
      return this.href==location.href}).parent().addClass('dashboard').siblings().removeClass('dashboard')
    $('li a').click(function(){
      $(this).parent().addClass('dashboard').siblings().removeClass('dashboard')  
    })
  })
  </script>          
   



