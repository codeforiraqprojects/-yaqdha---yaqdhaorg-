<?php session_start();
    include_once('assets/reqphp/connectdb.php');
    $title = "contact";?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تواصل معنا - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/contact.css">
</head>

<body dir="rtl">
<?php require_once "assets/reqphp/navbar.php";?>
    <div class="maindiv" style="background-color: #e8e8e6;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 text-center" style="background-color: rgba(255,255,255,0);">
                    <img src="assets/img/yaqdha_lg.png" style="width: 220px;margin: 50px auto;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-8">
                    <p class="text-center" style="margin: 111px;color: #2c3e50;font-size: 36px;">شباب امنوا ان لا يقظة الا بالمعرفة</p>
                </div>
            </div>
        </div>
    </div>
    <div class="highlight-phone" style="background-color: #e8e8e6;">
        <div class="container">
            <div class="row contactcard" style="background-color: #ffffff;margin-bottom: 25px;">
                <div class="col-sm-6">
                <div class="d-none d-md-block iphone-mockup"><img class="device" src="assets/img/contactback.png">
                        <div class="screen"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro">
                        <h2 class="text-center" style="color: #2c3e50;">تواصل معنا</h2>
                        <a target="_blank" href="https://www.facebook.com/Yaqdha1/" style="text-decoration: none;"><img class="contactimg" src="assets/img/face.png" ><p class="border rounded border-light shadow-sm contactpa" style="padding-left: 15px;margin-bottom: 25px;height: 40px;color: #2c3e50;">yaqdha1</p></a>
                        <img class="contactimg" src="assets/img/whats.png"><p class="border rounded border-light shadow-sm contactpa" style="padding-left: 15px;margin-bottom: 26px;height: 40px;"><a style="text-decoration: none;color: #2c3e50;" href="https://wa.me/9647822776559">07822776559</a> &amp; <a style="text-decoration: none;color: #2c3e50;" href="tel:+9647722778044">07722778044</p>
                        <a target="_blank" href="https://www.instagram.com/Yaqdha1/"style="text-decoration: none;"><img class="contactimg" src="assets/img/insta.png"><p class="border rounded border-light shadow-sm contactpa" style="padding-left: 15px;margin-bottom: 25px;height: 40px;color: #2c3e50;">yaqdha1</p></a>
                        <a target="_blank" href="mailto:yaqdha1@gmail.com?subject=تواصل%20مع%20منظمة%20يقظة" style="text-decoration: none;"><img class="contactimg" src="assets/img/gmail.png"><p class="border rounded border-light shadow-sm contactpa" style="padding-left: 15px;margin-bottom: 25px;height: 40px;color: #2c3e50;">yaqdha1@gmail.com</p></a>
                        <p class="float-right join">للانضمام للفريق يرجى ملئ الاستماره&nbsp;<a href="https://docs.google.com/forms/d/e/1FAIpQLSc5W9Ibh02O5REZaFVqE0Asx3qgvK91cSFP2jxPjwaBW8jXuA/viewform">اضغط هنا</a>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>