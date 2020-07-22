<?php
session_start();
if(isset($_SESSION['name']) && isset($_GET['id'])){
    require 'db.inc.php';
    $id = $_GET['id'];
    if(isset($_GET['p'])){
        $page = $_GET['p'];
        if(isset($_GET['pid'])){
            $pid = '?id='.$_GET['pid'];
        }
        else{
            $pid = '';
        }
    }
    else{
        $page = 'index';
    }
    $sql = "INSERT INTO dislikes (user_id, blog_id) VALUES (".$_SESSION['userId'].", ".$id.");";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);
    
    header("Location: ../".$page.".php".$pid);
    exit();
}
else{
    header("Location: ../login.php?auth=fail");
    exit();
}