<?php
require_once 'functions.php';

$cmntNewCoun = $_POST['cmntNewCount'];
$cmntNewpostid = $_POST['cmntNewpostid'];
$roaw = selectMoreComments($conn,$cmntNewpostid,$cmntNewCoun);?>

<div class="comment_box1" id="comment_box-<?php echo $cmntNewpostid; ?>" >
    <div data-href="http://yaqdha-iq.epizy.com/postfull.php?post=<?php echo $cmntNewpostid; ?>"><a class="fb-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyaqdha-iq.epizy.com%2Fpostfull.php%3Fpost%3D<?php echo $cmntNewpostid; ?>&amp;src=sdkpreparse"><i class="fab fa-facebook"></i> مشاركة</a></div>
        <?php
        foreach($roaw as $comment) 
        {
        ?>
        <div class="comment_div text-right">
        <div class="comntavg"><img src="assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
        <p class="comments"><?php echo $comment['comment'];?></p>	
        </div>
        <?php
        }
        ?>
        
        <?php
                            $row_cnt = selectAllComments($conn, $cmntNewpostid);
                            $more_cnt = selectMoreCount($conn,$cmntNewpostid,$cmntNewCoun);
                            if ($row_cnt>3 && $row_cnt>$more_cnt) {
                                ?>
                            <div class="text-right">
                            <button class="btn-<?php echo $cmntNewpostid;?>"  id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>
</div>
<script>
$(document).ready(function(){
    var cmntCount = <?php echo $cmntNewCoun?>;
    var cmntpostid = <?php echo $cmntNewpostid?>;
    $(".btn-<?php echo $cmntNewpostid;?>").click(function(){
        cmntCount = cmntCount + 3;
        $("#comment_box-<?php echo $cmntNewpostid; ?>").load("assets/reqphp/load-comments-main.php", {
            cmntNewpostid: cmntpostid,
            cmntNewCount: cmntCount,
        });
    });
});       
</script>