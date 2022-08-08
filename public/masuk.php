<?php 

require_once('../_URAA/module/function.php');
if(isSessionValid()) exit("Direct access not permitted.");

?>

<h2 class="major">Masuk</h2>

<span class="image main">
    <img src="_URAA/images/house-uraa.jpg" alt="house"/>
</span>

<form method="POST" id="masuk">
    <div class="fields">
        <div class="field">
            <label>Username</label>
            <input type="text" id="username" placeholder="Masukan username kamu..."/>
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" placeholder="Masukan password kamu..." id="password">
        </div>
    </div>
    <ul class="actions">
        <li>
            <input type="submit" class="primary" value="Masuk">
        </li>
        <li>
            <input type="button" onclick="Open('public/register',true);" value="Daftar" />
        </li>
    </ul>
</form>

<script>
    $('#masuk').ready(function(){  

        $("#masuk").on('reset', function() {
            $(".text-eror").fadeOut();
        });

        $("#masuk").on('submit', function() {
            event.preventDefault();
            $(".text-eror").remove();

            data = {
                username : $('#username').val().trim(),
                password : $('#password').val().trim()
            }

            if(data.username==="" || data.username===null) {
                ShowErrText("#username", "Uups!", "Masukan Username Kamu !");
            } else if(data.password==="" || data.password===null){
                ShowErrText("#password", "Uups!", "Masukan Password Kamu !");
            }else{
                setDisable();
                $.ajax({
                    url : 'routes/masuk.php',
                    method : 'POST',
                    dataType: "json",
                    data : data,
                    success : (res) => {
                        var info = res.info; 
                        if (res.status == true) {
                            $('#masuk').trigger("reset");
                            iziToast.success({
                                title: "Ok",
                                message: info.msg,
                                position: "topCenter",
                            });
                            setEnable();
                            window.location = "./";
                        } else {
                            $(`#${info.elementid}`).val("");
                            ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
                            setEnable();
                        }
                    },
                    error : () => {
                        ShowErrText(".major", "GAGAL!", "Terjadi Error Pada Server");
                    }
                })
            }
        });

    });
</script>


