<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php 
                     if (isset($_GET['search'])) {
                        $search_id =$_GET['search'];
                    }
                   
                    ?>
                  <h2 class="page-heading">Search: <?php echo $search_id; ?></h2>
                  <?php 
                  
                            $front_sql = "SELECT * FROM `post` p INNER JOIN category c ON p.author= c.category_id INNER JOIN user u ON p.author=u.user_id WHERE p.title  LIKE $search_id ";
                            $front_run = mysqli_query($conn,$front_sql);
                            while ($front_fetch= mysqli_fetch_assoc($front_run)) {
                               ?>
                               <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?singleid=<?php echo $front_fetch['post_id'];?>"><img src="admin/upload/<?php echo $front_fetch['post_img'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="single.php?singleid=<?php echo $front_fetch['post_id'];?>"><?php echo $front_fetch['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href="category.php"><?php echo $front_fetch['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'>admin</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $front_fetch['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                           <?php echo substr($front_fetch['description'],0,130). "...";?>
                                        </p>
                                        <a class='read-more pull-right' href="single.php?singleid=<?php echo $front_fetch['post_id'];?>">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                               <?php
                            }

                            $name_sql = "SELECT * FROM `post` WHERE post.title  %$search_id%";
                            $name_run = mysqli_query($conn,$name_sql);
                            $namefetch = mysqli_fetch_assoc($name_run);
                            
                        ?>
              
                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
