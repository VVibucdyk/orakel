/*
  By Difa WRD 10121916
  refrensi https://www.peteranswers.com/id/
  */

//by kang jar backsound music
const audio = new Audio("./_URAA/audio/BACKSOUND.mp3");
$("body").click(function () {
  //audio.play();
});

// enabled elemen inputan
function setEnable() {
  $("input").removeAttr("disabled");
  $("select").removeAttr("disabled");
  $("textarea").removeAttr("disabled");
  $("button").removeAttr("disabled");
  $(".close").show();
}

// disabled element inputan
function setDisable() {
  $("input").attr("disabled", true);
  $("select").attr("disabled", true);
  $("textarea").attr("disabled", true);
  $("button").attr("disabled", true);
  $(".close").hide();
}

// menampilkan error text setelah element yang di definisikan beserta pesan nya
function ShowErrText(element, msg) {
  $(".text-eror").remove();
  $(element).after('<div class="text-eror">' + msg + "</div>");
  $(".text-eror").hide().fadeIn(600);
  $(element).focus();
}

// Memeutar audio
function UraaHaHaHa() {
  const audio = new Audio("./_URAA/audio/URAHAHAHA.mp3");
  audio.play();
}

// Animasi Loading & menyembunyikan elemet (def), judul loading (def), timer loading (def), status (def)
function loadingduls(element, titleloading, timer, status) {
  setDisable();
  $(element).hide();
  $(".progresbar").remove();
  $(element).after(
    '<div class="progresbar"> <div class="counter">0</div> <div id="loading"> <span id="loading-inside"></span> </div> </div>'
  );
  var progressbar = $(".progresbar");
  var counter = $(".counter");
  var barInside = $("#loading-inside");
  var interval = setInterval(LetsLoading, timer);
  var progress = 0;

  progressbar.show(500);

  function LetsLoading() {
    if (progress >= 100) {
      progressbar.hide();
      $(element).fadeIn(500);
      if (status) {
        UraaHaHaHa();
      }
      clearInterval(interval);
      $(".progresbar").remove();
      setEnable();
    } else {
      progress += 1;
      counter.text("" + titleloading + " " + progress + "%");
      barInside.css("width", progress + "%");
    }
  }
}

const isHTML = (str) => {
  const fragment = document.createRange().createContextualFragment(str);
  // remove all non text nodes from fragment
  fragment.querySelectorAll("*").forEach((el) => el.parentNode.removeChild(el));
  // if there is textContent, then not a pure HTML
  return !(fragment.textContent || "").trim();
};

const delay = (millis) =>
  new Promise((resolve, reject) => {
    setTimeout((_) => resolve(), millis);
  });

$(".dropdown-content .magic-title .inner").ready(function () {
  let temp = "";
  let save = false;

  $(".magic-title").on({
    mouseenter: function () {
      var title = "<h1>" + $(this).text() + "</h1>";
      var deskripsi = isHTML($(this).data("deskripsi"))
        ? $(this).data("deskripsi")
        : "<p>" + $(this).data("deskripsi") + "</p>";

      if (!save) {
        temp = $("#magic-title").html();
        save = true;
      }
      $("#magic-title")
        .html(title + deskripsi)
        .hide()
        .show(700);
    },
  });

  $(".dropdown-content").on({
    mouseleave: function () {
      $("#magic-title").html(temp).hide().show(500);
    },
  });
});
