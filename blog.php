<?php

include 'includes/header.inc.php';
require 'includes/db.inc.php';
if(!isset($_GET['id'])){
  header("Location: index.php");
    exit();
  }
  //fetch blog
  $sql = "SELECT * FROM blogs WHERE id = ".$_GET['id']." LIMIT 1;";
  $result = mysqli_query($conn, $sql);
  $result_check = mysqli_num_rows($result);  
  $row = mysqli_fetch_assoc($result);

  //fetch user
  $sql2 = "SELECT * FROM users WHERE id = ".$row['user_id'].";";
  $result2 = mysqli_query($conn, $sql2);
  $result_check2 = mysqli_num_rows($result2);  
  $user = mysqli_fetch_assoc($result2)
?>
<div class="d-block bgLightBlue py-4">
    <section class="container bg-white card card-body shadow shadow-sm mt-5">
        <div class="col-lg-12">
            <div class="mb-5" style="width: auto; max-height: 300px; overflow: hidden;">
                <img src="uploads/blog/<?php echo $row['image'] ?>" alt="Image" class="img-fluid w-100" />
            </div>
            <h1 class="mb-4">
                <?php echo $row['title']?>
            </h1>
            <div class="d-flex mb-5">
                <div class="mr-3">
                    <img src="uploads/profile/<?php echo $user['image']?>" alt="Image"
                        class="img-fluid rounded shadow shadow-sm" style="max-width: 80px;" />
                </div>
                <div class="vcard">
                    <span class="d-block">
                        <a href="profile.php?id=<?php echo $user['id']?>"d class="text-dark h4 font-weight-bold">
                            <?php echo $user['name']?>
                        </a>
                    </span>
                    <span class="d-block">
                    <?php
                        if($user['job']!=''){
                          echo '
                          <p class="text-secondary mb-0">
                            <i
                              class="fas fa-briefcase textBlue50"
                            ></i>
                            '.$user['job'].'
                          </p>
                          ';
                        }
                        
                      ?>
                    </span>
                    <span class="date-read text-secondary">
                        <i
                            class="fas fa-clock font-weight-lighter textBlue50"
                          ></i>
                          <?php 
                              $time = explode(" ",$row['created_at']);
                              echo $time[0];
                            ?>
                    </span>
                </div>
            </div>
            <p class="h4 font-weight-normal text-justify">
                <?php echo $row['description']?>
            </p>

            <!--All comment-->
            <div class="pt-5">
                <div class="section-title">
                    <h2 class="mb-5">6 Comments</h2>
                </div>
                <!--Comment-->
                <div class="container my-3 px-0 px-md-5">
                    <div class="row">
                        <div class="col-md-2 col-3 m-auto">
                            <img src="./img/mahin.jpg" alt="" class="img-fluid rounded-circle" />
                        </div>
                        <div class="col-md-10 col-9 card card-body bg-light">
                            <a href="#" class="h3 text-primary">Tanvir Mahin</a>
                            <span class="float-right font-weight-bold">30/5/2020</span>
                            <p class="py-2">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Omnis deleniti doloremque soluta voluptatum, aliquid
                                repellat minus aliquam tenetur. Amet, dolorem.
                            </p>
                        </div>
                    </div>
                </div>
                <!--Comment END-->
                <!--All Comment END-->

                <div class="card card-body shadow shadow-sm bg-light mt-5">
                    <form action="#" class="">
                        <div class="form-group">
                            <h2 class="mb-4">Leave a comment</h2>
                            <textarea name="" id="message" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post Comment" class="btn btn-primary py-3" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    include 'includes/footer.inc.php'
?>