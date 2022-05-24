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
                              <select class="form-control" name="class" id="" required>
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

                                  <select class="form-control" name="year" id="" required>
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

          </div>

             <div class="row">
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
<h3 class="text-center">Attendance of  <?php if(isset($_POST['search'])){ echo $_POST['year'].' '.$_POST['class'].' '.$_POST['section']; } ?></h3>
 
<table class="table">
     
<tr>
               <?php 

                    if(isset($_POST['search']))
                    {
                      $class = $_POST['class'];
                      $year = $_POST['year'];
                      $section = $_POST['section'];
                         $fromdate = $_POST['fromdate'];
                         $todate = $_POST['todate'];
                         

                        $stmtbatchattendance =  getBatchAttendance($class,$year,$section,$fromdate,$todate);

                        foreach( sqlsrv_field_metadata( $stmtbatchattendance ) as $fieldMetadata ) {
                          foreach( $fieldMetadata as $name => $value) {
                            ?>
                            <th><?php echo $value ?></th>
                            <?php
                             break;
                          }
                      }
?>

              
     </tr>
<?php
                         $numFields = sqlsrv_num_fields( $stmtbatchattendance );
                        while( sqlsrv_fetch( $stmtbatchattendance )) { ?>
                        <tr>
                        <?php
                          for($i = 0; $i < $numFields; $i++) { ?>
                          <td><?php echo sqlsrv_get_field($stmtbatchattendance, $i).""; ?></td>
                          <?php          
                          }

?>
</tr>
<?php }


                        while( $row = sqlsrv_fetch_array( $stmtbatchattendance, SQLSRV_FETCH_ASSOC) ) {
                          // print_r($row);

                        }

                    }


                    ?>
 </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>