<?php
require_once 'assets/reqphp/functions.php';
require_once 'assets/reqphp/addpost.php';


?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>أدارة الموقع - يقظة</title>
    <link rel="shortcut icon" href="assets/img/yaqdha_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <!-- Page CSS -->
  <link rel="stylesheet" href="assets/css/control.css">
</head>


<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="assets/img/yaqdha_logo.png" style="width: 40%;" alt=""></h3>
                
                <strong><img src="assets/img/yaqdha_logo.png" style="width: 90%;" alt=""></strong>
            </div>

            <ul class="list-unstyled components nav-tabs">
                <!-- ADD -->
                <li>
                    <a href="#addpostsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle active">
                        <i class="fas fa-plus"></i>
                        أضافة
                    </a>
                    <ul class="collapse nav" role="tablist" id="addpostsubmenu">
                        <li role="presentation" style="width:100%;">
                            <a href="#addmain" aria-controls="1" role="tab" data-toggle="tab"><i class="fas fa-plus"></i> في الصفحة الرئيسية</a>
                        </li>
                        <li role="presentation" style="width:100%;">
                            <a href="#addactivity" aria-controls="2" role="tab" data-toggle="tab"><i class="fas fa-chart-line"></i> في النشاطات</a>
                        </li>
                    </ul>
                </li>
                <!-- Edit -->
                <li>
                    <a href="#editpostsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-edit"></i>
                        تعديل
                    </a>
                    <ul class="collapse nav" role="tablist" id="editpostsubmenu">
                        <li role="presentation" style="width:100%;">
                            <a href="#editmain" aria-controls="1" role="tab" data-toggle="tab"><i class="fas fa-plus"></i> في الصفحة الرئيسية</a>
                        </li>
                        <li role="presentation" style="width:100%;">
                            <a href="#editactivity" aria-controls="2" role="tab" data-toggle="tab"><i class="fas fa-chart-line"></i> في النشاطات</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php $vcount = getVisitorsCount($conn)?>
            <h5 class="text-center">عدد الزوار الموقع: <?php echo $vcount; ?></h5>

        </nav>

        <!-- Page Content  -->
        <?php
                    if(!isset($_SESSION['username'])){
                        header("location:login.php");
                        die();
                     }
                    $user_check = $_SESSION['username'];
                      
                    $ses_sql = mysqli_query($conn,"select username from administrator where username = '$user_check' ");
                  
                    $row2 = mysqli_fetch_array($ses_sql);
                    
                    $login_session = $row2['username'];
                    ?>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-justify"></i>
                    </button>


                    <!-- Default dropleft button -->
                    <div class="btn-group ">
                    <button type="button" class="btn btn-secondary username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-user"></i> <?php echo $login_session;?></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="assets/reqphp/logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i> تسجيل خروج
                        </a>
                    </div>
                    </div>

                </div>
            </nav>
            <?php 
                if (isset($_SESSION['posts'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['posts']."</div>";
                unset ($_SESSION['posts']);}

                if (isset($_SESSION['activity'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['activity']."</div>";
                unset ($_SESSION['activity']);}
                ?>
            <div class="tab-content">
        
            <!-- Add to the main page -->
            <div role="tabpanel" class="tab-pane active" id="addmain">
                <div>
                    <div class="container">
                    <form action="control_center.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="addstitle text-right">اضافة الى الصفحه الرئيسية</h3>
                                <textarea class="text-right border rounded border-light shadow-sm form-control-lg" style="width: 100%;height: 150px;" name="mainpost" placeholder="اكتب المنشور هنا" required="" minlength="3" maxlength="1055"></textarea>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-block"><label for="imges">اضافة صور:</label><input id="imges" class="border rounded border-light shadow-sm" type="file" name="postimages[]" multiple="" accept="image/*" style="width: 100%;">
                            <small>ينصح ان تكون ابعاد الصور (٤*۳)</small>
                        </div>
                            <button class="btn btn-outline-success d-block" type="submit" name="mainadd" style="width: 15%;margin: 20px 0 0 10px;">نشر</button>
                            
                        </div>
                       </form> 
                    </div>
                </div>
            </div>
            <!-- Add to the activity page -->
            <div role="tabpanel" class="tab-pane" id="addactivity">
                <div>
                    <div class="container">
                    <form action="control_center.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="addstitle text-right">اضافة الى النشاطات</h3>
                                <textarea class="text-right border rounded border-light shadow-sm form-control-lg" style="width: 100%;height: 150px;" name="activitypost" placeholder="اكتب المنشور هنا" required="" minlength="3" maxlength="1055"></textarea></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-block"><label for="imges">اضافة صور:</label><input id="imges" class="border rounded border-light shadow-sm" type="file" name="activityimages[]" multiple="" accept="image/*" style="width: 100%;">
                            <small>ينصح ان تكون ابعاد الصور (٤*۳)</small>
                            </div>
                            <button class="btn btn-outline-success d-block" type="submit" name="activityadd" style="width: 15%;margin: 20px 0 0 10px;">نشر</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- edit from the main page -->
            <div role="tabpanel" class="tab-pane" id="editmain">
                <!--  -->
                <?php   $row = selectAllPosts($conn);?>
                    <div class="container">
                    <?php $carcount=1;
                     $pst=1;
                      foreach($row as $post) {?>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="card postmain">
                                    <div class="card-body">
                                        <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $post['post_date']; ?></small>
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
                                </div> 
                            </div>
                                                                        <!-- Edit delete -->
                                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-outline-success btns" data-toggle="modal" data-target=".modl<?php echo $carcount; ?>"><i class="fas fa-edit"></i> تعديل</button>
                                                                        <a class="btn btn-outline-danger btns" href='assets/reqphp/post_delete.php?post=<?php echo $post['post_id']; ?>' role="button"><i class="fas fa-trash"></i> حذف</a>
                                            </div>
                        </div>
                    </div>

                                            <!-- Large modal -->

                                            <div class="modal fade bd-example-modal-lg modl<?php echo $carcount; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <h3 class="addstitle text-right"style="margin:5px 10px 5px 5px;">:تعديل المنشور</h3>

                                                    <form method="post" action="assets/reqphp/edit_post.php" enctype="multipart/form-data">
                                                    <input name="pstid" value="<?php echo $post['post_id']; ?>" type="hidden">
                                                    <textarea class="text-right border rounded border-light shadow-sm form-control-lg" style="width: 100%;height: 350px;" name="editpst" placeholder="اكتب المنشور هنا" required="" minlength="3" maxlength="1055"><?php echo $post['post_desc']; ?></textarea>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                        <button type="submit" name="pstchange" class="btn btn-primary">حفظ التغييرات</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>

                    <?php $carcount = $carcount + 1; } ?>
                    </div>
                <!--  -->
            </div>


            <!-- edit from the activity page -->
            <div role="tabpanel" class="tab-pane" id="editactivity">
                <!-- beta -->
                <?php   $row = selectAllActivities($conn);?>
                    <div class="container">
                        <div class="row">
                        
                        <?php $carcount=1;
                            $activitycount=1;
                        foreach($row as $activity) { ?>
                            <!-- Activity -->
                            <div class="col-md-12">
                                <div class="card postmain">
                                    
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
                                        <small class="form-text text-lowercase text-muted" style="font-size: 16px;"><?php echo $activity['activity_date']; ?></small>
                                        <p  class="text-right card-text postext"><?php echo $activity['activity_desc']; ?></p>
                                    </div>
                                </div>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-success btnp" data-toggle="modal" data-target=".mdl<?php echo $carcount; ?>"><i class="fas fa-edit"></i> تعديل</button>
                            <a class="btn btn-outline-danger btnp" href='assets/reqphp/activity_delete.php?activity=<?php echo $activity['activity_id']; ?>' role="button"><i class="fas fa-trash"></i> حذف</a>
                        </div>
                        <div class="modal fade bd-example-modal-lg mdl<?php echo $carcount; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <h3 class="addstitle text-right"style="margin:5px 10px 5px 5px;">:تعديل المنشور</h3>
                                <form method="post" action="assets/reqphp/edit_post.php" enctype="multipart/form-data">
                                <input name="actid" value="<?php echo $activity['activity_id']; ?>" type="hidden">
                                <textarea class="text-right border rounded border-light shadow-sm form-control-lg" style="width: 100%;height: 350px;" name="editact" placeholder="اكتب المنشور هنا" required="" minlength="3" maxlength="1055"><?php echo $activity['activity_desc']; ?></textarea>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                    <button type="submit" name="actchange" class="btn btn-primary">حفظ التغييرات</button>
                                </div>
                            </form>
                        </div>
                        </div>
                        </div>

                            <?php $carcount = $carcount + 1;
                                $activitycount = $activitycount + 1;
                                
                                } 
                                ?>
                        </div>
                    </div>
                </div>
                </div>
                                <!-- beta -->    
                                <div role="tabpanel" class="tab-pane" id="editactivity">
                            </div>                             
            </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
