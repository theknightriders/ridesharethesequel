<?php
session_start();
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
                  <!--<form action="profileProcess.php" method="post">--><form>
                    <input id="profileFname" type="text" class="form-control" name="profileFnameInput" placeholder="First Name">
                    <br>
                    <input id="profileLname" type="text" class="form-control" name="profileLnameInput" placeholder="Last Name">
                    <br>
                    <input id="profilePhone" type="text" class="form-control" name="profilePhoneInput" placeholder="Phone Number">
                    <br>
                    <select class="selectpicker orangeDropdown form-control" data-width="100%" name="profileDepartmentInput">
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
                        <td>(FName)</td>
                      </tr>
                      <tr>
                        <th>Last Name:</th>
                        <td>(LName)</td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td><?php echo $_SESSION["email"]?></td>
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
              <span class="editableProfile">
                <br>
                <input type="submit" class="btn btn-primary showHideProfileButton" id="submitProfileButton" name="submitProfileButton" value="Submit Changes">
              </span>
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
