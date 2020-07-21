<?php
require 'db.inc.php';
session_start();
if(!isset($_GET['id'])){
    header("Location: ../dashboard.php");
    exit();
}
$sql = "SELECT * FROM blogs WHERE id = ".$_GET['id']." LIMIT 1;";
$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result); 
$row = mysqli_fetch_assoc($result);
$imgToDelete = $row['image'];
if($row['user_id'] != $_SESSION['userId']){
    header("Location: ../dashboard.php?delete=unauth");
    exit();
}
else{
    
    $sql2 = "DELETE FROM blogs WHERE id = ".$_GET['id'].";";
    $result2 = mysqli_query($conn, $sql2);
    if($result2 > 0){
        unlink('../uploads/blog/'.$imgToDelete);
        header("Location: ../dashboard.php?blog=deleted");
        exit();
    }else{
        header("Location: ../dashboard.php?error=sqlerror");
        exit();
    }
}