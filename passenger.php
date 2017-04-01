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
    <script src="scripts/datatablesDriver.js"></script>
    <script src="scripts/modernizr-custom.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="styles/style.css">
  </head>

  <body class="extendForTable stretchPage">
    <script type="text/javascript">
      $('newTripTime').timepicker();
    </script>
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
        <div id="body">
          <div id="contactInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="contactInfoModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Driver's Contact Information:</h1><br>
                  Name:<br>
                  Email:<br>
                  Phone:<br>
                  <br>
                  Message from the driver:
                </div>
              </div>
            </div>
          </div>

          <div class="row text-center">
            <h4 class="welcomeHeader">Please select a ride:</h4>
          </div>

          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
             <br>
              <table id="example" class="display nowrap" cellspacing="0" width="75%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Departing</th>
                        <th>Destination</th>
                        <th>Number <br> of Seats</th>
                        <th>Smoke Free</th>
                        <th>Packages</th>
                        <th><button><a href ="dropoffpoints.php">View Drop Off Points</button>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/25/2016</td>
                        <td>3:30 PM</td>
                        <td>Eastman</td>
                        <td>Warner Robins</td>
                        <td>1</td>
                        <td>No</td>
                        <td>3x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>5/3/2017</td>
                        <td>2:00 PM</td>
                        <td>Dublin</td>
                        <td>Warner Robins</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/2/2017</td>
                        <td>10:30 AM</td>
                        <td>Warner Robins</td>
                        <td>Dublin</td>
                        <td>1</td>
                        <td>No</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>4/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Warner Robins</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>3/14/2017</td>
                        <td>4:00 PM</td>
                        <td>Macon</td>
                        <td>Dublin</td>
                        <td>2</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>2/23/2017</td>
                        <td>3:30 PM</td>
                        <td>Macon</td>
                        <td>Cochran</td>
                        <td>2</td>
                        <td>No</td>
                        <td>1x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
                      </tr>
                    <tr>
                        <td>Some Person</td>
                        <td>12/23/2016</td>
                        <td>9:30 AM</td>
                        <td>Cochran</td>
                        <td>Macon</td>
                        <td>3</td>
                        <td>Yes</td>
                        <td>5x5</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactInfoModal">Book Ride</button></td>
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
