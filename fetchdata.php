<?php
include 'database/configuration.php';
if(isset($_POST['getstudent']))
{

    $year = $_POST['year'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    echo '<option value="">SELECT Section</option>';

    $sql = "SELECT * FROM batch where Year='$year' AND Class='$class' AND Section='$section'";
    $result = mysqli_query($conn, $sql);

    //   echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $batchid = $row['BatchID'];
        $sqlbatchstudent = "SELECT batchstudent.*,users.* FROM batchstudent 
        LEFT JOIN  users ON batchstudent.UserID = users.UserID
          where batchstudent.BatchID = '$batchid'";
       $resultbatchstudent = mysqli_query($conn, $sqlbatchstudent);
       while($rowbatchstudent = mysqli_fetch_assoc($resultbatchstudent)) 
       {
           // print_r($rowbatchstudent);
          echo '<option value="'.$rowbatchstudent['BatchStudentID'].'">'.$rowbatchstudent['FirstName'].' '.$rowbatchstudent['LastName'].'</option>';
       }      }
    }
}