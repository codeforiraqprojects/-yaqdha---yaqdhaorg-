<?php
require_once 'assets/reqphp/functions.php';
require_once 'assets/reqphp/addcomment.php';
$title = "activity";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>النشاطات - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/323f58b68e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/activity.css">
</head>

<body dir="rtl">
<a id="top"></a>
<?php require_once "assets/reqphp/navbar.php";?>
<!-- Activity -->
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form  method="post" class="form-inline">
                    <input type="text" name="search_text" id="search_text" aria-label="Search" class="searchbar" placeholder="أبحث هنا">
                </form>
            </div>
        </div>
    </div>
    <div id="contbox" class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="list-group serchres" id="result">
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="latest">احدث النشاطات</h4>
            </div>
        </div>
    </div>
</div>
<?php   $row = selectLatesActivities($conn);?>
    <div class="container" id="maincontainer">
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
                        <small class="form-text text-lowercase text-muted activitydate" style="font-size: 16px;"><?php echo $activity['activity_date']; ?></small>
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
                    <div><a class="carousel-control-prev" href="#carosel-<?php echo $carcount; ?>" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carosel-<?php echo $carcount; ?>" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <?php } ?>
                    </div>
                    <!-- Carousel End -->
                    <!-- Card body -->
                    <div class="card-body">
                        <h4 class="text-right card-title"><img style="width: 60px;margin-left: 10px;" src="assets/img/yaqdha_post.png">يقظة</h4>
                        <small class="form-text text-lowercase text-muted activitydate" style="font-size: 16px;"><?php echo $activity['activity_date']; ?></small>
                        <p  class="text-right card-text activitydate"><?php echo $activity['activity_desc']; ?></p>
                        <div data-href="http://yaqdha-iq.epizy.com/activityfull.php?activity=<?php echo $activity['activity_id']; ?>"><a class="fb-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyaqdha-iq.epizy.com%2Factivityfull.php%3Factivity%3D<?php echo $activity['activity_id']; ?>&amp;src=sdkpreparse"><i class="fab fa-facebook"></i> مشاركة</a></div>
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
                            <input class="form-control-sm d-block comname" type="text" id="username" name="username" placeholder="أسمك" required="" minlength="3" maxlength="15" autocomplete="off">
                            <!-- Comment Text -->
                            <textarea class="form-control-sm flex-grow-1 comtext" type="text" id="comment-<?php echo $activity['activity_id'];?>" name="comment" placeholder="أضف تعليق" required="" minlength="1" maxlength="255" rows="14" cols="10"  autocomplete="off"></textarea>
                            <!-- Comment Submit -->
                            <button class="btn-sm comsub" type="submit" id="comentsubmt" name="actsubmt"><i class="fas fa-comment-medical"></i> نشر</button>
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
                   
                   } 
                   $activitycount = $activitycount - 1;
                   ?>



            
        </div>
    </div>
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
</div>

    <script>$('.carousel').carousel({interval: false})</script>
    <script>
          $(document).ready(function(){
            load_data();
            function load_data(query)
            {
              $.ajax({
                url:"assets/reqphp/search.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#result').html(data);
                }
              });
            }
            
            $('#search_text').keyup(function(){
              var search = $(this).val();
              if(search != '')
              {
                load_data(search);
              }
              else
              {
                load_data();
              }
            });
          });
      </script>
<script>
$(document).ready(function(){
    var activtyCount = 6;
    $("#loadmore").click(function(){
        activtyCount = activtyCount + 2;
        $("#maincontainer").load("assets/reqphp/load-activities.php", {
            activityNewCount: activtyCount,
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
