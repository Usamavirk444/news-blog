<?php include 'header.php';
    $singleid =$_GET['singleid'];
    $single_sql = "SELECT * FROM `post` p INNER JOIN category c ON p.category= c.category_id WHERE `post_id`= '$singleid'";
    $single_run = mysqli_query($conn,$single_sql);
    $single_fet = mysqli_fetch_assoc($single_run);

?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $single_fet['title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                   <?php echo $single_fet['category_name'];?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'>Admin</a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                   <?php echo $single_fet['post_date'];?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $single_fet['post_img'];?>" alt=""/>
                            <p class="description">
                                <?php echo $single_fet['description']; ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
