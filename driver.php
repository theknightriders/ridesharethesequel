<?php
session_start();
?>

<!DOCTYPE HTML>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
					$newTripDateInput = $_POST['newTripDateInput'];
					$tripdeparttime = $_POST['tripdeparttime'];
					$oneOrRepeatTrip = $_POST['oneOrRepeatTrip'];
					$repeatTripFromTo = $_POST['repeatTripFromTo'];
					$newTripDateInput = $_POST['newTripDateInput'];
					$departSelect = $_POST['departSelect'];
					$destinationSelect = $_POST['destinationSelect'];
					$driverCarYear = $_POST['driverCarYear'];
					$driverCarMake = $_POST['driverCarMake'];
					$driverCarModel = $_POST['driverCarModel'];
					$seatSelect = $_POST['seatSelect'];
					$smokeFreeYesOrNo = $_POST['smokeFreeYesOrNo'];
					$packageYesOrNo = $_POST['packageYesOrNo'];
					$messageYesOrNo = $_POST['messageYesOrNo'];
					if($messageYesOrNo = 'no'){
						$message = "no Message";
					}
					$message = $_POST['messageToPassengers'];
          $user = $_SESSION["id"];

					include('mysqli_connect.php'); 
					
					$sqlInsertVehicle="INSERT INTO vehicle(smoke_description,seats_total,package_able,vehicle_year,vehicle_make,vehicle_model) VALUES
						('$smokeFreeYesOrNo','$seatSelect','$packageYesOrNo','$driverCarYear','$driverCarMake','$driverCarModel')";
					
					if ($conn->query($sqlInsertVehicle) === TRUE) {
						//echo "New Vehicle record created successfully";
					} else {
						echo "Error: " . $sqlInsertVehicle . "<br>" . $conn->error;
					}
					$sqlInsertRide="INSERT INTO ride(location_start,location_end,message) VALUES
						('$departSelect','$destinationSelect','$message')";
						
					if ($conn->query($sqlInsertRide) === TRUE) {
						//echo "New Ride record created successfully";
					} else {
						echo "Error: " . $sqlInsertRide . "<br>" . $conn->error;
					}
					
					$sqlInsertTrip="INSERT INTO trip(trip_date,trip_time,trip_repeat,repeat_day) VALUES
						('$newTripDateInput','$tripdeparttime','$oneOrRepeatTrip','$repeatTripFromTo')";
					
					if ($conn->query($sqlInsertTrip) === TRUE) {
						//echo "New Trip record created successfully";
					} else {
						echo "Error: " . $sqlInsertTrip . "<br>" . $conn->error;
					}
					
		}
		
		?>

<html class="stretchPage" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MGA Knight Riders</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
 <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
    <script src="scripts/datatablesDriver.js"></script>
    <link rel="stylesheet" href="styles/bootstrap-timepicker.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
<!--     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
  </head>
<!-- 
  <body class="extendForTable stretchPage">
    <script type="text/javascript">
      $('newTripTime').timepicker();
    </script> -->
    <div class="container stretchPage"><div id="container">
      <div class="page-header">
        <div class="logoContainer">
          <a href="welcome.php" title="MGA Knight Riders: Homepage">
             <br><br>
            <img class="logoSmall" src="images/KRLogoVert.png"  alt="small logo"/>
            <img class="logoBig" src="images/KRLogoHorizontal.jpg" alt="big logo" />
          </a>
          <div class="topRightMenuContainer">
            <ul class="text-right topRightMenu">
              <li><a href="welcome.php">Welcome</a></li>
              <li><a href="aboutus.php">About Us</a></li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="help.php">Help</li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>




<!-- NEW DRIVE EVENT FORM -->
      <div id="newTripModal" class="modal fade" role="dialog">
        <div class="modal-dialog modalDriver">
          <div class="modal-content">
            <div class="modal-header" id="newTripModalHeader">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h1 class="text-center">Trip Details:</h1><br>
              <form id="newTripForm" action="driver.php" method="post">
                <div class="row">
                  <div class="col-sm-4 col-xs-2"></div>
                  <div class="col-sm-4 col-xs-8">
                    <div>
                        <p class="text-center"> Please click Schedule Trip when finished.</p>
                        <br> 
                    </div>
                    <div>
                      <div class="text-center">Departure Date &amp; Time</div>
                      <input id="newTripDate" type="date" class="form-control" name="newTripDateInput" required>
                      <input id="newDepartTime" type="time" class="form-control" name="tripdeparttime" required>
<!--                       <div class="input-group bootstrap-timepicker timepicker">
                        <input id="newTripTime" type="text" class="form-control" name="newTripLnameInput" required> -->
                      </div><br>

                      <div class="text-center">
                        <div>Is this a repeat trip?</div>
                        <label class="radio-inline">
                          <input id="newTripRepeatBooleanYes" type="radio" value="yes" name="oneOrRepeatTrip">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripRepeatBooleanNo" type="radio" value="no" name="oneOrRepeatTrip" checked="checked">
                          No
                        </label>
                      </div>

                      <div class="repeatTripFromTo">
                        <select class="selectpicker orangeDropdown form-control" data-width="100%" name ="repeatTripFromTo">
                          <option selected disabled >Repeats On:</option>
						  <option value="none" hidden selected ="selected"></option> <!-- necessary to display none and act as a default -->			  		  
                          <option value="Sundays" >Sundays</option>
                          <option value="Mondays">Mondays</option>
                          <option value="Tuesdays">Tuesdays</option>
                          <option value="Wednesdays">Wednesdays</option>
                          <option value="Thursdays">Thursdays</option>
                          <option value="Fridays">Fridays</option>
                          <option value="Saturdays">Saturdays</option>
                        </select>
                        <div class="text-center">End Date</div>
                        <input id="newTripRepeatDate" type="date" class="form-control" name="newTripDateInputRepeat">
                      </div>

                      <br>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "departSelect">
                        <option selected value="none">Departing From:</option>
                        <option value="AldermanCochranDepart">Alderman, Cochran</option>
                        <option value="MemorialCochranDepart">Memorial Hall, Cochran</option>
                        <option value="DublinDepart">Dublin Center Annex Building, Dublin</option>
                        <option value="EastmanDepart">Corporate Hangar, Eastman</option>
                        <option value="JonesMaconDepart">Charles H. Jones Building, Macon</option>
                        <option value="SLCMaconDepart">Student Life Center, Macon</option>
                        <option value="WarnerRobinsDepart">Oak Hall, Warner Robins</option>
                      </select>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "destinationSelect">
                        <option selected value = "none">Destination:</option>
                        <option value="AldermanCochranArrive">Alderman, Cochran</option>
                        <option value="MemorialCochranArrive">Memorial Hall, Cochran</option>
                        <option value="DublinArrive">Dublin Center Annex Building, Dublin</option>
                        <option value="EastmanArrive">Corporate Hangar, Eastman</option>
                        <option value="JonesMaconArrive">Charles H. Jones Building, Macon</option>
                        <option value="SLCMaconArrive">student Life Center, Macon</option>
                        <option value="WarnerRobinsArrive">Oak Hall, Warner Robins</option>
                      </select><br><br>
                      
                      <input id="driverCarYear" type="text" class="form-control" name="driverCarYear" placeholder="Car Year" required>
                      <input id="driverCarMake" type="text" class="form-control" name="driverCarMake" placeholder="Car Make" required>
                      <input id="driverCarModel" type="text" class="form-control" name="driverCarModel" placeholder="Car Model" required><br>

                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "seatSelect">
                        <option selected disabled>Number of Seats:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select><br>

                      <div class="text-center"><br>
                        <div>Is your vehicle<br>smoke-free?</div>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanYes" type="radio" name="smokeFreeYesOrNo" value="1" checked="checked">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanNo" type="radio" name="smokeFreeYesOrNo" value="0">
                          No
                        </label>
                      </div><br>

                      <div class="text-center">
                        <div>Are you willing<br>to deliver a package?</div>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanYes" type="radio" name="packageYesOrNo" value="yes">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanNo" type="radio" name="packageYesOrNo" value="no" checked="checked">
                          No
                        </label><br><br>
                      </div>

                      <div class="packageNotice">
                        <p class="text-center textbold">
                          Please note all packages must be smaller than a<br>10&quot; x 13&quot; envelope
                        </p>
                      </div>

                      <div class="text-center">
                        <div>Would you like to leave a note for potential passengers?</div>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanYes" type="radio" name="messageYesOrNo" value="yes">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanNo" type="radio" name="messageYesOrNo" value="no" checked="checked">
                          No
                        </label>
                      </div>

                      <div class="messageToPassengers">
                        <br>
                        <textarea class="form-control" rows="3" id="messageToPassengers" name = "messageToPassengers"value = "none">Leave your message here.</textarea>
                      </div>

                      <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" name="submitNewTripButton" value="Schedule Trip">
                      </div><br>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="body">
          <div class="row text-center">
            <h4 class="welcomeHeader">Add a new event, or select one to edit/delete</h4>
          </div>
	  <div class="row">
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <div class="button-group text-center" role="group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTripModal">New</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTripModal">Edit</button>
                <button type="button" class="btn btn-primary">Delete</button>
              </div>
            </div>
            <div class="col-md-7 centerWhenSmol">
              <br class="visibleWhenSmol"><a href="dropoffpoints.php" class="btn btn-primary">Drop Off Points</a>
            </div>
            <div class="col-md-1"></div>
          </div>



          
		<div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
             <br>
              <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Repeat</th>
                        <th>Departing</th>
                        <th>Destination</th>
                        <th># of Seats</th>
                        <th>Smoke Free</th>
                        <th>Packages</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						require ('mysqli_connect.php');
						$query =   "SELECT trip.trip_date, trip.trip_time, trip.repeat_day, ride.location_start, ride.location_end, vehicle.seats_total, vehicle.smoke_description,vehicle.package_able
						FROM trip INNER JOIN ride ON trip.trip_id=ride.trip_id INNER JOIN vehicle ON vehicle.vehicle_id=ride.vehicle_id WHERE trip.trip_date >= CURDATE()";
						
						
						$result = mysqli_query($conn, $query);
						if (mysqli_num_rows($result)>0)
							{															
									while ($row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>" .$row['trip_date']. "</td>" ;
										echo "<td>" .$row['trip_time']. "</td>" ;
										echo "<td>" .$row['repeat_day']. "</td>";
										echo "<td>" .$row['location_start']. "</td>" ;
										echo "<td>" .$row['location_end']. "</td>" ;
										echo "<td>" .$row['seats_total']. "</td>";
										echo "<td>" .$row['smoke_description']. "</td>" ;
										echo "</tr>";
									}
							
						}
					?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-1"></div>
          </div>
        </div>



		<?php 
			$conn->close();
			//mysqli_close($dbc); //close connection
		?>
        <div id="footer" class="text-center center">
            <hr>
            Copyright &copy; 2017 MGA Knight Riders<br>
            Website Development by <a href="mailto:MGAKnightRiders@mga.edu">MGA Knight Riders</a>
        </div>

    </div></div>



  </body>
</html>