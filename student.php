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

<form action="validation/studentvalidation.php" method="post">

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
    <label class="form-label" for="">Roll Number</label>
    <input type="text" name="roll_number" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">First Name</label>
    <input type="text" name="first_name" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">Last Name</label>
    <input type="text" name="last_name" class="form-control" id="">
</div>

<div class="col-4">
    <label class="form-label" for="">Address</label>
    <input type="text" name="address" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">Phone</label>
    <input type="text" name="phone" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">User Name</label>
    <input type="text" name="username" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">Password</label>
    <input type="text" name="password" class="form-control" id="">
</div>
<div class="col-4">
    <label class="form-label" for="">Email</label>
    <input type="text" name="email" class="form-control" id="">
</div>

</div>
<input type="submit" value="Submit" class="btn btn-primary" name="save_student">
</form>

<table class="table">
  <tr>
    <th>Full Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>UserName</th>
    <th>Email</th>
    <th>Class</th>
    <th>Section</th>
    <th>Year</th>
  </tr>

  <?php 

$sqlstudent = "SELECT users.*,batch.*
 FROM users LEFT JOIN batchstudent on users.UserID = batchstudent.UserID
 LEFT JOIN batch on batchstudent.BatchID = batch.BatchID
 WHERE UserType=1";
$result = mysqli_query($conn, $sqlstudent);

if (mysqli_num_rows($result) > 0) {

    $result = mysqli_query($conn, $sqlstudent);
    while($rowstudent = mysqli_fetch_assoc($result)) 
    {
        ?>

        <tr>
          <td><?php echo $rowstudent['FirstName']; ?></td>
          <td><?php echo $rowstudent['LastName']; ?></td>
          <td><?php echo $rowstudent['Address']; ?></td>
          <td><?php echo $rowstudent['Phone']; ?></td>
          <td><?php echo $rowstudent['Username']; ?></td>
          <td><?php echo $rowstudent['Email']; ?></td>
          <td><?php echo $rowstudent['Class']; ?></td>
          <td><?php echo $rowstudent['Section']; ?></td>
          <td><?php echo $rowstudent['Year']; ?></td>

        </tr>
<?php
    }


        
        
        // echo "<option>".$row['Section']."</option>";

  
    }

?>
</table>
<?php
    
    if(isset($_POST['attendance_continue']))
    {
        // $_POST['attendance_date'];
        $year = $_POST['year'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        echo '<form action="validation/takeattendance.php" method="post">';
        ?>
        <h3 for="">Check the absent Student</h3>
        <div class="col-4">
            <label class="form-label" for=""> Select Attendance Date</label>
        <input class="form-control" type="date" name="attendance_date" id="">
    
        </div>
        <?php
        echo getbatchID($year,$class,$section);
        echo '<input type="submit"  class="btn btn-success" name="take_attendance" value="attendance">';
        echo '</form>';
    }


    // include 'dailyattendance.php';

  }
  else if($_SESSION['user-status'] == "user")
  {
    echo "you are logged in as user";
  }
}
include 'include/layout/footer.php';
?>