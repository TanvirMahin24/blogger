<?php
session_start();
if(isset($_SESSION['name']) && isset($_GET['id'])){
    require 'db.inc.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM followers WHERE follower_id =".$_SESSION['userId']." AND user_id =".$id.";";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    header("Location: ../profile.php?id=".$id."&unfollow=success");
    exit();
}
else{
    header("Location: ../profile.php?id=".$id."&unfollow=fail");
    exit();
}