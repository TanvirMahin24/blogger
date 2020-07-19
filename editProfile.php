
<?php
    include 'includes/header.inc.php';
    if(!isset($_SESSION['name'])){
      header("Location: index.php");
      exit();
    }
    require 'includes/db.inc.php';
    $sql = "SELECT * FROM users WHERE id =". $_SESSION['userId'].";";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    }
?>
<div class="container-fluid bgLightBlue mt-5 pb-md-4 pt-3 pb-0">
<div class="d-block">
      <section class="container bg-white card card-body shadow shadow-sm">
        <p class="font-weight-lighter text-center bg-light py-2 mb-4 h3">
          <strong>Edit Profile</strong>
        </p>
        <?php
          if(isset($_GET['errors'])){
						if($_GET['errors'] == 'usertaken'){
							echo '<div class="alert alert-danger text-center">The email address is used by another user. Try different one</div>';
                        }
						elseif($_GET['errors'] == 'sqlerror'){
							echo '<div class="alert alert-danger text-center">Something went wrong</div>';
                        }
						elseif($_GET['errors'] == 'invalidusername'){
							echo '<div class="alert alert-danger text-center">Username is invalid</div>';
                        }
						elseif($_GET['errors'] == 'invalidemail'){
							echo '<div class="alert alert-danger text-center">Email is invalid</div>';
                        }
						
					}
        ?>
        <form class="container" action="includes/editProfile.inc.php" method="POST">
          <fieldset class="fieldset">
            <h3 class="font-weight-lighter textBlue">Personal Info</h3>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                >Full Name</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" required class="form-control" name="name" value="<?php echo $data['name']?>" name="name"/>
                <small class="text-secondary"
                  >Your name will be visible publically with your article.
                </small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                >Job</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" name="job" class="form-control" value="<?php echo $data['job']?>" />
                <small class="text-secondary"
                  >Example: Student at RUET
                </small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                >Bio</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <textarea
                  name="bio"
                  cols="30"
                  rows="5"
                  class="form-control"
                >
                <?php echo $data['bio']?>
                </textarea>
                <small class="text-secondary"
                  >Describe brifly about yourself</small
                >
              </div>
            </div>
          </fieldset>
          <fieldset class="fieldset pt-4 pb-2">
            <h3 class="font-weight-lighter textBlue">Contact Info</h3>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-phone pr-2"></i>Phone</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']?>" />
                <small class="text-secondary">Your personal phone number.</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-envelope pr-2"></i>Email</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="email" required name="email" class="form-control" value="<?php echo $data['email']?>" />
                <small class="text-secondary">Your Email address</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-file-signature pr-2"></i>Username</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" required name="username" class="form-control" value="<?php echo $data['username']?>" />
                <small class="text-secondary">Your username</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-3 col-xs-12 control-label"
                ><i class="fas fa-map-marker-alt pr-2"></i>Address</label
              >
              <div class="col-md-12 col-sm-9 col-xs-12">
                <input type="text" name="address" class="form-control" value="<?php echo $data['address']?>" />
                <small class="text-secondary">Your Address</small>
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
                value="Update Profile"
                name="editProfile-submit"
              />
            </div>
          </div>
        </form>
      </section>
    </div>
</div>

<?php 
 include 'includes/footer.inc.php'
 ?>