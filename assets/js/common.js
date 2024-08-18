jQuery(document).ready(function ($) {
  // checl url
  var currentUrl = window.location.href;
  // onscroll
  var defaultLogo =
    "http://localhost/aliving/wp-content/themes/aliving/assets/image/Logo1.png";
  var scrolledLogo =
    "http://localhost/aliving/wp-content/themes/aliving/assets/image/logo4.png";
  var menuItems = [
    { url: "/home/", selector: 'li:contains("Home")' },
    { url: "/editorial/", selector: 'li:contains("Editorial")' },
    { url: "/decor/", selector: 'li:contains("Decor")' },
    { url: "/house-keeping/", selector: 'li:contains("House Keeping")' },
    { url: "/home-improvement/", selector: 'li:contains("Home improvement")' },
    { url: "/gardening/", selector: 'li:contains("Gardening")' },
    { url: "/what-to-buy/", selector: 'li:contains("What to Buy")' },
    { url: "/products/", selector: 'li:contains("Products")' },
    { url: "/gifts/", selector: 'li:contains("Gifts")' },
  ];

  menuItems.forEach(function (item) {
    if (currentUrl.includes(item.url)) {
      $(item.selector).addClass("activenav");
      console.log(item.url);
    }
  });
  //editorial
  if (window.location.href.includes("/editorial/")) {
    $(".navmenuheader li a").css("color", "white");
    $(".navmenuheader .activenav").css("border-bottom", "1px solid white");
    $(".sub-menu li a").css("color", "black");
    $(window).on("scroll", function () {
      var scrollTop = $(this).scrollTop();

      if (scrollTop > 0) {
        $("#site-logo").attr("src", defaultLogo);
        $(".navmenuheader li a").css("color", "black");
        $(".sub-menu li a").css("color", "black");
        $(".navmenuheader .activenav").css("border-bottom", "1px solid black");
      } else {
        $("#site-logo").attr("src", scrolledLogo);
        $(".navmenuheader li a").css("color", "white");
        $(".sub-menu li a").css("color", "black");
        $(".navmenuheader .activenav").css("border-bottom", "1px solid white");
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
    $(".pannelcontent").removeClass("show-content");

    $(panel).addClass("active");

    setTimeout(function () {
      let $activePanelContent = $(panel).find(".pannelcontent");
      if ($(panel).width() >= 80) {
        $activePanelContent.addClass("show-content");
      }
    }, 1600);
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

  $(".socialtrending a").on("click", function (e) {
    e.preventDefault();
  });
});
