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
    <script src="scripts/modernizr-custom.js"></script>
    <link rel="stylesheet" href="styles/style.css">
  </head>

  <body class="stretchPage">
    <div class="container stretchPage"><div id="container">
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
              <li><a href="profile.php">Profile</a></li>
              <li>Help</li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

        <div id="body">

          <div class="row text-center">
            <h4 class="welcomeHeader">Pick Up &amp; Meeting Locations:</h4>
            <h4>(Click to enlarge)</h4>
          </div>


          <div class="row">
    <!-- LITTLE MAPS -->
            <div class="imageList text-center">
             <div class="col-sm-4 col-xs-2">
      
              <h5  class="welcomeHeader"> Ebenezer Hall and Anderson Hall, <br> Cochran </h5>
              <img id="cochranLittleMap" src="images/cochranMap.png" alt="Cochran Campus" width="800" height="700" data-toggle="modal" data-target="#cochranModal">
              <h5  class="welcomeHeader"> Dublin Center Annex,<br> Dublin </h5>
              <img id="dublinLittleMap" src="images/dublinMap.png" alt="Dublin Campus" width="300" height="200" data-toggle="modal" data-target="#dublinModal">
             </div>
              <div class="col-sm-4 col-xs-4">
              <h5  class="welcomeHeader"> Corporate Hangar,<br> Eastman</h5>
              <img id="eastmanLittleMap" src="images/eastmanMap.png" alt="Eastman Campus" width="300" height="200" data-toggle="modal" data-target="#eastmanModal">
              <h5  class="welcomeHeader"> Charles H. Jones and Student Life Center, Macon</h5>
              <img id="maconLittleMap" src="images/maconMap.png" alt="Macon Campus" width="300" height="200" data-toggle="modal" data-target="#maconModal">
              </div>
              <div class="col-sm-4 col-xs-4">
              <h5  class="welcomeHeader"> Oak Hall,<br> Warner Robins</h5>
              <img id="wrLittleMap" src="images/wrMap.png" alt="Warner Robins Campus" width="300" height="200" data-toggle="modal" data-target="#wrModal">
              </div>
            </div>
          </div>


    <!-- COCHRAN MODAL -->
          <div id="cochranModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="cochranModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Cochran Campus:</h1><br>
                  <img class="modal-content" id="cochranBigMap" src="images/cochranMap.png">
                </div>
              </div>
            </div>
          </div>

    <!-- DUBLIN MODAL -->
          <div id="dublinModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="dublinModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Dublin Campus:</h1><br>
                  <img class="modal-content" id="dublinBigMap" src="images/dublinMap.png">
                </div>
              </div>
            </div>
          </div>

    <!-- EASTMAN MODAL -->
          <div id="eastmanModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="eastmanModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Eastman Campus:</h1><br>
                  <img class="modal-content" id="eastmanBigMap" src="images/eastmanMap.png">
                </div>
              </div>
            </div>
          </div>

    <!-- MACON MODAL -->
          <div id="maconModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="maconModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Macon Campus:</h1><br>
                  <img class="modal-content" id="maconBigMap" src="images/maconMap.png">
                </div>
              </div>
            </div>
          </div>

    <!-- WARNER ROBINS MODAL -->
          <div id="wrModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="wrModalHeader">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h1 class="text-center">Warner Robins Campus:</h1><br>
                  <img class="modal-content" id="wrBigMap" src="images/wrMap.png">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <br><br>
            <h4 class="welcomeHeader text-center">How to Rideshare:</h4>
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
            <p>When you are on the Welcome page, please select the "Drive" button located on the left side of the homepage. To create a trip, simply click New. A form will pop up for you to fill out. When you are finished, click schedule trip.  After clicking submit, your response will be visible to all passengers. You will be taken back to the Driver page where you can edit and delete trips, as well as add a new one.</p>
            </div>
            <div class="col-xs-1"></div>
          </div>

          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
            <h4 class="welcomeHeader">Passenger:</h4>
            </div>
            <div class="col-xs-1"></div>
          </div>
          
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
            <p> If you are trying to find a rideshare select the "Ride" button located on the right side of the Welcome page. This will direct you to all the available rides. Use the search box or filter buttons to find the ride that works best for you. When you have found your desired ride, press the "Book a Ride" button. This will show the contact information for the driver. Please use this information to contact the driver. If you are sending a package, there must be someone at the designated drop off point to pick up the package. Drivers must be notified of the name of the person who will be picking up the package.. Please note that all packages MUST be smaller than a 11 inch x 13 inch package. If you must cancel your ride, you must inform the driver at least one hour before pickup.</p>
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
                   <ol>
                      <li>No smoking in vehicles as Middle Georgia State University is a smoke free campus.</li>
                      <li>No loud or offensive music. </li>
                      <li>Maintain a reasonably clean and organized vehicle.</li> 
                      <li>Minimize strong smells such as fragrances and perfumes.</li>
                      <li>Be mindful of your ride sharing partner. </li>
                      <li>Be on time</li>
                      <li>All packages must be smaller than a 11 x 13 inch envelope. </li>
                      <li>Any cancellations must be communicated to each other at least an hour ahead of the listed depart time.</li>
                      <li>Communicate any changes in plans ahead of time.</li>
                      <li>If you are sending a package, there must be someone at the designated drop off location to pick up this package. Please notify your driver with the name of this individual.</li>
                    <ol>
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
                  <p> For the safety of our drivers and passengers, this policy defines the regulations of transporting faculty and staff. It is important that drivers obey all traffic rules and signs when transporting rideshare passengers. Drivers are expected to travel safely to the rideshare destinations. Safety is paramount to ensure that all riders feel safe when riding with a driver and to minimize car accidents. All drivers must have a valid driver’s license certifying they know the traffic rules while of driving and have taken MGA’s Motor Vehicle Training, as outlined in the Motor Vehicle Use Policy . They must also have an insurance policy on file with their personal vehicles. Please contact law enforcement if you are concerned about your safety.</p>
                    <ul>
                      <li> Keep your eyes focused on driving </li>
                      <li> Always obey traffic lights and traffic sign rules </li>
                      <li>Be cautious of other drivers </li>
                      <li>Wear your seatbelt </li>
                      <li>Do not use drugs or consume alcohol while driving </li>
                    </ul>
                    <b>For Passengers: </b>
                    <p> In your choice of riding with a driver outside of the MGA rideshare, we assume no responsibility for the safety of your ride. While we have a list of safety guidelines for our drivers to follow,  but some drivers may not abide by them. Every driver is required to have a driver’s license, and the appropriate automobile insurance coverage to transport a MGA rider. It is also critical that they follow all traffic lights and signs during an MGA rideshare drive to ensure the riders’ safety.  Please practice discretion and do not get in a car if you feel uncomfortable.  Call law enforcement if you are concerned about your safety. </p> 

                      <ul>
                        <li> Wear your seatbelt </li>
                        <li> Keep distractions to a minimum </li>
                        <li>Minimize stops enroute or discuss stops ahead of time with the driver.</li>
                      </ul>


                    <p>Police Department Macon Campus: <a href="tel:4784712414"> (478)-471-2414 </a></p>
                    <p>Police Department Cochran Campus: <a href="tel:4789343002"> (478)-934-3002 </a></p>  
                    <p>Police Department Warner Robins Campus: <a href="tel:4789296750"> (478)-929-6750 </p>
                    <p> Police Department Eastman Campus:<a href= "tel:4783746403"> (478)-374-6403  </a></p>
                    <p>Police Department Dublin Campus: <a href="tel:4782747751">(478)-274-7751 </a> </p>

            </div>
            <div class="col-xs-1"></div>
          </div>
          <br><br><br>


        </div>




        <div id="footer" class="text-center center">
            <hr>
            Copyright &copy; 2017 MGA Knight Riders<br>
            Website Development by <a href="mailto:MGAKnightRiders@mga.edu">MGA Knight Riders</a>
        </div>

    </div></div>
  </body>
</html>
