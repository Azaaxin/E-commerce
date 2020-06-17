//Written By Ludvig Olausson
function showCoords(event) {
    var y = event.clientY;
  }

  $(document).ready(function(){
    // Onload position of arrow
    let firstBrand = $(".arrowable").first();
    let info = $pin("#" + firstBrand[0].id).divInfo("height") / 2;
    let arrowcenter = $pin("#arrow_y").divInfo("height") / 2;
    let testDiv = document.querySelector("#" + firstBrand[0].id);
    let position = info + testDiv.offsetTop - arrowcenter;
    document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";


    $(".arrowable").hover(function(){ // real function that reacts on mouse placement
        let info = $pin("#" + this.id).divInfo("height") / 2; // My own library
        let arrowcenter = $pin("#arrow_y").divInfo("height") / 2; // My own library
        let testDiv = document.querySelector("#" + this.id);
        let position = info + testDiv.offsetTop - arrowcenter;
        document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });

  });