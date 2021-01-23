<?php session_start();
    include_once('assets/reqphp/connectdb.php');
    $title = "about";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>حول - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/about.css">
</head>

<body dir="rtl">
<?php require_once "assets/reqphp/navbar.php";?>
  
    <div>
        <div class="container text-center d-flex d-lg-flex d-xl-flex align-items-center align-content-center align-self-center flex-nowrap justify-content-sm-center align-items-sm-center align-content-sm-center align-self-sm-center flex-sm-nowrap justify-content-md-center align-items-md-center align-content-md-center align-self-md-center flex-md-nowrap justify-content-lg-center align-items-lg-center align-content-lg-center align-self-lg-center flex-lg-nowrap justify-content-xl-center align-items-xl-center align-content-xl-center align-self-xl-center flex-xl-nowrap"
            style="margin-top: 50px;">
            <div class="row">
                <div class="col-sm-12 pils">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"  role="tab" aria-controls="nav-home" aria-selected="true" id="nav-home-tab" href="#nav-home">يقظة Yaqdha</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-profile-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false" href="#nav-profile">مطورو الموقع</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" role="tab" aria-controls="nav-contact" aria-selected="false" href="#nav-contact">C4i</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="tab-content" id="nav-tabContent">
        <!-- يقظه -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 align-self-center"><img class="yaqdhabout" src="assets/img/yaqdha_x1.png"></div>
                        <div class="col-md-10 boxy">
                            <h2 class="text-center">YAQDHA</h2>
                            <strong class="q1">"</strong>
                            <p class="text-center">
                                مجموعةٌ شبابية اختلفنا في أعمارنا واتفقنا في أفكارنا فتوحدت <br> أهدافنا وأردنا غرس الخير ونشر المعرفة.<br>
                                الرؤية<br>
                                صناعةُ مجتمعٍ مُبادر...<br>
                                الرسالة<br>
                                تمكين المجتمع بأشخاصه... <br>
                                الأهداف<br>
                                خدمة البلد وتمكين المجتمع<br>
                                تعزيز روح المبادرة لدى الشباب وتفعيل دورهم<br>
                                السعي إلى إعادة هيكلة وتطوير المنظومة التعليمية في البلد<br>
                                توفير المساعدات الطبية للمحتاجين وتعزيز الوعي الصحي لدى المجتمع<br>
                                تقريب القاعدة الشعبية من منظمات المجتمع المدني الفاعلة والمؤثرة بشكل واضح.<br>
                                إكساب أعضاء الفريق والقائمين عليه القدرة على إدارة وتنظيم الأعمال، ونسعى لنشر هذه الثقافة في المجتمع<br>
                            </p>
                                <strong class="q2">"</strong>

                        </div>
                    </div>
                </div>
        </div>
        <!-- فريق العمل -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="team-boxed">
                <div class="container">
                    <div class="row text-monospace text-center d-flex flex-fill justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center people">
                        <div class="col-md-6 col-lg-4 item">
                            <div class="team-memb"><img class="rounded-circle" src="assets/img/ella.jpg">
                                <h3 class="name">Hala Hazim<br>Abbood</h3>
                                <p class="title">Project Manager</p>
                                <div class="social"><a target="_blank" href="https://www.facebook.com/hala.hazem.731"><i class="fa fa-facebook"></i></a><a target="_blank" href="https://twitter.com/hala5hazem"><i class="fa fa-twitter"></i></a><a target="_blank" href="https://instagram.com/prog_hala"><i class="fa fa-instagram"></i></a><a target="_blank" href="http://www.linkedin.com/in/hala-hazem-02b5b5125"><i class="fa fa-linkedin"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="team-memb"><img class="rounded-circle" src="assets/img/zayn_n97.jpg">
                                <h3 class="name">Zayn Al-abdeen<br>Raheem</h3>
                                <p class="title">Programmer</p>
                                <div class="social"><a target="_blank" href="https://www.facebook.com/zayn.lachin"><i class="fa fa-facebook"></i></a><a target="_blank" href="https://twitter.com/zayn_n97"><i class="fa fa-twitter"></i></a><a target="_blank" href="http://instagram.com/zayn_n97"><i class="fa fa-instagram"></i></a><a target="_blank" href="https://www.linkedin.com/in/zayn-al-khafaji-575193b8/"><i class="fa fa-linkedin"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- عن المبادرة -->
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 text-justify c4ibox">
                            <h2 class="text-center">CODE FOR IRAQ</h2>
                            <strong class="q3">"</strong>
                            <p>وهي مبادرة إنسانية غير ربحية تهدف الى خدمة المجتمع عن طريق البرمجة، تعتبر هذه المبادرة مبادرة تعليمية حقيقية ترعى المهتمين بتعلم تصميم وبرمجة تطبيقات الهاتف الجوال ومواقع الانترنت وبرامج الحاسوب والشبكات والاتصالات ونظم تشغيل الحاسوب
                                باستخدام التقنيات مفتوحة المصدر كما توفر لهم جميع الدروس التعليمية الازمة وبشكل مجاني تماما بل الاهم من ذلك تعتمد على مبدا المواطنة والمشاركة الفاعلة في تأسيس وبناء المجتمع تدعو هذه المبادرة جميع الطلبة والخريجين والهواة والاساتذة
                                الجامعيين والمهتمين مجال البرمجة وتقنيات المعلومات وكذلك الاختصاصات الأخرى السب التطوع والمشاركة الفعلية لأجل الاتقاء بواقع البلد, حيث تعتبر فرضة عظيمة اكتساب الخبرة والمهارة عن طريق تصميم وتنفيذ برامج وتطبيقات خدمية من شأنها خدمة
                                المواطن وذلك ضمن مجاميع عمل نشطة وفعالة يتعاون فيها جميع الافراد كفريق واحد تبادل الآراء والخبرات ويطرح الافكار ليتم مناقشتها وتطبيقها على أرض الواقع, كما تفتح المجال لجميع المواطنين العراقيين ومن جميع الاختصاصات الى المشاركة الفاعلة
                                في هذه المشاريع لرفد الفريق بالخبرات والأفكار والآراء والمقترحات التي من شأنها خدمة المجتمع بأفضل ما يمكن. </p>
                                <strong class="q4">"</strong>

                        </div>
                        <div class="col-md-4 align-self-center"><a target="_blank" href="https://www.facebook.com/Code4Iraq"><img class="c4i" src="assets/img/codeiq.png" ></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>