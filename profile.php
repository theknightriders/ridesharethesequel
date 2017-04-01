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
    <script src="scripts/modernizr-custom.js"></script>
    <link rel="stylesheet" href="styles/style.css">
  </head>

  <body class="profileStretchPage">
    <div class="container profileStretchPage"><div id="container">
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
              <li>Profile</li>
              <li><a href="help.php">Help</li>
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
            <div class="editableProfile">
              <input id="profileFname" type="text" class="form-control" name="profileFnameInput" placeholder="First Name">
              <input id="profileLname" type="text" class="form-control" name="profileLnameInput" placeholder="Last Name">
              <input id="profileEmail" type="text" class="form-control" name="profileEmailInput" placeholder="MGA Email">
              <input id="profilePhone" type="text" class="form-control" name="profilePhoneInput" placeholder="Phone Number">
              <select class="selectpicker orangeDropdown form-control" data-width="100%">
                <option selected disabled>Department</option>
                          <option value="Department01">English</option>
                          <option value="Department02">History and Political Science</option>
                          <option value="Department03">Mathematics</option>
                          <option value="Department04">Media, Culture, and the Arts </option>
                          <option value="Department05">Natural Sciences</option>
                          <option value="Department06">Psychology, Sociology, and Criminal Justice</option>
                          <option value="Department07">Aviation Maintenance and Structural Technology</option>
                          <option value="Department08">Aviation Science and Management</option>
                          <option value="Department09">Flight</option>
                          <option value="Department10">Business</option>
                          <option value="Department11">Education</option>
                          <option value="Department12">Health Services Administration</option>
                          <option value="Department13">Nursing</option>
                          <option value="Department14">Occupational Therapy Assistant</option>
                          <option value="Department15">Respitory</option>
                          <option value="Department16">Information Technology</option>
                          <option value="Department17">Office of Graduate Studies</option>
                          <option value="Department18">Office of the President </option>
                          <option value="Department19">Division of University Advancement</option>
                          <option value="Department20">Division of Finance and Operations </option>
                          <option value="Department21">Division of Recruitment and Marketing</option>
                          <option value="Department22">Division of Student Affairs </option>
                          <option value="Department23">Other</option>
              </select><br>
            </div>

            <div class="row viewableProfile">
              <div class="centerDiv">
                <div class="col-xs-2 col-sm"></div>
                <div class="col-xs-8 col-sm-12">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>First Name:</th>
                        <td>(FName)</td>
                      </tr>
                      <tr>
                        <th>Last Name:</th>
                        <td>(LName)</td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td>(something@mga.edu)</td>
                      </tr>
                      <tr>
                        <th>Phone Number:</th>
                        <td>(555) 555-5555</td>
                      </tr>
                      <tr>
                        <th>Department:</th>
                        <td>(Department)</td>
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
              <input type="submit" class="btn btn-primary showHideProfileButton editableProfile" id="submitProfileButton" name="submitProfileButton" value="Submit Changes">
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
                <form>
                  <input id="changePasswordOld" type="password" class="form-control" name="changePasswordOldInput" placeholder="Old Password"><br>
                  <input id="changePasswordNew" type="password" class="form-control" name="changePasswordNewInput" placeholder="New Password"><br>
                  <input id="changePasswordNew02" type="password" class="form-control" name="changePasswordNew02Input" placeholder="Re-enter New Password"><br><br>
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submitPasswordChangeButton" value="Submit Change"><br>
                 </div>
                </form>
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
