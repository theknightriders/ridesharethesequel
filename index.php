<!DOCTYPE HTML>

<html lang="en">
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

  <body>
    <div class="container"><div id="container">
      <div class="page-header">
        <div class="logoContainer">
          <a href="index.php" title="MGA Knight Riders: Login">
            <img class="logoSmall" src="images/mga/MiddleGeorgia_Inst_Vert.jpg"  alt="small logo"/>
            <img class="logoBig" src="images/mga/MiddleGeorgia_Inst_EXHoriz.jpg" alt="big logo" />
          </a>
        </div>
      </div>
      <div id="body">
        <div class="row">
          <div class="col-sm-4 col-xs-2"></div>
          
          <div class="col-sm-4 col-xs-8">
  <!-- SIGN IN FORM -->        
            <form id="loginForm" class="text-center center">
              <div>
                <input id="email" type="text" class="form-control text-center" name="emailInput" placeholder="MGA Email">
                <input id="password" type="password" class="form-control text-center" name="passwordInput" placeholder="Password">
              </div>
              <br>
              <div class="center">
                <button type="button" class="btn btn-primary indexButton" name="registerButton" data-toggle="modal" data-target="#registrationModal">Register</button>
  <!-- PLACEHOLDER - Remove this button and uncomment the submit button. -->
                <a class="btn btn-primary indexButton" href="welcome.php">Sign In</a>
  <!--          <input type="submit" class="btn btn-primary indexButton" name="submitButton" value="Sign In">  -->
              </div>
            </form>
          </div>
          
          <div class="col-sm-4 col-xs-2"></div>
        </div>

        <div class="row text-center">
          <br><a href="#" data-toggle="modal" data-target="#whatDoModal">What is MGA Rideshare?</a>
        </div>

  <!-- WHAT DO MODAL -->
        <div id="whatDoModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="whatDoModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <br><br>
                  <h4 class="welcomeHeader text-center">What is MGA Rideshare?</h5>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <h4 class="welcomeHeader">Description:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p> KnightRiders is a carpooling service for faculty and staff members at Middle Georgia State University. Carpooling is a cost effective and environmentally friendly way for faculty and staff members to travel between Middle Georgia State University's five campuses. This service is free of charge and is a great way to save money, save the environment, and build a stronger community.</p>
                  </div>
                  <div class="col-xs-1"></div>
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
                  <p>To become a driver you must first register. A confirmation will be sent to your email. Next, log in using your faculty/staff MGA email and password that you registered with. When you are on the Welcome page, please select the "Drive" button located on the left side of the homepage. To create a trip, simply click New. A form will pop up for you to fill out. When you are finished, click schedule trip.  After clicking submit, your response will be visible to all passengers. You will be taken back to the Driver page where you can edit and delete trips, as well as add a new one. </p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>

                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <h4 class="welcomeHeader">Passenger and Packages:</h4>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                  <p>A confirmation will be sent to your email. Next, log in using your faculty/staff MGA email and password that you registered with. To become a passenger you must first register. If you are trying to find a rideshare select the "Ride" button located on the right side of the Welcome page. This will direct you to all the available rides. Use the search box or filter buttons to find the ride that best works for yourself. When you have found your desired ride, press the "Book a Ride" button. This will show the contact information for the driver. Please use this information to contact the driver. If you are sending a package, there must be someone at the designated drop off point to pick up the package. Message the person driving the name of the person picking up the package. Please note that all packages MUST be smaller than a 11 inch x 13 inch package. If you must cancel your ride, you must inform the driver at least one hour before pickup. </p>
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
                  <p> JOHNATHAN AND EPI </p>
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
                  <p> For the safety of our drivers and passengers, this policy defines the regulations of transporting faculty and staff. It is important that all drivers obey all traffic rules and signs when transporting rideshare passengers. Drivers are expected to travel safely to the rideshare destinations. Safety is paramount to ensure that all riders feel safe when riding with a driver and to minimize car accidents. All drivers must have a valid driver’s license certifying they know the traffic rules while of driving and have taken MGA’s Motor Vehicle Training, as outlined in the Motor Vehicle Use Policy . They must also have an insurance policy on file with their personal vehicles. Please contact law enforcement if you are concerned about your safety.</p>
                    <ul>
                      <li> Keep your eyes focused on driving </li>
                      <li> Always obey traffic lights and traffic sign rules </li>
                      <li>Be cautious of other drivers </li>
                      <li>Wear your seatbelt </li>
                      <li>Do not use drugs or consume alcohol while driving </li>
                    </ul>
                    <b>For Passengers: </b>
                    <p> In your choice of riding with a driver outside of the MGA rideshare, we assume no responsibility for the safety of your ride. While we have a  list of safety guidelines for our drivers to follow, some drivers may not abide by them. Every driver is required to have a driver’s license, and the appropriate automobile insurance coverage to transport a MGA rider. It is also critical that they follow all traffic lights and signs during an MGA rideshare drive to ensure all rider’s safety.  Please practice discretion and do not not get in a car if you feel uncomfortable.  Call law enforcement if you are concerned about your safety. </p> 

                      <ul>
                        <li> Wear your seatbelt </li>
                        <li> Keep distractions to a minimum </li>
                        <li>Minimize stops enroute or discuss stops ahead of time with the driver.</li>
                      </ul>


                    <p>Police Department Macon Campus: <a href="tel:4784712414"> (478)-471-2414 </a></p>
                    <p>Police Department Cochran Campus: <a href="tel:4789343002"> (478)-934-3002  </a></p>
                    <p>Police Department Warner Robins Campus: <a href="tel:4789296750"> (478)-929-6750 </a> </p>
                    <p> Police Department Eastman Campus:<a href= "tel:4783746403"> (478)-374-6403  </a></p>
                    <p>Police Department Dublin Campus: <a href="tel:4782747751">(478)-274-7751 </a> </p>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                <br><br><br>
              </div>
            </div>
          </div>
        </div>        

  <!-- REGISTRATION FORM -->
        <div id="registrationModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="registrationModalHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Register:</h1><br>
                <form id="registrationForm">
                  <div class="row">
                    <div class="col-sm-4 col-xs-2"></div>

                    <div class="col-sm-4 col-xs-8">
                      <div>
                        <input id="registrationFname" type="text" class="form-control" name="registrationFnameInput" placeholder="First Name" required>
                        <input id="registrationLname" type="text" class="form-control" name="registrationLnameInput" placeholder="Last Name" required>
                        <input id="registrationEmail" type="text" class="form-control" name="registrationEmailInput" placeholder="MGA Email" required>
                        <input id="registrationPhone" type="text" class="form-control" name="registrationPhoneInput" placeholder="Phone Number" required>
                        <select class="selectpicker orangeDropdown form-control" data-width="100%">
                          <option selected disabled required>Department</option>
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
                        </select>
                        <input id="registrationPassword" type="password" class="form-control" name="registrationpasswordInput" placeholder="Password" required>
                      </div>
                    </div>

                    <div class="col-sm-4 col-xs-2"></div>
                  </div><br>

                  <div class="row">
                    <div class="col-xs-2"></div>

                    <div class="col-xs-8">
                      <h4 class="text-center"><span class="avoidwrap">Please read the Terms &amp; Conditions</span> <span class="avoidwrap">below before submitting your registration request.</span></h4>
                    </div>

                    <div class="col-xs-2"></div>                  
                  </div>

                  <hr>

                  <h1 class="text-center">Terms &amp; Conditions:</h1>
                  <div class="row">
                    <div class="col-xs-1"></div>

                    <div class="col-xs-10">
                      <p>
                      I will take some magic white, and a little bit of Vandyke brown and a little touch of yellow. Trees grow however makes them happy. If these lines aren't straight, your water's going to run right out of your painting and get your floor wet. It's beautiful - and we haven't even done anything to it yet.
                      </p>

                      <p>
                      Talk to trees, look at the birds. Whatever it takes. Be brave. We'll take a little bit of Van Dyke Brown. Little trees and bushes grow however makes them happy. You are only limited by your imagination. Do an almighty painting with us.
                      </p>

                      <p>
                      Let's put some highlights on these little trees. The sun wouldn't forget them. It's a very cold picture, I may have to go get my coat. It’s about to freeze me to death. You can't make a mistake. Anything that happens you can learn to use - and make something beautiful out of it. That's why I paint - because I can create the kind of world I want - and I can make this world as happy as I want it. See. We take the corner of the brush and let it play back-and-forth. You create the dream - then you bring it into your world.
                      </p>

                      <p>
                      It just happens - whether or not you worried about it or tried to plan it. Only God can make a tree - but you can paint one. All you need to paint is a few tools, a little instruction, and a vision in your mind. Tree trunks grow however makes them happy. I guess I'm a little weird. I like to talk to trees and animals. That's okay though; I have more fun than most people. You don't have to spend all your time thinking about what you're doing, you just let it happen.
                      </p>

                      <p>
                      You can do it. Maybe he has a little friend that lives right over here. Trees cover up a multitude of sins.
                      </p>

                      <p>
                      The shadows are just like the highlights, but we're going in the opposite direction. Fluff that up. Maybe there's a happy little bush that lives right there.
                      </p>

                      <p>
                      Let's get crazy. With practice comes confidence. Only eight colors that you need. We must be quiet, soft and gentle.
                      </p>
                    </div>

                    <div class="col-xs-1"></div>
                  </div>

                  <div class="text-center">
                    <label><input type="checkbox" value="agree" required>&nbsp;I have read and agree to the Terms &amp; Conditions.</label><br><br>
                     <label><input type="checkbox" value="agree" required>&nbsp;FRANCIS</label><br><br>
                    <input type="submit" class="btn btn-primary" name="submitRegistrationButton" value="Submit Registration"><br>
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
