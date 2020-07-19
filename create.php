<?php

include 'includes/header.inc.php';
if(!isset($_SESSION['name'])){
  header("Location: index.php");
    exit();
  }
    
?>

    <div class="d-block bgLightBlue pb-4 pt-4">
      <section class="container bg-white card card-body shadow shadow-sm mt-5">
        <p class="font-weight-lighter text-center bg-light pb-2 h3">
          <strong>Create Post</strong>
        </p>
        <div class="py-2 text-center">
                <?php
                  if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfields'){
                        echo '<span class="alert alert-danger d-block">All the required fields must be filled</span>';
                    }
                    elseif($_GET['error'] == 'sqlerror'){
                        echo '<span class="alert alert-danger d-block">Something went wrong</span>';
                    }
                    elseif($_GET['error'] == 'wrongpwd'){
                        echo '<span class="alert alert-danger d-block">Wrong Password</span>';
                    }
                    elseif($_GET['error'] == 'exterror'){
                        echo '<span class="alert alert-danger d-block">Image must be JPG / JPEG / PNG</span>';
                    }
                    elseif($_GET['error'] == 'sizeerror'){
                        echo '<span class="alert alert-danger d-block">Image must be less than 2MB</span>';
                    }
                  }
                ?>
              </div>
        <form class="container" method="POST" action="includes/createBlog.inc.php"  enctype="multipart/form-data">
          <fieldset class="fieldset">
            <div class="form-group">
              <label class="col-md-12 control-label">Name</label>
              <div class="col-md-12">
                <input type="text" name="title" class="form-control" required />
                <small class="text-secondary"
                  >Name of the blog represents what your blog is all
                  about.
                </small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 control-label">Article</label>
              <div class="col-md-12 col-sm-9 col-xs-12">
                <textarea
                  cols="30"
                  rows="20"
                  class="form-control"
                  required
                  name="description"
                ></textarea>
                <small class="text-secondary">Write the full blog.</small>
              </div>
            </div>
            <div class="form-group px-3">
              <div class="col-md-12 mx-auto text-center pb-3">
                <div class="">
                <i class="fas fa-image text-primary"></i>
                  <label class="pr-4" for="customFile">
                    Choose image 
                  </label>  
                    <input
                    type="file"
                    class=""
                    name="image"
                    id="customFile"
                  />
                </div>
              </div>
            </div>
          </fieldset>
          <hr />
          <div class="form-group">
            <div class="text-center">
              <input
                class="btn btn-primary"
                type="submit"
                name="create-submit"
                value="Create Article"
              />
              <a href="dashboard.php" class="btn btn-outline-danger px-3 ml-2">Cancel</a>
            </div>
          </div>
        </form>
      </section>
    </div>
    <?php
    include 'includes/footer.inc.php'
?>