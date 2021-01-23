<?php
require_once 'assets/reqphp/functions.php';
require_once 'assets/reqphp/addcomment.php';
$title = "home";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>الصفحة الرئيسية - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/323f58b68e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body dir="rtl">
<a id="top"></a>

<?php include_once "assets/reqphp/navbar.php";?>

<!-- Slidshow -->
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/carspin_1.jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/carspin_2.jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/carspin_3.jpg" alt="Slide Image"></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>

    </div>
    <!-- Post -->
<?php   $row = selectLatesPosts($conn);?>
<div class="container" id="maincontainer">
<?php $carcount=1;
      $pst=1;
        foreach($row as $post) { ?>
    <div class="row">  
        <div class="col-md-12">
            <div class="card postmain">
                <div class="card-body">
                    <h3 class="text-right d-block card-title" style="color: #32748b;"><img style="width: 60px;margin-left: 10px;" src="assets/img/yaqdha_post.png">يقظة</h3>
                    <small class="form-text text-lowercase text-muted postdate" style="font-size: 16px;"><?php echo $post['post_date']; ?></small>
                    <div class="postr card">
                        <!-- Post Text -->
                        <p class="text-right d-block flex-grow-1 flex-shrink-1 postext"><?php echo $post['post_desc']; ?></p>
                        <!-- Carousel -->
                        <div class="carousel yaq slide" data-ride="carousel" id="carusel<?php echo $carcount; ?>">
                            <div class="carousel-inner" role="listbox">
                                    <!-- IMGS -->
                                    <?php 
                                    $raw = selectPostImgs($conn, $post['post_id']);
                                        $count=0;
                                        foreach($raw as $imgs) { 

                                            if($count == 0)
                                            {
                                                echo '<div class="carousel-item active">';
                                            }
                                            else
                                            {
                                                echo '<div class="carousel-item">';
                                            }
                                            echo '<img class="w-100 d-block imgcar" src="assets/postimg/';echo $imgs['image'];echo '" alt=""></div>';
                                            $count = $count + 1;
                
                                        }                           
                                        ?> 
                                    <!--  -->
                            <!-- </div> -->
                            <?php if ($count>1){ ?>
                            <div><a class="carousel-control-prev" href="#carusel<?php echo $carcount; ?>" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
                            <a class="carousel-control-next" href="#carusel<?php echo $carcount; ?>" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                            <?php } ?>
                        </div>
                        <!-- Carousel end -->
                    </div>
                    </div>
                    <div class="comment_box" id="comment_box-<?php echo $post['post_id'];?>">
                    <div data-href="http://yaqdha-iq.epizy.com/postfull.php?post=<?php echo $post['post_id']; ?>"><a class="fb-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyaqdha-iq.epizy.com%2Fpostfull.php%3Fpost%3D<?php echo $post['post_id']; ?>&amp;src=sdkpreparse"><i class="fab fa-facebook"></i> مشاركة</a></div>
                        <?php
                        $comtraw = selectLatesComments($conn, $post['post_id']);
                        foreach($comtraw as $comment) 
                        {
                        ?>
                        <div class="comment_div text-right">
                        <div class="comntavg"><img src="assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
                        <p class="comments"><?php echo $comment['comment'];?></p>	
                        </div>
                        <?php } ?>

                        
                        <?php
                            $row_cnt = selectAllComments($conn, $post['post_id']);
                            $ltst_cnt = selectLatesCount($conn, $post['post_id']);
                            if ($row_cnt>3 && $row_cnt>$ltst_cnt) {
                                ?>
                            <div class="text-right">
                            <button class="btn-<?php echo $post['post_id'];?>" id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>        
                        </div>

                    <!-- Comment -->
                    <form method="post" action="index.php">
                        <input type="hidden" value="<?php echo $post['post_id'];?>" name="postvalue" id="postvalue">

                        <div class="input-group mb-3 commentsdiv">
                            <!-- Username -->
                            <input class="form-control-md d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="15" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment-<?php echo $post['post_id'];?>" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                                <button class="btn-sm comsub" type="submit" id="comentsubmt" name="comentsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    var cmntCount =3;
    var cmntpostid =<?php echo $post['post_id'];?>;
    $(".btn-<?php echo $post['post_id'];?>").click(function(){
        cmntCount = cmntCount + 3;
        $("#comment_box-<?php echo $post['post_id'];?>").load("assets/reqphp/load-comments-main.php", {
            cmntNewpostid: cmntpostid,
            cmntNewCount: cmntCount,
        });
    });
});       
</script>

<script>
var textarea = document.querySelector('#comment-<?php echo $post['post_id'];?>');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}</script>

<?php $carcount = $carcount + 1; } ?>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="loadmore" class="latest">عرض المزيد ...</button>
            </div>
        </div>
    </div>
</div>



    <script>$('.yaq').carousel({interval: false})</script>

<script>
$(document).ready(function(){
    var postCount = 5;
    $("#loadmore").click(function(){
        postCount = postCount + 2;
        $("#maincontainer").load("assets/reqphp/load-posts.php", {
            postNewCount: postCount,
        });
    });
});       
</script>

<script>
    var btn = $('#top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>

</body>
</html>