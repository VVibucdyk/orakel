
<h2 class="major">Ramalan Kematian</h2>
<span class="image main"
><img src="_URAA/images/kuburan-uraa.jpg" alt="kematian"
/></span>
<form onsubmit="return false" action="#" id="ramalan-kematian">
  <p>
    Menurut penelitian WHO pada 2016, rata-rata umur laki-laki hanya
    mencapai = 69.8 (70 Tahun), wanita 74.2 (74 Tahun).
    <b>Ramalkan kematianmu, jika kamu BERANI!!!</b><br />Kamu tidak
    bisa menghindari kematian !
  </p>
  <div class="fields">
    <div class="field half">
      <label for="nama">Nama</label>
      <input
      type="text"
      minlength="7"
      maxlength="25"
      name="nama"
      class="nama"
      id=""
      />
    </div>
    <div class="field half">
      <label for="tahun_lahir">Tahun Kelahiran</label>
      <input
      type="text"
      minlength="4"
      maxlength="4"
      name="tahun_lahir"
      class="tahun_lahir"
      id=""
      />
    </div>
    <div class="field half">
      <label>Gender</label>
      <input
      type="radio"
      name="gender"
      class="gender"
      value="laki"
      id="laki-laki"
      />
      <label for="laki-laki">Laki - Laki</label>

      <input
      type="radio"
      name="gender"
      class="gender"
      value="wanita"
      id="wanita"
      />
      <label for="wanita">Wanita</label>
      <span class="alert-gender"></span>
    </div>
    <div class="field half">
      <label for="frek_rokok">Saya merokok setiap...</label>
      <select name="frek_rokok" id="frek_rokok">
        <option>-</option>
        <option value="0">
          Saya orang baik, saya tidak merokok sama sekali!
        </option>
        <option value="-2">Saya merokok ketika mau saja</option>
        <option value="-3">
          Dalam satu bulan, satu bungkus rokok
        </option>
        <option value="-6">
          Dalam satu minggu, dua bungkus rokok
        </option>
        <option value="-7">Satu hari, satu bungkus</option>
      </select>
    </div>
    <div class="field half">
      <label for="tidur">Saya tidur...</label>
      <select name="tidur" id="tidur">
        <option>-</option>
        <option value="5">8 jam perhari</option>
        <option value="3">5 Jam Perhari</option>
        <option value="2">3 jam perhari</option>
        <option value="0">
          apa itu tidur? saya anak korporat. tidur hanyalah mitos.
        </option>
      </select>
    </div>
    <div class="field half">
      <label for="alkohol">Saya minum alkohol... </label>
      <select name="alkohol" id="alkohol">
        <option>-</option>
        <option value="0">hah? alkohol? saya muslim.</option>
        <option value="-3">
          lebih dari 1 gelas dan kurang dari 3 gelas per hari
        </option>
        <option value="-5">
          lebih dari 3 gelas dan kurang dari 10 gelas per hari
        </option>
      </select>
    </div>
    <div class="field half">
      <label for="olahraga">Saya Olahraga setiap...</label>
      <select name="olahraga" id="olahraga">
        <option>-</option>
        <option value="3">Setiap hari, minimal 1 jam perhari.</option>
        <option value="2">
          Hanya melakukan dihari libur/weekend saja.
        </option>
        <option value="1">Berolahraga ketika ada teman saja.</option>
        <option value="0">
          apa itu tidur? saya anak korporat. tidur hanyalah mitos.
        </option>
      </select>
    </div>
    <div class="field half">
      <label for="stress">Saat ini saya sangat...</label>
      <select name="stress" id="stress">
        <option>-</option>
        <option value="3">Senang sekali, tanpa ada beban.</option>
        <option value="2">
          cukup senang. ada pikiran, tapi masih bisa di-handle.
        </option>
        <option value="-2">
          cukup stress. Kerjaan numpuk, banyak tanggung jawab.
        </option>
        <option value="-4">
          stress. kerjaan numpuk, uang sedikit lagi, saham merah
          semua.
        </option>
        <option value="-7">
          sangat stress. enggak bisa move on dari ayank.
        </option>
      </select>
    </div>
  </div>
  <ul class="actions">
    <li>
      <input
      type="submit"
      value="Ramalkan Kematian"
      class="primary btn-ramalan"
      />
    </li>
    <li><input type="reset" value="Reset" /></li>
  </ul>
</form>
<div id="hasil-ramalan-kematian">
  <span id="kematianku"></span>
  <hr />
  <input
  type="submit"
  value="Ramalkan Lagi ?"
  id="ramalkematiakulagi"
  class="small"
  />
</div>
<script src="_URAA/js/ramalankematian.js"></script>