<?php
    include 'includes/header.inc.php';
    if(!isset($_SESSION['name'])){
      header("Location: index.php");
      exit();
    }
    require 'includes/db.inc.php';
?>
<div class="container-fluid bgLightBlue mt-5 pb-md-4 pt-3 pb-0">
  <div class="d-block">
      <section class="container bg-white card card-body shadow shadow-sm">
        <p class="font-weight-lighter text-center bg-light py-2 mb-4 h3">
          <strong>Change Password</strong>
        </p>
        <?php
          if(isset($_GET['error'])){
						if($_GET['error'] == 'emptyfields'){
							echo '<div class=" alert alert-danger">All fields are required</div>';
                        }
						elseif($_GET['error'] == 'wrongpwd'){
							echo '<div class=" alert alert-danger">Wrong Current Password</div>';
                        }
						elseif($_GET['error'] == 'pwdmismatch'){
							echo '<div class="alert alert-danger">New Password mismatch</div>';
                        }
					}
        ?>
        <form class="container" action="includes/passwordChange.inc.php" method="POST">
          <fieldset class="fieldset pt-4 pb-2">
            <h3 class="font-weight-lighter textBlue">Password</h3>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-key pr-2"></i>Current Password</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="password" name="passwordOld" class="form-control" />
                <small class="text-secondary">Your current password</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-keyboard pr-2"></i>New Password</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" name="password1" class="form-control" />
                <small class="text-secondary">Give your new password</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-redo-alt pr-2"></i>Repeat New Password</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" name="password2" class="form-control"/>
                <small class="text-secondary">Again type your new password</small>
              </div>
            </div>
            
          </fieldset>
          <hr />
          <div class="form-group">
            <div
              class="text-center"
            >
              <input
                class="btn btn-primary"
                type="submit"
                value="Update Password"
                name="pass-submit"
              />
            </div>
          </div>
  </div>
</div>

<?php 
 include 'includes/footer.inc.php'
 ?>