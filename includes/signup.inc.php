<?php
if(isset($_POST['signup-submit'])){
    require 'db.inc.php';

    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password1'];
    $passwordRepeat = $_POST['password2'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($name)){
        header("Location: ../signup.php?errors=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../signup.php?errors=invalidmailusername");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?errors=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?errors=invalidusername");
        exit();
    }
    elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?errors=passwordcheck");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?errors=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../signup.php?errors=usertaken");
                exit();
            }
            else{
                $sql = "INSERT INTO users (name, username, email, password,image) VALUES (?, ?, ?, ?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?errors=sqlerror");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $img = "blank.png";
                    mysqli_stmt_bind_param($stmt, "sssss",$name, $username, $email, $hashedPwd,$img);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                }
                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../signup.php");
    exit();
}