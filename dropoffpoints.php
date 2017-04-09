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
              <li><a href="help.php">Help</li>
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
<script>/* activate the carousel */
$("#modal-carousel").carousel({interval:false});

/* change modal title when slide changes */
$("#modal-carousel").on("slid.bs.carousel", function () {
  $(".modal-title").html($(this).find(".active img").attr("title"));
})

/* when clicking a thumbnail */
$(".row .thumbnail").click(function(){
    var content = $(".carousel-inner");
    var title = $(".modal-title");
  
    content.empty();  
    title.empty();
  
    var id = this.id;  
    var repo = $("#img-repo .item");
    var repoCopy = repo.filter("#" + id).clone();
    var active = repoCopy.first();
  
    active.addClass("active");
    title.html(active.find("img").attr("title"));
    content.append(repoCopy);

    // show the modal
    $("#modal-gallery").modal("show");
});
</script>
 <div id="body">

<div class="container">
  <div class="row">
    <h1>Pick Up &amp; Meeting Locations:</h1>
      <h4>(Click to enlarge)</h4>
        <hr>
    
    <div class="row">
            
            <div class="col-12 col-md-4 col-sm-6">
          <a title="Cochran Campus" href="images/maps/cochranmap.png"> 
            <img class="thumbnail img-responsive" id="cochranmap" src="images/maps/cochranmap.png">
          </a>
        </div>
      
        <div class="col-12 col-md-4 col-sm-6">
          <a title="Macon Campus" href="images/maps/maconmap.png"> 
            <img class="thumbnail img-responsive" id="maconmap" src="images/maps/maconmap.png">
          </a>

        </div>
        <div class="col-12 col-md-4 col-sm-6">
          <a title="Dublin Campus" href="images/maps/dublinMap.png"> 
            <img class="thumbnail img-responsive" id="dublinmap" src="images/maps/dublinMap.png">
          </a>
        </div>
    </div>
     <div class="col-12 col-md-4 col-sm-6">
          <a title="Eastman Campus" href="images/maps/eastmanMap.png"> 
            <img class="thumbnail img-responsive" id="eastmanmap" src="images/maps/eastmanMap.png">
          </a>
        </div>
        <div class="col-12 col-md-4 col-sm-6">
          <a title="Eastman Campus" href="images/maps/wrcmap.png"> 
            <img class="thumbnail img-responsive" id="wrcmap" src="images/maps/wrcmap.png">
          </a>
        </div>
    
    <hr>
    
  </div>
</div>

  <div class="hidden" id="img-repo">
    
    <!-- #cochran -->
    <div class="item" id="image-1">
      <img class="thumbnail img-responsive" title="Cochran Campus Map" src="images/maps/cochranmap.png">
    </div>
    <div class="item" id="image-1">
      <img class="thumbnail img-responsive" title="Alderman Hall, Cochran Campus" src="images/ridesharelocations/aldermanhallcochranmeeting">
    </div>
    <div class="item" id="image-1">
      <img class="thumbnail img-responsive" title="Memorial Hall, Cochran Campus" src="images/ridesharelocations/memorialhallcochranmeeting">
    </div>
      
    <!-- #image-2 -->
    <div class="item" id="image-2">
      <img class="thumbnail img-responsive" title="Image 21" src="http://dummyimage.com/600x350/2255EE/969696">
    </div>
    <div class="item" id="image-2">
      <img class="thumbnail img-responsive" title="Image 21" src="http://dummyimage.com/600x600/2255EE/969696">
    </div>
    <div class="item" id="image-2">
      <img class="thumbnail img-responsive" title="Image 23" src="http://dummyimage.com/300x300/2255EE/969696">
    </div>   
      
    <!-- #image-3-->
    <div class="item" id="image-3">
      <img class="thumbnail img-responsive" title="Image 31" src="http://dummyimage.com/600x350/449955/FFF">
    </div>
    <div class="item" id="image-3">
      <img class="thumbnail img-responsive" title="Image 32" src="http://dummyimage.com/600x600/449955/FFF">
    </div>
    <div class="item" id="image-3">
      <img class="thumbnail img-responsive" title="Image 33" src="http://dummyimage.com/300x300/449955/FFF">
    </div>        
    
  </div>

<div class="modal" id="modal-gallery" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">×</button>
          <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
          <div id="modal-carousel" class="carousel">
   
            <div class="carousel-inner">           
            </div>
            
            <a class="carousel-control left" href="#modal-carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
            <a class="carousel-control right" href="#modal-carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
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