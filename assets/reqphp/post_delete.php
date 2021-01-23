<?php
session_start();
include('connectdb.php');

	$post_id = $_GET['post'];
	$query = "SELECT posts.post_id FROM posts WHERE posts.post_id = '$post_id'";

	$imgquery = "SELECT post_image.post_id, post_image.image, posts.post_id FROM posts, post_image WHERE post_image.post_id='$post_id' AND post_image.post_id = posts.post_id";

    $imgres = mysqli_query($conn, $imgquery);
	if(!$imgres){
        return false;
    }
    while($raw=mysqli_fetch_array($imgres))
    {
        unlink('../postimg/'.$raw['image']);
    }


	$postres = mysqli_query($conn, $query);
	if(!$postres){
	  echo "Can't retrieve data " . mysqli_error($conn);
	  exit;
	}
  
	$row = mysqli_fetch_assoc($postres);
	if(!$row){
	  echo "المنشور غير متوفر";
	  exit;
	}
    $querydel = "DELETE FROM posts WHERE posts.post_id= '$post_id'";

	$result = mysqli_query($conn, $querydel);
	if(!$result){
		echo "خطأ في حذف المنشور " . mysqli_error($conn);
		exit;
    }
        
        $_SESSION['posts'] = "تم حذف المنشور من القائمة الرئيسية";
		header("Location: ../../control_center.php");

?>