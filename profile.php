<?php
// Needs to be at the top of every page
session_start();

// Make sure the user is logged in
if ($_SESSION['email'] == "")
  {
    // If they're  not logged in, go to the login page
    header("Location:login.php");
  }

// Make the email available as a string variable
$email = $_SESSION['email'];

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

  // Connect to the database
  include ('mysqli_connect.php');

  // Begin preparing the SQL statement
  $sql = "UPDATE users SET ";

  // Take ONLY the data POSTed from the form, 
  // Send it to test_input function for formatting,
  // Store it in a new global variable
  // Append data that needs to be updated to $sql
  if (!empty($_POST["profileFnameInput"])) {
  $fnameInput = test_input($_POST["profileFnameInput"]);
  $sql = $sql . "first_name = '" . $fnameInput . "', ";
  }

  if (!empty($_POST["profileLnameInput"])) {
  $lnameInput = test_input($_POST["profileLnameInput"]);
  $sql = $sql . "last_name = '" . $lnameInput . "', ";
  }

  if (!empty($_POST["profilePhoneInput"])) {
  $phoneInput = test_input($_POST["profilePhoneInput"]);
  $sql = $sql . "phone = '" . $phoneInput . "', ";
  }

  if (!empty($_POST["profileDeptInput"])) {
  $deptInput = test_input($_POST["profileDeptInput"]);
  $sql = $sql . "department = '" . $deptInput . "', ";
  }

  if (!empty($_POST["changePasswordNewInput"])) {
  $pwordInput = test_input($_POST["changePasswordNewInput"]);
  $sql = $sql . "pword = '" . $pwordInput . "', ";
  }

  // Trim the trailing ", " from the string
  $sql = rtrim($sql, ', ');

  // Append the last part of the SQL statement
  $sql = $sql . "WHERE email = '" . $_SESSION['email'] . "';";

  // Send the SQL statement to the database
  $conn->query($sql);

  // Close the db connection
  $conn->close();

}

///////////////////
// Profile Picture uploads

if (isset($_FILES["profilePicFile"])) {

  $partsOfEmail = explode("@", $email);
  $newPicName = $partsOfEmail[0];
  $newPicName = str_replace(".", "", $newPicName);
  $uploadErrorString = "<span class='error'>";
  $target_dir = "profilePics/";
  $target_file = $target_dir . basename($_FILES["profilePicFile"]["name"]);
  $newFileName = $target_dir . $newPicName;
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $newFileName .= "." . $imageFileType;

  // Check if image file is a actual image or fake image
  if(isset($_POST["submitProfilePicChangeButton"])) {
      $check = getimagesize($_FILES["profilePicFile"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadErrorString .= "File is not an image.<br>";
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      $uploadErrorString .= "Sorry, file already exists.<br>";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["profilePicFile"]["size"] > 500000) {
      $uploadErrorString .= "Sorry, your file is too large.<br>";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $uploadErrorString .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $uploadErrorString .= " Sorry, your file was not uploaded.<br>";

  // if everything is ok, try to upload file
  } else {

      // Deal with overwriting the previous file
      if (file_exists('$newFileName')) {
          chmod('$newFileName',0755);
          unlink('$newFileName');
      }

      // Try to upload the file
      if (move_uploaded_file($_FILES["profilePicFile"]["tmp_name"], $newFileName)) {

          // Connect to the database
          include ('mysqli_connect.php');

          // Begin preparing the SQL statement
          $sql = "UPDATE users SET profile_image = '" . $newFileName . "' WHERE email = '" . $_SESSION['email'] . "';";

          // Send the SQL statement to the database
          $conn->query($sql);

          // Close the db connection
          $conn->close();

      // One more part to the error message
      } else {
          $uploadErrorString .= "Sorry, there was an error uploading your file.<br>";
      }
  }

  $uploadErrorString .= "</span>";
  // $uploadErrorString needs to be sent to someplace better - just doing it here for now
  echo $uploadErrorString;

}



////////////////////
// Set up the page
// Connect to the database
include ('mysqli_connect.php');

  // Prepare the SQL statement
  $sql = "SELECT first_name, last_name, phone, department, profile_image FROM users WHERE email = '" . $_SESSION['email'] . "'";

  // Bind the result set to a variable
  $result = $conn->query($sql);

  // Put the result set into an array
  if ($result->num_rows > 0) {
    // Store each element of the array in its own global variable
    while($row = $result->fetch_assoc()) {
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $phone = $row['phone'];
      $profilePic = $row['profile_image'];
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
    <script src="scripts/ajaxValidation.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" src="images/cornericon.png">
  </head>

  <body class="profileStretchPage">
    <div class="container profileStretchPage"><div id="container">
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
            <br><br><br><br>
            <img src=<?php echo $profilePic?> class="profilePic" alt="profile picture">
          </div>
          <br><br>
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
                    <input id="profilePhone" type="number" class="form-control" name="profilePhoneInput" placeholder="Phone Number" min="1000000000" max="9999999999">
                    <br>
                    <select class="selectpicker orangeDropdown form-control" id="profileDept" name="profileDeptInput" data-width="100%">
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
                    <div id="phoneValidationOutput" class="text-center">
                    </div>
                    <div class="text-center">
                      <br>
                      <input type="submit" class="btn btn-primary showHideProfileButton" id="submitProfileButton" name="submitProfileButton" value="Submit Changes" />
                      <br><br>
                      <input type="button" class="btn btn-primary" name="cancelProfile" id="cancelProfile" value="Cancel" onclick="cancelProfileForm()">
                    </div>
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
                <button type="reset" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Change Password</h1><br>
                <div class="row">
                  <div class="col-xs-2 col-sm-3"></div>

                  <div class="col-xs-8 col-sm-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="profileChangePasswordForm">
                      <input type="hidden" value="itsNotGood" id="pwordChecker" name="pwordChecker">
                      <input id="changePasswordNew" type="password" class="form-control" name="changePasswordNewInput" placeholder="New Password"><br>
                      <input id="changePasswordNew02" type="password" class="form-control" name="changePasswordNew02Input" placeholder="Re-enter New Password"><br>
                      <input id="changePasswordOld" type="password" class="form-control" name="changePasswordOldInput" placeholder="Current Password">
                      <div id="pwordUpdateOutput" class="text-center"></div>
                      <br>
                      <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" id="submitPwordButton" name="submitPwordButton" value="Submit Changes">
                        <br><br>
                        <input type="button" class="btn btn-primary" name="cancelPword" id="cancelPword" value="Cancel" onclick="cancelPwordForm()">
                      </div>
                    </form>
                  </div>
                  
                  <div class="col-xs-2 col-sm-3"></div>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                  <div class="text-center">
                    <input type="file" class="center fileStyle" name="profilePicFile" id="profilePicFile"><br>
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
          Copyright &copy; 2017 Knight Rider<br>
          Website Development by <a href="mailto:MGAKnightRiders@mga.edu">Knight Rider</a>
      </div>

    </div></div>


    <script type="text/javascript">
      validatePhoneAndPass();
    </script>
  </body>
</html>
