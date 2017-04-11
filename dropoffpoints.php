
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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" src="images/cornericon.png">
  </head>



  <body class="stretchPage">
    <div class="container stretchPage"><div id="container">
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
              <li><a href="profile.php">Profile</a></li>
              <li><a href="help.php">Help</li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

 <div id="body">
 
  <div id="body">

          <div class="row text-center">
            <h4 class="welcomeHeader">Pick Up &amp; Meeting Locations:</h4>
            <h4>(Click to enlarge)</h4>
          </div>


          <div class="row">
    <!-- LITTLE MAPS -->
            <div class="imageList text-center">
             <div class="col-sm-4 col-xs-2">
      
              <h5  class="welcomeHeader"> Memorial Hall and Alderman Hall, <br> Cochran </h5>
              <img id="cochranLittleMap" src="images/maps/cochranmap.png" alt="Cochran Campus" width="800" height="700" data-toggle="modal" data-target="#cochranModal">
              <h5  class="welcomeHeader"> Dublin Center Annex Building,<br> Dublin </h5>
              <img id="dublinLittleMap" src="images/maps/dublinmap.png" alt="Dublin Campus" width="300" height="200" data-toggle="modal" data-target="#dublinModal">
             </div>
              <div class="col-sm-4 col-xs-4">
              <h5  class="welcomeHeader"> Corporate Hangar,<br> Eastman</h5>
              <img id="eastmanLittleMap" src="images/maps/eastmanmap.png" alt="Eastman Campus" width="300" height="200" data-toggle="modal" data-target="#eastmanModal">
              <h5  class="welcomeHeader"> Charles H. Jones and Student Life Center, Macon</h5>
              <img id="maconLittleMap" src="images/maps/maconmap.png" alt="Macon Campus" width="300" height="200" data-toggle="modal" data-target="#maconModal">
              </div>
              <div class="col-sm-4 col-xs-4">
              <h5  class="welcomeHeader"> Oak Hall,<br> Warner Robins</h5>
              <img id="wrLittleMap" src="images/maps/wrcmap.png" alt="Warner Robins Campus" width="300" height="200" data-toggle="modal" data-target="#wrModal">
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
                  <img class="modal-content" id="cochranBigMap" src="images/maps/cochranmap.png">
                  <h1 class="text-center">Memorial Hall, Cochran Campus</h1><br>
                  <img src="images/ridesharelocations/sanfordhallcochranmeeting.jpg" alt="Sanford Hall">
                  <h1 class="text-center">Alderman Hall, Cochran Campus</h1><br>
                  <img src="images/ridesharelocations/aldermanhall.jpg" alt="Alderman Hall">
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
                  <img class="modal-content" id="dublinBigMap" src="images/maps/dublinmap.png">
                  <h1 class="text-center">Dublin Center Annex Building, Dublin Campus</h1><br>
                  <img src="images/ridesharelocations/dublinmeeting.jpg" alt="Dublin Center Annex Building">
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
                  <img class="modal-content" id="eastmanBigMap" src="images/maps/eastmanmap.png">
                  <h1 class="text-center">Corporate Hangar, Eastman Campus</h1><br>
                  <img src="images/ridesharelocations/eastmanmeeting.jpg" alt="Eastman">
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
                  <img class="modal-content" id="maconBigMap" src="images/maps/maconmap.png">
                  <h1 class="text-center">College of Arts and Sciences, Macon Campus</h1><br>
                  <img src="images/ridesharelocations/coasmeeting.jpg" alt="College of Arts and Sciences">
                  <h1 class="text-center">Jones Hall, Macon Campus</h1><br>
                  <img src="images/ridesharelocations/jonesmeeting.jpg" alt="Jones">
        
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
                  <img class="modal-content" id="wrBigMap" src="images/maps/wrcmap.png">
                  <h1 class="text-center">Oak Hall, Warner Robins Campus</h1><br>
                  <img src="images/ridesharelocations/wrmeeting.jpg" alt="Oak Hall Warner Robins Campus">
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

  </body> 
</html> 