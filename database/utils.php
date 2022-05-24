<?php
include 'configuration.php';

function getYear()
{
    global $conn;
    $sql = "SELECT * FROM year";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
            
            echo "<option>".$row['Year']."</option>";
    
            }
        }
}

function getClass()
{
    global $conn;
    $sql = "SELECT * FROM class";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
            
            echo "<option>".$row['Class']."</option>";
    
            }
        }
}

function getSection()
{
    global $conn;
    $sql = "SELECT * FROM section";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
            
            echo "<option>".$row['Section']."</option>";
    
            }
        }
}

function getbatchID($year,$class,$section){
  global $conn;
    $sql = "SELECT * FROM batch where Year='$year' AND Class='$class' AND Section='$section'";
    $result = mysqli_query($conn, $sql);
      echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $batchid = $row['BatchID'];
        return $batchid;
      }
    }
}


function getStudentsForAttendance($year,$class,$section)
{
    global $conn;
    $sql = "SELECT * FROM batch where Year='$year' AND Class='$class' AND Section='$section'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {

         $batchid = $row['BatchID'];
         echo "<input type='hidden' name='batchid' value='".$batchid."'>";
        $sqlbatchstudent = "SELECT batchstudent.*,users.* FROM batchstudent 
         LEFT JOIN  users ON batchstudent.UserID = users.UserID
           where batchstudent.BatchID = '$batchid'";
        $resultbatchstudent = mysqli_query($conn, $sqlbatchstudent);
        while($rowbatchstudent = mysqli_fetch_assoc($resultbatchstudent)) 
        {
            // print_r($rowbatchstudent);
           echo '<input type="checkbox" class="form-check-input" value="'.$rowbatchstudent['BatchStudentID'].'" name="batchstudentid[]">'.'( '.$rowbatchstudent['RollNo']. ' )'.$rowbatchstudent['FirstName'].$rowbatchstudent['LastName'].
           '<br>';
        }


            
            
            // echo "<option>".$row['Section']."</option>";
    
            }
        }
}

?>