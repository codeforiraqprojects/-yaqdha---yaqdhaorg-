<?php 
require_once 'assets/reqphp/functions.php';
require_once 'assets/reqphp/addcomment.php';

$title = "activityfull";
$activity = $_GET['activity'];
$query = "SELECT activity.activity_id, activity.activity_desc, date_format(activity.activity_date,'%Y/%m/%d, %h:%i%p') as activity_date FROM activity WHERE activity.activity_id = '".$activity."'";
$result = mysqli_query($conn, $query);
if(!$result){
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}

$res = mysqli_fetch_assoc($result);
if(!$res){
  echo "عذرا هذا النشاط غير متوفر";
  echo '<a href="activities">العوده للنشاطات</a>';
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
    <link rel="stylesheet" href="../assets/css/activity.css">
</head>
<body dir="rtl">
<?php require_once "assets/reqphp/navbar.php";?>

<div class="container">
        <div class="row">
            <!-- Activity -->
            <div class="col-md-12" style="margin-top: 30px;">
                <div class="card">
                    
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                    <?php 
                        $raw = selectActivityImgs($conn, $res['activity_id']);
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
                                echo '<img class="w-100 d-block imgcarfull" src="../assets/activityimg/';echo $imgs['image'];echo '" alt=""></div>';
                                $count = $count + 1;
    
                            }                  
                            ?> 
                    </div>
                    <?php if ($count>1){ ?>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <?php } ?>
                    </div>

                    <div class="card-body">
                        <h4 class="text-right card-title"><img style="width: 60px;margin-left: 10px;" src="../assets/img/yaqdha_post.png">يقظة</h4>
                        <small class="form-text text-lowercase text-muted activitydate" style="font-size: 16px;"><?php echo $res['activity_date']; ?></small>
                        <p  class="text-right card-text activitydate"><?php echo $res['activity_desc']; ?></p>
                        <div data-href="http://yaqdha-iq.epizy.com/activityfull.php?activity=<?php echo $res['activity_id']; ?>"><a class="fb-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyaqdha-iq.epizy.com%2Factivityfull.php%3Factivity%3D<?php echo $activity['activity_id']; ?>&amp;src=sdkpreparse"><i class="fab fa-facebook"></i> مشاركة</a></div>
                        <!-- Comment -->

                        <div class="comment_box" id="comment_box">
                        <?php
                        $comtraw = selectLatesActiveComments($conn, $res['activity_id']);
                        foreach($comtraw as $comment) 
                        {
                        ?>
                        <div class="comment_div text-right">
                        <div class="comntavg"><img src="../assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
                        <p class="comments"><?php echo $comment['comment'];?></p>	
                        </div>
                        <?php } ?>

                        
                        <?php
                            $row_cnt = selectAllActiveComments($conn, $res['activity_id']);
                            $ltst_cnt = selectLatesActiveCount($conn, $res['activity_id']);
                            if ($row_cnt>3 && $row_cnt>$ltst_cnt) {
                                ?>
                            <div class="text-right">
                            <button id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>        
                        </div>
                            
                            <form method="post" action="">
                            <input type="hidden" value="<?php echo $res['activity_id'];?>" name="actvalue" id="postvalue">

                            <div class="input-group mb-3 commentsdiv">
                            <!-- Username -->
                            <input class="form-control-md d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="15" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                            <button class="btn-sm d-inline-block comsub" type="submit" id="comentsubmt" name="actfulsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>


    <script>$('.carousel').carousel({interval: false})</script>
    <script>
    $(document).ready(function(){
        var cmntCount = 3;
        var cmntactivetid = <?php echo $res['activity_id'];?>;
        $("#morecomments").click(function(){
            cmntCount = cmntCount + 3;
            $("#comment_box").load("../assets/reqphp/load-comments-active.php", {
                cmntNewactivetid: cmntactivetid,
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