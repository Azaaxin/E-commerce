//Written By Ludvig Olausson
function showCoords(event) {
    var y = event.clientY;
    
  }

  $(document).ready(function(){
    $("#brand1").hover(function(){
      var testDiv = document.getElementById("brand1");
      var position = 33 + testDiv.offsetTop;
      document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });
    $("#brand2").hover(function(){
      var testDiv = document.getElementById("brand2");
      var position = 33 + testDiv.offsetTop;
      document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });
 
    $("#brand3").hover(function(){
      var testDiv = document.getElementById("brand3");
      var position = 35 + testDiv.offsetTop;
      document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });

    $("#brand4").hover(function(){
      var testDiv = document.getElementById("brand4");
      var position = 35 + testDiv.offsetTop;
      document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });

    $("#brand5").hover(function(){
      var testDiv = document.getElementById("brand5");
      var position = 35 + testDiv.offsetTop;
      document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });
  });