<?php
$serverName = "DESKTOP-V4FBEDG\SQLEXPRESS";
$connectionInfo = array( "Database"=>"MISDB", "UID"=>"sa", "PWD"=>"sa01");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

if(isset($_POST['user_validation'])){
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    // echo $username ."<br>".$password;
    checkValidation($username,$password);
}






function checkValidation($username,$password)
{
    global $conn;
    $params = array();//parameters to be     passed  );
    $options =  array();
    $sql = "EXEC spLoginCheck @UserName = $username,@Password=$password";//my stored procedure

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
    // while( $row = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {
    
    //     print_r($row);

    // }

    $numFields = sqlsrv_num_fields( $stmt );
    while( sqlsrv_fetch( $stmt )) { 

     if(sqlsrv_get_field($stmt,0) == "Success"){
         echo "loggedin";
     }else{
         echo "loggedinfail";
     }

 }

    return $stmt;
}
?>