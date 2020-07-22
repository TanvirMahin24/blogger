<?php
    include 'includes/header.inc.php';
    require 'includes/db.inc.php';
?>
    <!--Header-->
    <div
      class="container-fluid homepageHeaderSection bgLightBlue pt-md-5 pb-md-4 pt-5 pb-0"
    >
      <div
        class="row py-md-5 py-0 shadow shadow-sm bg-light text-md-left text-center"
      >
        <div class="col-md-5 my-auto px-md-5 p-3 pb-md-5">
          <h1 class="textBlue appTitle pl-md-5 px-3">
            <span class="d-md-block d-none">Welcome to</span> DevLogger.com
          </h1>
          <h3 class="pl-md-5 px-3">Know the unknowns</h3>
          <p class="lead pl-md-5 p-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi
            rerum excepturi quae explicabo eligendi itaque, sit non voluptate
            aliquam aut.
          </p>
          <div class="ml-md-5 mx-auto z-top">
            <a href="signup.php" class="btn btn-primary px-4">Sign Up</a>
            <a href="login.php" class="btn btn-primary ml-md-3 px-4">Login Now</a>
          </div>
        </div>
        <div class="col-md-7 h-100 headerImg">
          <img
            src="img/landingpageMainImage.png"
            alt="landing image"
            class="img-fluid"
          />
        </div>
      </div>
    </div>
    <!--Header END-->
    <main class="bgLightBlue pt-3">
      <div class="container">
        <div class="row">
        <div class="col-md-8 mt-3">
            <div class="container mt-4 mb-4">
              <!--All Blog-->
              <h2 class="text-center font-weight-light pb-3">
                <i class="fas fa-newspaper pr-3"></i>Blogs
              </h2>
              <div class="container">
                <div class="row">
                <?php
                  $sql = "SELECT * FROM blogs WHERE active = 1 ORDER BY created_at;";
                  $result = mysqli_query($conn, $sql);
                  $result_check = mysqli_num_rows($result);

                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <!--All blog single item-->
                  <div class="col-md-6 mb-4">
                    <div
                      class="card text-left singleCardAllPost shadow shadow-sm"
                    >
                      <div class="img-profile">
                        <a href="blog.php?id=<?php echo $row['id']?>">
                          <img
                            src="uploads/blog/<?php echo $row['image']?>"
                            class="card-img-top imgBlog"
                            alt=""
                          />
                        </a>
                        
                      </div>
                      <div class="card-body mt-0 pt-0 mx-4">
                        <?php
                          $sql = "SELECT * FROM users WHERE id =".$row['user_id']." LIMIT 1;";
                          $result2 = mysqli_query($conn, $sql);
                          $user = mysqli_fetch_assoc($result2);
                        ?>
                        
                        <h6 class="mb-2 pt-4">
                          <a
                            class="text-center text-uppercase font-small text-primary" href="profile.php?id=<?php echo $user['id']; ?>"
                          >
                            <strong class="pt-3"><?php echo $user['name']; ?></strong> </a
                          >
                          <a class="text-secondary font-small">
                            <i class="fas fa-clock pl-2"></i> <?php 
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
                          //Like query
                          $sqlLike = "SELECT * FROM likes WHERE blog_id =".$row['id'].";";
                          $resultLike = mysqli_query($conn, $sqlLike);
                          $result_checkLike = mysqli_num_rows($resultLike);
                          $liked = 'secondary';
                          if( $result_checkLike > 0 ){
                            while ($rowLike = mysqli_fetch_assoc($resultLike)) {
                              if(isset($_SESSION['userId']) && $rowLike['user_id'] == $_SESSION['userId']){
                                $liked = 'danger';
                              }
                            }
                          }
                        ?>
                        </p>

                        <div class="row">
                        <div class="col-6">
                            <h5>
                              <a href="includes/<?php if($liked == 'danger'){echo 'dislike';}else{echo 'like';}?>.inc.php?id=<?php echo $row['id']?>" class="text-<?php echo $liked;?>">
                                <span class="fas fa-heart">
                                </span>  
                              </a>
                              <?php if($result_checkLike > 0){ echo $result_checkLike;}?>
                              <span class="pl-2">
                                <i class="fas fa-comments pr-1"></i>
                                <?php
                                  //Like query
                                  $sqlCmnt = "SELECT * FROM comments WHERE blog_id =".$row['id'].";";
                                  $resultCmnt = mysqli_query($conn, $sqlCmnt);
                                  $result_checkCmnt = mysqli_num_rows($resultCmnt);
                                  echo $result_checkCmnt ;
                                ?>
                              </span>
                            </h5>
                          </div>
                          <div class="col-6 my-auto">
                            <p
                              class="text-right mb-0 text-uppercase font-small font-weight-bold fontLinkFix"
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
                    </div>
                  </div>
                  <!--All blog single item END-->
                  <?php
                    }
                  }
                ?>
                
                </div>
              </div>
              <!--All blog END-->
            </div>
          </div>
          <div class="col-md-4">
            <!--Latest blog-->
            <section class="section shadow shadow-sm my-3">
              <div class="card card-body pb-0">
                <p class="font-weight-bold text-center bg-light py-2 mb-4">
                  <strong>LATEST BLOGS</strong>
                </p>
                <?php
                  $sqlLatestBlogs = "SELECT * FROM blogs WHERE active = 1 ORDER BY created_at DESC LIMIT 5;";
                  $resultLatestBlogs = mysqli_query($conn, $sqlLatestBlogs);
                  $result_checkLatestBlogs = mysqli_num_rows($resultLatestBlogs);

                  if( $result_checkLatestBlogs > 0 ){
                    while ($latestBlog = mysqli_fetch_assoc($resultLatestBlogs)) {
                ?>
                <!--Single populer post-->
                <div class="single-post">
                  <div class="row p-2">
                    <div class="col-5">
                      <a href="blog.php?id=<?php echo $latestBlog['id']?>">
                        <img
                          src="uploads/blog/<?php echo $latestBlog['image']?>"
                          class="img-fluid rounded"
                          alt="Post image"
                        />
                      </a>
                    </div>
                    <div class="col-7">
                      <h6 class="mt-0 text-small">
                        <a href="blog.php?id=<?php echo $latestBlog['id']?>" class="titlePopulerPost">
                          <?php echo $latestBlog['title']?>
                        </a>
                      </h6>
                      <div class="">
                        <p class="text-small text-secondary mb-0">
                          <i
                            class="fas fa-clock font-weight-lighter textBlue50"
                          ></i>
                            <?php 
                              $timelatest = explode(" ",$latestBlog['created_at']);
                              echo $timelatest[0];
                            ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <!--Single populer post END-->
                <?php
                    }
                  }
                ?>
              </div>
            </section>
            <!--Popular posts END-->
            <!--Latest users-->
            <section class="section shadow shadow-sm my-3">
              <div class="card card-body pb-0">
                <p class="font-weight-bold text-center bg-light py-2 mb-4">
                  <strong>LATEST USERS</strong>
                </p>
                <?php
                  $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 7;";
                  $result = mysqli_query($conn, $sql);
                  $result_check = mysqli_num_rows($result);

                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!--Single latest user-->
                <div class="single-post">
                  <div class="row p-2">
                    <div class="col-5">
                      <a href="profile.php?id=<?php echo $row['id']?>">
                        <img
                          src="uploads/profile/<?php echo $row['image']?>"
                          class="img-fluid rounded shadow shadow-sm"
                          alt="Post image"
                        />
                      </a>
                    </div>
                    <div class="col-7">
                      <h6 class="mt-0 text-small">
                        <a  href="profile.php?id=<?php echo $row['id']?>" class="titlePopulerPost">
                          <?php echo $row['name']?>
                        </a>
                      </h6>
                      <div class="">
                      <?php
                        if($row['job']!=''){
                          echo '
                          <p class="text-small text-secondary mb-0">
                            <i
                              class="fas fa-briefcase textBlue50"
                            ></i>
                            '.$row['job'].'
                          </p>
                          ';
                          
                        }
                        //Fetching blog count
                        $sqlBlogCount = "SELECT * FROM blogs WHERE user_id = ".$row['id'].";";
                        $resultBlogCount = mysqli_query($conn, $sqlBlogCount);
                        $blogCount = mysqli_num_rows($resultBlogCount);

                        //Fetching follower count
                        $sqlFollowerCount = "SELECT * FROM followers WHERE user_id = ".$row['id'].";";
                        $resultFollowerCount = mysqli_query($conn, $sqlFollowerCount);
                        $FollowerCount = mysqli_num_rows($resultFollowerCount);
                      ?>
                        <p class="text-small text-secondary mb-0">
                          <i
                            class="fas fa-users textBlue50"
                          ></i>
                          Followers: <?php echo $FollowerCount ?>
                        </p>
                        <p class="text-small text-secondary mb-0">
                            <i class="fas fa-newspaper textBlue50"></i>
                          Blog: <?php echo $blogCount?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <!--Single latest user END-->
                <?php
                    }
                  }
                ?>
              </div>
            </section>
            <!--latest users END-->
          </div>
        </div>
      </div>
    </main>


<?php 
 include 'includes/footer.inc.php'
 ?>