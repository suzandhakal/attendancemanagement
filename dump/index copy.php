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

//   $sql = "SELECT * FROM Contestant";
//     $params = array();
//     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
//      $stmt = sqlsrv_query( $conn, $sql , $params, $options );

$param1 = '2022-04-04';
$param2 = '2022-04-06';
$sql = "EXEC sp_GetAttendanceStudent @BatchStudentID = 8,@FromDate='$param1',@ToDate='$param2'";;//my stored procedure

$params = array($param1,$param2);//parameters to be     passed  );
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
   //  $stmt = sqlsrv_prepare($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));
//    $stmt = sqlsrv_prepare($conn,$sql,$params)or die(print_r(sqlsrv_errors(),true));
   // $stmt = sqlsrv_prepare( $conn, $sql , $params );
    $stmt = sqlsrv_query( $conn, $sql);
   print_r($stmt);
     // if( sqlsrv_execute( $stmt))
     // {
     //       echo "Statement executed.\n";
     // }
     // else
     // {
     //       echo "Statement could not be executed.\n";
     //       die( print_r( sqlsrv_errors(), true));
     // }

   //   print_r($stmt);

   print_r(sqlsrv_fetch_array( $stmt));

   
   //   print_r($stmt);
    $row_count = sqlsrv_num_rows( $stmt );
   
     // print_r($row_count);

      //  if ($stmt === false)
      //       echo $stmt;
      //   else
      //      echo "bien";
      //   echo $row_count; 
      if ($row_count === false)
           print_r($row_count);
        else
           echo "bien";
      //   echo $row_count;

      // print_r(sqlsrv_fetch_array( $stmt));
        while( $row = sqlsrv_fetch_array( $stmt) ) {

         print_r($row);
               // print json_encode($row);
        }

?>