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
  $user = mysqli_fetch_assoc($result2);

    //fetch likes
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
<div class="d-block bgLightBlue py-4">
    <section class="container bg-white card card-body shadow shadow-sm mt-5">
        <div class="col-lg-12">
            <div class="mb-5" style="width: auto; max-height: 300px; overflow: hidden;">
                <img src="uploads/blog/<?php echo $row['image'] ?>" alt="Image" class="img-fluid w-100" />
            </div>
            <h1 class="mb-4">
                <?php echo $row['title']?>
            </h1>
            <div class="row">
                <div class="col-8">
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
                </div>
                <div class="col-4">
                    <h1>
                        <a href="includes/<?php if($liked == 'danger'){echo 'dislike';}else{echo 'like';}?>.inc.php?id=<?php echo $row['id']?>&p=blog&pid=<?php echo $row['id']?>" class="text-<?php echo $liked;?>">
                            <span class="fas fa-heart">
                            </span>  
                        </a>
                        <?php if($result_checkLike > 0){ echo $result_checkLike;}?>
                    </h1>
                </div>
            </div>
            <p class="h4 font-weight-normal text-justify">
                <?php echo $row['description']?>
            </p>
            
            <!--All comment-->
            <div class="pt-5">
                <?php
                    $sqlComment = "SELECT * FROM comments WHERE blog_id = ".$_GET['id']." ORDER BY id DESC;";
                    $resultComment = mysqli_query($conn, $sqlComment);
                    $result_checkComment = mysqli_num_rows($resultComment);  
                    
                ?>
                <div class="section-title">
                    <h2 class="mb-5"><?php echo $result_checkComment ?> Comments</h2>
                </div>
                <?php
                    if( $result_checkComment > 0 ){
                        while ($comment = mysqli_fetch_assoc($resultComment)) {
                            $sqlCommentUser = "SELECT * FROM users WHERE id = ".$comment['user_id']." LIMIT 1;";
                            $resultCommentUser = mysqli_query($conn, $sqlCommentUser);
                            $commentUser = mysqli_fetch_assoc($resultCommentUser);
                ?>
                <!--Comment-->
                <div class="container my-3 px-0 px-md-5">
                    <div class="row">
                        <div class="col-md-2 col-3 m-auto">
                            <img src="uploads/profile/<?php echo $commentUser['image'] ?>" alt="" class="img-fluid rounded-circle" />
                        </div>
                        <div class="col-md-10 col-9 card card-body bg-light">
                            <a href="profile.php?id=<?php echo $commentUser['id'] ?>" class="h3 text-primary"><?php echo $commentUser['name'];?></a>
                            <span class="float-right font-weight-bold">
                                <i class="fas fa-clock pl-2"></i>
                                <?php 
                                    $timeCmnt = explode(" ",$comment['created_at']);
                                    echo $timeCmnt[0];
                                ?>
                            </span>
                            <p class="py-2 h4 font-weight-light">
                                <?php echo $comment['comment'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!--Comment END-->
                <?php
                    }
                  }
                ?>
                <!--All Comment END-->
                <?php
                    if(isset($_SESSION['name'])){
                        echo '
                        <div class="card card-body shadow shadow-sm bg-light mt-5">
                            <form action="includes/createComment.inc.php" class="" method="POST">
                                <div class="form-group">
                                    <h2 class="mb-4">Leave a comment</h2>
                                    <textarea required name="comment" id="message" cols="30" rows="8" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="blogId" value="'.$row['id'].'">
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" name="comment-submit" class="btn btn-primary py-3" />
                                </div>
                            </form>
                        </div>
                        ';
                    }
                ?>
                
            </div>
        </div>
    </section>
</div>
<?php
    include 'includes/footer.inc.php'
?>