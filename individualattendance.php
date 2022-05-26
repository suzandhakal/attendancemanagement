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
    <select class="form-control" name="year" onchange="getstudent()" id="year">
    <option value="">SELECT YEAR</option>
    <?php echo getYear(); ?>
</select>
    </div>
    <div class="col-4">
        <label class="form-label" for="">Select Class</label>
    <select class="form-control" name="class" id="class" onchange="getstudent()">
    <option value="">SELECT Class</option>
    <?php echo getClass(); ?>
</select>
</div>
<div class="col-4">
    <label class="form-label" for="">Select Section</label>
<select name="section" id="section" class="form-control" onchange="getstudent()">
    <option value="">SELECT Section</option>
    <?php echo getSection(); ?>
</select>
</div>
<div class="col-4">
    <label class="form-label" for="">Select Student</label>
<select name="batchstudentid" id="student" class="form-control" >
    <option value="">SELECT Section</option>
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
<script>
    function getstudent()
    {
        var year = document.getElementById('year').value;
        var section = document.getElementById('section').value;
        var classe = document.getElementById('class').value;
        // console.log(year);
      
        $.ajax({
            type: "POST",
            url: 'fetchdata.php',
            data: {
                getstudent: null,
                year:year,
                section:section,
                class:classe

            },
            success: function(response)
            {
                document.getElementById('student').innerHTML = response;
                    console.log(response);
           }
       });
    }
    </script>

<table class="table">
   <tr>
       <th>Date</th>
       <th>Attendance</th>
   </tr>
    <?php 
if(isset($_POST['attendance_report']))
{
    $batchstudentid = $_POST['batchstudentid'];
    $from = $_POST['fromattendance_date'];
    $to = $_POST['toattendance_date'];

    echo '<h4 class="text-center">Attendance Of ';
    echo getstudentbybatchstudentid($batchstudentid);
    echo '</h4>';
    $record = "CALL GetStudentAttendance('$batchstudentid','$from','$to')";

    $resultbatchattendance = mysqli_query($conn,$record);

while($rowbatchstudent = mysqli_fetch_assoc($resultbatchattendance)) {
   ?>
    <tr>
        <td><?php echo $rowbatchstudent['Date'] ?></td>
        <td><?php echo $rowbatchstudent['Attendance'] ?></td>
    </tr>
   <?php
        // print_r($finfo);
  
}
}
    ?>
    
   
</table>
<?php

    // include 'dailyattendance.php';

  }
  else if($_SESSION['user-status'] == "user")
  {
    echo "you are logged in as user";
?>

<form action="" method="post">

<div class="row">



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
   </tr>
    <?php 
if(isset($_POST['attendance_report']))
{
    // $batchstudentid = $_POST['batchstudentid'];
    $userid = $_SESSION['UserID'];
    echo $userid;

    $batchstudentidsql = "SELECT * from batchstudent where UserID = $userid";
    $resultbatchstudentid = mysqli_query($conn,$batchstudentidsql);
    while($rowbatchstudentid = mysqli_fetch_assoc($resultbatchstudentid)) {

        $batchstudentid = $rowbatchstudentid['BatchStudentID'];
        // echo $batchstudentid;
    }

    $from = $_POST['fromattendance_date'];
    $to = $_POST['toattendance_date'];

    echo '<h4 class="text-center">My Attendance ( '.$from.' to '.$to.' )';
    $record = "CALL GetStudentAttendance('$batchstudentid','$from','$to')";

    $resultbatchattendance = mysqli_query($conn,$record);

while($rowbatchstudent = mysqli_fetch_assoc($resultbatchattendance)) {
   ?>
    <tr>
        <td><?php echo $rowbatchstudent['Date'] ?></td>
        <td><?php echo $rowbatchstudent['Attendance'] ?></td>
    </tr>
   <?php
        // print_r($finfo);
  
}
}
    ?>
    
   
</table>
<?php
    
  }
}
include 'include/layout/footer.php';
?>