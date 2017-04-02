<!DOCTYPE HTML>

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

        <div id="body">

          <div class="row text-center">
            <h4 class="welcomeHeader">Pick Up &amp; Drop Off Locations:</h4>
            <h4>(Click to enlarge)</h4>
          </div>


          <div class="row">
    <!-- LITTLE MAPS -->
            <div class="imageList text-center">
             <div class="col-sm-4 col-xs-2">
      
              <h5  class="welcomeHeader"> Ebenezer Hall and Anderson Hall, <br> Cochran </h5>
              <img id="cochranLittleMap" src="images/cochranMap.png" alt="Cochran Campus" width="300" height="200" data-toggle="modal" data-target="#cochranModal">
              <h5  class="welcomeHeader"> Dublin Center Annex, <br> Dublin </h5>
              <img id="dublinLittleMap" src="images/dublinMap.png" alt="Dublin Campus" width="300" height="200" data-toggle="modal" data-target="#dublinModal">
             </div>
              <div class="col-sm-4 col-xs-4">
              <h5  class="welcomeHeader"> Corporate Hangar,<br> Eastman</h5>
              <img id="eastmanLittleMap" src="images/eastmanMap.png" alt="Eastman Campus" width="300" height="200" data-toggle="modal" data-target="#eastmanModal">
              <h5  class="welcomeHeader"> Charles H. Jones and Student Life Center, Macon</h5>
              <img id="maconLittleMap" src="images/maconMap.png" alt="Macon Campus" width="300" height="200" data-toggle="modal" data-target="#maconModal">
              </div>
              <div class="col-sm-4 col-xs-2">
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