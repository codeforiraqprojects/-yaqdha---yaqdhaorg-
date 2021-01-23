<?php session_start();
require_once 'connectdb.php';

function selectAllActivities($conn){
    $row = array();
    $query = "SELECT activity.activity_id, activity.activity_desc, date_format(activity.activity_date,'%Y/%m/%d, %h:%i%p') as activity_date FROM activity ORDER BY activity.activity_date DESC";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}
function selectLatesActivities($conn){
    $row = array();
    $query = "SELECT activity.activity_id, activity.activity_desc, date_format(activity.activity_date,'%Y/%m/%d, %h:%i%p') as activity_date FROM activity ORDER BY activity.activity_date DESC LIMIT 6";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}
function selectMoreActivities($conn,$activityNewCount){
    $row = array();
    $query = "SELECT activity.activity_id, activity.activity_desc, date_format(activity.activity_date,'%Y/%m/%d, %h:%i%p') as activity_date FROM activity ORDER BY activity.activity_date DESC LIMIT $activityNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function selectAllPosts($conn){
    $row = array();
    $query = "SELECT posts.post_id, posts.post_desc, date_format(posts.post_date,'%Y/%m/%d, %h:%i%p') as post_date FROM posts ORDER BY posts.post_date DESC";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}


function selectLatesPosts($conn){
    $row = array();
    $query = "SELECT posts.post_id, posts.post_desc, date_format(posts.post_date,'%Y/%m/%d, %h:%i%p') as post_date FROM posts ORDER BY posts.post_date DESC LIMIT 5";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function selectMorePosts($conn,$postNewCount){
    $row = array();
    $query = "SELECT posts.post_id, posts.post_desc, date_format(posts.post_date,'%Y/%m/%d, %h:%i%p') as post_date FROM posts ORDER BY posts.post_date DESC LIMIT $postNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function selectActivityImgs($conn,$activityid){
    $imgs = array();
    $query = "SELECT activity_image.activity_id,activity_image.image,activity.activity_id FROM activity,activity_image WHERE activity_image.activity_id='".$activityid."' AND activity_image.activity_id = activity.activity_id";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($imgs, mysqli_fetch_assoc($result));
    }
    return $imgs;
}

function selectPostImgs($conn,$postid){
    $imgs = array();
    $query = "SELECT post_image.post_id, post_image.image, posts.post_id FROM posts, post_image WHERE post_image.post_id='".$postid."' AND post_image.post_id = posts.post_id";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($imgs, mysqli_fetch_assoc($result));
    }
    return $imgs;
}

function selectLatesComments($conn,$postid){
    $row = array();
    $query = "SELECT post_comment.post_id, post_comment.username, post_comment.comment , posts.post_id FROM posts,post_comment WHERE post_comment.post_id='".$postid."' AND post_comment.post_id=posts.post_id ORDER BY post_comment.pcomment_id DESC LIMIT 3";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function selectMoreComments($conn,$postid,$cmntNewCount){
    $row = array();
    $query = "SELECT post_comment.post_id, post_comment.username, post_comment.comment , posts.post_id FROM posts,post_comment WHERE post_comment.post_id= $postid AND post_comment.post_id=posts.post_id ORDER BY post_comment.pcomment_id DESC LIMIT $cmntNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}


function selectAllComments($conn,$postid){
    $row = array();
    $query = "SELECT post_comment.post_id, post_comment.username, post_comment.comment , posts.post_id FROM posts,post_comment WHERE post_comment.post_id= $postid AND post_comment.post_id=posts.post_id";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }

    return $row_cnt;
}

function selectLatesCount($conn,$postid){
    $row = array();
    $query = "SELECT post_comment.post_id, post_comment.username, post_comment.comment , posts.post_id FROM posts,post_comment WHERE post_comment.post_id='".$postid."' AND post_comment.post_id=posts.post_id LIMIT 3";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $row_cnt;
}
function selectMoreCount($conn,$postid,$cmntNewCount){
    $row = array();
    $query = "SELECT post_comment.post_id, post_comment.username, post_comment.comment , posts.post_id FROM posts,post_comment WHERE post_comment.post_id= $postid AND post_comment.post_id=posts.post_id LIMIT $cmntNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }

    return $row_cnt;
}
// activity Comments
function selectLatesActiveComments($conn,$activityid){
    $row = array();
    $query="SELECT activity_comment.activity_id, activity_comment.username, activity_comment.comment , activity.activity_id FROM activity,activity_comment WHERE activity_comment.activity_id='".$activityid."' AND activity_comment.activity_id = activity.activity_id ORDER BY activity_comment.acomment_id DESC LIMIT 3";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function selectMoreActiveComments($conn,$activityid,$cmntNewCount){
    $row = array();
    $query="SELECT activity_comment.activity_id, activity_comment.username, activity_comment.comment , activity.activity_id FROM activity,activity_comment WHERE activity_comment.activity_id=$activityid AND activity_comment.activity_id = activity.activity_id ORDER BY activity_comment.acomment_id DESC LIMIT $cmntNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < $row_cnt; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}
function selectAllActiveComments($conn,$activityid){
    $row = array();
    $query="SELECT activity_comment.activity_id, activity_comment.username, activity_comment.comment , activity.activity_id FROM activity,activity_comment WHERE activity_comment.activity_id=$activityid AND activity_comment.activity_id = activity.activity_id";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }

    return $row_cnt;
}
function selectLatesActiveCount($conn,$activityid){
    $row = array();
    $query="SELECT activity_comment.activity_id, activity_comment.username, activity_comment.comment , activity.activity_id FROM activity,activity_comment WHERE activity_comment.activity_id=$activityid AND activity_comment.activity_id = activity.activity_id LIMIT 3";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $row_cnt;
}
function selectMoreActiveCount($conn,$activityid,$cmntNewCount){
    $row = array();
    $query="SELECT activity_comment.activity_id, activity_comment.username, activity_comment.comment , activity.activity_id FROM activity,activity_comment WHERE activity_comment.activity_id=$activityid AND activity_comment.activity_id = activity.activity_id LIMIT $cmntNewCount";
    $result = mysqli_query($conn, $query);
    $row_cnt = mysqli_num_rows($result);

    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }

    return $row_cnt;
}
function getVisitorsCount($conn){
      
    $ses_sql = mysqli_query($conn,"SELECT`visit_cont` FROM `visitors`");
  
    $row2 = mysqli_fetch_array($ses_sql);
    
    
    return $row2['visit_cont'];
}
?>