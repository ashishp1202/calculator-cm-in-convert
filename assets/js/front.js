function calc() {
    width = screen['width'];
    height = screen['height'];
    if (document.getElementById("sel").value == "" || document.getElementById("type_set").value =='text') {
      var numberOfHeadersToCount = document.getElementById("displayValue").value.replace(",", ".");
    } else {
      var numberOfHeadersToCount = document.getElementById("sel").value.replace(",", ".");
    }
    if(numberOfHeadersToCount === ""){
      numberOfHeadersToCount = Math.sqrt(width * width + height * height)/96;
    }
    var averageDistanceBetweenHeaders = Math.sqrt(width * width + height * height) / numberOfHeadersToCount;
    document.getElementById("result").value = averageDistanceBetweenHeaders;
    var map = document.getElementsByClassName("righello");
    var count = document.getElementById("result").value;
    var x = count * 19.685;
    var size = count * 20;
    if (document.getElementById("in").checked) {
     document.getElementsByClassName("righello")[0].style.background= "url("+plugin_local_data.image_url+"/assets/images/20inch_v.png) no-repeat";
     document.getElementsByClassName("righello")[0].style.backgroundSize = size + "px" + " 3cm";
    } else {
      if (document.getElementById("cm").checked) {
       document.getElementsByClassName("righello")[0].style.background = "url("+plugin_local_data.image_url+"/assets/images/cm_a.png) no-repeat";
       document.getElementsByClassName("righello")[0].style.backgroundSize = x + "px" + " 3cm";
      }
    }
    al = document.getElementById("al");
    if ((document.getElementById("type_set").value =='text' && document.getElementById("displayValue").value == "") || (document.getElementById("sel").value == "" && document.getElementById("type_set").value =='sel') && al.className == "empty") {
      al.style.opacity = "0.85";
    }else{
     al.style.opacity = "0";
    }
   //  document["getElementById"]("w")["setAttribute"](parseInt(237), parseInt(237));
   //  if (document[parseInt(250)]("displayValue")[parseInt(232)] == "") {
   //    document[parseInt(250)](parseInt(242))[parseInt(278)]();
   //  }
   }