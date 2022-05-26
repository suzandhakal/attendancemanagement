<?php
$serverName = "DESKTOP-V4FBEDG\SQLEXPRESS";
$connectionInfo = array( "Database"=>"MISDB", "UID"=>"sa", "PWD"=>"sa01");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}



function getAttendance($batchid,$fromdate,$todate)
{
    global $conn;
    $param1 = $fromdate;
    $param2 = $todate;
    $params = array();//parameters to be     passed  );
    $options =  array();
    $sql = "EXEC sp_GetAttendanceStudent @BatchStudentID = $batchid,@FromDate=[$param1],@ToDate=[$param2]";//my stored procedure

    $stmt = sqlsrv_query( $conn, $sql, $params, $options) or die(print_r(sqlsrv_errors(),true));
    // if(  $stmt != false)
    // {
    //       echo "Statement executed.\n";
    // }
    // else
    // {
    //       echo "Statement could not be executed.\n";
    //       die( print_r( sqlsrv_errors(), true));
    // }
    
    $next_result = sqlsrv_next_result($stmt);
    $next_result = sqlsrv_next_result($stmt);
    $next_result = sqlsrv_next_result($stmt);
    $next_result = sqlsrv_next_result($stmt);
    $next_result = sqlsrv_next_result($stmt);
    $next_result = sqlsrv_next_result($stmt);

    return $stmt;
}

function getBatchAttendance($class,$year,$section,$fromdate,$todate)
{
    global $conn;
    $param1 = $fromdate;
    $param2 = $todate;
    $params = array();//parameters to be     passed  );
    $options =  array();
    $sql = "EXEC sp_GetAttendanceGroup @Section='$section',@Class ='$class',@Year='$year',@FromDate=[$param1],@ToDate=[$param2]";//my stored procedure
    // print_r($sql);
    $stmt = sqlsrv_query( $conn, $sql, $params, $options) or die(print_r(sqlsrv_errors(),true));
    // if(  $stmt != false)
    // {
    //       echo "Statement executed.\n";
    // }
    // else
    // {
    //       echo "Statement could not be executed.\n";
    //       die( print_r( sqlsrv_errors(), true));
    // }
    
    // $next_result = sqlsrv_next_result($stmt);
    // $next_result = sqlsrv_next_result($stmt);
    // $next_result = sqlsrv_next_result($stmt);
    // $next_result = sqlsrv_next_result($stmt);
    // $next_result = sqlsrv_next_result($stmt);

    return $stmt;
}

?>

