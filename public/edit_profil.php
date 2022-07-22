<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>

    <link rel="stylesheet" href="../_URAA/css/card_profile_information.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../_URAA/css/costum.css" />

    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>

<body>
    
    <div id="" style="
    padding: 4.5rem 2.5rem 1.5rem 2.5rem;
    position: relative;
    width: 40rem;
    max-width: 100%;">
        <article class="" id="edit_profil">

            <div class="card" style="width: 800px ; margin:0px;">
                <div class="img">
                <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </div>
                <div class="infos">
                <div class="name">
                    <h2>John Doe</h2>
                    <h4>@johndoe</h4>
                </div>
                <p class="text">
                    Seorang ghost buster kayak scooby doo.
                </p>
                <ul class="stats">
                    <li>
                    <h3>15K</h3>
                    <h4>Views</h4>
                    </li>
                    <li>
                    <h3>Cerita</h3>
                    <h4>69</h4>
                    </li>
                    <li>
                    <h3>Genre</h3>
                    <h4>Misteri</h4>
                    </li>
                </ul>
                <!-- <div class="links">
                    <button class="follow">Follow</button>
                    <button class="view">View profile</button>
                </div> -->
                </div>
            </div>
            <form action="#">

                <h3>Informasi Umum</h3>

                <div class="fields">
                    <div class="field half">
                        <label for="edit_nama">Nama</label>
                        <input type="text" minlength="7" maxlength="25" name="edit_nama" class="nama" id="">
                    </div>

                    <div class="field half">
                        <label for="">Username</label>
                        <input type="text" disabled minlength="7" maxlength="25" name="nama" class="nama" id="">
                    </div>

                    <div class="field half">
                        <label for="edit_tgl_lahir">Tanggal Lahir</label>
                        <input type="date" minlength="7" maxlength="25" name="edit_tgl_lahir" class="nama" id="">
                    </div>

                    <div class="field half">
                        <label for="edit_genre">Genre</label>
                        <select name="edit_genre" id="frek_rokok">
                            <option selected disabled>-- Pilih Genre --</option>
                            <option value="0">
                                Cerita Komunitas
                            </option>

                            <option value="0">
                                Misteri
                            </option>

                            <option value="0">
                                Konspirasi
                            </option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="edit_bio">Edit Bio</label>
                        <textarea name="edit_bio" id="edit_bio" rows="4"></textarea>
                    </div>
                </div>
                <div class="actions">
                    <li>
                        <input type="submit" value="Submit" id="jawabbtn" class="primary">
                    </li>
                </div>
                <hr>
                <h3>Informasi Umum</h3>
                <div class="fields">
                    <div class="field">
                        <label for="pass_lama">Password Lama</label>
                        <input type="text" minlength="7" maxlength="25" name="pass_lama" class="" id="">
                    </div>

                    <div class="field half">
                        <label for="conf_pass">Passwod Baru</label>
                        <input type="text" minlength="7" maxlength="25" name="conf_pass" class="" id="">
                    </div>

                    <div class="field half">
                        <label for="conf_baru">Konfirmasi Password Baru </label>
                        <input type="text" minlength="7" maxlength="25" name="conf_baru" class="" id="">
                    </div>
                </div>
                <div class="actions">
                    <li>
                        <input type="submit" value="Submit" id="jawabbtn" class="primary">
                    </li>
                </div>
            </form>
        </article>
    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../_URAA/js/costum.js"></script>
    <!-- <script src="../_URAA/js/tanyadozkiller.js"></script> -->
    <script src="../_URAA/js/ramalankematian.js"></script>

    <script>
        
    </script>
</body>

</html>