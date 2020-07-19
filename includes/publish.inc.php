<?php
session_start();
if(isset($_SESSION['name'])){
    require 'db.inc.php';
    $id = $_GET['id'];
    $sql = "UPDATE `blogs` SET `active` = '1' WHERE `blogs`.`id` =".$id.";";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    header("Location: ../dashboard.php?blog=published");
    exit();

}
else{
    header("Location: ../index.php");
    exit();
}