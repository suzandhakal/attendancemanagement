<?php
$serverName = "DESKTOP-V4FBEDG\SQLEXPRESS";
$connectionInfo = array( "Database"=>"MISDB", "UID"=>"sa", "PWD"=>"sa01");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

  $param1 = '2021-12-27';
  $param2 = '2021-12-28';
  $sql = "  EXEC sp_GetClassYearSection  ";//my stored procedure

$params = array();//parameters to be     passed  );
$options =  array( );
   //  $stmt = sqlsrv_prepare($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));
   $stmt = sqlsrv_query($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));

     if(  $stmt != false)
     {
           echo "Statement executed.\n";
     }
     else
     {
           echo "Statement could not be executed.\n";
           die( print_r( sqlsrv_errors(), true));
     }


    $row_count = sqlsrv_num_rows( $stmt );

      if ($row_count === false)
      {
          print_r($row_count);
          echo "error";

      }
        else
        {
          echo "bien";

        }

        while( $row = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {

        //  echo $row['Fullname'];
                print_r($row);
        }
        $next_result = sqlsrv_next_result($stmt);
        echo "<br>";
     
        while( $row = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {

          //  echo $row['Fullname'];
                  print_r($row);
          }
          echo "<br>";
          $next_result = sqlsrv_next_result($stmt);

          while( $row = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {

               //  echo $row['Fullname'];
                       print_r($row);
               }


?>