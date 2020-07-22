<?php
    if(isset($_POST['comment-submit'])){
        require 'db.inc.php';
        session_start();
        $comment = $_POST['comment'];
        $userId = $_SESSION['userId'];
        $blogId = $_POST['blogId'];
        $sql = "INSERT INTO comments (comment, blog_id, user_id) VALUES (?, ?, ?)";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location: ../blog.php?error=sqlerror&id=".$blogId);
             exit();
         }
         else{
             mysqli_stmt_bind_param($stmt, "sii",$comment, $blogId, $userId);
             mysqli_stmt_execute($stmt);
             header("Location: ../blog.php?comment=success&id=".$blogId);
             exit();
         }
         mysqli_stmt_close($stmt);
         mysqli_close($conn);
    }