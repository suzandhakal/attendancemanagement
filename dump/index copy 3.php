<?php include 'getattendance.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <title>Document</title>
</head>
<body>
<!-- nav bar started-->
<div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">MIS</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Student Attendance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="batchattendance.php">Batch Attendance</a>
                </li>
      
              </ul>
              <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                                  </ul>
              </form>
            </div>
          </div>
        </nav>
        </div>
<!-- nav bar ended-->



<form action="" method="post">
               <div class="row">

               <?php

  $sql = "  EXEC sp_GetClassYearSection  ";//my stored procedure

$params = array();//parameters to be     passed  );
$options =  array( );
   $stmtclasssection = sqlsrv_query($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));

     if(  $stmtclasssection != false)
     {
     }
     else
     {
           echo "Statement could not be executed.\n";
           die( print_r( sqlsrv_errors(), true));
     }


    $row_count = sqlsrv_num_rows( $stmtclasssection );

      if ($row_count === false)
      {

      }
        else
        {
          echo "bien";

        }
?>
    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <div class="help-block with-errors"></div>
                            <label for="name" class="form-control-label">Select Class</label> 
                              <select class="form-control" name="class" id="">
<?php
        while( $row = sqlsrv_fetch_array( $stmtclasssection,SQLSRV_FETCH_ASSOC) ) {

          echo $row['Class'];
?>             
<option value="<?php echo $row['Class'] ?>"><?php echo  $row['Class'] ?></option>    
          <?php
        }
        ?>
    </select>
                         </div>
                    </div>
        <?php
        $next_result = sqlsrv_next_result($stmtclasssection);
        ?>
        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <div class="help-block with-errors"></div>   
                                <label for="name" class="form-control-label">Select Year</label> 

                                  <select class="form-control" name="year" id="">
    <?php
            while( $row = sqlsrv_fetch_array( $stmtclasssection,SQLSRV_FETCH_ASSOC) ) {
    
              echo $row['Year'];
    ?>             
    <option value="<?php echo $row['Year'] ?>"><?php echo  $row['Year'] ?></option>    
              <?php
            }
            ?>
        </select>
                             </div>
                        </div>
            <?php
          $next_result = sqlsrv_next_result($stmtclasssection);

          ?>
          <div class="col-md-3">
                              <div class="form-group has-feedback">
                                  <div class="help-block with-errors"></div>   
                                  <label for="name" class="form-control-label">Select Section</label> 

                                    <select class="form-control" name="section" id="">
      <?php
              while( $row = sqlsrv_fetch_array( $stmtclasssection,SQLSRV_FETCH_ASSOC) ) {
      
                echo $row['Section'];
      ?>             
      <option value="<?php echo $row['Section'] ?>"><?php echo  $row['Section'] ?></option>    
                <?php
              }
              ?>
          </select>
                               </div>
                          </div>
              <?php

?>
                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <div class="help-block with-errors"></div>   
                            <label for="name" class="form-control-label"> </label> <br>
                              <input type="submit" value="Get Student" name="getstudent" class="btn btn-primary">
                         </div>
                    </div>
          </div>

          </form>



          <form action="" method="post">
              <div class="row">
                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <div class="help-block with-errors"></div>   
                            <label for="name" class="form-control-label">Select Student</label>
                              <select name="studentbatch_id" class="form-control" id="" required>

                              <?php

if(isset($_POST['getstudent']))
{

    echo $class = $_POST['class'];
    echo $year = $_POST['year'];
    echo $section = $_POST['section'];
     
$sql = "  EXEC sp_BatchStudent  @Class = '$class',@Year='$year',@Section='$section'";//my stored procedure

$params = array();//parameters to be     passed  );
$options =  array( );
$studentsresult = sqlsrv_query($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));

if(  $studentsresult != false)  { }
else
{
     echo "Statement could not be executed.\n";
     die( print_r( sqlsrv_errors(), true));
}

$row_count = sqlsrv_num_rows( $studentsresult );

if ($row_count === false)
{} else   {    echo "bien"; }

while( $row = sqlsrv_fetch_array( $studentsresult,SQLSRV_FETCH_ASSOC) ) {
?>
     <option value="<?php echo $row['BatchStudentID'] ?>"> <?php echo  '( '.$row['RollNo'].' ) '.$row['FirstName'].' '.$row['LastName']?></option>
     <!-- print_r($row); -->
<?php
   }

}

?>

                              </select>

                            <!-- <input type="text" class="form-control" name="batch_id" placeholder="Enter Batch ID" required> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <div class="help-block with-errors"></div>   
                            <label for="name" class="form-control-label">From Date</label> 
                            <input type="date" class="form-control" name="fromdate" placeholder="Enter Bank Address" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <div class="help-block with-errors"></div>   
                            <label for="name" class="form-control-label">To Date</label> 
                            <input type="date" class="form-control" name="todate" placeholder="Enter Bank Address" required>
                        </div>
                    </div>
                   
                </div>   
                
                            <input type="submit"  class="btn btn-primary" name="search" value="search">
</form>
<h3 class="text-center">Attendance of  <?php if(isset($_POST['search'])){ echo $_POST['studentbatch_id']; } ?></h3>
 
<table class="table">
     <tr>
               <th>Date</th>
               <th>Attendance</th>
     </tr>

               <?php 

                    if(isset($_POST['search']))
                    {
                         $batchid = $_POST['studentbatch_id'];
                         $fromdate = $_POST['fromdate'];
                         $todate = $_POST['todate'];
                         

                        $stmt =  getAttendance($batchid,$fromdate,$todate);

                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
?>
   <tr>
     <td><?php print_r($row['Date']->format('Y-m-d')); ?> </td>
          <td><?php echo $row['Attendance'] ?> </td>
     </tr>
<?php
                        }

                    }


                    ?>
 </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>