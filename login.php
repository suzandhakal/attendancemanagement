<?php 
// include 'getattendance.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Attendance Management System</title>
</head>
<body>
<div style="margin: auto;width: 90%;max-width: 700px;border:1px solid black;" class="mt-5 bg-default">
<div class="container" style="margin:10px;">
<h3 class="text-center">Attendance Management System</h3>
<h3 class="text-center">( Admin Login )</h3>
<form action="validation.php" id="login_form" method="post">
      <div class="form-group">
    <label for="user_phone">User Name</label>
    <input type="text" name="user_name" class="form-control" id="user_phone" aria-describedby="emailHelp" placeholder="Enter User Name">
      </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
<!-- 
<div style="text-align:right;">
<a href="">Forget your password ? </a>  
</div> -->
<center> <button type="submit" name="user_validation" class="btn btn-dark mt-2">Login</button> </center>
    </form>
</div>
</div>
</body>
</html>