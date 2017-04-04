<!--
  I just added the session bits (at the very top of the page) so that I have a session variable to work with on the profile page. (lines 16-19)
  I looked through this and wasn't able to find any session variables at all (neither email nor user ID)
  Feel free to remove the line that says
            $_SESSION["email"] = "email@mga.edu";
  Just make sure that you have it set someplace else.
  (Logically, the place you want to set it is just after the email & password are confirmed)
  Don't move or remove the session_start(); line, though. That's necessary for the session variables to work at all.

  Also: I've changed the login button back to a link for now.
  I commented out the actual login button again.
  Obviously this will need to be fixed.
  I only changed it because I wasn't able to click it and get to the welcome page, which I believe I have to do in order to maintain the session that begins here. (lines 119-122)
-->

<?php
//session_start();
//$_SESSION["email"] = "email@mga.edu";
?>

<!DOCTYPE HTML>

<?php
	//Define validation method for Registration inputs
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$errors = Validate();
		}
		
	function Validate() //Validate registration form inputs
	{
		//Define variables to bind input to the database
		$email = $_POST['Email'];
		$firstName = $_POST['FName'];
		$lastName = $_POST['LName'];
		$phone = $_POST['Phone'];
		if (isset($_POST['Department']) && !$_POST['Department'] == '0') //Validate dropdown selection
			{$department = $_POST['Department'];}
		$password = $_POST['Password'];
		
		//Develop regular expressions
		$regex_email = "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD";
		// "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/"; //For e-mail
		$regex_phone = "/^[^0-9]{10}$/"; //For phone
		
		$errors = array(); //Set array to store error messages
		
		//Perform validation checks
		if (strpbrk($email, '@') == FALSE)
			{$errors[] = "E-mail must contain '@'.";}
		elseif (preg_match($regex_email,$email))
			{$errors[] = "E-mail format is incorrect.";} //regular expression validation for e-mail 
		if (empty($_POST['FName']))
			{$errors[] = "Please enter a First Name.";}
		if (empty($_POST['LName']))
			{$errors[] = "Please enter a Last Name.";}
		if (empty($_POST['Phone']))
			{$errors[] = "Please enter a Phone Number.";}
		elseif (preg_match($regex_phone,$phone))
			{$errors[] = "Please enter a phone number without dashes.";} //regular expression validation for phone 
		if (!isset($_POST['Department']))
			{$errors[] = "Please select a department.";}
		if (strlen($_POST['Password']) < 8 )
			{$errors[] = "Password must be at least 8 characters.";}
		elseif (strpbrk($password, '0123456789') == FALSE)
			{$errors[] = "Password must contain at least one number.";}
			
		return $errors;
	}
?>



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
          <a href="index.php" title="MGA Knight Riders: Login">
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
            <form id="loginForm" class="text-center center" action="index.php" method="post">
              <div>
                <input id="Email" type="text" class="form-control text-center" name="Email" placeholder="MGA Email">
                <input id="Password" type="Password" class="form-control text-center" name="Password" placeholder="Password">
              </div>
              <br>
              <div class="center">
                <button type="button" class="btn btn-primary indexButton" name="login" data-toggle="modal" data-target="#registrationModal">Register</button>
<!--
                <input type="submit" class="btn btn-primary indexButton" name="Submit" value="Sign In">  
-->
                <a class="btn btn-primary indexButton" href="welcome.php">Sign In</a>
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

        
  <!-- REGISTRATION FORM -->
        <div id="registrationModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="registrationModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Register:</h1><br>
			<div id="registration form">

			</div>				
                <form id="registrationForm" enctype="multipart/form-data" action="index.php" method="post">
                  <div class="row">
                    <div class="col-sm-4 col-xs-2"></div>

                    <div class="col-sm-4 col-xs-8">
                      <div>
                        <input id="registrationFname" type="text" class="form-control" name="registrationFname" placeholder="First Name" required>
                        <input id="registrationLname" type="text" class="form-control" name="registrationLname" placeholder="Last Name" required>
                        <input id="registrationEmail" type="text" class="form-control" name="registrationEmail" placeholder="MGA Email" required>
                        <input id="registrationPhone" type="text" class="form-control" name="registrationPhone" placeholder="Phone Number" required>
                        <select class="selectpicker orangeDropdown form-control" data-width="100%" name="Department">
                          <option selected disabled required>Department</option>
                          <option value="ENGL">English</option>
                          <option value="HPSC">History and Political Science</option>
                          <option value="MATH">Mathematics</option>
                          <option value="ARTS">Media, Culture, and the Arts </option>
                          <option value="NSCI">Natural Sciences</option>
                          <option value="PSCJ">Psychology, Sociology, and Criminal Justice</option>
                          <option value="AVMT">Aviation Maintenance and Structural Technology</option>
                          <option value="ASCM">Aviation Science and Management</option>
                          <option value="FLGT">Flight</option>
                          <option value="BSNS">Business</option>
                          <option value="EDUC">Education</option>
                          <option value="HSCA">Health Services Administration</option>
                          <option value="NURS">Nursing</option>
                          <option value="OCTA">Occupational Therapy Assistant</option>
                          <option value="RESP">Respitory</option>
                          <option value="ITEC">Information Technology</option>
                          <option value="GRAD">Office of Graduate Studies</option>
                          <option value="PRES">Office of the President </option>
                          <option value="UADV">Division of University Advancement</option>
                          <option value="FINO">Division of Finance and Operations </option>
                          <option value="RMAR">Division of Recruitment and Marketing</option>
                          <option value="STAF">Division of Student Affairs </option>
                          <option value="OTHR">Other</option>
                        </select>
                        <input id="registrationPassword" type="password" class="form-control" name="password" placeholder="Password" required>
                      </div>
                    </div>

                    <div class="col-sm-4 col-xs-2"></div>
                  </div><br>

                  <div class="row">
                    <div class="col-xs-2"></div>

                    <div class="col-xs-8">
                      <h4 class="text-center"><span class="avoidwrap">Please read the Terms &amp; Conditions</span> <span class="avoidwrap">below before submitting your registration request.</span></h4>
                    </div>

                    <div class="col-xs-2"></div>                  
                  </div>

                  <hr>

                  <h1 class="text-center">Terms &amp; Conditions:</h1>
                  <div class="row">
                    <div class="col-xs-1"></div>

                    <div class="col-xs-10">
                      <p>
                      I will take some magic white, and a little bit of Vandyke brown and a little touch of yellow. Trees grow however makes them happy. If these lines aren't straight, your water's going to run right out of your painting and get your floor wet. It's beautiful - and we haven't even done anything to it yet.
                      </p>

                      <p>
                      Talk to trees, look at the birds. Whatever it takes. Be brave. We'll take a little bit of Van Dyke Brown. Little trees and bushes grow however makes them happy. You are only limited by your imagination. Do an almighty painting with us.
                      </p>

                      <p>
                      Let's put some highlights on these little trees. The sun wouldn't forget them. It's a very cold picture, I may have to go get my coat. It’s about to freeze me to death. You can't make a mistake. Anything that happens you can learn to use - and make something beautiful out of it. That's why I paint - because I can create the kind of world I want - and I can make this world as happy as I want it. See. We take the corner of the brush and let it play back-and-forth. You create the dream - then you bring it into your world.
                      </p>

                      <p>
                      It just happens - whether or not you worried about it or tried to plan it. Only God can make a tree - but you can paint one. All you need to paint is a few tools, a little instruction, and a vision in your mind. Tree trunks grow however makes them happy. I guess I'm a little weird. I like to talk to trees and animals. That's okay though; I have more fun than most people. You don't have to spend all your time thinking about what you're doing, you just let it happen.
                      </p>

                      <p>
                      You can do it. Maybe he has a little friend that lives right over here. Trees cover up a multitude of sins.
                      </p>

                      <p>
                      The shadows are just like the highlights, but we're going in the opposite direction. Fluff that up. Maybe there's a happy little bush that lives right there.
                      </p>

                      <p>
                      Let's get crazy. With practice comes confidence. Only eight colors that you need. We must be quiet, soft and gentle.
                      </p>
                    </div>

                    <div class="col-xs-1"></div>
                  </div>
                  <div class="text-center">

                    <label><input type="checkbox" value="agree" required>&nbsp;I have read and agree to the Terms &amp; Conditions.</label><br><br>
                     <label><input type="checkbox" value="agree" required>&nbsp;FRANCIS</label><br><br>
                    <input type="submit" class="btn btn-primary" name="register" value="Submit Registration"><br>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			if ($_POST['register'])
				{if ((isset($_POST['agree'])))
					{
						if (empty($errors)) //Submission information is valid
						{
							echo "A verification email has been sent to your email address."; //NEEDS EXECUTION STATEMENT
							
							//Variables for the major tables are stripped from user inputs to prevent XSS attacks
							$email = strip_tags($_POST['Email']); //Derived from HTML input variables from 'name'
							$firstname = strip_tags($_POST['FName']);
							$lastname = strip_tags($_POST['LName']);
							$phone = strip_tags($_POST['Phone']);
							$department = strip_tags($_POST['Department']);
							$password = strip_tags($_POST['Password']);
							
							//Connect to the database
							include('mysqli_connect.php');
							
							//Begin transaction
							mysqli_begin_transaction($dbc);   
							
							//Insertion queries for use into prepared statements
							$sqlInsertUsers = "INSERT INTO users(Email,FName,LName,Phone,Department,Pword) VALUES (?,?,?,?,?,?)";
							
							//initialize (auto)incrementors          
							$count=0;
							$user_id=0;
							
							$stmt = mysqli_stmt_init($dbc);
							
							//Prepared Statements for users table -- prevent SQL injection
							if(mysqli_stmt_prepare($stmt,$sqlInsertUsers))
								{
									mysqli_stmt_bind_param($stmt,'sssiss',$email,$firstname,$lastname,$phone,$department,$password);
									mysqli_stmt_execute($stmt);
									$count = mysqli_stmt_affected_rows($stmt);
									$user_id = mysqli_stmt_insert_id($stmt);
								}
									
							//If all records are inserted, commit the transaction, or else rollback
							if ($count == 1)
								{
									mysqli_commit($dbc); //commit transaction
								}     
							else
								{  
									echo ("Data not inserted.");
									mysqli_rollback($dbc); //rollback transaction
								}
								
							mysqli_stmt_close($stmt); //close statement
							mysqli_close($dbc); //close connection
						}	
						else //Invalid inputs
						{
							foreach ($errors as $msg)
							{
								echo $msg . "<br>";
							}
						}
					}
					else
					{
						echo "== You must agree to the Terms of Service. ==";
					}
				}
			elseif ($_POST['login'])
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
							$sql = "SELECT User_ID, Email, Pword FROM users WHERE Email = '$email' AND Pword = '$password'"; 
							//TESTING PURPOSES ONLY
							//echo $sql;
							
							$rs = mysqli_query($dbc, $sql); //record set variable from connection to database and sql query statement
							
							if (mysqli_num_rows($rs) == 1) //If a username and password set matches, login is successful.
								{
									$row = mysqli_fetch_array($rs);
									$_SESSION['U_ID'] = $row['User_ID']; //Fetch the ID of the matching email and password from the database
									header("Location:welcome.php"); //If login is successful, take them to this page.
								}
							else //invalid login
								{
									$errmsg = "== Invalid Email or Password. ==";
									echo $errmsg;
								}
						}
				}
		}		
?>
      </div>

      <div id="footer" class="text-center center">
        <hr>
        Copyright &copy; 2017 MGA Knight Riders<br>
        Website Development by <a href="mailto:MGAKnightRiders@mga.edu">MGA Knight Riders</a>
      </div>
    </div></div>
  </body>
</html>
