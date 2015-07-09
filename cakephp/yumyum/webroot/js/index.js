$('head').append(
  '<style type="text/css">#container { display: none; } #fade, #loader { display: block; }</style>'
);

jQuery.event.add(window,"load",function() { // 全ての読み込み完了後に呼ばれる関数
  var pageH = $("#container").height();

  $("#fade").css("height", pageH).delay(900).fadeOut(800);
  $("#container").css("display", "block");
});

$(function(){
  $(".map_display").text('リスト表示');
  var switch_flg = false;
  $(".map_display").click(function() {
    if (switch_flg) {
      $(".shop_list--block").fadeOut('slow');
      $(".yum_map").fadeIn('slow');
      $(".pin_help").fadeIn('slow');
      $(".map_display").text('リスト表示');
      switch_flg = false;//---trueの時はfalseに
    }else{
      $(".yum_map").fadeOut('slow');
      $(".pin_help").fadeOut('slow');
      $(".shop_list--block").fadeIn('slow');
      $(".map_display").text('マップ表示');
      switch_flg = true;//---falseの時はtrueに
    }
  });
});

$(function(){
  var switch_flg = false;
  $(".open_close--bt").click(function() {
    $(this).toggleClass("open");
    $(".special_edition--ttl").slideToggle();
    $(".special_edition--block").slideToggle();
    if (switch_flg) {
      $(".open_close--bt").animate({ bottom: 159 }, 400);
      $(".pin_help").animate({ bottom: 159 }, 400);
      switch_flg = false;//---trueの時はfalseに
    }else{
      $(".open_close--bt").animate({ bottom: 0 }, 400);
      $(".pin_help").animate({ bottom: 0 }, 400);
      switch_flg = true;//---falseの時はtrueに
    }
  });
});