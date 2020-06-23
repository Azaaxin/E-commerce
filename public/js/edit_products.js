$(".overlay").hide();
var tempScrollTop = $(window).scrollTop();
$('.editable').each(function(){
    this.contentEditable = true;
});
var changed = false;
$('body').click(function (e) {
    if ($(e.target).is($(".overlay"))) {
     $("#Ctextarea_hidden").val($(".CDdesc").html());
      if($('#wcreate').is(':visible')){
        if($('.CDtitle').val() != "" || $('.CDimage').val() != "" || $('.CDprice').val() != ""|| $('#Ctextarea_hidden').val() != ""){
          submit_create();
          $.toast({
            text: "Skapade produkt!",
            heading: 'Produkten är nu skapad!',
            icon: 'success',
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: 2000,
            stack: false,
            position: 'top-center',
            textAlign: 'left',
            loader: true,
            loaderBg: '#9EC600',
            beforeShow: function () {},
            afterShown: function () {},
            beforeHide: function () {},
            afterHidden: function () {}
        });
        $(".feed").empty();
        admin_read();
        }
      }
      if($('#wedit').is(':visible') && changed == true){
        $.toast({
          text: "Lyckad uppdatering!",
          heading: 'Produkten är uppdaterad', 
          icon: 'success',
          showHideTransition: 'fade',
          allowToastClose: true,
          hideAfter: 2000,
          stack: false,
          position: 'top-center',
          textAlign: 'left',
          loader: true,
          loaderBg: '#9EC600',
          beforeShow: function () {},
          afterShown: function () {},
          beforeHide: function () {},
          afterHidden: function () {}
      });
      changed = false;
      $(".feed").empty();
      admin_read();
      }
        $(".overlay").hide();
        $(window).scrollTop(tempScrollTop);
        $("#wcreate").css("display","none");
        $("#wedit").css("display","none");
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
    $("#wedit").css("display","block");
    $("#wdelete").css("display","none");
    $(".overlay").show();
  });
  $(document).on('click', '.add_button', function(){
    $("#wcreate").css("display","block");
    $(".overlay").show();
  });

  function submit_edit(){
    $("#textarea_hidden").val($(".EDdesc").html());
    $("#editForm").ajaxSubmit({url: '../functions.php?edit=true', type: 'post'})
  }
  function submit_create(){
    $("#Ctextarea_hidden").val($(".CDdesc").html());
    $("#createForm").ajaxSubmit({url: '../functions.php?create=true', type: 'post'})
   // $(".feed").empty();
  }

$('.EDimage, .EDtitle, .EDprice, .EDdesc').on("input change keyup", delay(function (e){
  if($('#wedit').is(':visible')){
    submit_edit();
    changed = true;
  }
}, 500));
$(".editable").focusout(function(){
  var element = $(this);        
  if (!element.text().replace(" ", "").length) {
      element.empty();
  }
});
$(document).on('click', '.delete_button', function(){
  $(".overlay").show();
  $("#wdelete").css("display","flex");
  let inputId = $(this).attr('id');
  $(".confirmed_del").click(function(){
    $.ajax({
      type: "POST",
      url: "../functions.php?delete=true",
      data: {id: inputId},
    });
    $(".feed").empty();
    admin_read();
    $("#wdelete").css("display","none");
    $(".overlay").hide();
    $.toast({
      text: "Borttagen produkt",
      heading: 'Produkten har tagits bort.',
      icon: 'success',
      showHideTransition: 'fade',
      allowToastClose: true,
      hideAfter: 3000,
      stack: 5,
      position: 'top-center',
      textAlign: 'left',
      loader: true, 
      loaderBg: '#9EC600',
      beforeShow: function () {},
      afterShown: function () {},
      beforeHide: function () {}, 
      afterHidden: function () {} 
  });
  });
});
