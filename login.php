<?php session_start();
include('assets/reqphp/alogin.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تسجيل دخول(أدمن) - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="login-clean">
        <form class="text-right border rounded border-dark shadow" method="post" action="login.php" style="background-color: #2c3e50;">
            <div class="illustration"><img src="assets/img/yaqdha_logo.png"></div>
            <div class="form-group"><input class="bg-dark border rounded border-dark shadow form-control" type="text" name="username" placeholder="أسم المسؤول" required=""></div>
            <div class="form-group"><input class="bg-dark border rounded border-dark shadow form-control" type="password" name="password" placeholder="كلمة المرور" required=""></div>
            <div class="form-group"><button class="btn btn-block" name="signin" id="signin" type="submit" style="background-color: #4fa6c4;color: #fafafa;">Log In</button></div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>