<?php
require_once 'connectdb.php';
$errors = array(); 

////////////////////////////
// LOGIN INTO AN ACCOUNT //
//////////////////////////
    if (isset($_POST['signin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (count($errors) == 0) {
      $password1 = md5($password);
        $query = "SELECT username,password FROM administrator WHERE username='$username' AND password='$password1'";
      $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        header('location: control_center.php');
        exit;
        }else {
            array_push($errors, "Wrong username or password ");
        }
     
    }
  }

?>
