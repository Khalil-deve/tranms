<?php
    $hostname='localhost';
    $username='root';
    $db_name='auth_db';
    $password = '';

    $connect = mysqli_connect($hostname,$username,'',$db_name);

    if(mysqli_connect_error()){
        echo "Connection failed";
    }
    else{
        // echo "Connection successful";
    }

?>