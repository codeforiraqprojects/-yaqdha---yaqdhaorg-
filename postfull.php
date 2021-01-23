<?php
require_once 'assets/reqphp/functions.php';
require_once 'assets/reqphp/addcomment.php';
$title = "postfull";
$posid = $_GET['post'];
$query = "SELECT posts.post_id, posts.post_desc, date_format(posts.post_date,'%Y/%m/%d, %h:%i%p') as post_date FROM posts WHERE posts.post_id = '".$posid."'";
$result = mysqli_query($conn, $query);
if(!$result){
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}

$res = mysqli_fetch_assoc($result);
if(!$res){
  echo "عذرا هذا المنشور غير متوفر";
  echo '<a href="../home">العوده للشاشه الرئيسية</a>';
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>يقظة</title>
    <link rel="shortcut icon" href="../assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/323f58b68e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>

<body dir="rtl">
<?php include_once "assets/reqphp/navbar.php";?>
    <!-- Post -->
<div class="container">
    <div class="row">  
        <div class="col-md-12">
            <div class="card postmain">
                <div class="card-body">
                    <h3 class="text-right d-block card-title" style="color: #32748b;"><img style="width: 60px;margin-left: 10px;" src="../assets/img/yaqdha_post.png">يقظة</h3>
                    <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $res['post_date']; ?></small>
                    <div class="postr card">
                        <!-- Post Text -->
                        <p class="text-right d-block flex-grow-1 flex-shrink-1 postext"><?php echo $res['post_desc']; ?></p>
                        <!-- Carousel -->
                        <div class="carousel yaq slide" data-ride="carousel" id="carusel-1">
                            <div class="carousel-inner" role="listbox">
                                    <!-- IMGS -->
                                    <?php 
                                    $raw = selectPostImgs($conn, $res['post_id']);
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
                                            echo '<img class="w-100 d-block imgcar" src="../assets/postimg/';echo $imgs['image'];echo '" alt=""></div>';
                                            $count = $count + 1;
                
                                        }                           
                                        ?> 
                                    <!--  -->
                            <!-- </div> -->
                            <?php if ($count>1){ ?>
                            <div><a class="carousel-control-prev" href="#carusel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
                            <a class="carousel-control-next" href="#carusel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                            <?php } ?>
                        </div>
                        <!-- Carousel end -->
                    </div>
                    </div>

                    <div class="comment_box" id="comment_box">
                    <div data-href="http://yaqdha-iq.epizy.com/postfull.php?post=<?php echo $res['post_id']; ?>"><a class="fb-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyaqdha-iq.epizy.com%2Fpostfull.php%3Fpost%3D<?php echo $res['post_id']; ?>&amp;src=sdkpreparse"><i class="fab fa-facebook"></i> مشاركة</a></div>
                        <?php
                        $comtraw = selectLatesComments($conn, $res['post_id']);
                        foreach($comtraw as $comment) 
                        {
                        ?>
                        <div class="comment_div text-right">
                        <div class="comntavg"><img src="../assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
                        <p class="comments"><?php echo $comment['comment'];?></p>	
                        </div>
                        <?php } ?>

                        <?php
                            $row_cnt = selectAllComments($conn, $res['post_id']);
                            $ltst_cnt = selectLatesCount($conn, $res['post_id']);
                            if ($row_cnt>3 && $row_cnt>$ltst_cnt) {
                                ?>
                            <div class="text-right">
                            <button  id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>
                        </div>

                    <!-- Comment -->
                    <form method="post" action="">
                        <input type="hidden" value="<?php echo $res['post_id'];?>" name="postvalue" id="postvalue">

                        <div class="input-group mb-3 commentsdiv">
                            <!-- Username -->
                            <input class="form-control-md d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="15" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                                <button class="btn-sm d-inline-block comsub" type="submit" id="comentsubmt" name="comentfullsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>



    <script>$('.yaq').carousel({interval: false})</script>
<script>
$(document).ready(function(){
    var cmntCount = 3;
    var cmntpostid = <?php echo $res['post_id'];?>;
    $("#morecomments").click(function(){
        cmntCount = cmntCount + 3;
        $("#comment_box").load("../assets/reqphp/load-comments.php", {
            cmntNewpostid: cmntpostid,
            cmntNewCount: cmntCount,
        });
    });
});       
</script>
<script>
var textarea = document.querySelector('.comtext');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}</script>

</body>
</html>