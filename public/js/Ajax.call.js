function front_page_ajax(){
    let baseUrl = '../public/functions.php';
    $.get(baseUrl + '?data=' + "main_prod", function(response) {

                let req = response;
              //  $.each(req, function(index) {
                    for(let index=0; index<12; index++){
                    var t = $("<div class=Item>" +
                    "<div id='"+ req[index].id +"' class='cont'>" +
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
  let baseUrl = '../public/functions.php';
  $.get(baseUrl + '?data=' + "rec_prod", function(response) {

              let req = response;
            //  $.each(req, function(index) {
                  for(let index=0; index<9; index++){
                    var t= $("<div class='Item rec_item"+index+"'>" +
                      "<div id='"+ req[index].id +"' class='cont'>" +
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
function brandsAjaxProducts(filter){
  //$( "._procontainer .Item" ).hide();
  let baseUrl = '../public/functions.php';
  $.get(baseUrl + '?data=' + "front_brand" + "&filter=" + filter, function(response) {

              let req = response;
            //  $.each(req, function(index) {
                  for(let index=0; index<12; index++){
                    let produrl = "location.href='product-page.php?id='";
                  var t = $("<div class=Item>" +
                  "<div id='"+ req[index].id +"' class='cont'>" +
                  "<div class='img_c'><img src='" + req[index].img_url + "' width='30%'></div>" +
                  "<div class='brand_n'>Brand</div>" +
                  "<div class='title'>"+ req[index].title +"</div>" +
                  "<div class='prize'>"+ req[index].price +"kr</div></div></div>");
                  $("._procontainer").append(t).show('slow');;
                };
          },
          'json'
      ).fail(function() {
          
      });
}
function productPage(filter){
  //$( "._procontainer .Item" ).hide();
  let baseUrl = '../public/functions.php';
  $.get(baseUrl + '?data=' + "prod" + "&id=" + filter, function(response) {

              let req = response[0];
            //  $.each(req, function(index) {
                   $(".image").append("<img src='"+ req.img_url +"' alt='' srcset=''>");
                   $(".title").append(req.title);
                   $(".desc").append(req.description);
                   $(".price").append(req.price+"kr");
                   $(".buyButton").append("<button class='buyBtn'>Lägg i varukorgen</button>");
                
          },
          'json'
      ).fail(function() {
          
      });
}


