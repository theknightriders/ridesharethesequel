<?php
require('session.php');
?>

<!DOCTYPE HTML>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')	
		{
			if(isset($_POST['submitNewTripButton']))
				{	
					//Strip tags from inputs to prevent XSS
					$newTripDateInput = strip_tags($_POST['newTripDateInput']);
					$tripdeparttime = strip_tags($_POST['tripdeparttime']);
					$oneOrRepeatTrip = strip_tags($_POST['oneOrRepeatTrip']);
					$repeatTripFromTo = strip_tags($_POST['repeatTripFromTo']);
					$departSelect = strip_tags($_POST['departSelect']);
					$destinationSelect = strip_tags($_POST['destinationSelect']);
					$driverCarYear = strip_tags($_POST['driverCarYear']);
					$driverCarMake = strip_tags($_POST['driverCarMake']);
					$driverCarModel = strip_tags($_POST['driverCarModel']);
					$seatSelect = strip_tags($_POST['seatSelect']);
					$smokeFreeYesOrNo = strip_tags($_POST['smokeFreeYesOrNo']);
					$packageYesOrNo = strip_tags($_POST['packageYesOrNo']);
					$messageYesOrNo = strip_tags($_POST['messageYesOrNo']);
					if($messageYesOrNo = 'no')
						{
							$message = "no Message";
						}
					$message = strip_tags($_POST['messageToPassengers']);

					//Connect to the database
					include('mysqli_connect.php'); 
					
					//Begin transaction
					mysqli_begin_transaction($conn);
					
					//Calculate ROI - BACKEND
					include('roi.php');
					
					//Select user_id for subsequent query into ride table
					$sql = "SELECT user_id FROM users WHERE email = '$email'";
					$rs = mysqli_query($conn, $sql);
					if (mysqli_num_rows($rs) == 1) //If a record set is returned, initialize and set user ID variable.
					{
						while ($row = mysqli_fetch_assoc($rs))
						{
							$user_id = $row['user_id'];
							//echo "user_id: " . $user_id; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only
						}
					}
					
					$sqlInsertVehicle="INSERT INTO vehicle(smoke_description,seats_total,package_able,vehicle_year,vehicle_make,vehicle_model) VALUES (?,?,?,?,?,?)";
					$sqlInsertRide="INSERT INTO ride(user_id,vehicle_id,trip_date,trip_time,trip_repeat,repeat_day,location_start,location_end,message,roi) VALUES (?,?,?,?,?,?,?,?,?,?)";
					
					//Initialize incrementors
					$count = 0;
					$vehicle_id = 0;
					$ride_id = 0;
					
					//Initiate transaction
					$stmt = mysqli_stmt_init($conn);
					
					//Prepared statements for vehicle table
					if (mysqli_stmt_prepare($stmt,$sqlInsertVehicle))
						{
							mysqli_stmt_bind_param($stmt,'sissss',$smokeFreeYesOrNo,$seatSelect,$packageYesOrNo,$driverCarYear,$driverCarMake,$driverCarModel);
							mysqli_stmt_execute($stmt);
							$count = mysqli_stmt_affected_rows($stmt);
							$vehicle_id = mysqli_stmt_insert_id($stmt);
							//echo "count: " . $count; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only
							//echo "vehicle_count: " . $vehicle_id; //Testing/debugging purposes only
						}
						
					echo ("<br>"); //Testing/debugging purposes only
					$vehicleQuery = "SELECT vehicle_id FROM vehicle ORDER BY vehicle_id DESC LIMIT 1"; //Select last vehicle ID inserted
					$vehicleResult = mysqli_query($conn,$vehicleQuery);
					if (mysqli_num_rows($vehicleResult) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($vehicleResult)) {
							$vehicle = $row['vehicle_id'];
							//echo "vehicle: " . $vehicle; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only
						}
					}
					
					//Prepared statements for ride table
					if (mysqli_stmt_prepare($stmt,$sqlInsertRide))
						{
							mysqli_stmt_bind_param($stmt,'iisssssssi',$user_id,$vehicle,$newTripDateInput,$tripdeparttime,$oneOrRepeatTrip,$repeatTripFromTo,$departSelect,$destinationSelect,$message,$roi);
							mysqli_stmt_execute($stmt);
							$count = $count + mysqli_stmt_affected_rows($stmt);
							$ride_id = mysqli_stmt_insert_id($stmt);
							//echo "count: " . $count; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only
							//echo "ride_id: " . $ride_id; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only
						}
						
					//If all records are inserted, commit the transaction, or else rollback
					if ($count == 2)
						{
							mysqli_commit($conn); //commit transaction
							echo ("==Ride scheduled successfully!==");
						}     
					else
						{  
							echo ("==Data not inserted.==");
							//echo ("<br>"); //Testing/debugging purposes only
							//echo "count: " . $count; //Testing/debugging purposes only
							//echo ("<br>"); //Testing/debugging purposes only			
							mysqli_rollback($conn); //rollback transaction
						}
					
					mysqli_stmt_close($stmt);
					mysqli_close($conn);	
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
    <link rel="icon" type="image/png" src="images/cornericon.png">
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
            <img class="logoSmall" src="images/mga/MiddleGeorgia_Inst_Vert.jpg"  alt="small logo"/>
            <img class="logoBig" src="images/mga/MiddleGeorgia_Inst_EXHoriz.jpg" alt="big logo" />
          </a>
          <div class="topRightMenuContainer">
            <ul class="text-right topRightMenu">
              <li><a href="welcome.php">Welcome</a></li>
              <li><a href="aboutus.php">About Us</a></li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="help.php">Help</a></li>
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
                        <option selected="selected" value="none">Departing From:</option>
                        <option value="Cochran-Alderman">Alderman Hall, Cochran</option>
                        <option value="Cochran-Memorial">Memorial Hall, Cochran</option>
                        <option value="Dublin">Dublin Center Annex Building, Dublin</option>
                        <option value="Eastman">Corporate Hangar, Eastman</option>
                        <option value="Macon-Jones">Charles H. Jones Building, Macon</option>
                        <option value="Macon-SLC">Student Life Center, Macon</option>
                        <option value="Warner Robins">Academic Services Building (WRC2), Warner Robins</option>
                      </select>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "destinationSelect">
                        <option selected="selected" value = "none">Destination:</option>
                        <option value="Cochran-Alderman">Alderman, Cochran</option>
                        <option value="Cochran-Memorial">Memorial Hall, Cochran</option>
                        <option value="Dublin">Dublin Center Annex Building, Dublin</option>
                        <option value="Eastman">Corporate Hangar, Eastman</option>
                        <option value="Macon-Jones">Charles H. Jones Building, Macon</option>
                        <option value="Macon-SLC">student Life Center, Macon</option>
                        <option value="Warner Robins">Academic Services Building (WRC2), Warner Robins</option>
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
                          <input id="newTripSmokeFreeBooleanYes" type="radio" name="smokeFreeYesOrNo" value="yes" checked="checked">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanNo" type="radio" name="smokeFreeYesOrNo" value="no">
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
              </div>
            </div>
            <div class="col-md-7 centerWhenSmol">
              <br class="visibleWhenSmol"><a href="dropoffpoints.php" class="btn btn-primary">Meeting Locations</a>
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
                        <th>Money Saved</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						require ('mysqli_connect.php');
						
						$sql = "SELECT user_id FROM users WHERE email = '$email'";
						$rs = mysqli_query($conn, $sql);
						if (mysqli_num_rows($rs) == 1) //If a record set is returned, initialize and set user ID variable.
						{
							while ($row = mysqli_fetch_assoc($rs))
							{
								$user_id = $row['user_id'];
							}
						}
						
						//Display all rides associated with the current user
						$query =  "SELECT r.ride_id, r.trip_date, r.trip_time, r.repeat_day, r.location_start, r.location_end,v.seats_total, v.smoke_description,r.roi, r.user_id
									FROM ride r JOIN vehicle v ON v.vehicle_id=r.vehicle_id JOIN users u ON u.user_id=r.user_id WHERE u.user_id = '$user_id'";
						
						$result = mysqli_query($conn, $query);
						if (mysqli_num_rows($result)>0)
							{															
								while ($row = mysqli_fetch_assoc($result)){
									$ride_id = $row['ride_id'];
									echo "<tr>";
									echo "<td>" .$row['trip_date']. "</td>" ;
									echo "<td>" .$row['trip_time']. "</td>" ;
									echo "<td>" .$row['repeat_day']. "</td>";
									echo "<td>" .$row['location_start']. "</td>" ;
									echo "<td>" .$row['location_end']. "</td>" ;
									echo "<td>" .$row['seats_total']. "</td>";
									echo "<td>" .$row['smoke_description']. "</td>";
									echo "<td>" .$row['roi']. "</td>" ;
									?>
									<td><form action="driver.php" method="post">
										<input type="submit" class="btn btn-primary" id="vehicle" data-toggle="modal" data-target="#deleteTripModal" method="post" name="delete" value="Delete"></button></input>
									</form></td>
									<?php
									echo "</tr>";
									}
							}
						else
							{
								echo "No rides are currently scheduled for this user.";
							}
						
						if(isset($_POST['delete']))
						{
							$sql = "DELETE FROM ride WHERE ride_id = $ride_id";
							//$sql = "DELETE FROM ride WHERE ride_id =" . $row['ride_id'];
							if (mysqli_query($conn,$sql))
							{
								echo "==Ride deleted successfully!==";
							}
							else
							{
								echo "==Ride not deleted.==";
							}							
						}
						mysqli_close($conn);
					?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-1"></div>
          </div>
        </div>

        <div id="footer" class="text-center center">
            <hr>
            Copyright &copy; 2017 Knight Rider<br>
            Website Development by <a href="mailto:MGAKnightRiders@mga.edu">Knight Rider</a>
        </div>

    </div></div>



  </body>
</html>		