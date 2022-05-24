<?php 
include 'database/utils.php';

include 'include/layout/nav.php';

if(!isset($_SESSION['user-status'])){

    header('location:index.php');
?>


<?php
}
else
{
  if($_SESSION['user-status'] == "admin"){
    echo "you are logged in as admin";
    ?>




<form action="" method="post">

<div class="row">

    <div class="col-4">
        <label class="form-label" for=""> Select Year</label>
    <select class="form-control" name="year" id="">
    <option value="">SELECT YEAR</option>
    <?php echo getYear(); ?>
</select>
    </div>
    <div class="col-4">
        <label class="form-label" for="">Select Class</label>
    <select class="form-control" name="class" id="">
    <option value="">SELECT Class</option>
    <?php echo getClass(); ?>
</select>
</div>
<div class="col-4">
    <label class="form-label" for="">Select Section</label>
<select name="section" id="" class="form-control">
    <option value="">SELECT Section</option>
    <?php echo getSection(); ?>
</select>
</div>
<div class="col-4">
        <label class="form-label" for=""> Select Attendance Date</label>
    <input class="form-control" type="date" name="fromattendance_date" id="">

    </div>
    <div class="col-4">
        <label class="form-label" for=""> Select Attendance Date</label>
    <input class="form-control" type="date" name="toattendance_date" id="">

    </div>

<div class="col-4">

</div>

</div>
<input type="submit" value="Continue" class="btn btn-primary" name="attendance_report">
</form>

<table class="table">
    <tr>
        <th>Date</th>
        <th>Attendance</th>
        <th>Student</th>
    </tr>
    <?php 
if(isset($_POST['attendance_report']))
{
    $year = $_POST['year'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $from = $_POST['fromattendance_date'];
    $to = $_POST['toattendance_date'];


    $record = "CALL sp_GetBatchAttendance('$year','$class','$section','$from','$to')";

    $resultbatchattendance = mysqli_query($conn,$record);

while($rowbatchstudent = mysqli_fetch_assoc($resultbatchattendance)) {
    // echo print_r($rowbatchstudent);
    ?>
        <tr>
            <td><?php echo $rowbatchstudent['Date']; ?></td>
            <td><?php echo $rowbatchstudent['Attendance']; ?></td>
            <td><?php echo $rowbatchstudent['Student']; ?></td>

        </tr>
    <?php

}}
    ?>
</table>
<?php









    // include 'dailyattendance.php';

  }
  else if($_SESSION['user-status'] == "user")
  {
    echo "you are logged in as user";
  }
}
include 'include/layout/footer.php';
?>