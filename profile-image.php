<?php
include 'includes/header.inc.php';

  if(!isset($_SESSION['userId'])){
    header("Location: index.php?redirect=true");
    exit();
  }
  require 'includes/db.inc.php';
  
?>
<main class="bgLightBlue">
    <div class="container mt-5 py-4" style="min-height:50vh">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card card-body text-center">
                <?php 
                    if(isset($_FILES['image'])){
                       $file_name = $_FILES['image']['name'];
                       $file_size =$_FILES['image']['size'];
                       $file_tmp =$_FILES['image']['tmp_name'];
                       $file_type=$_FILES['image']['type'];
                       $tmp = explode('.',$_FILES['image']['name']);
                       $file_ext=strtolower(end($tmp));
                       
                       $extensions= array("jpg","png","jpeg");
                       
                       if(in_array($file_ext,$extensions)=== false){
                          echo '<span class="alert alert-danger d-block">File extension not allowed, please choose a JPEG or PNG file.</span>';
                       }
                       
                       if($file_size > 2097152){
                        echo '<span class="alert alert-danger d-block">File size must be less than 2MB.</span>';
                       }
                       
                       if(empty($errors)==true){
                          move_uploaded_file($file_tmp,"uploads/profile/".$file_name);
                          $sql = "UPDATE `users` SET `image` = '".$file_name."' WHERE `users`.`id` = ".$_SESSION['userId'].";";

                          if (mysqli_query($conn, $sql)) {
                            if($_SESSION['image'] != 'blank.png'){
                              unlink('uploads/profile/'.$_SESSION['image']);
                            }
                            $_SESSION['image'] = $file_name;
                            header("Location: dashboard.php?image=updated");
                            exit();
                          } else {
                            echo '<span class="alert alert-danger d-block">Error : ' . mysqli_error($conn).$file_name.'</span>';
                          }

                          mysqli_close($conn);
                       }else{
                          print_r($errors);
                       }
                    }

                    
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3>Select a file to upload</h3>
                        <p class="lead"><strong>Note:</strong> Please use a square image for better view</p>
                        <div class="custom-file mt-4">
                            <input type="file" name="image" required class="" id="fileToUpload">
                            <label class="" for="fileToUpload">Choose file</label>
                        </div>
                        <input type="submit" value="Upload Image" class="form-control bg-primary mt-4 text-light"  name="img-submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
include 'includes/footer.inc.php';
?>