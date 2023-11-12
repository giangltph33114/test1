<?php
    $hostname = "localhost";
    $db_name = "bai_thi_thut";
    $username = "root";
    $password = "";
    try{
        $connect = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        $e->getMessage();
    }    
?>