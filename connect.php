<?php
    define("db_server","127.0.0.1");
    define("db_user","root");
    define("db_password","");
    define("db_name", "btl");
    $con = "";
    try{
        $con = mysqli_connect(db_server,db_user,db_password,db_name);
    }
    catch(mysqli_sql_exception){
        echo"Could not connect!";
    }
?>