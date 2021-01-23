<?php
session_start();
include('connectdb.php');

    $activity_id = $_GET['activity'];
    $query = "SELECT activity.activity_id FROM activity WHERE activity.activity_id='$activity_id'";

    $imgquery = "SELECT activity_image.activity_id,activity_image.image, activity.activity_id FROM activity, activity_image WHERE activity_image.activity_id='$activity_id' AND activity_image.activity_id = activity.activity_id";

    $imgres = mysqli_query($conn, $imgquery);
	if(!$imgres){
        return false;
    }
    while($raw=mysqli_fetch_array($imgres))
    {
        unlink('../activityimg/'.$raw['image']);
    }

	$activtyres = mysqli_query($conn, $query);
	if(!$activtyres){
	  echo "Can't retrieve data " . mysqli_error($conn);
	  exit;
	}
  
	$row = mysqli_fetch_assoc($activtyres);
	if(!$row){
	  echo "المنشور غير متوفر";
	  exit;
	}
    $querydel = "DELETE FROM activity WHERE activity.activity_id='$activity_id'";

	$result = mysqli_query($conn, $querydel);
	if(!$result){
		echo "خطأ في حذف المنشور " . mysqli_error($conn);
		exit;
    }
       
        $_SESSION['posts'] = "تم حذف المنشور من النشاطات";
		header("Location: ../../control_center.php");

?>