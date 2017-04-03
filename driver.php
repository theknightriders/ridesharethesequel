<?php
session_start();
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
 <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
    <script src="scripts/datatablesDriver.js"></script>
    <link rel="stylesheet" href="styles/bootstrap-timepicker.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
<!--     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
  </head>
<!-- 
  <body class="extendForTable stretchPage">
    <script type="text/javascript">
      $('newTripTime').timepicker();
    </script> -->
    <div class="container stretchPage"><div id="container">
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
              <li><a href="profile.php">Profile</a></li>
              <li><a href="help.php">Help</li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>




<!-- NEW DRIVE EVENT FORM -->
      <div id="newTripModal" class="modal fade" role="dialog">
        <div class="modal-dialog modalDriver">
          <div class="modal-content">
            <div class="modal-header" id="newTripModalHeader">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h1 class="text-center">Trip Details:</h1><br>
              <form id="newTripForm">
                <div class="row">
                  <div class="col-sm-4 col-xs-2"></div>
                  <div class="col-sm-4 col-xs-8">
                    <div>
                        <p class="text-center"> Please click Schedule Trip when finished.</p>
                        <br> 
                    </div>
                    <div>
                      <div class="text-center">Departure Date &amp; Time</div>
                      <input id="newTripDate" type="date" class="form-control" name="newTripDateInput" required>
                      <input id="newDepartTime" type="time" class="form-control" name="tripdeparttime" required>
<!--                       <div class="input-group bootstrap-timepicker timepicker">
                        <input id="newTripTime" type="text" class="form-control" name="newTripLnameInput" required> -->
                      </div><br>

                      <div class="text-center">
                        <div>Is this a repeat trip?</div>
                        <label class="radio-inline">
                          <input id="newTripRepeatBooleanYes" type="radio" value="yes" name="oneOrRepeatTrip">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripRepeatBooleanNo" type="radio" value="no" name="oneOrRepeatTrip" checked="checked">
                          No
                        </label>
                      </div>

                      <div class="repeatTripFromTo">
                        <select class="selectpicker orangeDropdown form-control" data-width="100%">
                          <option selected disabled>Repeats On:</option>
                          <option value="Department01">Sundays</option>
                          <option value="Department02">Mondays</option>
                          <option value="Department03">Tuesdays</option>
                          <option value="Department04">Wednesdays</option>
                          <option value="Department05">Thursdays</option>
                          <option value="Department06">Fridays</option>
                          <option value="Department07">Saturdays</option>
                        </select>
                        <div class="text-center">End Date</div>
                        <input id="newTripRepeatDate" type="date" class="form-control" name="newTripDateInput">
                      </div>

                      <br>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%">
                        <option selected disabled>Departing From:</option>
                        <option value="Department01">Ebenezer Hall, Cochran</option>
                        <option value="Department01">Anderson Hall, Cochran</option>
                        <option value="Department02">Dublin Center Annex Building, Dublin</option>
                        <option value="Department03">Corporate Hangar, Eastman</option>
                        <option value="Department04">Charles H. Jones Building, Macon</option>
                        <option value="Department04">Student Life Center, Macon</option>
                        <option value="Department05">Oak Hall, Warner Robins</option>
                      </select>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%">
                        <option selected disabled>Destination:</option>
                        <option value="Department01">Ebenezer Hall, Cochran</option>
                        <option value="Department01">Anderson Hall, Cochran</option>
                        <option value="Department02">Dublin Center Annex Building, Dublin</option>
                        <option value="Department03">Corporate Hangar, Eastman</option>
                        <option value="Department04">Charles H. Jones Building, Macon</option>
                        <option value="Department04">student Life Center, Macon</option>
                        <option value="Department05">Oak Hall, Warner Robins</option>
                      </select><br><br>
                      
                      <input id="driverCarYear" type="text" class="form-control" name="driverCarYear" placeholder="Car Year" required>
                      <input id="driverCareMake" type="text" class="form-control" name="driverCarYear" placeholder="Car Make" required>
                      <input id="driverCarModel" type="text" class="form-control" name="driverCarModel" placeholder="Car Model" required><br>

                      <select class="selectpicker orangeDropdown form-control" data-width="100%">
                        <option selected disabled>Number of Seats:</option>
                        <option value="Seats01">1</option>
                        <option value="Seats02">2</option>
                        <option value="Seats03">3</option>
                        <option value="Seats04">4</option>
                        <option value="Seats05">5</option>
                        <option value="Seats06">6</option>
                        <option value="Seats07">7</option>
                        <option value="Seats08">8</option>
                      </select><br>

                      <div class="text-center"><br>
                        <div>Is your vehicle<br>smoke-free?</div>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanYes" type="radio" name="smokeFreeYesOrNo" value="yes" checked="checked">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanNo" type="radio" name="smokeFreeYesOrNo" value="no">
                          No
                        </label>
                      </div><br>

                      <div class="text-center">
                        <div>Are you willing<br>to deliver a package?</div>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanYes" type="radio" name="packageYesOrNo" value="yes">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanNo" type="radio" name="packageYesOrNo" value="no" checked="checked">
                          No
                        </label><br><br>
                      </div>

                      <div class="packageNotice">
                        <p class="text-center textbold">
                          Please note all packages must be smaller than a<br>10&quot; x 13&quot; envelope
                        </p>
                      </div>

                      <div class="text-center">
                        <div>Would you like to leave a note for potential passengers?</div>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanYes" type="radio" name="messageYesOrNo" value="yes">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanNo" type="radio" name="messageYesOrNo" value="no" checked="checked">
                          No
                        </label>
                      </div>

                      <div class="messageToPassengers">
                        <br>
                        <textarea class="form-control" rows="3" id="messageToPassengers">Leave your message here.</textarea>
                      </div>

                      <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" name="submitNewTripButton" value="Schedule Trip">
                      </div><br>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="body">
          <div class="row text-center">
            <h4 class="welcomeHeader">Add a new event, or select one to edit/delete</h4>
          </div>



          
          <div class="row">
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <div class="button-group text-center" role="group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTripModal">New</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTripModal">Edit</button>
                <button type="button" class="btn btn-primary">Delete</button>
              </div>
            </div>
            <div class="col-md-7 centerWhenSmol">
              <br class="visibleWhenSmol"><a href="dropoffpoints.php" class="btn btn-primary">Drop Off Points</a>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
             <br>
              <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Repeat</th>
                        <th>Departing</th>
                        <th>Destination</th>
                        <th># of Seats</th>
                        <th>Smoke Free</th>
                        <th>Packages</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>none</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>none</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                    <tr>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Mondays</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>none</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Tuesdays</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                    </tr>
                    <tr>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Tuesdays</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                    </tr>
                </tbody>
              </table>
            </div>
            <div class="col-lg-1"></div>
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
