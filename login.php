<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ((empty($_POST['Email']) || (empty($_POST['Password'])))) //Blank email or password field
			{
				echo "== Enter an Email and Password. ==";
			}
		else
			{
				session_start();			
				require ('mysqli_connect.php'); //PHP file that executes connection to the database
				
				//Define variables used to compare user input to the database
				$email = $_POST['Email']; 
				$password = $_POST['Password'];	
				
				//SQL query from the database to select email and password from the table that contains both
				$sql = "SELECT email, pword FROM users WHERE email = '$email' AND pword = '$password'"; 
				//TESTING PURPOSES ONLY
				//echo $sql;
				
				$rs = mysqli_query($conn, $sql); //record set variable from connection to database and sql query statement
				
				if (mysqli_num_rows($rs) == 1) //If a username and password set matches, login is successful.
					{
						$row = mysqli_fetch_array($rs);
						$_SESSION['email'] = $row['email']; //Fetch the ID of the matching email and password from the database
						header("Location:welcome.php"); //If login is successful, take them to this page.
					}
				else //invalid login
					{
						$errmsg = "== Invalid Email or Password. ==";
					}
			}
	}	
?>

<!DOCTYPE HTML>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MGA Knight Riders</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
  </head>

  <body>
    <div class="container"><div id="container">
      <div class="page-header">
        <div class="logoContainer">
          <a href="login.php" title="MGA Knight Riders: Login">
            <img class="logoSmall" src="images/mga/MiddleGeorgia_Inst_Vert.jpg" />
            <img class="logoBig" src="images/mga/MiddleGeorgia_Inst_EXHoriz.jpg" />
          </a>
        </div>
      </div>
      <div id="body">
        <div class="row">
          <div class="col-sm-4 col-xs-2"></div>
          
          <div class="col-sm-4 col-xs-8">
  <!-- SIGN IN FORM --> 
			<div>
				<?php
					if(isset($errmsg))
						{
							echo $errmsg;
						}
				?>
			</div>
            <form id="loginForm" class="text-center center" action="login.php" method="post">
              <div>
                <input id="Email" type="text" class="form-control text-center" name="Email" placeholder="MGA Email">
                <input id="Password" type="Password" class="form-control text-center" name="Password" placeholder="Password">
              </div>
              <br>
              <div class="center">  
				<button type="button" class="btn btn-primary indexButton" name="registration"><a href="registration.php">Register</a></button>
                <input type="submit" class="btn btn-primary indexButton" name="login" value="Sign In"> 
              </div>
            </form>
          </div>
          
          <div class="col-sm-4 col-xs-2"></div>
        </div>
        <div class="row text-center">
          <br><a href="#" data-toggle="modal" data-target="#whatDoModal">What is MGA Rideshare?</a>
        </div>

  <!-- WHAT DO MODAL -->
        <div id="whatDoModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="whatDoModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <br><br>
                  <h4 class="welcomeHeader text-center">What is MGA Rideshare?</h5>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <h4 class="welcomeHeader">Description:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p> KnightRiders is a carpooling service for faculty and staff members at Middle Georgia State University. Carpooling is a cost effective and environmentally friendly way for faculty and staff members to travel between Middle Georgia State University's five campuses. This service is free of charge and is a great way to save money, save the environment, and build a stronger community.</p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <h4 class="welcomeHeader">Driver:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p>To become a driver you must first register. A confirmation will be sent to your email. Next, log in using your faculty/staff MGA email and password that you registered with. When you are on the Welcome page, please select the "Drive" button located on the left side of the homepage. To create a trip, simply click New. A form will pop up for you to fill out. When you are finished, click schedule trip.  After clicking submit, your response will be visible to all passengers. You will be taken back to the Driver page where you can edit and delete trips, as well as add a new one. </p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <h4 class="welcomeHeader">Passenger and Packages:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p>A confirmation will be sent to your email. Next, log in using your faculty/staff MGA email and password that you registered with. To become a passenger you must first register. If you are trying to find a rideshare select the "Ride" button located on the right side of the Welcome page. This will direct you to all the available rides. Use the search box or filter buttons to find the ride that best works for yourself. When you have found your desired ride, press the "Book a Ride" button. This will show the contact information for the driver. Please use this information to contact the driver. If you are sending a package, there must be someone at the designated drop off point to pick up the package. Message the person driving the name of the person picking up the package. Please note that all packages MUST be smaller than a 11 inch x 13 inch package. If you must cancel your ride, you must inform the driver at least one hour before pickup. </p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <h4 class="welcomeHeader">Ride Share Best Practices:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p> JOHNATHAN AND EPI </p>
                </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <h4 class="welcomeHeader">Safety:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <b>For Drivers: </b>
                  <p> For the safety of our drivers and passengers, this policy defines the regulations of transporting faculty and staff. It is important that all drivers obey all traffic rules and signs when transporting rideshare passengers. Drivers are expected to travel safely to the rideshare destinations. Safety is paramount to ensure that all riders feel safe when riding with a driver and to minimize car accidents. All drivers must have a valid driver’s license certifying they know the traffic rules while of driving and have taken MGA’s Motor Vehicle Training, as outlined in the Motor Vehicle Use Policy . They must also have an insurance policy on file with their personal vehicles. Please contact law enforcement if you are concerned about your safety.</p>
                    <ul>
                      <li> Keep your eyes focused on driving </li>
                      <li> Always obey traffic lights and traffic sign rules </li>
                      <li>Be cautious of other drivers </li>
                      <li>Wear your seatbelt </li>
                      <li>Do not use drugs or consume alcohol while driving </li>
                    </ul>
                    <b>For Passengers: </b>
                    <p> In your choice of riding with a driver outside of the MGA rideshare, we assume no responsibility for the safety of your ride. While we have a  list of safety guidelines for our drivers to follow, some drivers may not abide by them. Every driver is required to have a driver’s license, and the appropriate automobile insurance coverage to transport a MGA rider. It is also critical that they follow all traffic lights and signs during an MGA rideshare drive to ensure all rider’s safety.  Please practice discretion and do not not get in a car if you feel uncomfortable.  Call law enforcement if you are concerned about your safety. </p> 

                      <ul>
                        <li> Wear your seatbelt </li>
                        <li> Keep distractions to a minimum </li>
                        <li>Minimize stops enroute or discuss stops ahead of time with the driver.</li>
                      </ul>


                    <p>Police Department Macon Campus: <a href="tel:4784712414"> (478)-471-2414 </a></p>
                    <p>Police Department Cochran Campus: <a href="tel:4789343002"> (478)-934-3002  </a></p>
                    <p>Police Department Warner Robins Campus: <a href="tel:4789296750"> (478)-929-6750 </a> </p>
                    <p> Police Department Eastman Campus:<a href= "tel:4783746403"> (478)-374-6403  </a></p>
                    <p>Police Department Dublin Campus: <a href="tel:4782747751">(478)-274-7751 </a> </p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                <br><br><br>
              </div>
            </div>
          </div>
        </div>        

  

      </div>

      <div id="footer" class="text-center center">
        <hr>
        Copyright &copy; 2017 MGA Knight Riders<br>
        Website Development by <a href="mailto:MGAKnightRiders@mga.edu">MGA Knight Riders</a>
      </div>
    </div></div>
  </body>
</html>