jQuery(document).ready(function ($) {
  $(".togglemobilewrap .pannelcontent").hide();

  $(".togglemobilewrap .pannelcontent.active").show();

  $(".tabstoggle li").click(function (e) {
    e.preventDefault();

    var index = $(this).index();

    $(".tabstoggle li").removeClass("active");

    $(this).addClass("active");

    $(".togglemobilewrap .pannelcontent")
      .removeClass("active")

      .hide()

      .eq(index)

      .addClass("active")

      .fadeIn();
  });

  function activatePanel(panelSelector) {
    $(".togglemobilewrap .pannelcontent").removeClass("active").hide();

    var $panel = $(panelSelector).addClass("active").fadeIn();

    setTimeout(function () {
      if ($panel.width() >= 80) {
        $panel.addClass("active");
      }
    }, 1600);
  }

  if (window.location.href.includes("/house-keeping/")) {
    activatePanel("#pannelwrap2");
  } else if (window.location.href.includes("/home-improvement/")) {
    activatePanel("#pannelwrap3");
  } else if (window.location.href.includes("/gardening/")) {
    activatePanel("#pannelwrap4");
  } else if (window.location.href.includes("/what-to-buy/")) {
    activatePanel("#pannelwrap5");
  } else {
    activatePanel("#pannelwrap1");
  }

  $(".copy-link").click(function (e) {
    e.preventDefault();

    var dummy = $("<input>")
      .val(window.location.href)

      .appendTo("body")

      .select();

    document.execCommand("copy");

    dummy.remove();

    alert("Link copied to clipboard");
  });

  $(".savebookmark").click(function (e) {
    e.preventDefault();

    if (window.sidebar && window.sidebar.addPanel) {
      window.sidebar.addPanel(document.title, window.location.href, "");
    } else if (window.external && "AddFavorite" in window.external) {
      window.external.AddFavorite(window.location.href, document.title);
    } else if (window.opera && window.print) {
      this.title = document.title;

      return true;
    } else {
      alert(
        "Press " +
          (navigator.userAgent.toLowerCase().indexOf("mac") != -1
            ? "Command/Cmd"
            : "CTRL") +
          " + D to bookmark this page."
      );
    }
  });

  $("#closedbtn").on("click", function (e) {
    e.preventDefault();

    $(".popupmenu").removeClass("popactive");
  });

  $("#hamburgermenu").on("click", function (e) {
    e.preventDefault();

    $(".popupmenu").toggleClass("popactive");
  });

  // check

  $(".infocontent .listofcategory .category").each(function () {
    var textContent = $(this).text().trim();

    switch (true) {
      case textContent.includes("Living Room"):

      case textContent.includes("Kitchen"):

      case textContent.includes("Dining Room"):

      case textContent.includes("Bathroom"):

      case textContent.includes("Home Office"):
        $(this).css("color", "#652B41");

        break;

      case textContent.includes("Cleaning"):

      case textContent.includes("Luandry"):

      case textContent.includes("Kitchen"):

      case textContent.includes("Organizing"):

      case textContent.includes("Maintenance"):
        $(this).css("color", "#DEBB50");

        break;

      case textContent.includes("Interior Renovations"):

      case textContent.includes("Exterior Improvements"):

      case textContent.includes("Structural Upgrades"):

      case textContent.includes("Decorative Upgrades"):
        $(this).css("color", "#E37052");

        break;

      case textContent.includes("Garden Design"):

      case textContent.includes("Plant Propagation"):

      case textContent.includes("Tools & Equipment"):
        $(this).css("color", "#CE3E55");

      case textContent.includes("Furniture"):

      case textContent.includes("Appliances"):

      case textContent.includes("Lighting"):

      case textContent.includes("Kitchen Essentials"):
        $(this).css("color", "#CE3E55");

        break;

      default:
        $(this).css("color", "#652B41");

        break;
    }
  });

  $(".menu-collections").on("click", function (e) {
    e.preventDefault();

    $("ul.sub-menu-collections").slideToggle("fast");

    $("ul.sub-menu-collections").toggleClass("menu-active");

    $("li.menu-collections").toggleClass("activesubmenu");
  });

  $(".socialtrending").each(function () {
    var $li = $(this);
    var $video = $li.find(".social-video");
    var $link = $li.find("a");

    // Hover to play and pause video on hover
    $li.hover(
      function () {
        $("video.social-video").each(function () {
          this.pause();
          this.currentTime = 0;
        });

        $video.get(0).play();
      },
      function () {
        $video.get(0).pause();
        $video.get(0).currentTime = 0;
      }
    );

    // Handle click on the video and allow it to redirect
    $video.on("click", function (e) {
      e.stopPropagation(); // Prevent the default pause/play behavior, but allow the click-through
      $("video.social-video").each(function () {
        this.pause();
        this.currentTime = 0;
      });

      // Toggle play/pause for the clicked video
      var videoElement = $video.get(0);
      if (videoElement.paused) {
        videoElement.play();
      } else {
        videoElement.pause();
      }

      // Redirect to the external link after the click
      window.location.href = $link.attr("href");
    });

    // Allow the link to redirect when clicking anywhere in the list item (outside the video)
    $li.on("click", function () {
      window.location.href = $link.attr("href");
    });
  });
});
