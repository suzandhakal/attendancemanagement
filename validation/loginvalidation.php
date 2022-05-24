<?php 
include '../database/configuration.php';

if(isset($_POST['user_validation']))
{
    $username =  $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users where Username = '$username' AND Password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    if($row['UserType']==0)
    {
        echo "admin";
        $_SESSION['user-status'] = "admin";
    }else{
        echo "user";
        $_SESSION['user-status'] = "user";
    }
    header('location:../index.php');

    // $_SESSION['user-login']

}
} else {
    header('location:../index.php?error=invalid username or password');
}

}else{
    header('location:../index.php');
}





?>