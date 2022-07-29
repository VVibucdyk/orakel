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
            <input type="button" onclick="Open('public/register');" value="Daftar" />
        </li>
    </ul>
</form>

<script>
    $('#masuk').ready(function(){  

        $("input[type='reset']").on('click', function() {
            $(".text-eror").fadeOut();
        });

        $("input[type='submit']").on('click', function() {
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
                $.ajax({
                    url : 'routes/masuk.php',
                    method : 'POST',
                    dataType: "json",
                    data : data,
                    success : (res) => {
                        var info = res.info; 
                        if (res.status == true) {
                            iziToast.success({
                                title: "Ok",
                                message: info.msg,
                                position: "topCenter",
                            });
                            window.location = "./";
                        } else {
                            $(`#${info.elementid}`).val("");
                            ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
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


