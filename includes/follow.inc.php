<?php
session_start();
if(isset($_SESSION['name']) && isset($_GET['id'])){
    require 'db.inc.php';
    $id = $_GET['id'];
    $sql = "INSERT INTO followers (follower_id, user_id) VALUES (".$_SESSION['userId'].", ".$id.");";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    header("Location: ../profile.php?id=".$id."&follow=success");
    exit();
}
else{
    header("Location: ../profile.php?id=".$id."&unfollow=fail");
    exit();
}