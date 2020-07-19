<?php
    include 'includes/header.inc.php';
    if(isset($_SESSION['name'])){
      header("Location: index.php");
      exit();
    }
?>
    <div class="container-fluid h-100 signUpTreeImageFix">
      <div class="row bgLightBlue">
        <div class="col-md-6 d-flex align-items-end height100 order2">
          <img
            src="img/loginImg.svg"
            alt="Tree swing image"
            style="transform :scale(-1,1);"
            class="w-100"
          />
        </div>
        <div class="offset-md-1 col-md-4 signUpContent mt-5 order1">
          <div class="card mt-5">
            <div class="card-body shadow rounded">
              <h2 class="text-center textBlue">Login</h2>
              <hr class="w-50 mx-auto bgLightBlue" />
              <div class="py-2 text-center">
                <?php
                  if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfields'){
                        echo '<span class="alert alert-danger">All the fields must be filled</span>';
                    }
                    elseif($_GET['error'] == 'nouser'){
                        echo '<span class="alert alert-danger">Email or Username invalid</span>';
                    }
                    elseif($_GET['error'] == 'wrongpwd'){
                        echo '<span class="alert alert-danger d-block">Wrong Password</span>';
                    }
                  }
                ?>
              </div>
              <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                  <label for="email">
                    <i class="fas fa-envelope textBlue"></i> Email or Username
                  </label>
                  <input type="text" name="emailOrUser" class="form-control" id="email" required/>
                </div>
                <div class="form-group">
                  <label for="password">
                    <i class="fas fa-lock textBlue"></i> Password
                  </label>
                  <input type="text" class="form-control" name="password" id="password" required/>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input
                    type="submit"
                    value="Login Now"
                    class="btn btn-primary w-50"
                    name="login-submit"
                  />
                </div>
              </form>
              <hr>
              <h6 class="text-center pb-3">
                Don't have an account. <a href="./Sign up.html">Sign Up now</a>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  include 'includes/footer.inc.php'
?>