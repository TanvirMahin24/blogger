<?php
require 'db.inc.php';
session_start();
if(isset($_POST['edit-submit'])){
    $title = $_POST['title'];
    $des = $_POST['description'];
    $oldImg = $_POST['oldImg'];
    $id = $_POST['id'];
    if(empty($title) || empty($des)){
        header("Location: ../create.php?error=emptyfields");
        exit();
    }
    else{
        if(isset($_FILES['image']) && $_FILES['image']['name']!=''){
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $tmp = explode('.',$_FILES['image']['name']);
            $file_ext=strtolower(end($tmp));
            
            $extensions= array("jpg","png","jpeg");
            
            if(in_array($file_ext,$extensions)=== false){
                header("Location: ../create.php?error=exterror");
                exit();
            }
            
            if($file_size > 2097152){
                header("Location: ../create.php?error=sizeerror");
                exit();
            }
            
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"../uploads/blog/".$file_name);
                $img = $file_name;
                unlink('../uploads/blog/'.$oldImg);
            }
         }
         else{
            $img = $oldImg;
         }
         $sql = "UPDATE blogs SET title = ?, description =?, image =? WHERE id=?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location: ../create.php?error=sqlerror");
             exit();
         }
         else{
             mysqli_stmt_bind_param($stmt, "ssss",$title, $des, $img, $id);
             mysqli_stmt_execute($stmt);
             header("Location: ../dashboard.php?blog=edited");
             exit();
             
         }
         mysqli_stmt_close($stmt);
         mysqli_close($conn);
    }
}
else{
    header("Location: ../dashboard.php");
    exit();
}