<?php 
include('includes/header.php');
include('includes/script.php');
$conn = mysqli_connect('localhost' , 'root' , '', 'bms');
if (isset($_POST['generate'])) {
	$residence_id = $_POST['residence_id'];
	$status = $_POST['status'];
	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$com_tax = $_POST['com_tax'];
	$issued_at = $_POST['issued_at'];
	$endorsed = $_POST['endorsed'];
	$cert_date_issued = date('Y-m-d', strtotime($_POST['cert_date_issued']));
	

   $cert_query = "INSERT INTO (residence_id, fullname, age, address, purpose, com_tax, issued_at, cert_date_issued, endorsed, cert_type) VALUES ('$residence_id', '$fullname', '$age', '$address', '$purpose', '$com_tax', '$issued_at', '$cert_date_issued','$endorsed','Barangay Clearance')";

        $cert_result = mysqli_query($conn,$cert_query);
	
}
 ?>
<style>
	.bg_cert {
		/*background-image:url(images/logo.jpg);
		background-size: cover;
		background-repeat: no-repeat;*/
		border: 4px solid #800080;

	}
	.bottomline {
		border-bottom: 1px solid #000;
	    margin-left: auto;
	    margin-right: auto;
	    margin-top: 10px;
	}
	.footer {
		padding-right: 50px;
	}
	.cert {
		padding-right: 150px;
	}
	.pb {
		padding-right: 150px;
	}
	span {
		border-bottom: 1px solid 000;
	}
	.name {
		width: 550px;
		text-align: center;	
	}
	.age {
		background-color: #eee;
		width: 100px;
		text-align: center;
		font-size: 20px;
	}
	.address {
		border-bottom: 1px solid #000;
		border: none;
		background-color: #eee;
		width: 900px;
		margin-left: 100px;
		text-align: center;
		font-size: 20px;
	}
	.tax {
		background-color: #eee;
		text-align: center;
		width: 300px;
		margin-right: 50px;
		padding: 5px 10px;
	}
</style>
 <div class="container bg_cert" id="print">
 	<div class="row">
 		<div class="col-xs-3">
 			<img src="images/logo.jpg"  height="250" width="250" style="border-radius: 150px;">
 		</div>
 		<br>	
 		<br>	
 		<div class="col-xs-6">
 			<h5 class="text-center">Republic of the Philippines</h5>
 			<h2 class="text-center">BARANGAY NBBS KAUNLARAN</h2>
 			<h3 class="text-center">CITY OF NAVOTAS CITY</h3>
 			<h4 class="text-center">Lapu-lapu Ave, Kaunlaran Village, Navotas City</h4>
 			<p class="text-center">Tel Nos: 351-60-13</p>
 		</div>
 		<div class="col-xs-3">
 			<img src="">
 		</div>	
 	</div>
 	<div class="bottomline"></div>
 	<br>	
 	<div class="container">
 		<h2 class="text-center">OFFICE OF THE BARANGAY CHAIRMAN</h2>
 		<h1 class="text-center">CERTIFICATION</h1>
 		<br>	
 		<br>
 		
 		<p class="lead text-center">This is to certify that: 
        
 			<input type="text" name="" class="name"  value="<?php echo $fullname?>" style="border: none; border-bottom: 1px solid #000; background-color: #eee; "></p>
 			

 		<p class="lead text-center">Yrs Old:<input type="text" class="age" name=""  value="<?php echo $age?>" style="border: none; border-bottom: 1px solid #000;"> Filipino citizen a bonifide resident of</p>
 		<br>	
 		<br>	
 		<input type="text" name="" class="address" value="<?php echo $address?>" style="border-bottom: 1px solid #000;">
 		<br>	
 		<br>	
 		<p class="lead text-center">Brgy N.B.B.S Kaunlaran Navotas City</p>
 		<p class="lead text-center">Has a good moral character and reputation a law abiding citizen with No Derogatory</p>
 		<p class="lead text-center">Records in this Barangay</p>
 		<p class="lead text-center">This certification is being issued upon the request of the person for</p>
 		<input type="text" name="" class="address" value="<?php echo $purpose?>" style="border-bottom: 1px solid #000;">
 		<br>
 		<br>
 		<p class="lead text-center">Given this <input type="text" class="age" name=""  value="<?php echo substr($cert_date_issued, 8,2);?>" style="border: none; border-bottom: 1px solid #000;"> 
 			day of <input type="text" class="age" name=""  value="<?php echo substr($cert_date_issued, 0,4);?>" style="border: none; border-bottom: 1px solid #000;">2019</p>
 		<br>	
 	
 		<div class="container footer">	
 		<h3 class="text-right cert">Certified:</h3>
 		<br>	
 		
 		
 		<p class="text-right">____________________________________________________________
 		</p>
 		<h3 class="text-right">FEDERICKO "DEREK TOTO" NATIVIDAD</h3>
 		<h5 class="text-right pb">Punong Barangay</h5>
 		</div>
 		<br>	
 		<br>	
 		<div class="footer2">	
 		<p class="text-left">_________________________________________</p>
 		<h4 class="text-left">Specimen Signature</h4>
 		<br>	
 		<div class="row">
 			<div class="col-xs-3">
 		<h4>Community Tax No:</h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $com_tax;?>" style="border: none; border-bottom: 1px solid #000;">
            </div>
            </div>

            <div class="row">
 			<div class="col-xs-3">
 		<h4>Issued at:</h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $issued_at;?>" style="border: none; border-bottom: 1px solid #000;">
            </div>
            </div>

             <div class="row">
 			<div class="col-xs-3">
 		<h4>Issued on: </h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $cert_date_issued;?>" style="border: none; border-bottom: 1px solid #000;">
            </div>
            </div>
<?php
 $status = $_POST['status'];
 $record = "Commit Records";
 $norecord = "No Record";
 if ($status == true): ?>
	 <div class="row">
 			<div class="col-xs-3">
 		<h4>Records </h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $record;?>" style="border: none; border-bottom: 1px solid #000; background-color: red; color: #fff;">
            </div>
            </div>
<?php elseif ($status == false): ?>
	 <div class="row">
 			<div class="col-xs-3">
 		<h4>Records </h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $norecord;?>" style="border: none; border-bottom: 1px solid #000;">
            </div>
            </div>

<?php endif; ?>
            

              <div class="row">
 			<div class="col-xs-3">
 		<h4>Endorsed by:  </h4>  
            </div>
            <div class="col-xs-9">
 			<input type="text" class="tax" name=""  value="<?php echo $endorsed;?>" style="border: none; border-bottom: 1px solid #000;">
            </div>
            </div>



 		
 			
 		<br>	
 		<br>	
 		<h3 class="text-center">(NOT VALID WITHOUT SEAL)</h3>
 		<br>	
 		<br>	
 	</div>
 </div>

</div>
<br>
<br>
<div class="container">
<?php 
$status = $_POST['status'];

if ($status == "Pending"): ?>
	 <a class="btn btn-info"  disabled><i class="fa fa-print"></i> Print List</a></p>         
       <script type="text/javascript">
         $(document).ready(function(){
         $('#print').tooltip('show');
         $('#print').tooltip('hide');
         });
       </script> 
          <button class="btn btn-info" ><i class="fa fa-arrow-left"></i> <a href="patient_info.php" style="color: #fff;">Back</a> </button>
 <?php elseif ($status == "Onhearing"): ?>
 	 <a class="btn btn-info"  disabled><i class="fa fa-print"></i> Print List</a></p>         
       <script type="text/javascript">
         $(document).ready(function(){
         $('#print').tooltip('show');
         $('#print').tooltip('hide');
         });
       </script>
       <button class="btn btn-info" ><i class="fa fa-arrow-left"></i> <a href="patient_info.php" style="color: #fff;">Back</a> </button>
       <?php elseif ($status == "Settled" || $status == ""): ?>
 	 <a href="#" onClick="window.print()" class="btn btn-info" id="print" data-placement="top" title="Click to Print"><i class="fa fa-print"></i> Print List</a></p>         
       <script type="text/javascript">
         $(document).ready(function(){
         $('#print').tooltip('show');
         $('#print').tooltip('hide');
         });
       </script>  
        <button class="btn btn-info" ><i class="fa fa-arrow-left"></i> <a href="generate_cert.php" style="color: #fff;">Back</a> </button>

<?php endif; ?>
</div>