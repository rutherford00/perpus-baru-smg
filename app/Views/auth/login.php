<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perpustakaan • Login</title>
    <link rel="stylesheet" href="/css/stylelogin.css">
    <link rel="icon" type="image/png" href="/img/book.png">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="clock">
                <div class="hour">
                    <div class="hr" id="hr"></div>
                </div>
                <div class="min">
                    <div class="mn" id="mn"></div>
                </div>
                <div class="sec">
                    <div class="sc" id="sc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="box2">
        <h2>Aplikasi Perpustakaan SMP Barunawati Semarang</h2>
        <h2>Login</h2>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="inputBox">
                <input type="text" name="login" required="">
                <label for="login" <?= lang('Auth.username') ?>>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="">
                <label for="password"><?= lang('Auth.password') ?></label>
            </div>
            <!-- <button><a href="<?= url_to('register') ?>"><?= lang('Buat Akun') ?></a></button> -->
            <button type="submit"><?= lang('Auth.loginAction') ?></button>
        </form>
    </div>
    <script type="text/javascript">
        const deg = 6;
        const hr = document.querySelector("#hr");
        const mn = document.querySelector("#mn");
        const sc = document.querySelector("#sc");
        setInterval(() => {
            let day = new Date();
            let hh = day.getHours() * 30;
            let mm = day.getMinutes() * deg;
            let ss = day.getSeconds() * deg;
            hr.style.transform = `rotateZ(${hh+(mm/12)}deg)`;
            mn.style.transform = `rotateZ(${mm}deg)`;
            sc.style.transform = `rotateZ(${ss}deg)`;
        })
    </script>
</body>

</html>