<?php
if(isset($_POST['editProfile-submit'])){
    require 'db.inc.php';
    session_start();

    $name = $_POST['name'];
    $job = $_POST['job'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if(empty($username) || empty($email) ||  empty($name)){
        header("Location: ../editProfile.php?errors=emptyfields");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) && !preg_match("/^[a-zA-Z]*$/",$name)) {
        header("Location: ../editProfile.php?errors=invalidmailusername");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../editProfile.php?errors=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../editProfile.php?errors=invalidusername");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=? AND id !=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editProfile.php?errors=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../editProfile.php?errors=usertaken");
                exit();
            }
            else{
                $sql = "UPDATE `users` SET `name`= ?,`username`= ?,`email`=?,`phone`=?,`address`=?,`job`=?,`bio`=? WHERE id = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../editProfile.php?errors=sqlerror");
                    exit();
                }
                else{

                    mysqli_stmt_bind_param($stmt, "ssssssss",$name, $username, $email, $phone ,$address,$job,$bio,$_SESSION['userId']);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    $_SESSION['job'] = $job;
                    $_SESSION['address'] = $address;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['bio'] = $bio;
                    header("Location: ../dashboard.php?edit=success");
                    exit();
                }    
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../editProfile.php");
    exit();
}