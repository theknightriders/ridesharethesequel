<?php
// Needs to be at the top of every page
session_start();

// TEST - temporarily override the session variable
// $_SESSION['email'] = "myrddincat@gmail.com";

// Make sure the user is logged in
if ($_SESSION['email'] == "")
  {
    // If they're  not logged in, go to the login page
    header("Location:login.php");
  }

// Function to format input data
function test_input($data) {
  // Remove extra spaces, tabs, newlines
  $data = trim($data);
  // Remove backslashes
  $data = stripslashes($data);
  // Prevent scripts from working if the user enters one
  $data = htmlspecialchars($data);
  return $data;
}

// Check to see if anything was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // If something was posted, do this

  if (!empty($_POST["profileFnameInput"]) || !empty($_POST["profileLnameInput"]) || !empty($_POST["profilePhoneInput"]) || !empty($_POST["profileDeptInput"])) {
    // Take data POSTed from form, 
    // Send it to test_input function for formatting,
    // And store it in a new variable
    $fnameInput = test_input($_POST["profileFnameInput"]);
    echo "fname: " . $fnameInput . "<br>";
    $fnameInput = test_input($_POST["profileLnameInput"]);
    echo "lname: " . $lnameInput . "<br>";
    $phoneInput = test_input($_POST["profilePhoneInput"]);
    echo "phone: " . $phoneInput . "<br>";
    $deptInput = test_input($_POST["profileDeptInput"]);
    echo "dept: " . $deptInput;
  }
}

// Connect to the database
include ('mysqli_connect.php');

// If the connect works, do this

  // Prepare the SQL statement
  $sql = "SELECT first_name, last_name, phone, department FROM users WHERE email = '" . $_SESSION['email'] . "'";

  // Bind the result set to a variable
  $result = $conn->query($sql);

  // Put the result set into an array
  if ($result->num_rows > 0) {
    // Store each element of the array in its own global variable
    while($row = $result->fetch_assoc()) {
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $email = $_SESSION['email'];
      $phone = $row['phone'];
      // Phone is a little different
      // It's normally an integer, but we need to display it so that it looks like a phone number.
      // First, change it to a string.
      settype($phone, "string");
      // Next, format the string
      $phone = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
      // Department is also a little different.
      // We need to look at the department code and store its corresponding department name in the string instead
      $deptCode = $row['department'];
      If ($deptCode == "ENGL") {
      $dept = "English";
      }
      If ($deptCode == "HPSC") {
      $dept = "History and Political Science";
      }
      If ($deptCode == "MATH") {
      $dept = "Mathematics";
      }
      If ($deptCode == "ARTS") {
      $dept = "Media, Culture, and the Arts ";
      }
      If ($deptCode == "NSCI") {
      $dept = "Natural Sciences";
      }
      If ($deptCode == "PSCJ") {
      $dept = "Psychology, Sociology, and Criminal Justice";
      }
      If ($deptCode == "AMST") {
      $dept = "Aviation Maintenance and Structural Technology";
      }
      If ($deptCode == "AVSM") {
      $dept = "Aviation Science and Management";
      }
      If ($deptCode == "FLGT") {
      $dept = "Flight";
      }
      If ($deptCode == "BUSN") {
      $dept = "Business";
      }
      If ($deptCode == "EDUC") {
      $dept = "Education";
      }
      If ($deptCode == "HSAD") {
      $dept = "Health Services Administration";
      }
      If ($deptCode == "NURS") {
      $dept = "Nursing";
      }
      If ($deptCode == "OCTA") {
      $dept = "Occupational Therapy Assistant";
      }
      If ($deptCode == "RESP") {
      $dept = "Respiratory";
      }
      If ($deptCode == "ITEC") {
      $dept = "Information Technology";
      }
      If ($deptCode == "GRAD") {
      $dept = "Office of Graduate Studies";
      }
      If ($deptCode == "PRES") {
      $dept = "Office of the President ";
      }
      If ($deptCode == "UADV") {
      $dept = "Division of University Advancement";
      }
      If ($deptCode == "FINO") {
      $dept = "Division of Finance and Operations ";
      }
      If ($deptCode == "RMAR") {
      $dept = "Division of Recruitment and Marketing";
      }
      If ($deptCode == "STAF") {
      $dept = "Division of Student Affairs ";
      }
      If ($deptCode == "OTHR") {
      $dept = "Other";
      }
    }
  }

  // Close the connection
  $conn->close();



?>





<!DOCTYPE HTML>

<html class="profileStretchPage" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MGA Knight Riders</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/phoneValidateAJAX.js"></script>
    <link rel="stylesheet" href="styles/style.css">
  </head>

  <body class="profileStretchPage" onload="checkPhoneInput()">
    <div class="container profileStretchPage"><div id="container">
      <div class="page-header">
        <div class="logoContainer">
          <a href="welcome.php" title="MGA Knight Riders: Homepage">
             <br><br>
            <img class="logoSmall" src="images/KRLogoVert.jpg"  alt="small logo"/>
            <img class="logoBig" src="images/KRLogoHorizontal.jpg" alt="big logo" />
          </a>
          <div class="topRightMenuContainer">
            <ul class="text-right topRightMenu">
              <li><a href="welcome.php">Welcome</a></li>
              <li><a href="aboutus.php">About Us</a></li>
              <li>Profile</li>
              <li><a href="help.php">Help</a></li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div id="body">
      <div class="row text-center">
        <h4 class="welcomeHeader">Your Profile:</h4>
      </div>

      <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-5 col-sm-push-5 text-center">
          <div class="profilePicContainer">
            <img src="images/profile.jpg" class="profilePic" alt="profile picture">
          </div>
          <button type="button" class="btn btn-primary profilePic viewableProfile" data-toggle="modal" data-target="#changeProfilePicModal">Change Profile Picture</button><br><br>
        </div>

        <div class="col-sm-5 col-sm-pull-5">
          <div class="profileAlign"><br><br><br><br></div><div><br><br><br><br></div>
            <div class="row">
              <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2"></div>
              <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
                <div class="editableProfile">
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="profileUpdateForm">
                    <input id="profileFname" type="text" class="form-control" name="profileFnameInput" placeholder="First Name">
                    <br>
                    <input id="profileLname" type="text" class="form-control" name="profileLnameInput" placeholder="Last Name">
                    <br>
                 
                    <input id="profilePhone" type="number" class="form-control" name="profilePhoneInput" placeholder="Phone Number">
                    
                    <br>
                    <select class="selectpicker orangeDropdown form-control" name="profileDeptInput" data-width="100%">
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
                    <br>

                    <div id="phoneValidationOutput" class="text-center"></div>



                  </form>
                </div>
              </div>
              <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2"></div>
            </div>

            <div class="row viewableProfile">
              <div class="centerDiv">
                <div class="col-xs-2 col-sm"></div>
                <div class="col-xs-8 col-sm-12">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>First Name:</th>
                        <td><?php echo $fname?></td>
                      </tr>
                      <tr>
                        <th>Last Name:</th>
                        <td><?php echo $lname?></td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td><?php echo $email?></td>
                      </tr>
                      <tr>
                        <th>Phone Number:</th>
                        <td><?php echo $phone?></td>
                      </tr>
                      <tr>
                        <th>Department:</th>
                        <td><?php echo $dept?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-xs-2 col-sm"></div>
              </div>
            </div>

            <div class="text-center">
              <br>
              <input type="submit" class="btn btn-primary showHideProfileButton viewableProfile" id="editProfileButton" name="editProfileButton" value="Edit Profile Information">
              <br><br>
              <input type="submit" class="btn btn-primary viewableProfile" name="changePasswordButton" value="Change Password" data-toggle="modal" data-target="#changePasswordModal">
            </div>
          </div>

          <div class="col-sm-1"></div>
        </div>

<!-- CHANGE PASSWORD FORM -->
        <div id="changePasswordModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="changePasswordModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Change Password</h1><br>
                <div class="row">
                  <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2"></div>

                  <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
                    <form>
                      <input id="changePasswordOld" type="password" class="form-control" name="changePasswordOldInput" placeholder="Old Password"><br>
                      <input id="changePasswordNew" type="password" class="form-control" name="changePasswordNewInput" placeholder="New Password"><br>
                      <input id="changePasswordNew02" type="password" class="form-control" name="changePasswordNew02Input" placeholder="Re-enter New Password"><br><br>
                      <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="submitPasswordChangeButton" value="Submit Change"><br>
                     </div>
                    </form>
                  </div>
                  
                  <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- CHANGE PICTURE FORM -->
        <div id="changeProfilePicModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="changeProfilePicModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Upload New Profile Picture:</h1><br>
                <form>
                  <div class="text-center">
                    <input type="button" class="btn btn-primary" name="uploadNewProfilePicButton" value="Upload"><br>
                 </div>
                  <div class="text-center"><br><br>
                    <input type="submit" class="btn btn-primary" name="submitProfilePicChangeButton" value="Submit Change"><br>
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
