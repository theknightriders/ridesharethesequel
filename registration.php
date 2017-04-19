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
		//$regex_email = ""; removed due to preg_match errors
		//"/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD"
		// "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/"; //For e-mail
		$regex_phone = "/^[^0-9]{10}$/"; //For phone
		
		$errors = array(); //Set array to store error messages
		
		//Perform validation checks
		if (strstr($email, '@mga.edu') == FALSE)
			{$errors[] = "You must register with an MGA email address.";}
		//elseif (preg_match($regex_email,$email))
		//	{$errors[] = "Email format is incorrect.";} //regular expression validation for email (taken
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