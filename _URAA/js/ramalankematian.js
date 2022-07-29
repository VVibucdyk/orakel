/*
  By Fajar 10121919 & Heri 10121914
  Modif By Difa WRD 10121916 
  */

  $("#ramalan-kematian").ready(function () {
    $("#ramalkematiakulagi").click(function () {
      $("#hasil-ramalan-kematian").fadeOut(500);
      $("#ramalan-kematian").fadeIn(500);
    });

    $(".tahun_lahir").keyup(function () {
      $(this).val($(this).val().replace(/\D/g, ""));
    });

  // fungsi untuk mengacak number
  function acakPemabahan(max) {
    return Math.floor(Math.random() * max);
  }

  // fungsi untuk menentukan total umur manusia. menurut penelitian WHO pada 2016, rata-rata umur laki = 69.8 (70), wanita 74.2 (74).
  // source WHO, berdasarkan google :)
  function jumlahUmur(gender) {
    let start;
    if (gender == "laki") {
      start = 70;
    } else {
      start = 74;
    }

    // Bonus tahun
    total_tahun = start + acakPemabahan(Math.random() < 0.5 ? -10 : 10);

    return total_tahun;
  }

  function ulangi() {
    $(".hasil_prediksi").html("");
  }

  $("#ramalan-kematian").on("click", ".btn-ramalan", function () {
    $(".text-eror").remove();
    // inisialisasi attribute. diambil dari form diatas
    let tahunini = new Date().getFullYear();
    console.log(tahunini);
    let nama = $(".nama").val();
    let kelahiran = $(".tahun_lahir").val();
    let gender = $(".gender:checked").val();

    // inisialiasi sekaligus mengacak angka nya langsung
    let frek_rokok = acakPemabahan(parseInt($("#frek_rokok").val()));
    let tidur = acakPemabahan(parseInt($("#tidur").val()));
    let alkohol = acakPemabahan(parseInt($("#alkohol").val()));
    let olahraga = acakPemabahan(parseInt($("#olahraga").val()));
    let stress = acakPemabahan(parseInt($("#stress").val()));

    if (nama == "" || nama.length < 7 || nama.length > 25) {
      ShowErrText(
        ".nama",
        "Periksa Kembali !",
        "(Min 7 - Max 27 Karakter)"
        );
    } else if (
      kelahiran == "" ||
      kelahiran.match(/\D/) ||
      kelahiran.length < 4 ||
      kelahiran.length > 4 ||
      kelahiran < 1
      ) {
      ShowErrText(".tahun_lahir", "Hanya Angka", "(Min Max 4 Karakter)");
    } else if (parseInt(kelahiran) > tahunini) {
      ShowErrText(
        ".tahun_lahir",
        "Jangan Main-Main",
        "(Sekarang Masih Tahun " + tahunini + ")"
        );
    } else if (gender === undefined) {
      ShowErrText(".alert-gender","Gender", "Harus Dipilih !");
    } else if (Number.isNaN(frek_rokok)) {
      ShowErrText("#frek_rokok", "Pilihan Tidak Boleh Kosong !");
    } else if (Number.isNaN(tidur)) {
      ShowErrText("#tidur", "Pilihan Tidak Boleh Kosong !");
    } else if (Number.isNaN(alkohol)) {
      ShowErrText("#alkohol", "Pilihan Tidak Boleh Kosong !");
    } else if (Number.isNaN(olahraga)) {
      ShowErrText("#olahraga", "Pilihan Tidak Boleh Kosong !");
    } else if (Number.isNaN(stress)) {
      ShowErrText("#stress", "Pilihan Tidak Boleh Kosong !");
    } else {
      // Semua data angka kita masukan kedalamm array, agar bisa dilooping
      let arr_angka = [frek_rokok, tidur, alkohol, olahraga, stress];

      // Mari kita mulai proses!!!
      let start_umur = jumlahUmur(gender);
      for (let i = 0; i < arr_angka.length; i++) {
        // jika total jumlah umur dibawah 30, keluar looping
        if (start_umur < 30) {
          break;
        }
        start_umur += arr_angka[i];
      }

      let hasil_prediksi = parseInt(kelahiran) + start_umur;

      $("#ramalan-kematian").hide();

      // animasi loading duls 4 detik
      loadingduls(
        "#hasil-ramalan-kematian",
        "Meramalkan Kematian Mu",
        40,
        true
        );

      var OutHasil = `<h4>Hasil Ramalan kami<br/>menyatakan bahwa</h4>`;
      OutHasil += `<h2 class="horror-text">${nama}</h2>`;
      OutHasil += `<h4>yang lahir di tahun</h4>`;
      OutHasil += `<h2 class="horror-text">${kelahiran}</h2>`;
      OutHasil += `<h4>akan meninggal<br/>pada tahun</h4>`;
      OutHasil += `<h2 class="horror-text">${hasil_prediksi}</h2>`;
      $("#kematianku").html(OutHasil);
      $("#ramalan-kematian").trigger("reset");
    }
  });
});
