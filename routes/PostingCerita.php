
<?php 
// created by : fajar alam 
// created date : 20/07/2022
require_once('../_URAA/module/function.php');
if(!isSessionValid()) exit("Direct access not permitted.");

if(!empty($_POST['judul'])){
    // menangkap data post 
    // kode_artikel
    $data[] = uniqid();

    // judul artikel
    $data[] = $_POST['judul'];

    // isi_artikel
    $data[] = $_POST['editor'];

    // tgl_publish
    $data[] = $today;

    // user_id
    $data[] = 1;

    // genre_id
    $data[] = $_POST['genre'];

    // rating
    $data[] = random_int(1, 10);

    $data[] = clean($_POST['judul']);

    // simpan data
    $register = $conn->prepare("INSERT INTO table_artikel (kode_artikel, judul_artikel, isi_artikel, tgl_publish, user_id, genre_id, rating, slug) VALUES (?,?,?,?,?,?,?,?)");
    $simpan = $register->execute($data);

    // Out
    if ($simpan) {
        echo 'Berhasil Membuat Cerita!';
    } else {
        echo 'Gagal! Silahkan cek kembali inputan!';
    }
} else {
    echo 'Lengkapi Data';
}

?>