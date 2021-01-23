<?php
// require_once 'connectdb.php';

if(isset($_POST['mainadd'])){ 
    $descr = trim($_POST['mainpost']);
    $descr = mysqli_real_escape_string($conn, $descr);


    $query = "INSERT INTO posts (post_desc) VALUES ('" . $descr . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } else {
        $fileCount = count($_FILES['postimages']['name']);
        for ($j=0; $j < $fileCount ; $j++) { 

    if(!empty($_FILES["postimages"]["name"][$j]) && $_FILES["postimages"]["size"][$j] > 0 )
    {


    $lastid="SELECT `post_id` FROM `posts` WHERE `post_id`=last_insert_id()";
    $ses_sql = mysqli_query($conn,$lastid);
    $row = mysqli_fetch_array($ses_sql);
    $lastpstid=$row['post_id'];
    $fileCount = count($_FILES['postimages']['name']);

 
    for($i=0;$i<$fileCount;$i++)
    {
        $ext = pathinfo($_FILES['postimages']['name'][$i], PATHINFO_EXTENSION);
        $fileName =  date('His') . uniqid() .'.'. $ext ;
        $queryimg = "INSERT INTO `post_image` (`post_id`,`image`) VALUES ('". $lastpstid."','" . $fileName . "')";
        if(!mysqli_query($conn, $queryimg))
        {}else{
        move_uploaded_file ($_FILES['postimages']['tmp_name'][$i],'assets/postimg/'.$fileName);
        }
    }

    }
    else
    {echo "";}
}


        $_SESSION['posts'] = "تم اضافة المنشور الى القائمة الرئيسية";
        header('location: control_center.php');
        exit;
    }
}

if(isset($_POST['activityadd'])){ 
    $descr = trim($_POST['activitypost']);
    $descr = mysqli_real_escape_string($conn, $descr);


    $query = "INSERT INTO activity (activity_desc) VALUES ('" . $descr . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } else {
    
    $fileCount = count($_FILES['activityimages']['name']);
    for ($j=0; $j < $fileCount ; $j++) { 
        if(!empty($_FILES["activityimages"]["name"][$j]) && $_FILES["activityimages"]["size"][$j] > 0) {
    $lastid="SELECT `activity_id` FROM `activity` WHERE `activity_id`=last_insert_id()";
    $ses_sql = mysqli_query($conn,$lastid);
    $row = mysqli_fetch_array($ses_sql);
    $lastpstid=$row['activity_id'];
    $fileCount = count($_FILES['activityimages']['name']);


    for($i=0;$i<$fileCount;$i++)
    {
        $ext = pathinfo($_FILES['activityimages']['name'][$i], PATHINFO_EXTENSION);
        $fileName =  date('His') . uniqid() .'.'. $ext ;
        $queryimg = "INSERT INTO `activity_image` (`activity_id`,`image`) VALUES ('". $lastpstid."','" . $fileName . "')";
        if(!mysqli_query($conn, $queryimg))
        {}else{
        move_uploaded_file ($_FILES['activityimages']['tmp_name'][$i],'assets/activityimg/'.$fileName);
        }
    }
}

else
{echo "";}

    }


        $_SESSION['activity'] = "تم اضافة المنشور الى النشاطات";
        header('location: control_center.php');
        exit;
    }
}






?>
