
<?php 
// created by : fajar alam 
// created date : 20/07/2022
require_once('../_URAA/module/function.php');
if(!isSessionValid()) exit("Direct access not permitted.");

  // Modified BY : Difa Witsqa RD
  // Modified Date : 07-08-2022
  // Modified Description : Menambahkan Validasi Sesi Posting Valid

if(!empty($_POST['judul'])){

    if (UraaPostCodeValid($_POST['code'])) {
        // menangkap data post 

        // kode_artikel
        $data[] = $_POST['code'];

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
            
            UraaRmvPostCode($_POST['code']);

            $data['status'] = true;
            $data['msg'] = "Artikel berhasil ditambahkan";
            $data['last_id'] = $conn->lastInsertId();
            echo json_encode($data);
        } else {
            $data['status'] = false;
            $data['msg'] = "Artikel gagal ditambahkan";

            echo json_encode($data);
            echo 'Gagal! Silahkan cek kembali inputan!';
        }
    } else {
        echo 'Sesi Posting Tidak Valid !';
    }

} else {
    echo 'Lengkapi Data';
}

?>