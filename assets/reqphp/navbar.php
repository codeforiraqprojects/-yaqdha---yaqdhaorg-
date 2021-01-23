<?php
$_SESSION['start'] = time();
 
if (time() - $_SESSION['start'] > 10) {
    unset($_SESSION['count']);
    unset($_SESSION['start']);
} else {

    if (isset($_SESSION['count'])) {}
    else {
        $_SESSION['count'] = 1;
        $countquery = "UPDATE `visitors` SET `visit_cont`= visit_cont + '".$_SESSION['count']."'";
        $countres = mysqli_query($conn, $countquery);
        if(!$countres){
            echo "";
        }
    }
}

 if(isset($title) && ($title == "activityfull" || $title == "postfull" )) { ?>
 <link rel="stylesheet" href="../assets/css/navbar.css">
 <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean" style="background-color: #4fa6c4;"><a class="navbar-brand" href="home"><img class="logo" src="../assets/img/yaqdha_logo.png" style="width: 60px; margin:unset;"> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

 <?php } else { ?>
<link rel="stylesheet" href="assets/css/navbar.css">
<nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean" style="background-color: #4fa6c4;"><a class="navbar-brand" href="home"><img class="logo" src="assets/img/yaqdha_logo.png" style="width: 60px; margin:unset;"> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

<?php } ?>

        <div class="container">
            <div class="collapse navbar-collapse text-center"
                id="navcol-1">
                <ul class="nav navbar-nav mx-5">
                    <?php if((isset($title) && $title == "home")||!isset($title)) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link active shadow box" href="home" style="color: #ffffff; background-color: #32748B; border-radius:5px;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activities" style="color: #ffffff;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contactus" style="color: #ffffff;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about" style="color: #ffffff;">حول</a></li><?php } ?>
                    
                    <?php if((isset($title) && $title == "postfull")) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link shadow box" href="../home" style="color: #ffffff; background-color: #32748B; border-radius:5px;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../activities" style="color: #ffffff;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../contactus" style="color: #ffffff;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../about" style="color: #ffffff;">حول</a></li><?php } ?>
                    
                    <?php if((isset($title) && $title == "activity")) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="home" style="color: #ffffff;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active shadow box" href="activities" style="color: #ffffff; background-color: #32748B; border-radius:5px;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contactus" style="color: #ffffff;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about" style="color: #ffffff;">حول</a></li><?php } ?>
                    
                    <?php if((isset($title) && $title == "activityfull")) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../home" style="color: #ffffff;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link shadow box" href="../activities" style="color: #ffffff; background-color: #32748B; border-radius:5px;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../contact" style="color: #ffffff;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../about" style="color: #ffffff;">حول</a></li><?php } ?>
                    
                    <?php if((isset($title) && $title == "contact")) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="home" style="color: #ffffff;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activities" style="color: #ffffff;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active shadow box" href="contactus" style="color: #ffffff; background-color: #32748B; border-radius:5px;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about" style="color: #ffffff;">حول</a></li><?php } ?>
                    
                    <?php if((isset($title) && $title == "about")) { ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="home" style="color: #ffffff;">الصفحة الرئيسية</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activities" style="color: #ffffff;">النشاطات</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contactus" style="color: #ffffff;">اتصل بنا</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active shadow box" href="about" style="color: #ffffff; background-color: #32748B; border-radius:5px;">حول</a></li><?php } ?>
                </ul>
            </div>
        </div>
    </nav>
