<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posting cerita</title>
</head>
<body>
    <h1>posting pengalaman astralmu. </h1>

    <form action="#" onsubmit="preventDefault()">
        <table>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" id="judul" max="125" placeholder="masukan judul misteri/horromu"></td>
            </tr>

            <tr>
                <td>Isi Artikel</td>
                <td>:</td>
                <td>
                    <textarea name="" id="artikel" cols="30" rows="10">

                    </textarea>
                </td>
            </tr>

            <tr>
                <td>Genre</td>
                <td>:</td>
                <td>
                    <select name="genre" id="genre">
                        <option value="1">Ceritaku</option>
                        <option value="2">Misteri</option>
                        <option value="3">Urban Legend</option>
                        <option value="4">Mitos</option>
                        <option value="5">Konspirasi</option>
                    </select>
                </td>
            </tr>

            
        </table>
    </form>

    <script src="../assets/js/jquery.min.js"></script>


</body>
</html>