<?php include "header.php";

    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn,$_POST['post_title']);
        $des = mysqli_real_escape_string($conn,$_POST['postdesc']);
        $cate = mysqli_real_escape_string($conn,$_POST['category']);
        $file_name = $_FILES['fileToUpload']['name'];
        // if (isset($_FILES['fileToUpload'])) {
        //     $error = array();
        //     $file_name = $_FILES['fileToUpload']['name'];
        //     $file_size = $_FILES['fileToUpload']['size'];
        //     $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        //     $file_type = $_FILES['fileToUpload']['type'];
        //     $file_expl = explode('.',$file_name);
        //     $file_ext = strtolower($file_expl);
        //     $exta = array("jpeg","jpg","png");

        //     if (in_array($file_ext,$exta)==false) {
        //         $error[]= "Please Use JPG or PNG";
        //     }
        //     if ($file_size >2097152 ) {
        //         $error[]="File Size must be 2MB";
        //     }
        //     if (empty($error) == true) {
        //         move_uploaded_file($file_tmp,"./upload/".$file_name);
        //     }else {
        //         print_r($error);
        //     }
        // }
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"./upload/".$file_name);


        $date = date("d M, Y");
        $author = $_SESSION['user_id'];

        $sql = "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('$title','$des','$cate','$date','$author','$file_name');";
        $sql .= "UPDATE category SET post = post+1 WHERE `category_id` = '$cate'";
        $fire = mysqli_multi_query($conn,$sql);
        if ($fire) {
            header("Location:./post.php");
        }else{
            echo "error";
        }
    }

?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" selected> Select Category</option>
                              <?php 
                              $cat_sql ="SELECT * FROM `category`";
                              $cat_run = mysqli_query($conn,$cat_sql);
                              while ($fet = mysqli_fetch_assoc($cat_run)) {
                                  ?>
                              <option value="<?php echo $fet['category_id'];?>" > <?php echo $fet['category_name'];?></option>
                                  <?php
                              }
                              ?>
                              
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
