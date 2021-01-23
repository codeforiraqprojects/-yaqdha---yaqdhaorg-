<?php
require_once 'functions.php';


$activityNewCount = $_POST['activityNewCount'];
                       $row = selectMoreActivities($conn,$activityNewCount);?>
    <div class="container">
        <div class="row">
        
        <?php $carcount=1;
              $modalcount=1;
              $activitycount=1;
         foreach($row as $activity) { ?>
            <!-- Activity -->
        <div class="col-md-6">
            <div class="card">
                <div class="carousel slide" data-ride="carousel" id="carousel-<?php echo $carcount; ?>">
                    <div class="carousel-inner" role="listbox">
                        <?php 
                        $raw = selectActivityImgs($conn, $activity['activity_id']);
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
                                echo '<img class="w-100 d-block imgcar" src="assets/activityimg/';echo $imgs['image'];echo '" alt=""></div>';
                                $count = $count + 1;
    
                            }                           
                            ?>
                    </div>
                    <?php if ($count>1){ ?>
                    <div><a class="carousel-control-prev" href="#carousel-<?php echo $carcount; ?>" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-<?php echo $carcount; ?>" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <?php } ?>
                    </div>

                    <div class="card-body" id="activity-<?php echo $activitycount; ?>">
                        <h4 class="text-right card-title"><img style="width: 60px;margin-left: 10px;" src="assets/img/yaqdha_post.png">يقظة</h4>
                        <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $activity['activity_date']; ?></small>
                        <p  class="text-right card-text activitytext"><?php echo $activity['activity_desc']; ?></p>
                        <button class="btn more"  data-toggle="modal" data-target=".modl-<?php echo $modalcount;?>">المزيد</button>
                    </div>
                </div>
            </div>

            <!-- Large modal -->

            <div class="modal fade bd-example-modal-lg  modl-<?php echo $modalcount;?>"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Activity inside Modal-->
                <div class="card">
                    <!-- Carousel -->
                    <div class="carousel slide" data-ride="carousel" id="carosel-<?php echo $carcount; ?>">
                    <div class="carousel-inner" role="listbox">
                        <?php 
                        $raw = selectActivityImgs($conn, $activity['activity_id']);
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
                                echo '<img class="w-100 d-block imgcarmdl" src="assets/activityimg/';echo $imgs['image'];echo '" alt=""></div>';
                                $count = $count + 1;
    
                            }                           
                            ?>                        
                    </div>
                    <?php if ($count>1){ ?>
                    <div><a class="carousel-control-prev" href="#carosel-<?php echo $carcount; ?>" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
                    <a class="carousel-control-next" href="#carosel-<?php echo $carcount; ?>" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <?php } ?>
                    </div>
                    <!-- Carousel End -->
                    <!-- Card body -->
                    <div class="card-body">
                        <h4 class="text-right card-title"><img style="width: 60px;margin-left: 10px;" src="assets/img/yaqdha_post.png">يقظة</h4>
                        <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $activity['activity_date']; ?></small>
                        <p  class="text-right card-text"><?php echo $activity['activity_desc']; ?></p>
                         <!-- Comment -->

                         <div class="comment_box" id="comment_box-<?php echo $activity['activity_id'];?>">
                        <?php
                        $comtraw = selectLatesActiveComments($conn, $activity['activity_id']);
                        foreach($comtraw as $comment) 
                        {
                        ?>
                        <div class="comment_div text-right">
                        <div class="comntavg"><img src="assets/img/user.png" style="width:40px; margin:5px"><span class="name"><?php echo $comment['username'];?></span></div> 
                        <p class="comments"><?php echo $comment['comment'];?></p>	
                        </div>
                        <?php } ?>

                        
                        <?php
                            $row_cnt = selectAllActiveComments($conn, $activity['activity_id']);
                            $ltst_cnt = selectLatesActiveCount($conn, $activity['activity_id']);
                            if ($row_cnt>3 && $row_cnt>$ltst_cnt) {
                                ?>
                            <div class="text-right">
                            <button class="btn-<?php echo $activity['activity_id']; ?>" id="morecomments">عرض المزيد من التعليقات...</button>
                            </div>
                        <?php } ?>        
                        </div>

                            <form method="post" action="activity.php">
                            <input type="hidden" value="<?php echo $activity['activity_id'];?>" name="actvalue" id="postvalue">

                            <div class="input-group mb-3 commentsdiv">
                            <!-- Username -->
                            <input class="form-control-md d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="15" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment-<?php echo $activity['activity_id'];?>" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                            <button class="btn-sm d-inline-block comsub" type="submit" id="comentsubmt" name="actsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
                            </div>
                            </form>
                        <button class="btn more"  data-toggle="modal" data-target=".modl-<?php echo $modalcount;?>">رجوع</button>
                    </div>
                </div>
            
                </div>
            </div>
            </div>
            <!-- Large modal End -->

            <script>
            $(document).ready(function(){
                var cmntCount =3;
                var cmntactivetid =<?php echo $activity['activity_id'];?>;
                $(".btn-<?php echo $activity['activity_id'];?>").click(function(){
                    cmntCount = cmntCount + 3;
                    $("#comment_box-<?php echo $activity['activity_id']; ?>").load("assets/reqphp/load-comments-active-main.php", {
                        cmntNewactivetid: cmntactivetid,
                        cmntNewCount: cmntCount,
                    });
                });
            });       
            </script>

            <script>
            var textarea = document.querySelector('#comment-<?php echo $activity['activity_id'];?>');

            textarea.addEventListener('keydown', autosize);
                        
            function autosize(){
            var el = this;
            setTimeout(function(){
                el.style.cssText = 'height:auto; padding:0';
                el.style.cssText = '-moz-box-sizing:content-box';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            },0);
            }</script>

            <?php $carcount = $carcount + 1;
                  $modalcount = $modalcount + 1;
                  $activitycount = $activitycount + 1;
                   } ?>



            
        </div>
    </div>
</div>
</div>
<script>$('.carousel').carousel({interval: false})</script>


                       <!-- END -->


