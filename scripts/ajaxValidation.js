// Make an object to work with
var xHttp = new XMLHttpRequest();

// Function to do the things
function validatePhoneAndPass() {
  // If it's ready..
  if(xHttp.readyState==0 || xHttp.readyState==4) {
    // Define some variables and pull values from forms to give them life
    oldPwordInputValue = encodeURIComponent(document.getElementById("changePasswordOld").value);
    newPwordInputValue = encodeURIComponent(document.getElementById("changePasswordNew").value);
    newPwordInputValueCheck = encodeURIComponent(document.getElementById("changePasswordNew02").value);
    phoneInputValue = encodeURIComponent(document.getElementById("profilePhone").value);
    fnameInputValue = encodeURIComponent(document.getElementById("profileFname").value);
    lnameInputValue = encodeURIComponent(document.getElementById("profileLname").value);
    deptInputValue = encodeURIComponent(document.getElementById("profileDept").value);

    // Put the variables into a parameter string
    params = "oldPwordInputValue=" + oldPwordInputValue + "&newPwordInputValue=" + newPwordInputValue + "&newPwordInputValueCheck=" + newPwordInputValueCheck + "&phoneInputValue=" + phoneInputValue + "&fnameInputValue=" + fnameInputValue + "&lnameInputValue=" + lnameInputValue + "&deptInputValue=" + deptInputValue;

    // POST the parameter string to the place where it needs to go
    xHttp.open("POST", "ajaxValidation.php", true);
    // Housekeeping
    xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // When the server responds
    xHttp.onreadystatechange = handleServerResponse;
    // Go ahead and send the parameter string
    xHttp.send(params);

  // And if it's not ready..
  } else {
    // Run this function again in in 0.5 seconds
    setTimeout('validatePhoneAndPass()', 1000);
  }
}


// Define the function to handle the server's response
function handleServerResponse() {
  // If it's ready..
  if(xHttp.readyState==4) {
    // And if it's sending a response we can work with..
    if(xHttp.status==200) {
      // Manipulate the response into something we can use
      xmlResponse = xHttp.responseXML;
      xmlDocumentElement = xmlResponse.documentElement;
      // Here we go: 'message' is something we can use
      message = xmlDocumentElement.firstChild.data;

      // Check the message we extracted from the server response
      // It's going to be whatever we put between the response tags in the php file
      // Depending on what the message is, do some things

      if(message.includes("password message")) {
        message = message.replace("password message", "");
        if(message=="NoMatch") {
          document.getElementById("pwordChecker").value = "itsNotGood";
          document.getElementById("pwordUpdateOutput").innerHTML = '<span class="error">Password doesn\'t match Password Confirmation.</span>';
        document.getElementById("submitPwordButton").disabled = true;
        }
        if(message=="Nope") {
          document.getElementById("pwordChecker").value = "itsNotGood";
          document.getElementById("pwordUpdateOutput").innerHTML = '<span class="error">Your Old Password is incorrect.</span>';
        document.getElementById("submitPwordButton").disabled = true;
        }
        if(message=="Empty") {
          document.getElementById("pwordChecker").value = "itsNotGood";
          document.getElementById("pwordUpdateOutput").innerHTML = '<span class="error">Please enter a New Password.</span>';
        document.getElementById("submitPwordButton").disabled = true;
        }
        if(message=="Yep") {
          document.getElementById("pwordChecker").value = "itsGood";
        document.getElementById("pwordUpdateOutput").innerHTML = '';
        document.getElementById("submitPwordButton").disabled = false;
        }
      }

      if(message=="Phone Number must be a 10 digit integer!") {
        document.getElementById("pwordChecker").value = "itsNotGood";
        document.getElementById("phoneValidationOutput").innerHTML = '<span class="error">' + message + '</span>';
        document.getElementById("submitProfileButton").disabled = true;
      }

      if(message=="Phone Number is good" || message=="Something Changed") {
        document.getElementById("pwordChecker").value = "itsNotGood";
        document.getElementById("phoneValidationOutput").innerHTML = '';
        document.getElementById("submitProfileButton").disabled = false;
      }

      if(message=="All Empty") {
        document.getElementById("pwordChecker").value = "itsNotGood";
        document.getElementById("phoneValidationOutput").innerHTML = '';
        document.getElementById("submitProfileButton").disabled = true;
        document.getElementById("pwordUpdateOutput").innerHTML = '';
        document.getElementById("submitPwordButton").disabled = true;
      }

      // Run that original function again after 0.5 seconds
      setTimeout('validatePhoneAndPass()', 1000);

    // If it's sending a response we can't use
    } else {
      // Alert the user and tell them what the error number is
      // (The only time this seems to happen, the updates still go through - so I'm commenting it out for now.)
      //alert("Server Error: #" + xHttp.status);
    }
  }
}
