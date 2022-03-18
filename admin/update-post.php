<?php include "header.php";
    $id = $_GET['updateid'];
    $sql1 = "SELECT * FROM `post` WHERE `post_id`='$id'";
    $run1 = mysqli_query($conn,$sql1);
    $fetch = mysqli_fetch_assoc($run1);

    if (isset($_POST['submit'])) {
        $pid = mysqli_real_escape_string($conn,$_POST['post_id']);
        $title = mysqli_real_escape_string($conn,$_POST['post_title']);
        $des = mysqli_real_escape_string($conn,$_POST['postdesc']);
        $cate = mysqli_real_escape_string($conn,$_POST['category']);
        $file_name = $_FILES['new-image']['name'];
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
                move_uploaded_file($_FILES['new-image']['tmp_name'],"./upload/".$file_name);


        $sql = "UPDATE `post` SET `title`='$title',`description`='$des',`category`='$cate',`post_img`='$file_name' WHERE `post_id` = '$id';";
        $fire = mysqli_query($conn,$sql);
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
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $fetch['post_id']?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $fetch['title']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $fetch['description'];?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    <option value="">Select Option</option>
                    <?php 
                              $cat_sql ="SELECT * FROM `category`";
                              $cat_run = mysqli_query($conn,$cat_sql);
                              while ($fet = mysqli_fetch_assoc($cat_run)) {
                                  if ($fetch['category'] == $fet['category_id']) {
                                      $selected = "Selected";
                                  }else{
                                      $selected = "";
                                  }
                                  ?>
                              <option <?php echo $selected?> value="<?php echo $fet['category_id'];?>" > <?php echo $fet['category_name'];?></option>
                                  <?php
                              }
                              ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $fetch['post_img'];?>" height="150px">
                <!-- <input type="hidden" name="old-image" value=""> -->
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
