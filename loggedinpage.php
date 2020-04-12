<?php
    //Declaring array variables
    $submitCount = 0;   //Can only update 3 times
    $error1 = "";
    $error2 = "";
    $aSpot = array();
    $aAvy = array();
    $bSpot = array();
    $bAvy = array();
    $cSpot = array();
    $cAvy = array();
    $dSpot = array();
    $dAvy = array();
    $haSpot = array();
    $haAvy = array();
    $hbSpot = array();
    $hbAvy = array();
    $hcSpot = array();
    $hcAvy = array();
    $hdSpot = array();
    $hdAvy = array();

    if(isset($_POST['submit'])){
      $submitCount++;
      if($submitCount<=3){
        $parkingLot = $_POST['parking'];
        $parkingRow = $_POST['parkingRow'];
        $spotID = $_POST['spotID'];
        $availability = mb_strtoupper($_POST['availability']);

        //echo $parkingLot ." " . $parkingRow ."  " . $spotID . " ". $availability;
        if(($spotID>=0) and ($spotID<=10)){
          if(($availability=='YES') or ($availability=='NO')){
            if($parkingLot=="trojancenter"){
              require_once("connection1.php");
              $updateQuery = $connection1->query("UPDATE $parkingRow SET Availability = '$availability' WHERE ParkingSpotID = '$spotID'");
            }
            else{
              require_once("otherconnection.php");
              $updateQuery = $otherConnection->query("UPDATE $parkingRow SET Availability = '$availability' WHERE ParkingSpotID = '$spotID'");
            }
          }
          else{
            $error1= "Please enter a 'YES' or 'NO'";
          }
        }
        else{
          $error2 = "Please enter a number between 1 and 10";
        }

      }
      else{
        echo "<script>alert('Maximum submission exceeded! Please logout and try again!')</script>";
      }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  
	<!---------------------------------------SHIJIA's part------------------------------------------------------->
	<!--------------------------------------Bootstrap CSS-------------------------------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!----------------------------------------------------------------------------------------------------------->
	
	
  <title>Parking Lot Management</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .tcArea{
      height: 100%;
      width: 50%;
      float: left;
    }
    .hhArea{
      height: 100%;
      width: 50%;
      float: right;
    }
    #tData{
      width: 25%;
    }
    .tcTable{
      width: 100%;
      height: 90%;
    }
    table, th, td{
      border: 1px solid black;
      border-collapse: collapse;
      opacity: 0.75;
    }
    .tcTable{
      table-layout: fixed;
    }
    th, td{
      padding: 10px;
      text-align: center;
    }
    td{
      font-size: 10px;
    }
    th{
      background-color: #a70000;
      color: white;
    }
    tr:nth-child(even){
      background-color: #e8e8e8;
    }
    tr:nth-child(odd){
      background-color: white;
    }
    .input-field{
      margin: 10px, 0px, 10px, 0px;
    }
    .input-field label{
      display: block;
      text-align: center;
      margin: 3px;
    }
    .input-field input{
      height: 30px;
      width: 15%;
      padding: 5px 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid gray;
    }
    .error{
      color: red;
    }
	
	
	
	#container_opacity{
		background-color: rgba(255, 255, 255, 0.65);
	}
	
	.container{
		height: 1500px;
	}
	
	html{
		background: url(background.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-0-background-size: cover;
		background-size: cover;
	}
	
	body{
		background: none;
	}
	
	

  </style>

</head>

<body>


  <!-- Navigation -->
  <!--
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Troy University Parking Lot Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  -->

	<!---------------------------------------SHIJIA's part------------------------------------------------------->
	<!--------------------------------------nav bar------------------------------------------------------->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Troy University Parking Lot Management System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
			<form class="form-inline my-2 my-lg-0">
				<button class="btn btn-outline-success my-2 my-sm-0" type="button"><a href='home.php'>log out</a></button>
			</form>
		</div>
	</nav>
	<!--------------------------------------nav bar------------------------------------------------------->

  <!-- Page Content -->
  <div class="container" id="container_opacity">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Parking Spots Availability Chart</h1>
        <div class="tcArea">

          <table class="tcTable">
            <tr>
              <td colspan="8"><h2 class="mt-5">Trojan Center Parking Spots</h2></td>
            </tr>
            <tr>
              <th colspan="2">ParkingRow-A</th>
              <th colspan="2">ParkingRow-B</th>
              <th colspan="2">ParkingRow-C</th>
              <th colspan="2">ParkingRow-D</th>
            </tr>
            <tr>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
            </tr>
             <?php
                  include('connection1.php');
                  $query_a = $connection1->query("SELECT *FROM parkingrow_a");
                  while($rows = $query_a->fetch()){
                    $aSpot[] = $rows['ParkingSpotID'];
                    $aAvy[] = $rows['Availability'];
                  }
                  $query_b = $connection1->query("SELECT *FROM parkingrow_b");
                  while($rows = $query_b->fetch()){
                    $bSpot[] = $rows['ParkingSpotID'];
                    $bAvy[] = $rows['Availability'];
                  }
                  $query_c = $connection1->query("SELECT *FROM parkingrow_c");
                  while($rows = $query_c->fetch()){
                    $cSpot[] = $rows['ParkingSpotID'];
                    $cAvy[] = $rows['Availability'];
                  }
                  $query_d = $connection1->query("SELECT *FROM parkingrow_d");
                  while($rows = $query_d->fetch()){
                    $dSpot[] = $rows['ParkingSpotID'];
                    $dAvy[] = $rows['Availability'];
                  }
                  for ($x = 0; $x < 10; $x++) {
                      echo "<tr><td>{$aSpot[$x]} </td><td> {$aAvy[$x]}</td><td>{$bSpot[$x]}</td><td>{$bAvy[$x]}</td><td>{$cSpot[$x]} </td><td> {$cAvy[$x]}</td><td>{$dSpot[$x]} </td><td> {$dAvy[$x]}</td></tr>";
                  }
              ?>

          </table>

        </div>
        <div class="hhArea">
          <table class="tcTable">
            <tr>
              <td colspan="8"><h2 class="mt-5">Hawkins Hall Parking Spots</h2></td>
            </tr>
            <tr>
              <th colspan="2">ParkingRow-A</th>
              <th colspan="2">ParkingRow-B</th>
              <th colspan="2">ParkingRow-C</th>
              <th colspan="2">ParkingRow-D</th>
            </tr>
            <tr>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
              <td>SpotID</td>
              <td>Availability</td>
            </tr>

            <?php
                 include('otherconnection.php');
                 $hquery_a = $otherConnection->query("SELECT *FROM parkingrow_a");
                 while($rows = $hquery_a->fetch()){
                   $haSpot[] = $rows['ParkingSpotID'];
                   $haAvy[] = $rows['Availability'];
                 }
                 $hquery_b = $otherConnection->query("SELECT *FROM parkingrow_b");
                 while($rows = $hquery_b->fetch()){
                   $hbSpot[] = $rows['ParkingSpotID'];
                   $hbAvy[] = $rows['Availability'];
                 }
                 $hquery_c = $otherConnection->query("SELECT *FROM parkingrow_c");
                 while($rows = $hquery_c->fetch()){
                   $hcSpot[] = $rows['ParkingSpotID'];
                   $hcAvy[] = $rows['Availability'];
                 }
                 $hquery_d = $otherConnection->query("SELECT *FROM parkingrow_d");
                 while($rows = $hquery_d->fetch()){
                   $hdSpot[] = $rows['ParkingSpotID'];
                   $hdAvy[] = $rows['Availability'];
                 }
                 for ($x = 0; $x < 10; $x++) {
                     echo "<tr><td>{$haSpot[$x]} </td><td> {$haAvy[$x]}</td><td>{$hbSpot[$x]}</td><td>{$hbAvy[$x]}</td><td>{$hcSpot[$x]} </td><td> {$hcAvy[$x]}</td><td>{$hdSpot[$x]} </td><td> {$hdAvy[$x]}</td></tr>";
                 }
             ?>
          </table>

        </div>

        <p class="lead">
          <h3>Please submit below to mark the spot as TAKEN after you have parked successfully!!!</h3>
        </p>
        <div class="radioInput" style="font-size: 18px;">
            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
              <div>
                <input type="radio" name="parking" value="trojancenter" checked="checked"> Trojan Center Parking Lot<br>
                <input type="radio" name="parking" value="hawkinshall"> Hawkins Hall Parking Lot<br><br>
              </div>
              <div class="input-field">
                <lable>Select a Parking Row</label>
                <select name="parkingRow">
                    <option value="parkingrow_a">ParkingRow-A</option>
                    <option value="parkingrow_b">ParkingRow-B</option>
                    <option value="parkingrow_c">ParkingRow-C</option>
                    <option value="parkingrow_d">ParkingRow-D</option>
                </select> <br><br>
              </div>
              <div class="input-field">
                <label>SpotID</label>
                <input type="text" name="spotID" required> <br>
                <span class="error"><?= $error2 ?></span>
              </div>
              <div class="input-field">
                <label>Available? (YES/NO) </label>
                <input type="text" name="availability" required> <br>
                <span class="error"><?= $error1 ?></span>
              </div>
              <div>
                <button type="submit" name='submit'class='btn btn-primary'>Let's go!</button>
              </div>
              </form>
        </div>
      </div>
    </div>
  </div>
	
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
  
	<!---------------------------------------SHIJIA's part------------------------------------------------------->
	<!------------------------------ jQuery first, then Popper.js, then Bootstrap JS ---------------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!----------------------------------------------------------------------------------------------------------->
	
</body>

</html>
