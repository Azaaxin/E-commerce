//Written By Ludvig Olausson
function showCoords(event) {
    var y = event.clientY;
    
  }

  $(document).ready(function(){
    console.log($(".arrowable:first"));
    let firstBrand = $(".arrowable").first();
    let info = $pin("#" + firstBrand[0].id).divInfo("height") / 2;
    let arrowcenter = $pin("#arrow_y").divInfo("height") / 2;
    let testDiv = document.querySelector("#" + firstBrand[0].id);
    let position = info + testDiv.offsetTop - arrowcenter;
    document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";


    $(".arrowable").hover(function(){ // real function
        let info = $pin("#" + this.id).divInfo("height") / 2;
        let arrowcenter = $pin("#arrow_y").divInfo("height") / 2;
        let testDiv = document.querySelector("#" + this.id);
        let position = info + testDiv.offsetTop - arrowcenter;
        document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    });

 
    // $("#brand2").hover(function(){
    //   var testDiv = document.getElementById("brand2");
    //   var position = 33 + testDiv.offsetTop;
    //   document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    // });
 
    // $("#brand3").hover(function(){
    //   var testDiv = document.getElementById("brand3");
    //   var position = 35 + testDiv.offsetTop;
    //   document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    // });

    // $("#brand4").hover(function(){
    //   var testDiv = document.getElementById("brand4");
    //   var position = 35 + testDiv.offsetTop;
    //   document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    // });

    // $("#brand5").hover(function(){
    //   var testDiv = document.getElementById("brand5");
    //   var position = 35 + testDiv.offsetTop;
    //   document.getElementById("arrow_y").style.transform = "translateY("+position+"px)";
    // });
  });