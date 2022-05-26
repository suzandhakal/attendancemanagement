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
        $_SESSION['user-status'] = "admin";
        $_SESSION['name'] = $row['FirstName'];
        $_SESSION['UserID'] = $row['UserID'];
    }else{
        $_SESSION['user-status'] = "user";
        $_SESSION['name'] = $row['FirstName'];
        $_SESSION['UserID'] = $row['UserID'];

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