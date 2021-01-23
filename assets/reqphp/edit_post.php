<?php session_start();
include('connectdb.php');

if(isset($_POST['pstchange'])){

            $pstid = trim($_POST['pstid']);
            $pstid = mysqli_real_escape_string($conn, $pstid);

            $descr = trim($_POST['editpst']);
            $descr = mysqli_real_escape_string($conn, $descr);
            

            $query ="UPDATE `posts` SET  `post_desc`=' $descr' WHERE `post_id`='$pstid' ";

            
            $result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't update data " . mysqli_error($conn);
			exit;
		} else {
            $_SESSION['posts'] = "تم تعديل المنشور في القائمة الرئيسية";
            header("Location: ../../control_center.php");
        }
    }

if(isset($_POST['actchange'])){

            $actid = trim($_POST['actid']);
            $actid = mysqli_real_escape_string($conn, $actid);

            $desctr = trim($_POST['editact']);
            $desctr = mysqli_real_escape_string($conn, $desctr);
            

            $query ="UPDATE `activity` SET  `activity_desc`=' $desctr' WHERE `activity_id`='$actid' ";

            
            $result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't update data " . mysqli_error($conn);
			exit;
		} else {
            $_SESSION['posts'] = "تم تعديل المنشور في النشاطات";
            header("Location: ../../control_center.php");
        }
    } ?>