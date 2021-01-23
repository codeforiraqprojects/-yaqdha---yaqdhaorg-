<?php
require_once 'connectdb.php';

if(isset($_POST['comentsubmt'])){ 
    $name = trim($_POST['username']);
    $name = mysqli_real_escape_string($conn, $name);
    
    $comment = trim($_POST['comment']);
    $comment = mysqli_real_escape_string($conn, $comment);

    $postid = trim($_POST['postvalue']);
    $postid = mysqli_real_escape_string($conn, $postid);


    $query = "INSERT INTO `post_comment`(`post_id`, `username`, `comment`) VALUES ('" . $postid . "','" . $name . "','" . $comment . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } 
    header('location: home');
    exit;
    }

if(isset($_POST['comentfullsubmt'])){ 
    $name = trim($_POST['username']);
    $name = mysqli_real_escape_string($conn, $name);
    
    $comment = trim($_POST['comment']);
    $comment = mysqli_real_escape_string($conn, $comment);

    $postid = trim($_POST['postvalue']);
    $postid = mysqli_real_escape_string($conn, $postid);


    $query = "INSERT INTO `post_comment`(`post_id`, `username`, `comment`) VALUES ('" . $postid . "','" . $name . "','" . $comment . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } 
    header('location: ../post/'.$postid.'');
    exit;
    }


    
if(isset($_POST['actsubmt'])){ 
    $name = trim($_POST['username']);
    $name = mysqli_real_escape_string($conn, $name);
    
    $comment = trim($_POST['comment']);
    $comment = mysqli_real_escape_string($conn, $comment);

    $activeid = trim($_POST['actvalue']);
    $activeid = mysqli_real_escape_string($conn, $activeid);


    $query = "INSERT INTO `activity_comment`(`activity_id`, `username`, `comment`) VALUES ('" . $activeid . "','" . $name . "','" . $comment . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } 
    header('location: activities');
    exit;
    }

    if(isset($_POST['actfulsubmt'])){ 
    $name = trim($_POST['username']);
    $name = mysqli_real_escape_string($conn, $name);
    
    $comment = trim($_POST['comment']);
    $comment = mysqli_real_escape_string($conn, $comment);

    $activeid = trim($_POST['actvalue']);
    $activeid = mysqli_real_escape_string($conn, $activeid);


    $query = "INSERT INTO `activity_comment`(`activity_id`, `username`, `comment`) VALUES ('" . $activeid . "','" . $name . "','" . $comment . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    } 
    header('location: ../activity/'.$activeid.'');
    exit;
    }




//     if(isset($_POST['user_comm']) && isset($_POST['user_name']) && isset($_POST['post_id']))
// {
    
//     $postid = trim($_POST['post_id']);
//     $postid = mysqli_real_escape_string($conn, $postid);

//     $name = trim($_POST['user_name']);
//     $name = mysqli_real_escape_string($conn, $name);

//     $comment = trim($_POST['user_comm']);
//     $comment = mysqli_real_escape_string($conn, $comment);


//     $query = "INSERT INTO `post_comment`(`post_id`, `username`, `comment`) VALUES ('" . $postid . "','" . $name . "','" . $comment . "')";
//     $insert = mysqli_query($conn, $query);
  
//     if(!$insert){
//         echo "Can't add new data " . mysqli_error($conn);
//         exit;
//     } 


// exit;
// }


?>