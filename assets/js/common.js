jQuery(document).ready(function ($) {
  // checl url
  var currentUrl = window.location.href;
  // onscroll
  // var defaultLogo =
  //   "http://localhost/aleving/wp-content/themes/aliving/assets/image/Logo1.png";
  // var scrolledLogo =
  //   "http://localhost/aleving/wp-content/themes/aliving/assets/image/logo4.png";

  var defaultLogo =
    "https://growtestsite.com/aliving/wp-content/themes/aliving/assets/image/Logo1.png";
  var scrolledLogo =
    "https://growtestsite.com/aliving/wp-content/themes/aliving/assets/image/logo4.png";
  var currentUrl = window.location.pathname;

  if (currentUrl.includes("/editorial/")) {
    if ($("div").hasClass("product-recom")) {
      $('li:contains("Product Recommendation")').addClass("activenav");
    } else {
      // $('li:contains("Editorial")').addClass("activenav");
    }
  } else {
    // Regular menu activation for other pages
    var menuItems = [
      { url: "/home/", selector: 'li:contains("Home")' },
      { url: "/editorial/", selector: 'li:contains("Editorial")' },
      { url: "/decor/", selector: 'li:contains("Decor")' },
      { url: "/house-keeping/", selector: 'li:contains("House Keeping")' },
      {
        url: "/home-improvement/",
        selector: 'li:contains("Home improvement")',
      },
      { url: "/gardening/", selector: 'li:contains("Gardening")' },
      { url: "/what-to-buy/", selector: 'li:contains("What to Buy")' },
      {
        url: "/product-recommendation/",
        selector: 'li:contains("Product Recommendation")',
      },
      { url: "/gifts/", selector: 'li:contains("Gifts")' },
    ];

    // Iterate through the menu items and add the 'activenav' class to the matching item
    menuItems.forEach(function (item) {
      if (currentUrl.includes(item.url)) {
        $(item.selector).addClass("activenav");
        console.log(item.url);
      }
    });
  }
  //editorial
  if ($("div").hasClass("editorial")) {
    $(".navmenuheader .activenav").css("border-bottom", "1px solid white");
    $(".sub-menu li a").css("color", "black");
    $(".navmenuheader li a").css("color", "white");
    $("#hamburgermenu span").css("color", "white");
    $("#hamburgermenu").css("color", "white");
  } else {
    $(".navmenuheader li a").css("color", "black");
    $("#site-logo").attr("src", defaultLogo);
    $("#hamburgermenu span").css("color", "black");
    $("#hamburgermenu").css("color", "black");
  }
  if (window.location.href.includes("/editorial/")) {
    $(window).on("scroll", function () {
      var scrollTop = $(this).scrollTop();

      if ($("div").hasClass("editorial")) {
        if (scrollTop > 0) {
          $("#site-logo").attr("src", defaultLogo);
          $(".navmenuheader li a").css("color", "black");
          $(".sub-menu li a").css("color", "black");
          $(".navmenuheader .activenav").css(
            "border-bottom",
            "1px solid black"
          );
          $("#hamburgermenu span").css("color", "black");
          $("#hamburgermenu").css("color", "black");
        } else {
          $("#site-logo").attr("src", scrolledLogo);
          $(".navmenuheader li a").css("color", "white");
          $(".sub-menu li a").css("color", "black");
          $(".navmenuheader .activenav").css(
            "border-bottom",
            "1px solid white"
          );
          $("#hamburgermenu span").css("color", "white");
          $("#hamburgermenu").css("color", "white");
        }
      } else {
        $(".sub-menu li a").css("color", "black");
        $(".navmenuheader .activenav").css("border-bottom", "1px solid black");
      }
    });
  }
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
    arrows: true,
    prevArrow: $("#arrow-left"),
    nextArrow: $("#arrow-right"),
    autoplay: false,
    autoplaySpeed: 0,
    infinite: true,
    speed: 1200,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          arrows: true,
          prevArrow: $("#arrow-left"),
          nextArrow: $("#arrow-right"),
          infinite: true,
          centerMode: true,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 1250,
        settings: {
          arrows: true,
          prevArrow: $("#arrow-left"),
          nextArrow: $("#arrow-right"),
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
        },
      },
    ],
  });
  // Log the breakpoint check
  jQuery(window).resize(function () {});
  jQuery(".original_collections li:odd").each(function () {
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
    $(".pannelcontent").removeClass("show-content");

    $(panel).addClass("active");

    setTimeout(function () {
      let $activePanelContent = $(panel).find(".pannelcontent");
      if ($(panel).width() >= 80) {
        $activePanelContent.addClass("show-content");
      }
    }, 100);
  }

  $(".panels").on("click", function () {
    activatePanel(this);

    if (!$(".panels.active").length) {
      activatePanel("#pannel1");
    }
  });

  if (window.location.href.includes("/house-keeping/")) {
    activatePanel("#pannel2");
  } else if (window.location.href.includes("/home-improvement/")) {
    activatePanel("#pannel3");
  } else if (window.location.href.includes("/gardening/")) {
    activatePanel("#pannel4");
  } else if (window.location.href.includes("/what-to-buy/")) {
    activatePanel("#pannel5");
  } else {
    activatePanel("#pannel1");
  }

  // Tab links functionality
  $(".tablinks button").click(function () {
    $(".tabcontents > div").removeClass("active");
    $(".tablinks button").removeClass("tabactive");
    if ($(this).hasClass("thelist")) {
      $(this).addClass("tabactive");
      $(".the_list_content").addClass("active");
    } else if ($(this).hasClass("listdeals")) {
      $(this).addClass("tabactive");
      $(".listandguidecontent").addClass("active");
    } else if ($(this).hasClass("giftguides")) {
      $(this).addClass("tabactive");
      $(".giftsguidecontent").addClass("active");
    }
  });

  $(".tablinks button:first").trigger("click");

  // nav menu
  $(".collection-header").removeClass("activenav");
  var scrollTopremove = $(window).scrollTop();

  $(window).on("scroll", function () {
    var scrollTopremove = $(window).scrollTop();

    if (scrollTopremove > 0) {
      $(".collection-header").removeClass("activenav");
    }
  });
  $("#collectionnav").on("click", function (e) {
    e.preventDefault();

    $(".collection-header").toggleClass("activenav");
  });

  // Social Trending Section - hide controls when video is paused and show when video is played
  $(".socialtrending a").on("click", function (e) {
    e.preventDefault();
  });

  var $video = $(this).find(".social_trending video");
  var $video_overlay = $(this).find(".play-btn-wrapper");

  $video.removeAttr("controls");

  $video.on("click", function () {
    if (this.paused) {
      this.play();
    } else {
      this.pause();
    }
  });

  $video_overlay.on("click", function () {
    $(this).addClass("play-hide"); // Hide the play button overlay
  });

  $video.on("play", function () {
    $(this).attr("controls", "controls");
  });
  $video.on("pause", function () {
    $(this).removeAttr("controls");
  });

  // jQuery(".sampleslide").slick({
  //   dots: false,
  //   arrows: false,
  //   autoplay: false,
  //   autoplaySpeed: 0,
  //   infinite: true,
  //   speed: 1200,
  //   slidesToShow: 2,
  //   slidesToScroll: 2,
  //   centerMode: true,
  // });
  //
  function checkWindowWidth() {}

  checkWindowWidth();
  $(window).resize(function () {
    checkWindowWidth();
  });

  jQuery(".socialslider").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 0,
    infinite: true,
    speed: 1200,
    slidesToShow: 4,
    centerMode: true,
    responsive: [
      {
        breakpoint: 1292,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 468,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
        },
      },
    ],
  });
  jQuery(".prodslider").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 0,
    infinite: true,
    speed: 1200,
    slidesToShow: 5,
    centerMode: true,
    responsive: [
      {
        breakpoint: 1056,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 768,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 468,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
        },
      },
    ],
  });
  jQuery(".sliderback").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 0,
    infinite: true,
    speed: 1200,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
      {
        breakpoint: 468,
        settings: {
          dots: false,
          arrows: false,
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
        },
      },
    ],
  });
});
