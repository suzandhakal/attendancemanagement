<?php
include '../database/configuration.php';

if(isset($_GET['delete']))
{
    global $conn;

    $attendancedate = $_GET['delete'];
    $sqldelete = "DELETE FROM attendance WHERE Date='$attendancedate'";
    $conn->query($sqldelete);
    $sqldeletetaken = "DELETE FROM attendancetaken WHERE Date='$attendancedate'";
    $conn->query($sqldeletetaken);
    header('location:../index.php');
}
if(isset($_POST['take_attendance']))
{
    global $conn;
    $batchid = $_POST['batchid'];
    $attendancedate = $_POST['attendance_date'];
    $sqldelete = "DELETE FROM attendance WHERE Date='$attendancedate'";
    $conn->query($sqldelete);
    foreach($_POST['batchstudentid'] as $batchstudent)
    {
                    $sql = "INSERT INTO attendance (BatchStudentID, Date)
            VALUES ('$batchstudent', '$attendancedate')";

            if ($conn->query($sql) === TRUE) {

                $sqlattendancetaken = "INSERT INTO attendancetaken (BatchID, Date)
                VALUES ('$batchid', '$attendancedate')";
    
                if ($conn->query($sqlattendancetaken) === TRUE) {
    
                } else {
                echo "Error: " . $sqlattendancetaken . "<br>" . $conn->error;
                }
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        // echo $batchstudent."<br>";

    }
    header('location:../index.php');


}