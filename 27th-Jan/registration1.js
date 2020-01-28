function checkValueOfCheckbox(){
  var otherInformationFlag = document.getElementById("otherInformationFlag").checked;
  
  if(otherInformationFlag) {
  document.getElementById("otherInformation").hidden = false;
    
  } else {
   document.getElementById("otherInformation").hidden = true;
  }
}

checkValueOfCheckbox();