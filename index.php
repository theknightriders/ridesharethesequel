<!DOCTYPE HTML>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			session_start();
			
			require ('mysqli_connect.php'); //PHP file that executes connection to the database (EDITING REQUIRED)
			
			//Define variables used to compare user input to the database
			$email = $_REQUEST['Email']; 
			$password = $_REQUEST['Pword'];	
			
			//SQL query from the database to select email and password from the table that contains both
			$sql = "SELECT User_ID, Email, Pword FROM Users WHERE Email = '$email' AND Pword= '$password'"; 
			
			$rs = mysqli_query($dbc, $sql); //record set variable from connection to database and sql query statement
			
	        if (mysqli_num_rows($rs) == 1) //If a username and password set matches, login is successful.
				{
					$row = mysqli_fetch_array($rs);
					$_SESSION['U_ID'] = $row['User_ID']; //Fetch the ID of the matching email and password from the database
					header("Location:welcome.php"); //If login is successful, take them to this page.
				}
				
			else //invalid login
				{
					$errmsg = "== Username or Password is Not Correct =="; //Or set some sort of error message of your choice
				}
		}
?>

<?php
	//Define validation method for Registration inputs
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$errors = Validate();
		}
	function Validate()
	{
		//Define variables to bind input to the database
		$email = $_REQUEST['Email'];
		$firstName = $_REQUEST['FName'];
		$lastName = $_REQUEST['LName'];
		$phone = $_REQUEST['Phone'];
		$department = $_REQUEST['Department'];
		$password = $_REQUEST['Pword'];
		
		//Develop regular expressions
		$regex_email = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/"; //For e-mail
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
		if (empty($_POST['Department']))
			{$errors[] = "Please select a department.";}
		if (strlen($_POST['Pword']) < 8 )
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
          <a href="index.html" title="MGA Knight Riders: Login">
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
            <form id="loginForm" class="text-center center">
              <div>
                <input id="email" type="text" class="form-control text-center" name="emailInput" placeholder="MGA Email">
                <input id="password" type="password" class="form-control text-center" name="passwordInput" placeholder="Password">
              </div>
              <br>
              <div class="center">
                <button type="button" class="btn btn-primary indexButton" name="registerButton" data-toggle="modal" data-target="#registrationModal">Register</button>
  <!-- PLACEHOLDER - Remove this button and uncomment the submit button. -->
                <a class="btn btn-primary indexButton" href="welcome.html">Sign In</a>
  <!--          <input type="submit" class="btn btn-primary indexButton" name="submitButton" value="Sign In">  -->
              </div>
            </form>
          </div>
          
          <div class="col-sm-4 col-xs-2"></div>
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
				<?php
					if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') //Submission information is valid
						{
							echo "A verification email has been sent to your email address."; //NEEDS EXECUTION STATEMENT
									
							//Variables for the major tables are stripped from user inputs to prevent XSS attacks
							$email = strip_tags($_POST['Email']);
							$firstname = strip_tags($_POST['FName']);
							$lastname = strip_tags($_POST['LName']);
							$phone = strip_tags($_POST['Phone']);
							$department = strip_tags($_POST['Department']);
							$password = strip_tags($_POST['Pword']);
								
							//Connect to the database
							include('mysqli_connect.php');
									
							//Begin transaction
							mysqli_begin_transaction($dbc);   
									
							//Insertion queries for use into prepared statements
							$sqlInsertUsers = "INSERT INTO Users(Email,FName,LName,Phone,Department,Pword) VALUES (?,?,?,?,?,?)";
											
							//Initilaize (auto)incrementors          
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
									  
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
						}
					elseif (!empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') //Display errors for invalid transmission
						{
							foreach ($errors as $msg)
							{
								echo $msg . "<br>";
							}
						}
				?>
			</div>				
                <form id="registrationForm">
                  <div class="row">
                    <div class="col-sm-4 col-xs-2"></div>

                    <div class="col-sm-4 col-xs-8">
                      <div>
                        <input id="registrationFname" type="text" class="form-control" name="registrationFnameInput" placeholder="First Name">
                        <input id="registrationLname" type="text" class="form-control" name="registrationLnameInput" placeholder="Last Name">
                        <input id="registrationEmail" type="text" class="form-control" name="registrationEmailInput" placeholder="MGA Email">
                        <input id="registrationPhone" type="text" class="form-control" name="registrationPhoneInput" placeholder="Phone Number">
                        <select class="selectpicker orangeDropdown form-control" data-width="100%">
                          <option selected disabled>Department</option>
                          <option value="Department01">Department01</option>
                          <option value="Department02">Department02</option>
                          <option value="Department03">Department03</option>
                          <option value="Department04">Department04</option>
                          <option value="Department05">Department05</option>
                          <option value="Department06">Department06</option>
                          <option value="Department07">Department07</option>
                          <option value="Department08">Department08</option>
                          <option value="Department09">Department09</option>
                          <option value="Department10">Department10</option>
                          <option value="Department11">Department11</option>
                          <option value="Department12">Department12</option>
                          <option value="Department13">Department13</option>
                          <option value="Department14">Department14</option>
                          <option value="Department15">Department15</option>
                          <option value="Department16">Department16</option>
                          <option value="Department17">Department17</option>
                          <option value="Department18">Department18</option>
                        </select>
                        <input id="registrationPassword" type="password" class="form-control" name="registrationpasswordInput" placeholder="Password">
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
                    <label><input type="checkbox" value="agree">&nbsp;I have read and agree to the Terms &amp; Conditions.</label><br><br>
                    <input type="submit" class="btn btn-primary" name="submitRegistrationButton" value="Submit Registration"><br>
                  </div>

                </form>
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
