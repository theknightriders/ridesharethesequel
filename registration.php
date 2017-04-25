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
		$email = $_POST['registrationEmailInput'];
		$firstName = $_POST['registrationFnameInput'];
		$lastName = $_POST['registrationLnameInput'];
		$phone = $_POST['registrationPhoneInput'];
		if (isset($_POST['registrationDeptInput']) && !$_POST['registrationDeptInput'] == '0') //Validate dropdown selection
			{$department = $_POST['registrationDeptInput'];}
		$password = $_POST['registrationPasswordInput'];
		
		//Develop regular expressions
		$regex_email = "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD";
		// "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/"; //For e-mail
		$regex_phone = "/^[^0-9]{10}$/"; //For phone
		
		$errors = array(); //Set array to store error messages
		
		//Perform validation checks
		if (strstr($email, '@mga.edu') == FALSE)
			{$errors[] = "You must register with an MGA email address.";}
		elseif (preg_match($regex_email,$email))
			{$errors[] = "Email format is incorrect.";} //regular expression validation for email 
		if (empty($_POST['registrationFnameInput']))
			{$errors[] = "Please enter a First Name.";}
		if (empty($_POST['registrationLnameInput']))
			{$errors[] = "Please enter a Last Name.";}
		if (empty($_POST['registrationPhoneInput']))
			{$errors[] = "Please enter a Phone Number.";}
		elseif (preg_match($regex_phone,$phone))
			{$errors[] = "Please enter a phone number without dashes.";} //regular expression validation for phone 
		if (!isset($_POST['registrationDeptInput']))
			{$errors[] = "Please select a department.";}
		if (strlen($_POST['registrationPasswordInput']) < 8 )
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
    <link rel="icon" type="image/png" src="images/cornericon.png">
  </head>

  <body class="stretchPage">
    <div class="container stretchPage"><div id="container">
      <div class="page-header">
        <div class="logoContainer">
          <a href="login.php" title="MGA Knight Riders: Login">
            <br><br>
            <img class="logoSmall" src="images/KRLogoVert.png"  alt="small logo"/>
            <img class="logoBig" src="images/KRLogoHorizontal.jpg" alt="big logo" />
          </a>
        </div>
      </div>
      <div id="body">
        <div class="row">
          <div class="col-sm-4 col-xs-2"></div>
          
          <div class="col-sm-4 col-xs-8">
              </div>
              <div class="modal-body">
                <h1 class="text-center">Register:</h1><br>
			<div id="registration form">
				<?php
					if(isset($register))
						{
							echo $register;
						}
				?>
			</div>				
                <form id="registrationForm" enctype="multipart/form-data" method="post" action="registration.php">
                  <div class="row">
                    <div class="col-sm-4 col-xs-2"></div>

                    <div class="col-sm-4 col-xs-8">
                      <div>
                        <input id="registrationFname" type="text" class="form-control" name="registrationFnameInput" placeholder="First Name" required>
                        <input id="registrationLname" type="text" class="form-control" name="registrationLnameInput" placeholder="Last Name" required>
                        <input id="registrationEmail" type="text" class="form-control" name="registrationEmailInput" placeholder="MGA Email" required>
                        <input id="registrationPhone" type="text" class="form-control" name="registrationPhoneInput" placeholder="Phone Number" required>
                        <select class="selectpicker orangeDropdown form-control" name="registrationDeptInput" data-width="100%">
                          <option selected disabled required>Department</option>
                          <option value="ENGL">English</option>
                          <option value="HPSC">History and Political Science</option>
                          <option value="MATH">Mathematics</option>
                          <option value="ARTS">Media, Culture, and the Arts </option>
                          <option value="NSCI">Natural Sciences</option>
                          <option value="PSCJ">Psychology, Sociology, and Criminal Justice</option>
                          <option value="AMST">Aviation Maintenance and Structural Technology</option>
                          <option value="AVSM">Aviation Science and Management</option>
                          <option value="FLGT">Flight</option>
                          <option value="BUSN">Business</option>
                          <option value="EDUC">Education</option>
                          <option value="HSAD">Health Services Administration</option>
                          <option value="NURS">Nursing</option>
                          <option value="OCTA">Occupational Therapy Assistant</option>
                          <option value="RESP">Respiratory</option>
                          <option value="ITEC">Information Technology</option>
                          <option value="GRAD">Office of Graduate Studies</option>
                          <option value="PRES">Office of the President </option>
                          <option value="UADV">Division of University Advancement</option>
                          <option value="FINO">Division of Finance and Operations </option>
                          <option value="RMAR">Division of Recruitment and Marketing</option>
                          <option value="STAF">Division of Student Affairs </option>
                          <option value="OTHR">Other</option>
                        </select>
                        <input id="registrationPassword" type="password" class="form-control" name="registrationPasswordInput" placeholder="Password" required>
                      </div>
                    </div>

                    <div class="col-sm-4 col-xs-2">
					<?php
						if ($_SERVER['REQUEST_METHOD'] == 'POST') 
						{
							if ((isset($_POST['submitRegistrationButton'])))
								{
									if (empty($errors)) //Submission information is valid
									{
										$register = "A verification email has been sent to your email address.";
										
										//Variables for the major tables are stripped from user inputs to prevent XSS attacks
										$email = strip_tags($_POST['registrationEmailInput']); //Derived from HTML input variables from 'name'
										$firstname = strip_tags($_POST['registrationFnameInput']);
										$lastname = strip_tags($_POST['registrationLnameInput']);
										$phone = strip_tags($_POST['registrationPhoneInput']);
										$department = strip_tags($_POST['registrationDeptInput']);
										$password = strip_tags($_POST['registrationPasswordInput']);
										
										//Connect to the database
										include('mysqli_connect.php');
										
										//Begin transaction
										mysqli_begin_transaction($conn);   
										
										//Insertion queries for use into prepared statements
										$sqlInsertUsers = "INSERT INTO users(email,first_name,last_name,phone,department,pword) VALUES (?,?,?,?,?,?)";
										
										//initialize (auto)incrementors          
										$count=0;
										$user_id=0;
										
										$stmt = mysqli_stmt_init($conn);
										
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
												mysqli_commit($conn); //commit transaction
											}     
										else
											{  
												echo ("Data not inserted.");
												mysqli_rollback($conn); //rollback transaction
											}
											
										mysqli_stmt_close($stmt); //close statement
										mysqli_close($conn); //close connection
										
										include('email.php'); //send email
									}	
									else //Invalid inputs
									{
										foreach ($errors as $msg)
										{
											echo $msg;
										}
									}
								}
							else
								{
									echo "== You must agree to the Terms of Service. ==";
								}
						}		
					?>
					</div>
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
                      
						<p>KnightRider is intended to assist and enable members of the MGA university community in making carpooling arrangements. This program was initiated in response to calls from Governor Sonny Perdue and Chancellor Corlis Cummings for state agencies and the Board of Regents to take positive measures to save fuel and energy costs. Use of this web resource is voluntary and is limited to faculty, staff and students of MGA. Only persons with a valid, current GCSU or Bobcat e-mail account will be permitted to register as subscribers to this website or to post and view postings concerning ride-sharing opportunities.</p>

						<p>This website provides a means for MGA faculty, staff and students to communicate easily regarding ride-sharing and carpooling opportunities based on compatible work and class schedules, points of origin, and destinations. It is intended for ride-sharing to and from work or class and for work-related travel. Once a potential participant is identified, specific arrangements should be handled by direct communication outside the website. This website is not intended for ride-sharing arrangements for travel not related to employment or enrollment at MGA, which should be made separately.</p>

						<p>Employees should understand that travel to and from the workplace is generally considered not to be within the scope of employment and injuries to persons or property arising while going to and from work are not covered by university liability insurance. Similarly, students who share rides to class or elsewhere on campus do so voluntarily and at their own risk. While state employees are being encouraged to carpool to and from work and to shares rides on work-related assignments, and participants will gain personally in terms of cost savings, it should be recognized that potential damages or injuries incurred due to accident or otherwise are not being underwritten or insured by the State of Georgia or the Board of Regents. The risk to an individual employee or student who participates in a carpool or other ride-sharing arrangement is comparable to the risk he or she would incur when offering or accepting a ride to or from a friend for personal travel. Participants should exercise ordinary prudence and satisfy themselves that other participating drivers are licensed, competent drivers and that vehicles are appropriately insured.</p>

						<p>MGA will, to the best of its ability, maintain the privacy of information posted on this website. Users acknowledge that information posted on the site may be viewed by other authorized registrants. Users further acknowledge the risk that information posted on the site may be viewed by unauthorized users gaining access to authorized accounts. Posting of information should be limited to the express purposes of the ShareRide program. Posting of obscene, pornographic or harassing messages is strictly prohibited. Concerns about handling or content of site postings should be communicated promptly to the webmaster at mgaknightriders@gmail.com</p>

						<p>By registering as a user of the MGA ShareRide website, each registrant agrees to release and hereby releases the Board of Regents, Middle Georgia State University, and their officers, employees and agents from any and all liability, damages and costs, including attorney's fees, arising from the use of this website or participation in carpooling or ride-sharing arrangements made in whole or in part through the use of this website.</p>

                      </p>
                    </div>

                    <div class="col-xs-1"></div>
                  </div>
                  <div class="text-center">

                    <label><input type="checkbox" value="agree" required>&nbsp;I have read and agree to the Terms &amp; Conditions.</label><br><br>
                    <label><input type="checkbox" value="agree" required>&nbsp;Driver Training Checkbox</label><br><br>
                  
                    <input type="submit" class="btn btn-primary" name="submitRegistrationButton" value="Submit Registration"><br>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="footer" class="text-center center">
            <hr>
            Copyright &copy; 2017 Knight Rider<br>
            Website Development by <a href="mailto:mgaknightriders@gmail.com">Knight Rider</a>
        </div>

      </div></div>
    </body>
</html>