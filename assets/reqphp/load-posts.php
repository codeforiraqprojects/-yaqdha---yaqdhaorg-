<?php
require_once 'functions.php';

$postNewCount = $_POST['postNewCount'];
$row = selectMorePosts($conn,$postNewCount);?>

<div class="container" id="maincontainer">
<?php $carcount=1;
      $pst=1;
        foreach($row as $post) {?>
    <div class="row">  
        <div class="col-md-12">
            <div class="card postmain">
                <div class="card-body">
                    <h3 class="text-right d-block card-title" style="color: #32748b;"><img style="width: 60px;margin-left: 10px;" src="assets/img/yaqdha_post.png">يقظة</h3>
                    <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $post['post_date']; ?></small>
                    <div class="postr card">
                        <!-- Post Text -->
                        <p class="text-right d-block flex-grow-1 flex-shrink-1 postext"><?php echo $post['post_desc']; ?></p>
                        <!-- Carousel -->
                        <div class="carousel yaq slide" data-ride="carousel" id="carusel<?php echo $carcount; ?>">
                            <div class="carousel-inner" role="listbox">
                                    <!--  -->
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
                            <input class="form-control-md d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="20" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment-<?php echo $post['post_id'];?>" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                                <button class="btn-sm d-inline-block comsub" type="submit" id="comentsubmt" name="comentsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
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
<script>$('.yaq').carousel({interval: false})</script>