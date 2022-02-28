$(document).ready(function(){

  document.cookie = "ensignhospital";

  var body_class = document.cookie;

  $('.change').click(function(){
    if(body_class){
      if(!$(this).val() || $(this).val()){
        $(this).addClass('click-change');
      }
    }


  });

  $('.change').blur(function(){
    if(body_class){
      if(!$(this).val()){
        $(this).removeClass('click-change');
      }else {
          $(this).addClass('click-change');
      }
    }


  });
});
