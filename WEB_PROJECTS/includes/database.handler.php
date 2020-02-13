<?php
    $host="localhost";
    $username="Abhinaba";
    $password="abhinaba";

    $con_obj=new mysqli($host,$username,$password);
    if($con_obj->connect_error) {
        die("cound not connect to database");
        exit();
    }
    else {
        $con_obj->select_db('abhinaba');
    }
?>
