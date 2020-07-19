<?php
session_start();
if(isset($_SESSION['name'])){
    require 'db.inc.php';
    $id = $_GET['id'];
    $sql = "UPDATE `blogs` SET `active` = '0' WHERE `blogs`.`id` =".$id.";";
    $result = mysqli_query($conn, $sql);
    
    header("Location: ../dashboard.php?blog=unpublished");
    exit();
}
else{
    header("Location: ../index.php");
    exit();
}