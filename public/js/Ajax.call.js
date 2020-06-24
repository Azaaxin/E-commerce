function htmlspecialchars(str) {
  str = str.replace(/(?:\r\n|\r|\n)/g, '<br>');
  return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
}
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
                    var t= $("<div class='Item maxEight rec_item"+index+"'>" +
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
                  $("._procontainer").append(t).show('slow');
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
function admin_read(){
  let baseUrl = '../functions.php';
  $.get(baseUrl + '?data=' + "main_prod", function(response) {

              let req = response;
              $(".feed").empty();
              $.each(req, function(index) {
                var t = $("<div class='item'>"+
                "<div class='id'>"+ req[index].id+"</div>" +
                "<div class='img'><img src='"+req[index].img_url+"' alt='' width='35px' srcset=''></div>" +
                "<div class='title'>"+req[index].title+"</div>" +
                "<div class='desc'>"+req[index].description+"</div>" +
                "<div class='price'>"+req[index].price+"</div>" +
                "<div id='"+ req[index].id+"' class='edit_button unified_button'>Edit</div>" +
                "<div id= '"+ req[index].id+"' class='delete_button unified_button'>Delete</div>" +
                "</div>");
                $(".feed").append(t).show('slow');
              });
              
          },
          'json'
      ).fail(function() {
          
      });
}
function admin_search(searchterm){
  let baseUrl = '../functions.php';
  $.get(baseUrl + '?data=' + "search" + "&search=" + searchterm, function(response) {

              let req = response;
              $.each(req, function(index) {
                var t = $("<div class='item'>"+
                "<div class='id'>"+ req[index].id+"</div>" +
                "<div class='img'><img src='"+req[index].img_url+"' alt='' width='35px' srcset=''></div>" +
                "<div class='title'>"+req[index].title+"</div>" +
                "<div class='desc'>"+req[index].description+"</div>" +
                "<div class='price'>"+req[index].price+"</div>" +
                "<div id='"+ req[index].id+"' class='edit_button unified_button'>Edit</div>" +
                "<div id= '"+ req[index].id+"' class='delete_button unified_button'>Delete</div>" +
                "</div>");
                $(".feed").append(t).show('slow');
              });
              
          },
          'json'
      ).fail(function() {
        $(".feed").append("Kan inte hitta produkterna du sökte efter.").show('slow');
      });
}
function edit_item_read(filter){
  let baseUrl = '../functions.php';
  $.get(baseUrl + '?data=' + "prod" + "&id=" + filter, function(response) {
              let req = response[0];
                   $(".EDimage").val(req.img_url);
                   $(".EDtitle").val(req.title);
                   $(".EDdesc").empty();
                   $(".EDdesc").append(req.description);
                   $(".EDprice").val(req.price);
                   $("#id").val(req.id);
          },
          'json'
      ).fail(function() {
          
      });
}
function shopping_cart(filter){
  let baseUrl = 'functions.php';
  if(filter==undefined)
    filter="";
  $.get(baseUrl + '?cart=' + "true" + "&id=" + filter, function(response) {
              let req = response;
              $(".product_list").css("display","block");
              $(".product_list").empty();
              console.log(req);
              $.each(req, function(index) {
                if(index == 0){
                  $item = this[0];
                }else{
                  $item = req[index];
                }
                
                  $(".product_list").append("<div class='product_flex'>"+
                  "<div class='product_img_cart'><img src='"+ $item.img_url +"' width='32px' alt='product_image'></div>" +
                  "<div class='product_title'>" + $item.title + "</div>" +
                  "<div class='product_price'>" + $item.price + "kr</div>" +
                  "</div>");
                
              });
          },
          'json'
      ).fail(function() {
        $(".product_list").empty();
        $(".product_list").append("<div class='error'>Ooops något blev fel</div>");
      });
}

