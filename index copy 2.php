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


$param1 = '[2022-04-04]';
$param2 = '[2022-04-06]';
$params = array();//parameters to be     passed  );
$options =  array();
$sql = "EXEC sp_GetAttendanceStudent @BatchStudentID = 8,@FromDate=$param1,@ToDate=$param2";//my stored procedure
print_r($sql);
echo "<br>";
$stmt = sqlsrv_query( $conn, $sql, $params, $options) or die(print_r(sqlsrv_errors(),true));
if(  $stmt != false)
{
      echo "Statement executed.\n";
}
else
{
      echo "Statement could not be executed.\n";
      die( print_r( sqlsrv_errors(), true));
}

$next_result = sqlsrv_next_result($stmt);
$next_result = sqlsrv_next_result($stmt);
$next_result = sqlsrv_next_result($stmt);
$next_result = sqlsrv_next_result($stmt);
$next_result = sqlsrv_next_result($stmt);
$next_result = sqlsrv_next_result($stmt);
?>

<table border="1">
     <tr>
          <th>Date</th>
          <th>Attendance</th>
     </tr>
<?php
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
     print_r($row);
     // $date =   new DateTime($row['Date']);
     ?>
     <tr>
     <td><?php print_r($row['Date']->format('Y-m-d')); ?> </td>
          <td><?php echo $row['Attendance'] ?> </td>
     </tr>
     <?php

}
?>
</table>
<?php

// if($next_result)
// {
//      while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
//           print_r($row);
//           echo "hi";
// }
// }elseif( is_null($next_result)) {
//      echo "No more results.<br />";
// } else {
//      die(print_r(sqlsrv_errors(), true));
// }

?>