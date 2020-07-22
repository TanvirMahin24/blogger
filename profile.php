<?php
    include 'includes/header.inc.php';
    require 'includes/db.inc.php';
    if(!isset($_GET['id'])){
        header("Location: index.php");
        exit();
    }
    $sql = "SELECT * FROM users WHERE id =". $_GET['id'].";";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        //fetch user
        $sql2 = "SELECT * FROM blogs WHERE user_id = ".$data['id'].";";
        $result2 = mysqli_query($conn, $sql2);
        $result_check2 = mysqli_num_rows($result2);
    }
    else{
        header("Location: index.php");
        exit();
    }
    
?>

<main class="bgLightBlue">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8 mt-3">
            <div class="container mt-4 mb-4">
            <div class="w-75 mb-2 text-center mx-auto">
                <?php
                  if(isset($_GET['follow'])){
                    if($_GET['follow'] == 'success'){
                      echo '<span class="alert alert-success d-block">You are following '.$data['name'].'!</span>';
                    }
                    elseif($_GET['follow'] == 'fail'){
                      echo '<span class="alert alert-danger d-block">Something went wrong with following process!</span>';
                    }
                  }
                  if(isset($_GET['unfollow'])){
                    if($_GET['unfollow'] == 'success'){
                      echo '<span class="alert alert-success d-block">You have unfollowed '.$data['name'].'!</span>';
                    }
                    elseif($_GET['unfollow'] == 'fail'){
                      echo '<span class="alert alert-danger d-block">Something went wrong with unfollowing process!</span>';
                    }
                  }
                  
                ?>
              </div>
              <!--All Blog-->
              <h2 class="text-center font-weight-light pb-3">
                <i class="fas fa-newspaper pr-3"></i>Blog by <?php echo $data['name']?>
              </h2>
              <div class="container">
                <div class="row">
                <?php
                  $sql = "SELECT * FROM blogs WHERE user_id = ".$data['id']." AND active = '1' ORDER BY created_at DESC;";
                  $result = mysqli_query($conn, $sql);
                  $result_check = mysqli_num_rows($result);

                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <!--All post single item-->
                  <div class="col-md-6 mb-4">
                    <div
                      class="card text-left singleCardAllPost shadow shadow-sm"
                    >
                      <div class="img-profile">
                        <a href="blog.php?id=<?php echo $row['id']?>" >
                          <img
                            src="uploads/blog/<?php echo $row['image']?>"
                            class="card-img-top imgBlog"
                            alt=""
                          />
                        </a>
                        
                      </div>
                      <div class="card-body mt-0 pt-0 mx-4">
                        <h6 class="mb-2 pt-3">
                          <a
                            class="text-center text-uppercase font-small text-primary"
                          >
                            <strong>POSTED ON</strong> </a
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
                              <a href="includes/<?php if($liked == 'danger'){echo 'dislike';}else{echo 'like';}?>.inc.php?id=<?php echo $row['id']?>&p=profile&pid=<?php echo $_GET['id']?>" class="text-<?php echo $liked;?>">
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
                  <!--All post single item END-->
                  <?php
                      }
                    }
                    else{
                      echo '<h3 class="text-center w-100">No blog found!</h3>';
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
                  src="<?php echo 'uploads/profile/'.$data['image']; ?>"
                  alt="profile image"
                  class="img-fluid w-100"
                />
              </div>
              <div class="card-body">
                <?php
                  //Follow query
                  $sqlFollow = "SELECT * FROM followers WHERE user_id =".$data['id'].";";
                  $resultFollow = mysqli_query($conn, $sqlFollow);
                  $result_checkFollow = mysqli_num_rows($resultFollow);
                  $Follow = 'Follow';
                  if( $result_checkFollow > 0 ){
                    while ($rowFollow = mysqli_fetch_assoc($resultFollow)) {
                      if(isset($_SESSION['userId']) && $rowFollow['user_id'] == $data['id']){
                        $Follow = 'Unfollow';
                      }
                    }
                  }
                ?>
                <?php if(isset($_SESSION['name'])){ echo '<a href="includes/'; if($Follow == 'Follow'){echo 'follow';}else{echo 'unfollow';} echo '.inc.php?id='.$data['id'].'" class="btn btn-primary mb-3"><i class="fas fa-user-plus pr-2"></i>'.$Follow.'</a>';}?>
                <h4 class="card-title"><strong><?php echo $data['name'] ?></strong></h4>
                <?php
                if($data['job'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-briefcase pr-2"></i>'.$data['job'].'
                        </p>';
                }
                if($data['address'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-map-marker-alt pr-2"></i>'.$data['address'].'
                        </p>';
                }
                if($data['phone'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-phone pr-2"></i>'.$data['phone'].'
                        </p>';
                }
                
                ?>

                
                <p class="h6">
                  <i class="fas fa-users"></i> <strong>Followers :</strong>  <?php echo $result_checkFollow?>
                </p>
                <p class="h6">
                  <i class="fas fa-newspaper"></i><strong> Blogs :</strong> <?php echo $result_check2; ?>
                </p>

        
                <!-- Text -->
                <p class="card-text mt-3">
                <?php echo $data['bio'];?>
                </p>
              </div>
            </section>

            <!--Latest posts-->
            <section class="section shadow shadow-sm my-3">
              <div class="card card-body pb-0">
                <p class="font-weight-bold text-center bg-light py-2 mb-4">
                  <strong>USER LATEST BLOGS</strong>
                </p>

                <?php
                  $sql = "SELECT * FROM blogs WHERE user_id = ".$data['id']." AND active = '1' ORDER BY created_at DESC LIMIT 5;";
                  $result = mysqli_query($conn, $sql);
                  $result_check = mysqli_num_rows($result);

                  if( $result_check > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!--Single latest post-->
                <div class="single-post">
                  <div class="row p-2">
                    <div class="col-5">
                      <a href="blog.php?id=<?php echo $row['id']?>" >
                        <img
                          src="uploads/blog/<?php echo $row['image'] ?>"
                          class="img-fluid rounded"
                          alt="Post image"
                        />
                      </a>
                    </div>
                    <div class="col-7">
                      <h6 class="mt-0 text-small">
                        <a href="blog.php?id=<?php echo $row['id']?>"  class="titlePopulerPost">
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