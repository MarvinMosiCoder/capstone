<?php include('includes/sidebar.php'); ?>
<div class="main">

<section>
  <div class="container-fluid">
    <div class="row">
      <?php  include('includes/navbar.php'); ?>
      <div class="col-lg-6">
        <?php 
       $resident = mysqli_query($conn,"select * from residences ")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
     
          <!--Residence-->
         
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

    <div class="col-lg-6">
      <!--Registered Voters-->
        <?php 
       $resident = mysqli_query($conn,"select * from residences WHERE VoterStatus = 'YES'")or die(mysqli_error());
     $resident = mysqli_num_rows($resident);
     ?>
       
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
  </div>
</section>

<!-- Gender Graph -->
<?php
  /* Database connection settings */
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'bms';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

  $data1 = '';
  $data2 = '';

  //query to get data from the table
  $sql = "SELECT (Select count(*)  FROM residences where Gender ='Male') AS Male, (Select count(*) FROM residences where Gender='Female') AS Female ";
    $result = mysqli_query($mysqli, $sql);

  //loop through the returned data
  while ($row = mysqli_fetch_array($result)) {

    $male = $data1 . '"'. $row['Male'] .'",';
    $female = $data2 . '"'. $row['Female'] .'",';
  }

  $data1 = trim($male,",");
  $data2 = trim($female,",");
?>
   
      <canvas id="bar-chartcanvas">
      </canvas>

   
<script>
      $(document).ready(function () {

  var ctx = $("#bar-chartcanvas");

  var data = {
    labels : [""],
    datasets : [
      {
        label : "Male",
        data : [<?php echo $male;  ?>],
        backgroundColor : ["#F44336"],
        borderColor : [
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Female",
        data : [<?php echo $female; ?>],
        backgroundColor : ["#FFC107"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      }
    ]
  };

  var options = {
    title : {
      display : true,
      position : "top",
      text : "Female and Male Graph",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    },
    scales : {
      yAxes : [{
        ticks : {
          min : 0
        }
      }]
    }
  };

  var chart = new Chart( ctx, {
    type : "bar",
    data : data,
    options : options
  });

});
</script>
    
  


<!--Monthly Area Graph -->
<?php include('Graphjs/resiGraph.php'); ?> 
    
      <canvas id="bar-area">
      </canvas>
   
<script>
      $(document).ready(function () {

  var ctx = $("#bar-area");

  var data = {
    labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets : [
      {
        label : "Kapitbahayan",
        data : ["<?php echo $tjan; ?>",
                "<?php echo $tfeb; ?>",
                "<?php echo $tmar; ?>",
                "<?php echo $tapr; ?>",
                "<?php echo $tmay; ?>",
                "<?php echo $tjun; ?>",
                "<?php echo $tjul; ?>",
                "<?php echo $taug; ?>",
                "<?php echo $tsep; ?>",
                "<?php echo $toct; ?>",
                "<?php echo $tnov; ?>",
                "<?php echo $tdec; ?>"],
        backgroundColor : ["#4682B4"],
        borderColor : [
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1A",
        data : ["<?php echo $ajan; ?>",
                "<?php echo $afeb; ?>",
                "<?php echo $amar; ?>",
                "<?php echo $aapr; ?>",
                "<?php echo $amay; ?>",
                "<?php echo $ajun; ?>",
                "<?php echo $ajul; ?>",
                "<?php echo $aaug; ?>",
                "<?php echo $asep; ?>",
                "<?php echo $aoct; ?>",
                "<?php echo $anov; ?>",
                "<?php echo $adec; ?>"],
        backgroundColor : ["#9400D3"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1B",
        data : ["<?php echo $bjan; ?>",
                "<?php echo $bfeb; ?>",
                "<?php echo $bmar; ?>",
                "<?php echo $bapr; ?>",
                "<?php echo $bmay; ?>",
                "<?php echo $bjun; ?>",
                "<?php echo $bjul; ?>",
                "<?php echo $baug; ?>",
                "<?php echo $bsep; ?>",
                "<?php echo $boct; ?>",
                "<?php echo $bnov; ?>",
                "<?php echo $bdec; ?>"],
        backgroundColor : ["#2E8B57"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1C",
        data : ["<?php echo $cjan; ?>",
                "<?php echo $cfeb; ?>",
                "<?php echo $cmar; ?>",
                "<?php echo $capr; ?>",
                "<?php echo $cmay; ?>",
                "<?php echo $cjun; ?>",
                "<?php echo $cjul; ?>",
                "<?php echo $caug; ?>",
                "<?php echo $csep; ?>",
                "<?php echo $coct; ?>",
                "<?php echo $cnov; ?>",
                "<?php echo $cdec; ?>"],
        backgroundColor : ["#DB7093"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      }
    ]
  };

  var options = {
    title : {
      display : true,
      position : "top",
      text : "Monthly Reports Area of Navotas(<?php echo $year; ?>)",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    },
    scales : {
      yAxes : [{
        ticks : {
          min : 0
        }
      }]
    }
  };

  var chart = new Chart( ctx, {
    type : "bar",
    data : data,
    options : options
  });

});
</script>


<!--Weely Area Graph -->
<?php include('Graphjs/weeklyGraph.php'); ?> 
    
      <canvas id="weekly-bar-area">
      </canvas>
   
<script>
      $(document).ready(function () {

  var ctx = $("#weekly-bar-area");

  var data = {
    labels : ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets : [
      {
        label : "Kapitbahayan",
        data : ["<?php echo $tmon; ?>",
                "<?php echo $ttues; ?>",
                "<?php echo $twed; ?>",
                "<?php echo $tthurs; ?>",
                "<?php echo $tfri; ?>",
                "<?php echo $tsat; ?>",
                "<?php echo $tsun; ?>"],
        backgroundColor : ["#4682B4"],
        borderColor : [
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1A",
        data : ["<?php echo $amon; ?>",
                "<?php echo $atues; ?>",
                "<?php echo $awed; ?>",
                "<?php echo $athurs; ?>",
                "<?php echo $afri; ?>",
                "<?php echo $asat; ?>",
                "<?php echo $asun; ?>"],
        backgroundColor : ["#9400D3"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1B",
        data : ["<?php echo $bmon; ?>",
                "<?php echo $btues; ?>",
                "<?php echo $bwed; ?>",
                "<?php echo $bthurs; ?>",
                "<?php echo $bfri; ?>",
                "<?php echo $bsat; ?>",
                "<?php echo $bsun; ?>"],
        backgroundColor : ["#2E8B57"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      },
      {
        label : "Phase 1C",
        data : ["<?php echo $cmon; ?>",
                "<?php echo $ctues; ?>",
                "<?php echo $cwed; ?>",
                "<?php echo $cthurs; ?>",
                "<?php echo $cfri; ?>",
                "<?php echo $csat; ?>",
                "<?php echo $csun; ?>"],
        backgroundColor : ["#DB7093"],
        borderColor : [
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)",
          "rgba(50, 150, 250, 1)"
        ],
        borderWidth : 1
      }
    ]
  };

  var options = {
    title : {
      display : true,
      position : "top",
      text : "Weekly Reports Area of Navotas(<?php echo $year; ?>)",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    },
    scales : {
      yAxes : [{
        ticks : {
          min : 0
        }
      }]
    }
  };

  var chart = new Chart( ctx, {
    type : "bar",
    data : data,
    options : options
  });

});
</script>




<!--Weekly status Graph -->
<?php include('Graphjs/status_weekly_graph.php'); ?> 
    
      <canvas id="weekly-status-bar-area">
      </canvas>
   
<script>
      $(document).ready(function () {

  var ctx = $("#weekly-status-bar-area");

  var data = {
    labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets : [
      {
        label : "Settled",
        data : ["<?php echo $sjan; ?>",
                "<?php echo $sfeb; ?>",
                "<?php echo $smar; ?>",
                "<?php echo $sapr; ?>",
                "<?php echo $smay; ?>",
                "<?php echo $sjun; ?>",
                "<?php echo $sjul; ?>",
                "<?php echo $saug; ?>",
                "<?php echo $ssept; ?>",
                "<?php echo $soct; ?>",
                "<?php echo $snov; ?>",
                "<?php echo $sdec; ?>"],
        backgroundColor : ["#000000"],
        borderColor : [
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)",
          "rgba(10, 20, 30, 1)"
        ],
        borderWidth : 1
      }
          
    ]
  };

  var options = {
    title : {
      display : true,
      position : "top",
      text : "Monthly Settled Status(<?php echo $year; ?>)",
      fontSize : 17,
      fontColor : "#000"
    },
    legend : {
      display : true,
      position : "bottom"
    },
    scales : {
      yAxes : [{
        ticks : {
          min : 0
        }
      }]
    }
  };

  var chart = new Chart( ctx, {
    type : "bar",
    data : data,
    options : options
  });

});

//Submit event
</script>
</div>
<!--end of wrapper-->
<?php include('includes/script.php'); ?>
<!-- ChartLink -->
<!-- <script src="charts/bar.js"></script> -->
       
    


