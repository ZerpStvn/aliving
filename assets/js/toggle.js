jQuery(document).ready(function ($) {
  $(".togglemobilewrap .pannelcontent").hide();
  $(".togglemobilewrap .pannelcontent.active").show();

  $(".tabstoggle li").click(function (e) {
    e.preventDefault();
    var index = $(this).index();
    $(".tabstoggle li").removeClass("active");
    $(".togglemobilewrap .pannelcontent").removeClass("active").hide();
    $(this).addClass("active");
    $(".togglemobilewrap .pannelcontent").eq(index).addClass("active").fadeIn();
  });
});
