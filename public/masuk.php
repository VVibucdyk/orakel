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
            <input type="password" placeholder="Masukan password kamu..." id="pass">
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