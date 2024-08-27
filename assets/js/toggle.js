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
});
