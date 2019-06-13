<?php

	include_once ('Connection.php');
	include_once ('requestData.php');
	include_once ('DatabaseHandler.php');
	include_once ('deletData.php');

	$requestData = new RequestData;
	$requestData2 = $requestData->fetch_all();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Assignment 2</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<!-- Start of navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Input.php">INPUT<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Queues.php">PROCESSES</a>
      </li>
    </ul>
  </div>
</nav>
<!-- End of navbar -->

<!-- Start of input group -->
<div class="input-group input-group-sm" style="margin: 2%">
	<form action="DatabaseHandler.php" method="post">
			  <p>
	    		<input type="number" name="number_process" class="form-control" id="lastName" placeholder="Enter process number">
    		</p>
    		<p>
	    		<input type="number" name="arrival_time" class="form-control" id="firstName" placeholder="Arrival time of process">
    		</p>
    		<p>
	    		<input type="number" name="execute_time" class="form-control" id="lastName" placeholder="The execution time">
    		</p>
    	<button type="submit" class="btn btn-dark center-block">Add</button>
	</form>
</div>
<div style="margin: 2%">
	<form action="deleteData.php" method="post">
    	<button type="delete" class="btn btn-dark center-block">Delete All</button>
    </form>	
</div>
<!-- End of input group -->

<!-- jQuery , Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="RangeSliders.js"></script>

</body>	
</html>