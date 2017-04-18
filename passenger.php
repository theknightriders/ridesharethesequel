<?php
session_start();
// Make sure the user is logged in
if ($_SESSION['email'] == "")
  {
    // If they're  not logged in, go to the login page
    header("Location:login.php");
  }
?>

<!DOCTYPE HTML>

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
    <script src="scripts/datatablesDriver.js"></script>
    <script src="scripts/modernizr-custom.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" src="images/cornericon.png">
  </head>

 <body class="extendForTable stretchPage">
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
        <div id="body">
          <div id="contactInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="contactInfoModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Contact Driver:</h1><br>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 text-center textbold">
                      For seat availability, please call or email this driver with the information they have provided.
					  If you wish to cancel, you should contact the driver again to let them know.
					  For package delivery, please include the name and details of who will be picking up the package.
					  <br><br><br>
					  Thanks for Riding!
					  <br><br><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row text-center">
            <h4 class="welcomeHeader">Please select a ride:</h4>
          </div>
           
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="col-md-7 centerWhenSmol">
              <br class="visibleWhenSmol"><a href="dropoffpoints.php" class="btn btn-primary">Drop Off Points</a>
            </div>
            <div class="col-md-1"></div>
          </div>
             <br>
              <table id="example" class="display nowrap" cellspacing="0" width="75%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Departing</th>
                        <th>Destination</th>
                        <th>Number <br> of Seats</th>
                        <th>Smoke Free</th>
                        <th>Packages</th>
                        <th>Money <br> Saved </th>
                    </tr>
                </thead>
                <tbody>
                  				<?php
                  						require ('mysqli_connect.php');
                  						$query =   "SELECT users.first_name,users.last_name,users.phone,users.email,ride.trip_date, ride.trip_time, ride.location_start, ride.location_end,vehicle.seats_total, vehicle.smoke_description,vehicle.package_able,ride.roi,vehicle.vehicle_year,vehicle.vehicle_make,vehicle.vehicle_model,ride.message FROM ride INNER JOIN vehicle ON vehicle.vehicle_id=ride.vehicle_id INNER JOIN users ON ride.user_id = users.user_id WHERE ride.trip_date >= CURDATE()";
                  						
                  						
                  						$result = mysqli_query($conn, $query);
                  						if (mysqli_num_rows($result)>0)
                  							{															
                  									while ($row = mysqli_fetch_assoc($result)){
                  										echo "<tr>";
                  										echo "<td>" .$row['first_name']." ". $row['last_name']."</td>" ;
                  										echo "<td>" .$row['trip_date']. "</td>" ;
                  										echo "<td>" .$row['trip_time']. "</td>" ;
                  										echo "<td>" .$row['location_start']. "</td>" ;
                  										echo "<td>" .$row['location_end']. "</td>" ;
                  										echo "<td>" .$row['seats_total']. "</td>";
                  										echo "<td>" .$row['smoke_description']. "</td>";
                  										echo "<td>" .$row['package_able']. "</td>";
                  										echo "<td>$" .$row['roi']. "</td>" ;
                  										echo "</tr><td>";
                  										
														echo $row['phone'] . " | " .$row['email'] . " | " .$row['vehicle_year'] . ", " .$row['vehicle_make'] . ", " .$row['vehicle_model'] . " | " .$row['message'] ;?>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                  										<?php echo "</tr>";
                  									}
                  							
                  						}
                  					?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-1"></div>
          </div>




      <div id="footer" class="text-center center">
          <hr>
          Copyright &copy; 2017 Knight Rider<br>
          Website Development by <a href="mailto:MGAKnightRiders@mga.edu">Knight Rider</a>
      </div>

    </div></div>




  </body>
</html>
