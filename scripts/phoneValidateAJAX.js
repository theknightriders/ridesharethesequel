var xmlHttp = new XMLHttpRequest();


function checkPhoneInput() {
  if(xmlHttp.readyState==0 || xmlHttp.readyState==4) {
    phoneInputValue = encodeURIComponent(document.getElementById("profilePhone").value);
    xmlHttp.open("GET", "profilePhoneValidate.php?phoneInput=" + phoneInputValue, true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
  } else {
    setTimeout('checkPhoneInput()', 500);
  }
}


function handleServerResponse() {
  if(xmlHttp.readyState==4) {
    if(xmlHttp.status==200) {
      xmlResponse = xmlHttp.responseXML;
      xmlDocumentElement = xmlResponse.documentElement;
      message = xmlDocumentElement.firstChild.data;

      if(message=="Phone Number must be a 10 digit integer!") {
        document.getElementById("phoneValidationOutput").innerHTML = '<span class="error">' + message + '</span><br /><input type="submit" class="btn btn-primary showHideProfileButton" id="submitProfileButton" name="submitProfileButton" value="Submit Changes" disabled />';
      } else {
        document.getElementById("phoneValidationOutput").innerHTML = '<br /><input type="submit" class="btn btn-primary showHideProfileButton" id="submitProfileButton" name="submitProfileButton" value="Submit Changes" />';
      }
      setTimeout('checkPhoneInput()', 500);
    } else {
      alert("AJAX Error:" + xmlHttp.status);
    }
  }
}
