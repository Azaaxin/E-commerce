$(".overlay").hide();


$('.editable').each(function(){
    this.contentEditable = true;
});

// window.addEventListener('click', function(e){   
//     if (document.getElementById('wedit').contains(e.target) || document.getElementsByClassName('edit_button').contains(e.target)){
        
//     } else{
//         $(".overlay").hide();
//     }
// });

$('body').click(function (e) {
    if ($(e.target).is($(".overlay"))) {
        $(".overlay").hide();
    } else {
        
    }
});

$("#src").on("input change keyup", delay(function (e){
    $(".feed").empty();
    let input = $(this).val();
    admin_search(input);
}, 300));

function delay(callback, ms) {
	var timer = 0;
	return function() {
	  var context = this, args = arguments;
	  clearTimeout(timer);
	  timer = setTimeout(function () {
		callback.apply(context, args);
	  }, ms || 0);
	};
  }
  $(document).on('click', '.edit_button', function(){
    edit_item_read(this.id);
    $(".overlay").show();
  });

  function submit(){
    $(".feed").empty();
    $("#textarea_hidden").val($(".EDdesc").html());
    $("#editForm").ajaxSubmit({url: '../functions.php?edit=true', type: 'post'})
    admin_read();
  }

$('.EDimage, .EDtitle, .EDprice, .EDdesc').on("input change keyup", delay(function (e){
    submit();
}, 500));
