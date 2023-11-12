<?php
    include "db.php";
    $id = $_GET['id'];
    $sql = "DELETE from `cars` where `id` = '$id'";
    $connect -> exec($sql);
    header("location: index.php");
?>