<?php
require_once 'functions.php';

$cmntNewCoun = $_POST['cmntNewCount'];
$cmntNewactivetid = $_POST['cmntNewactivetid'];
$roaw = selectMoreActiveComments($conn,$cmntNewactivetid,$cmntNewCoun);?>

<div class="comment_box" >
        <?php
        foreach($roaw as $comment) 
        {
        ?>
        <div class="comment_div text-right">
        <div class="comntavg"><img src="../assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
        <p class="comments"><?php echo $comment['comment'];?></p>	
        </div>
        <?php
        }
        ?>
        
        <?php
                            $row_cnt = selectAllActiveComments($conn, $cmntNewactivetid);
                            $more_cnt = selectMoreActiveCount($conn,$cmntNewactivetid,$cmntNewCoun);
                            if ($row_cnt>3 && $row_cnt>$more_cnt) {
                                ?>
                            <div class="text-right">
                            <button  id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>
</div>
<script>
$(document).ready(function(){
    var cmntCount = <?php echo $cmntNewCoun?>;
    var cmntactivetid = <?php echo $cmntNewactivetid?>;
    $("#morecomments").click(function(){
        cmntCount = cmntCount + 3;
        $("#comment_box").load("../assets/reqphp/load-comments-active.php", {
            cmntNewactivetid: cmntactivetid,
            cmntNewCount: cmntCount,
        });
    });
});       
</script>