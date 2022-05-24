<?php
include '../database/configuration.php';

if(isset($_POST['save_student']))
{
    $year = $_POST['year'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $rollno = $_POST['roll_number'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    $insertsql = "INSERT INTO users (
        FirstName,LastName,Address,UserType,
        Phone,Username,Password,Email
    ) VALUES ('$firstname','$lastname','$address',
    1,'$phone','$username','$password','$email')";
    if ($conn->query($insertsql) === TRUE) {
        echo $last_id = $conn->insert_id;
     echo   $sql = "SELECT * FROM batch where Year='$year' AND Class='$class' AND Section='$section'";
        $result = mysqli_query($conn, $sql);
        //   echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            $batchid = $row['BatchID'];
            echo $batchid;
            $insertsqlbatchstudent = "INSERT INTO batchstudent (
                BatchID,UserID,RollNo) VALUES ('$batchid','$last_id','$rollno')";
            if ($conn->query($insertsqlbatchstudent) === TRUE) {
                header('location:../student.php');
            }else
            {
                echo "Error: " . $insertsqlbatchstudent . "<br>" . $conn->error;
            }

          }
        }
        else{
            echo "no data 1";
        }
    }
}