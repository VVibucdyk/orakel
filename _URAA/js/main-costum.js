// Costum By Difa WRD 10121916
// Main Costum

var $window = $(window),
$body = $("body"),
$wrapper = $("#wrapper"),
$header = $("#header"),
$footer = $("#footer"),
$main = $("#main"),
$main_articles = $main.children("article"),
$pagesmain = $("#pages");

let locked = false;

function Hidden_Main() {
  locked = false;

  // Mark as switching.
  $body.addClass("is-switching");

  // Deactivate article.
  $pagesmain.removeClass("active");

  // Hide article, main.
  $pagesmain.hide();
  $main.hide();

  // Show footer, header.
  $footer.show();
  $header.show();

  // Unmark as visible.
  $body.removeClass("is-article-visible");

  // Unmark as switching.
  $body.removeClass("is-switching");

  // Window stuff.
  $window.scrollTop(0).triggerHandler("resize.flexbox-fix");
}

function Show_Main() {
  if (locked) {
    Hidden_Main();
  }
  locked = true;

  // Mark as visible.
  $body.addClass("is-article-visible");

  // Show article.
  setTimeout(function () {
    // Hide header, footer.
    $header.hide();
    $footer.hide();

    // Show main, article.
    $main.show();
    $pagesmain.show();

    // Activate article.
    setTimeout(function () {
      $pagesmain.addClass("active");

      // Window stuff.
      $window.scrollTop(0).triggerHandler("resize.flexbox-fix");
    }, 25);
  }, delay);

  $main_articles.each(function () {
    var $this = $(this);

    // Close.
    $('<div class="close">Close</div>')
    .appendTo($this)
    .on("click", function () {
      Hidden_Main();
    });

    // Prevent clicks from inside article from bubbling.
    $this.on("click", function (event) {
      event.stopPropagation();
    });
  });
}

$(".dropdown-content .magic-title .inner").ready(function () {
  let temp = $("#magic-title").html();

  $(".magic-title").on({
    mouseenter: function () {
      var title = "<h1>" + $(this).text() + "</h1>";
      var deskripsi = isHTML($(this).data("deskripsi"))
      ? $(this).data("deskripsi")
      : "<p>" + $(this).data("deskripsi") + "</p>";

      $("#magic-title")
      .html(title + deskripsi)
      .hide()
      .show(700);
    },
  });

  $(".magic-title").on({
    mouseleave: function () {
      $("#magic-title").html(temp).hide().show(500);
    },
  });
});


$main.hide();
$main_articles.hide();
