function front_page_ajax(){
    let baseUrl = 'http://localhost/E-commerce/public/functions.php';
    $.get(baseUrl + '?data=' + "main_prod", function(response) {

                let req = response;
              //  $.each(req, function(index) {
                    for(let index=0; index<12; index++){
                    var t = $("<div class=Item>" +
                    "<div class='cont' onclick='window.location.href=\'product-page.php\''>" +
                    "<div class='img_c'><img src='" + req[index].img_url + "' width='30%'></div>" +
                    "<div class='brand_n'>Brand</div>" +
                    "<div class='title'>"+ req[index].title +"</div>" +
                    "<div class='prize'>"+ req[index].price +"kr</div></div></div>");
                    $("._procontainer").append(t);
                  };
            },
            'json'
        ).fail(function() {
            
        });
}
function reco_front_page_ajax(){
  let baseUrl = 'http://localhost/E-commerce/public/functions.php';
  $.get(baseUrl + '?data=' + "rec_prod", function(response) {

              let req = response;
            //  $.each(req, function(index) {
                  for(let index=0; index<9; index++){

                    var t= $("<div class='Item rec_item"+index+"'>" +
                      "<div class='cont' onclick='window.location.href=product-page.php'>" +
                      "<div class='img_c'><img src='"+req[index].img_url+"' width='30%'></div>" +
                      "<div class='brand_n'>Brand</div>" +
                      "<div class='title'>"+req[index].title+"</div>" +
                      "<div class='prize'>"+req[index].price+"kr</div>" +
                      "</div>" +
                      "</div>';");
                      $(".reco_container").append(t);
                    
                  }
          },
          'json'
      ).fail(function() {
          
      });
}