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
});
