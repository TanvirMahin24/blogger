<?php

include 'includes/header.inc.php';
require 'includes/db.inc.php';
if(!isset($_SESSION['name'])){
  header("Location: index.php");
    exit();
  }
  $sql = "SELECT * FROM blogs WHERE user_id = ".$_SESSION['userId']." ORDER BY created_at DESC LIMIT 5;";
  $result = mysqli_query($conn, $sql);
  $result_check = mysqli_num_rows($result);  
?>

<main class="bgLightBlue">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8 mt-3">
            <div class="container mt-4 mb-4">
              <div class="w-100 mb-2 text-center">
                <?php
                  if(isset($_GET['edit'])){
                    if($_GET['edit'] == 'success'){
                      echo '<span class="alert alert-success d-block">Profile Updated!</span>';
                    }
                  }
                  if(isset($_GET['error'])){
                    if($_GET['error'] == 'sqlerror'){
                      echo '<span class="alert alert-danger d-block">Something went wrong!</span>';
                    }
                  }
                  if(isset($_GET['delete'])){
                    if($_GET['delete'] == 'unauth'){
                      echo '<span class="alert alert-danger d-block">The blog you are trying to delete does not belong to you!</span>';
                    }
                  }
                  if(isset($_GET['password'])){
                    if($_GET['password'] == 'updated'){
                      echo '<span class="alert alert-success d-block">Password Updated!</span>';
                    }
                  }
                  if(isset($_GET['image'])){
                    if($_GET['image'] == 'updated'){
                      echo '<span class="alert alert-success d-block">Profile picture Updated!</span>';
                    }
                  }
                  if(isset($_GET['blog'])){
                    if($_GET['blog'] == 'success'){
                      echo '<span class="alert alert-success d-block">Blog Posted!</span>';
                    }
                    elseif($_GET['blog'] == 'unpublished'){
                      echo '<span class="alert alert-warning d-block">Blog Unpublished!</span>';
                    }
                    elseif($_GET['blog'] == 'published'){
                      echo '<span class="alert alert-success d-block">Blog Unpublished!</span>';
                    }
                    elseif($_GET['blog'] == 'edited'){
                      echo '<span class="alert alert-success d-block">Blog Edited!</span>';
                    }
                    elseif($_GET['blog'] == 'deleted'){
                      echo '<span class="alert alert-success d-block">Blog Deleted!</span>';
                    }
                  }
                ?>

                <a href="create.php" class="btn btn-lg btn-primary shadow shadow-sm">
                  <i class="fas fa-pen pr-2"></i> Write New Article
                </a>
              </div>
              <hr class="w-75 mx-auto" />
              <!--All Article-->
              <h2 class="text-center font-weight-light py-3">
                <i class="fas fa-newspaper pr-3"></i>Your Blogs
              </h2>
              <div class="container">
                <div class="row">
                <?php
                  $sql = "SELECT * FROM blogs WHERE user_id = ".$_SESSION['userId']." ORDER BY created_at DESC;";
                  $result = mysqli_query($conn, $sql);
                  $result_check = mysqli_num_rows($result);

                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <!--All post single item-->
                  <div class="col-md-6 mb-4">
                    <div
                      class="card text-left singleCardAllPost shadow shadow-sm <?php $col = $row['active'] == 1? '':'bgLightRed'; echo $col;?>" 
                    >
                      <div class="">
                        <a href="blog.php?id=<?php echo $row['id']?>">
                          <img
                            src="uploads/blog/<?php echo $row['image'] ?>"
                            class="card-img-top"
                            alt=""
                          />
                        </a>
                        <div class="pr-4 pt-4 text-right">
                          <a
                            class="dropdown-toggle"
                            href="#"
                            id="optionDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-cog"></i>
                          </a>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="optionDropdown"
                          >
                            <a class="dropdown-item" href="editBlog.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <?php
                              if($row['active'] == 1){
                                echo '<a class="dropdown-item" href="includes/unpublish.inc.php?id='.$row['id'].'">Unpublish</a>';
                              }
                              else{
                                echo '<a class="dropdown-item" href="includes/publish.inc.php?id='.$row['id'].'">Publish</a>';
                              }
                            ?>
                            
                            <a class="dropdown-item text-danger" href="includes/deleteBlog.inc.php?id=<?php echo $row['id'] ?>"
                              ><strong>Delete</strong></a
                            >
                          </div>
                        </div>
                      </div>
                      <div class="card-body mt-0 pt-0 mx-4">
                        
                        <h6 class="mb-3">
                            <a
                              class="text-center text-uppercase font-small"
                            >
                              <strong>
                              <?php 
                                if($row['active'] == 0){
                                  echo '<span class="text-danger">DRAFT</span>';
                                }
                                else{
                                  echo '<span class="text-primary">POSTED</span>';
                                }
                              ?>
                              </strong> </a
                            >
                            <a class="text-secondary font-small">
                              - <?php 
                                $time = explode(" ",$row['created_at']);
                                echo $time[0];
                              ?>
                            </a>
                          </h6>
                        <h4 class="card-title">
                          <strong><?php echo $row['title'] ?></strong>
                        </h4>
                        <hr />
                        <p class="text-secondary mb-4">
                        <?php 
                          if(strlen($row['description']) >120){
                            $des = substr($row['description'], 0, 119);
                            echo $des;
                          } else{
                            echo $row['description'];
                          } 
                        
                        ?>
                        </p>

                        <p
                          class="text-right mb-0 text-uppercase font-small spacing font-weight-bold"
                        >
                          <a href="blog.php?id=<?php echo $row['id']?>" class="textBlue"
                            >read more
                            <i
                              class="fas fa-chevron-right"
                              aria-hidden="true"
                            ></i>
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <!--All post single item END-->
                  <?php
                    }
                  }
                ?>
                
                </div>
              </div>
              <!--All Article END-->
            </div>
          </div>
          <!--Right Side Column-->
          <div class="col-md-4">
            <!--Profile details-->
            <section
              class="profileSectionRight card mb-4 text-center shadow shadow-sm mt-3"
            >
              <div class="shadow shadow-sm">
                <img
                  src="<?php echo 'uploads/profile/'.$_SESSION['image']; ?>"
                  alt="profile image"
                  class="img-fluid w-100"
                />
              </div>
              <div class="card-body">
                <a href="profile-image.php" class="btn btn-outline-primary mb-3">Change Image</a>
                <h4 class="card-title"><strong><?php echo $_SESSION['name'] ?></strong></h4>
                <?php
                if($_SESSION['job'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-briefcase pr-2"></i>'.$_SESSION['job'].';
                        </p>';
                }
                if($_SESSION['address'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-map-marker-alt pr-2"></i>'.$_SESSION['address'].';
                        </p>';
                }
                if($_SESSION['phone'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-phone pr-2"></i>'.$_SESSION['phone'].';
                        </p>';
                }
                
                ?>
                
                <p class="h6">
                  <i class="fas fa-users"></i> <strong>Followers :</strong>  100
                </p>
                <p class="h6">
                  <i class="fas fa-newspaper"></i><strong> Blogs :</strong> <?php echo $result_check ?>
                </p>

        
                <!-- Text -->
                <p class="card-text mt-3">
                <?php echo $_SESSION['bio'];?>
                </p>

                <a href="editProfile.php" class="btn btn-primary px-3"
                  ><i class="fas fa-user-cog mr-2"></i>Edit Profile</a
                >
                <a href="editPassword.php" class="btn btn-primary mt-md-2 mt-0 px-3"
                  ><i class="fas fa-wrench mr-2"></i>Change Password</a
                >
              </div>
            </section>

            <!--Latest posts-->
            <section class="section shadow shadow-sm my-3">
              <div class="card card-body pb-0">
                <p class="font-weight-bold text-center bg-light py-2 mb-4">
                  <strong>YOUR LATEST POSTS</strong>
                </p>

                <?php
                $sql = "SELECT * FROM blogs WHERE user_id = ".$_SESSION['userId']." ORDER BY created_at DESC LIMIT 5;";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);  
                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!--Single latest post-->
                <div class="single-post">
                  <div class="row p-2">
                    <div class="col-5">
                      <a href="blog.php?id=<?php echo $row['id']?>">
                        <img
                          src="uploads/blog/<?php echo $row['image'] ?>"
                          class="img-fluid rounded"
                          alt="Post image"
                        />
                      </a>
                    </div>
                    <div class="col-7">
                      <h6 class="mt-0 text-small">
                        <a href="blog.php?id=<?php echo $row['id']?>" class="titlePopulerPost">
                        <?php echo $row['title'] ?>
                        </a>
                      </h6>
                      <div class="">
                        <p class="text-small text-secondary mb-0">
                          <i
                            class="fas fa-clock font-weight-lighter textBlue50"
                          ></i>
                          <?php 
                              $time = explode(" ",$row['created_at']);
                              echo $time[0];
                            ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <!--Single latest post END-->
                <?php
                    }
                  }
                  else{
                    echo '<h4 class="text-center w-100 pb-4">No blog found!</h4>';
                  }
                ?>
              </div>
            </section>
            <!--Latest posts END-->
          </div>
        </div>
      </div>
    </main>
<?php
    include 'includes/footer.inc.php'
?>