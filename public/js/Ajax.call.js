function front_page_ajax(){
    let baseUrl = 'http://localhost/E-commerce/public/functions.php';
    $.get(baseUrl + '?data=' + "main_prod", function(response) {

                let req = response;
              //  $.each(req, function(index) {
                    for(let index=0; index<9; index++){
                    console.log(index);
                    var t = $("<div class=Item>" +
                    "<div class='cont' onclick='window.location.href=\'product-page.php\''>" +
                    "<div class='img_c'><img src='" + req[index].img_url + "' width='20%'></div>" +
                    "<div class='brand_n'>Brand</div>" +
                    "<div class='title'>"+ req[index].title +"</div>" +
                    "<div class='prize'>"+ req[index].price +"kr</div></div></div>");
                    $("._procontainer").append(t);
                  };
                
            },
            'json'
        ).fail(function() {
                console.log('Try removing the spaces and special characters.'); // or whatever
            
        });
}