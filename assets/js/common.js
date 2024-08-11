jQuery(document).ready(function ($) {
  $(window).on("scroll", function () {
    var scrollTop = $(window).scrollTop();
    var maxScroll = 300;

    var opacity = Math.min(scrollTop / maxScroll, 1);
    var homelogopacity = Math.max(1 - scrollTop / maxScroll, 0);
    $(".logocontainer img").css("opacity", opacity);
    $(".logooverlay ").css("opacity", homelogopacity);
    if (scrollTop > 0) {
      $(".sticky-header").css("background-color", "white");
    } else {
      $(".sticky-header").css("background-color", "transparent");
    }
  });
  jQuery(".responsive").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 0,
    infinite: true,
    speed: 3000,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          arrows: false,
          centerMode: true,
          centerPadding: "50px",
        },
      },
      {
        breakpoint: 622,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: false,
          centerPadding: "20px",
        },
      },
    ],
  });

  jQuery(".original_collections li:even").each(function () {
    const $this = $(this);
    const $cat = $this.find(".category");
    const $img = $this.find(".image_list");
    const $title = $this.find(".original_title");

    $this.empty();

    $this.append($cat, $title, $img);
    $cat.css("color", "#f4d77e");
  });

  function activatePanel(panel) {
    $(".panels").removeClass("active");
    $(".pannelcontent").removeClass("active");
    $(panel).addClass("active");
    $(panel).find(".pannelcontent").addClass("active");
  }

  // Handle hover events
  function activatePanel(panel) {
    $(".panels").removeClass("active");
    $(".pannelcontent").removeClass("show-content");

    $(panel).addClass("active");

    setTimeout(function () {
      let $activePanelContent = $(panel).find(".pannelcontent");
      if ($(panel).width() >= 80) {
        $activePanelContent.addClass("show-content");
      }
    }, 1600);
  }

  $(".panels").hover(
    function () {
      activatePanel(this);
    },
    function () {
      if (!$(".panels").hasClass("active")) {
        activatePanel("#pannel1");
      }
    }
  );
  l;
  activatePanel("#pannel1");
});
