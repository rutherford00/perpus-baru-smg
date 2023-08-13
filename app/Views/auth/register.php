<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Aplikasi Perpustakaan • Register</title>
    <link rel="stylesheet" href="/css/stylelogin.css">
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
        <h2 class="card-header"><?= lang('Auth.register') ?></h2>
        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="inputBox">
                <input type="email" required="" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                <label for="email"><?= lang('Auth.email') ?></label>
            </div>
            <div class="inputBox">
                <input type="text" required="" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                <label for="username"><?= lang('Auth.username') ?></label>
            </div>
            <div class="inputBox">
                <input type="password" required="" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                <label for="password"><?= lang('Auth.password') ?></label>
            </div>
            <div class="inputBox">
                <input type="password" required="" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
            </div>

            <button><a href="<?= url_to('login') ?>"><?= lang('Login') ?></a></button>
            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
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