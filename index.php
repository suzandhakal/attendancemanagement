<?php 
include 'database/utils.php';

include 'include/layout/nav.php';
if(!isset($_SESSION['user-status'])){
?>
<div style="margin: auto;width: 90%;max-width: 700px;border:1px solid black;" class="mt-5 bg-default">
<div class="container" style="margin:10px;">
<h3 class="text-center">Attendance Management System</h3>
<form action="validation/loginvalidation.php" id="login_form" method="post">
      <div class="form-group">
    <label for="user_phone">User Name</label>
    <input type="text" name="user_name" class="form-control" id="user_phone" aria-describedby="emailHelp" placeholder="Enter User Name">
      </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <?php if(isset($_GET['error'])){ echo '<span style="color:red">'.$_GET['error'].'</span>';  } ?>

<center> <button type="submit" name="user_validation" class="btn btn-dark mt-2">Login</button> </center>
    </form>
</div>
</div>
<?php
}
else
{
  if($_SESSION['user-status'] == "admin"){
    echo "you are logged in as admin";

    include 'attendanceform.php';
    
if(isset($_POST['attendance_continue']))
{
    // $_POST['attendance_date'];
    $year = $_POST['year'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $attendancetakendate = $_POST['attendance_date'];
    echo '<form action="validation/takeattendance.php" method="post">';
    ?>
    <h3 for="">Check the absent Student</h3>
    <input type="hidden" name="attendance_date" value="<?php echo $attendancetakendate; ?>">
    <?php
    echo getStudentsForAttendance($year,$class,$section,$attendancetakendate);
    echo '<input type="submit"  class="btn btn-success" name="take_attendance" value="attendance">';
    echo '</form>';
}
  }
  else if($_SESSION['user-status'] == "user")
  {
    echo "you are logged in as user";
  }
}
include 'include/layout/footer.php';
?>