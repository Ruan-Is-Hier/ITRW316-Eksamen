<?php

  include_once ('Connection.php');
  include_once ('requestData.php');
  include_once ('DatabaseHandler.php');
  include_once ('deletData.php');
  include_once ('progressBar.php');
  //Required variable names for connection to DB
  $dbServername = "localhost";
  $dbUsername = "root"; 
  $dbPassword = "password";
  $dbName = "assignment2";
  //create a new connection 
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  //MySQL statement for selecting data
  $sql = "SELECT number_process, arrival_time, execute_time FROM queues";
  //Query the MySQL statement, saving it in the variable $sql 
  $result = mysqli_query($conn, $sql);
  $datas = array();
  //Save each value of each row in an array
  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $datas[] = $row;
    }
  }
  //Save size of the array for use in the for loop
  $size = sizeof($datas);
  //Count the total time of each queue
  $t1 = 0;
  $t2 = 0;
  $t3 = 0;
  for ($i = 0; $i < $size; $i+=3)  { 
    $t1 += $datas[$i]['number_process'];
  }
  for ($i = 1; $i < $size; $i+=3)  { 
    $t2 += $datas[$i]['number_process'];
  } 
  for ($i = 2; $i < $size; $i+=3)  { 
    $t3 += $datas[$i]['number_process'];
  }
  $per1 = 100/$t1;
  $per2 = 100/$t2;
  $per3 = 100/$t3;

  $firstLoop = false;
  $secondLoop = false; 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Assignment 2</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<!-- Start of the navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="Input.php">INPUT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Queues.html">PROCESSES<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<!-- End of the navbar -->

<!-- End of table container -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <table action="requestData.php" class="table col-lg-10" style="margin-top: 5%">
                <thead class="thead-dark">
                  <tr>
                        <th scope="col">Process</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Time</th>

                  </tr>
                </thead>
                <tbody> 
                  <!-- Add items to the first queue table-->
                  <?php for ($i = 0; $i < $size; $i+=3)  { ?>
                    <tr>
                      <td><?php echo $datas[$i]['number_process'] ?></td>
                      <td><?php echo $datas[$i]['arrival_time'] ?></td>
                      <td><?php echo $datas[$i]['execute_time'] ?></td>
                    </tr>
                  <?php  }  ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <table action="requestData.php" class="table col-lg-10" style="margin-top: 5%">
                <thead class="thead-dark">
                  <tr>
                        <th scope="col">Process</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Add items to the second queue table-->
                  <?php for ($i = 1; $i < $size; $i+=3)  { ?>
                    <tr>
                      <td><?php echo $datas[$i]['number_process'] ?></td>
                      <td><?php echo $datas[$i]['arrival_time'] ?></td>
                      <td><?php echo $datas[$i]['execute_time'] ?></td>
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <table action="requestData.php" class="table col-lg-10" style="margin-top: 5%">
                <thead class="thead-dark">
                  <tr>
                        <th scope="col">Process</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Add items to the third queue table-->
                  <?php for ($i = 2; $i < $size; $i+=3) { ?>
                    <tr>
                      <td><?php echo $datas[$i]['number_process'] ?></td>
                      <td><?php echo $datas[$i]['arrival_time'] ?></td>
                      <td><?php echo $datas[$i]['execute_time'] ?></td>
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of table container -->

<!-- Start of time container -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
          <span class="badge badge-pill badge-dark">Queue 1 Total Time: <?php echo $t1 ?></span>
        </div>
        <div class="col-lg-4">
            <span class="badge badge-pill badge-dark">Queue 2 Total Time: <?php echo $t2 ?></span>
        </div>
        <div class="col-lg-4">
            <span class="badge badge-pill badge-dark">Queue 3 Total Time: <?php echo $t3 ?></span>
        </div>
    </div>
</div>
<!-- End of time container -->

<!-- Start of time container -->
<div class="container">
    <div class="row" style="margin-top: 5%">
        <div class="col-lg-4">
          <h5 style="margin-bottom: 5%" >Queue 1 Quantum</h5>
          <input type="range" min="1" max="10" value="1" class="slider" id="myRange1">
          <span class="badge badge-secondary" id="demo1"></span>
        </div>
        <div class="col-lg-4">
          <h5 style="margin-bottom: 5%" >Queue 2 Quantum</h5>
          <input type="range" min="1" max="10" value="1" class="slider" id="myRange2">
          <span class="badge badge-secondary" id="demo2"></span>
        </div>
        <div class="col-lg-4">
          <h5 style="margin-bottom: 5%" >Queue 3 Quantum</h5>
          <input type="range" min="1" max="10" value="1" class="slider" id="myRange3">
          <span class="badge badge-secondary" id="demo3"></span>
        </div>
    </div>
</div>
<!-- End of time container -->

<!-- Start of sliders container -->
<div class="container" style="margin-top: 5%">
    <!-- Start of button row -->
    <div class="row" style="margin-top: 5%; margin-bottom: 5%">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
          <div class="input-group input-group-sm col-md-8">
            <form action="" method="post">
              <button type="button" class="btn btn-dark" style="">Start All</button>
            </form> 
          </div>
        </div>
        <div class="col-lg-4">
      </div>     
  </div>
  <!-- Start of progressbar row-->
  <div class="row">
    <div class="col-lg-4" >
        <div id="progress" style="width:200px;border:1px solid #ccc;"></div>
        <!-- Progress information -->
        <div id="information" style="width: 210px"></div>
        <?php
        // Loop through process
        for($i=1; $i<=$t1; $i++){
          // Calculate the percentation
          $percent = intval($i/$t1 * 100)."%";        
          // Javascript for updating the progress bar and information
          echo '<script language="javascript">
          document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#343a40;\">&nbsp;</div>";
          document.getElementById("information").innerHTML="'.$i.' seconds of Queue 1..";
          </script>';
          // This is for the buffer achieve the minimum size in order to flush data
          echo str_repeat(' ',1024*64);
          // Send output to browser immediately
          flush();
          // Sleep one second so we can see the delay
          sleep(1);
        }
        // Tell user that the process is completed
        echo '<script language="javascript">document.getElementById("information").innerHTML="Queue one completed"</script>';
        ?>
    </div>

    <div class="col-lg-4">
      <div id="progress2" style="width:200px;border:1px solid #ccc;"></div>
        <!-- Progress information -->
        <div id="information2" style="width: 210px"></div>
        <?php
        // Loop through process
        for($i=1; $i<=$t2; $i++) {
          // Calculate the percentation
          $percent2 = intval($i/$t2 * 100)."%";  
          // Javascript for updating the progress bar and information
          echo '<script language="javascript">
          document.getElementById("progress2").innerHTML="<div style=\"width:'.$percent2.';background-color:#343a40;\">&nbsp;</div>";
          document.getElementById("information2").innerHTML="'.$i.' seconds of Queue 2...";
          </script>';
          // This is for the buffer achieve the minimum size in order to flush data
          echo str_repeat(' ',1024*64);
          // Send output to browser immediately
          flush();
          // Sleep one second so we can see the delay
          sleep(1);
        }
        // Tell user that the process is completed
        echo '<script language="javascript">document.getElementById("information2").innerHTML="Queue two completed"</script>';
        ?>
    </div>
    <div class="col-lg-4">
        <div id="progress3" style="width:200px;border:1px solid #ccc;"></div>
        <!-- Progress information -->
        <div id="information3" style="width: 210px"></div>
        <?php
        // Loop through process
        for($i=1; $i<=$t3; $i++) {
          // Calculate the percentation
          $percent3 = intval($i/$t3 * 100)."%";  
          // Javascript for updating the progress bar and information
          echo '<script language="javascript">
          document.getElementById("progress3").innerHTML="<div style=\"width:'.$percent3.';background-color:#343a40;\">&nbsp;</div>";
          document.getElementById("information3").innerHTML="'.$i.' seconds of Queue 2...";
          </script>';
          // This is for the buffer achieve the minimum size in order to flush data
          echo str_repeat(' ',1024*64);
          // Send output to browser immediately
          flush();
          // Sleep one second so we can see the delay
          sleep(1);
        }
        // Tell user that the process is completed
        echo '<script language="javascript">document.getElementById("information3").innerHTML="Queue three completed"</script>';
        ?>
  </div>
</div>
<!-- End of sliders container -->



<!-- Start of Button Container-->
<div class="container">
  <div class="row" style="margin-top: 5%">
    <div class="col-lg-4">
      </div>

      <div class="col-lg-4">
    </div>
  </div>
</div>
<!-- End of Button Container-->

    
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="RangeSliders.js"></script>

</body> 
</html>