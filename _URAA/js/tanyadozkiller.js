/*
  By Arya 10121913 & Difa WRD 10121916
  refrensi https://www.peteranswers.com/id/
*/

let StatusPermohonan = false;

var dozzkiller = {
  answer: "",
  answerToggle: false,
  needsReset: false,
  TextPermohonan: "Hallo Dozz Killer, tolong jawab pertanyaan saya.",
};

var controller = {
  init: () => {
    view.init();
  },
  // event input permohonan di isi apa tombol yang di tekan user
  keyDown: (e) => {
    let len = view.getPetitionLength();

    if (e.key === "." && len === 0) {
      // jika pertama di awali dengan titik (.) akan masuk ke mode jawab pertanyaan
      dozzkiller.answerToggle = !dozzkiller.answerToggle;
      $("#permohonan").val(
        $("#permohonan").val() + dozzkiller.TextPermohonan[len]
      );
      return false;
    } else if (e.key.length === 1 && dozzkiller.answerToggle) {
      // masuk ke mode jawab pertanyaan
      dozzkiller.answer += e.key;
      if (undefined !== dozzkiller.TextPermohonan[len]) {
        $("#permohonan").val(
          $("#permohonan").val() + dozzkiller.TextPermohonan[len]
        );
      } else {
        $("#permohonan").val($("#permohonan").val() + " ");
      }
      return false;
    } else if (e.key === "Backspace" && dozzkiller.answerToggle) {
      // jika menghapus karakter
      dozzkiller.answer = dozzkiller.answer.slice(0, -1);
    }
  },
  getResetStatus: () => {
    // mengecek status needreset
    return dozzkiller.needsReset;
  },
  getAnswer: () => {
    // mendapatkan jawaban dozzkiller
    const invalidResponse = [
      "Bukan begitu caranya ya... mengajukan pertanyaan kepada Dozz Killer !",
      "Permohonan tidak valid, coba lagi !",
      "kamu harus bertanya dengan sopan !",
      "Kenapa aku harus menjawabnya ?",
      "Silakan coba lagi besok. Atau tidak pernah...",
      "Aku lelah, coba lagi lain kali !",
      "jangan sekarang ! aku sedang sibuk.",
      "Perbaiki permohonan kamu !",
    ];
    const invalidQuestion = "Ajukan pertanyaan kamu dengan benar !";
    dozzkiller.needsReset = true;

    if (!view.getQuestion()) {
      // Jika Pertanyaan kosong StatusPermohonan berubah False
      StatusPermohonan = false;
      return invalidQuestion;
    } else if (dozzkiller.answer) {
      // Jika Jawaban dari permohonan Ada
      StatusPermohonan = true;
      return '" ' + dozzkiller.answer + ' " ';
    } else {
      // Jika permohonan tanpa mantra hehe, Out random kata di invalidResponse
      StatusPermohonan = false;
      let randomNum = Math.floor(Math.random() * invalidResponse.length);
      return invalidResponse[randomNum];
    }
  },
  reset: () => {
    // Resett val di dozzkiller
    dozzkiller.answer = "";
    dozzkiller.answerToggle = false;
    dozzkiller.needsReset = false;
    view.resetUi();
  },
};

var view = {
  init: () => {
    $("#jawabbtn").click(function () {
      //jika btn jawabbtn di klik
      view.renderAnswer();
    });
    $("#tanyalagi").click(function () {
      //jika btn tanya lagi di klik
      $("#hasil-doz-killer").hide();
      $("#tanya-dozz-killer").fadeIn(500);
    });
    $("#resetButton").click(function () {
      //jika btn tanya lagi di klik
      controller.reset;
    });
    $("#permohonan").keydown(function (event) {
      // mendengarkan apa yang di tekan di input permohonan
      if ($("#permohonan").val() == "") {
        controller.reset();
      }
      return controller.keyDown(event);
    });
    $("#pertanyaan").keydown(function (event) {
      // mendengarkan apa yang di tekan di input pertanyaan
      switch (event.key) {
        // ketika menekan tombol tanda tanya
        case "?":
          // prosessss hasil
          view.renderAnswer();
          break;
        // ketika menekan enter
        case "Enter":
          // cek keberadaan tanda tanya
          if (!document.getElementById("pertanyaan").value.includes("?")) {
            document.getElementById("pertanyaan").value += "?";
          }
          // prosessss hasil
          view.renderAnswer();
          break;
      }
    });
    // Jika focus di input permohonan
    document.getElementById("permohonan").onfocus = () => {
      if (controller.getResetStatus()) {
        controller.reset();
      }
    };
  },
  getInputText: () => {
    // mendapatkan value permohonan
    return $("#permohonan").val();
  },
  getPetitionLength: () => {
    // mendapatkan jumlah karakter value permohonan
    return $("#permohonan").val().length;
  },
  getQuestion: () => {
    // mendapatkan value pertanyaan
    return $("#pertanyaan").val();
  },
  renderAnswer: () => {
    // tampilkan hasil
    $("#pertanyaanku").html('" ' + view.getQuestion() + ' ? "');
    $("#answer").html(controller.getAnswer());
    $(".text-eror").remove();
    view.loadingBar();
  },
  showAnswer: () => {
    //menampilkan jawaban
    $("#answer").show(0);
  },
  hideAnswer: () => {
    //menyembunyikan jawaban
    $("#answer").hide(0);
  },
  resetUi: () => {
    view.clearAnswer();
    view.hideAnswer();
  },
  clearPetition: () => {
    //kosongkan permohonan
    $("#permohonan").val("");
  },
  clearQuestion: () => {
    //kosongkan pertanyaan
    $("#pertanyaan").val("");
  },
  clearAnswer: () => {
    //kosongkan jawaban
    $("#answer").html("");
  },
  // menampilkan animasi loading + validasi
  loadingBar: () => {
    view.hideAnswer();
    if (!view.getInputText()) {
      ShowErrText(
        "#permohonan",
        "<b>Permohonan harus di isi</b> Jangan main main dengan Dozz Killer !"
      );
      controller.reset();
    } else if (!view.getQuestion()) {
      ShowErrText(
        "#pertanyaan",
        "<b>Pertanyaan harus di isi</b> Jangan main main dengan Dozz Killer !"
      );
      controller.reset();
    } else {
      console.log("button  clicked");
      if (!StatusPermohonan) {
        loadingduls(
          "#tanya-dozz-killer",
          "Mengirim Permohonanmu Kepada Dozz Killer",
          40,
          StatusPermohonan
        );
        ShowErrText("#pertanyaan", controller.getAnswer());
      } else {
        $("#tanya-dozz-killer").hide();
        loadingduls(
          "#hasil-doz-killer",
          "Mengirim Permohonanmu Kepada Dozz Killer",
          40,
          StatusPermohonan
        );
        view.showAnswer();
      }
      view.clearPetition();
      view.clearQuestion();
    }
  },
};

controller.init();
