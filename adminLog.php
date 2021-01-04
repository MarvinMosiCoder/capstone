<?php include('connection/configuration.php'); 
      include('includes/header.php');
if ((isset($_SESSION['username']) != '')) 
{
header('location:dashboard.php');
}
 ?>
<br>
<br>
<div id="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
     <div class="panel panel-default">

      <div class="panel-heading">        
        <div class="col-xl-10 text-center">
          <img class="img-circle" src="images/logo.jpg" width="100" height="100">
         <h3>Barangay Nbbs Kaunlaran</h3>
         </div>
       </div>

      <div class="panel-body">        
         <form class="form-auth-small" action="adminLog.php" method="post">
                <!--display validation errors here -->
                <?php include('errors.php')  ?>
                <div class="input-group">
                  <label class="control-label sr-only">Username</label>
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="username"  placeholder="Administrator" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="input-group">
                  <label  class="control-label sr-only">Password</label>
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" name="password" placeholder="***************" aria-describedby="basic-addon1">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
                
                   
              </form>
       </div>
     </div>            
  </div>
</div>

  
  <!-- END WRAPPER -->
<?php include('includes/script.php'); ?>
 <!-- <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>-->
