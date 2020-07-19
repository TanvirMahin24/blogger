<?php

if(isset($_POST['pass-submit'])){
    require 'db.inc.php';
    session_start();

    $oldPass = $_POST['passwordOld'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    $email = $_SESSION['email'];

    if(empty($oldPass) || empty($password) || empty($password2)){
        header("Location: ../editPassword.php?error=emptyfields");
        exit();
    }
    else{
        
        $sql = "SELECT * FROM users where email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editPassword.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($oldPass, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../editPassword.php?error=wrongpwd");
                    exit();
                }
                elseif($pwdCheck == true){
                    if($password == $password2){
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE `users` SET `password` = ? WHERE `users`.`email` = ?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../editPassword.php?error=sqlerror");
                            exit();
                        }
                        mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $email);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../dashboard.php?password=updated");
                    }
                    else{
                        header("Location: ../editPassword.php?error=pwdmismatch");
                        exit();
                    }
                }
                else{
                    header("Location: ../editPassword.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: ../editPassword.php?error=nouser");
                exit();
            }
        }
    }
}