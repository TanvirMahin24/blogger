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
            src="img/signupImg.svg"
            alt="Tree swing image"
            style="transform :scale(-1,1);"
            class="w-100"
          />
        </div>
        <div class="offset-md-1 col-md-4 signUpContent mt-5 order1">
        <div class="card my-4">
            <div class="card-body shadow rounded">
              <h2 class="text-center textBlue">Create Account</h2>
              
              <hr class="w-50 mx-auto bgLightBlue" />
              <div class="py-2 text-center">
                <?php
                  if(isset($_GET['errors'])){
                    if($_GET['errors'] == 'emptyfields'){
                        echo '<span class="alert alert-danger">All the fields must be filled</span>';
                    }
                    elseif($_GET['errors'] == 'invalidmailusername'){
                        echo '<span class="alert alert-danger">Email and Username invalid</span>';
                    }
                    elseif($_GET['errors'] == 'invalidemail'){
                        echo '<span class="alert alert-danger">Email invalid</span>';
                    }
                    elseif($_GET['errors'] == 'invalidusername'){
                        echo '<span class="alert alert-danger">Username invalid</span>';
                    }
                    elseif($_GET['errors'] == 'passwordcheck'){
                        echo '<span class="alert alert-danger">Password Mismatch</span>';
                    }
                    elseif($_GET['errors'] == 'usertaken'){
                        echo '<span class="alert alert-danger">Email already exist in our database</span>';
                    }
                  }
                ?>
              </div>
              <form action="includes/signup.inc.php" method="POST">
                <div class="form-group">
                  <label for="name">
                    <i class="fas fa-user textBlue"></i> Name
                  </label>
                  <input type="text" class="form-control" name="name" id="name" required/>
                </div>
                <div class="form-group">
                  <label for="username">
                    <i class="fas fa-user textBlue"></i> Username
                  </label>
                  <input type="text" class="form-control" name="username" id="username" required/>
                </div>
                <div class="form-group">
                  <label for="email">
                    <i class="fas fa-envelope textBlue"></i> Email
                  </label>
                  <input type="text" class="form-control" name="email" id="email" required/>
                </div>
                <div class="form-group">
                  <label for="password">
                    <i class="fas fa-lock textBlue"></i> Password
                  </label>
                  <input type="text" class="form-control" name="password1" id="password" required/>
                </div>
                <div class="form-group">
                  <label for="password2">
                    <i class="fas fa-lock textBlue"></i> Retype Password
                  </label>
                  <input type="text" class="form-control" name="password2" id="password2" required/>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input
                    type="submit"
                    value="Sign Up"
                    name="signup-submit"
                    class="btn btn-primary w-50"
                  />
                </div>
              </form>
              <hr />
              <h6 class="text-center py-1">
                Already have an account. <a href="./Login.html">Login now</a>
              </h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  include 'includes/footer.inc.php'
?>