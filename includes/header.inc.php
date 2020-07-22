<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <script
      src="https://kit.fontawesome.com/dfff6eb483.js"
      crossorigin="anonymous"
    ></script>
    <title>DevLogger</title>
  </head>

  <body class="homepage2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
      <a class="navbar-brand text-primary" href="index.php"><span class="fas fa-code"></span> DevLogger</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon text-dark"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php 
          if(isset($_SESSION['name'])){
            echo '<li class="nav-item active">
                    <a class="nav-link" href="dashboard.php"><span class="fas fa-user-circle pr-2"></span>'.$_SESSION['name'].'</a>
                  </li>';
          }
          ?>
          
        </ul>
        <?php
          if(isset($_SESSION['name'])){
            echo '<a href="includes/logout.inc.php" class="btn btn-outline-danger mx-md-1 px-md-4 px-5"
                    ><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>';
          }
          else{
            echo '
            <a href="login.php" class="btn btn-primary mx-md-1 px-md-4 px-5"
              ><i class="fas fa-sign-in-alt pr-2"></i>Login</a>
            <a href="./signup.php" class="btn btn-primary mx-md-1 px-md-4 px-5"
              ><i class="fas fa-user-plus pr-2"></i>Signup</a>';
          }

        ?>
        
      </div>
    </nav>