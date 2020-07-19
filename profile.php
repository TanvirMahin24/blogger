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
                        <a href="#">
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
                        
                        ?>
                        </p>

                        <p
                          class="text-right mb-0 text-uppercase font-small spacing font-weight-bold"
                        >
                          <a href="#" class="textBlue"
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
                <h4 class="card-title"><strong><?php echo $data['name'] ?></strong></h4>
                <?php
                if($data['job'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-briefcase pr-2"></i>'.$data['job'].';
                        </p>';
                }
                if($data['address'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-map-marker-alt pr-2"></i>'.$data['address'].';
                        </p>';
                }
                if($data['phone'] != ''){
                  echo '<p class="h6">
                          <i class="fas fa-phone pr-2"></i>'.$data['phone'].';
                        </p>';
                }
                
                ?>
                
                <p class="h6">
                  <i class="fas fa-users"></i> <strong>Followers :</strong>  100
                </p>
                <p class="h6">
                  <i class="fas fa-newspaper"></i><strong> Blogs :</strong> 10
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
                      <a href="#">
                        <img
                          src="uploads/blog/<?php echo $row['image'] ?>"
                          class="img-fluid rounded"
                          alt="Post image"
                        />
                      </a>
                    </div>
                    <div class="col-7">
                      <h6 class="mt-0 text-small">
                        <a href="#" class="titlePopulerPost">
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