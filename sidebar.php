<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php 
                $front_sql = "SELECT * FROM `post` p INNER JOIN category c ON p.category= c.category_id LIMIT 3 ";
                $front_run = mysqli_query($conn,$front_sql);
                while ($front_fetch= mysqli_fetch_assoc($front_run)) {
                    
                    ?>
        <div class="recent-post">
            <a class="post-img" href="">
                <img src="admin/upload/<?php echo $front_fetch['post_img'];?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?singleid=<?php echo $front_fetch['post_id'];?>"><?php echo $front_fetch['title'];?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'><?php echo $front_fetch['category_name']?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    01 Nov, 2019
                </span>
                <a class="read-more" href="single.php?singleid=<?php echo $front_fetch['post_id'];?>">read more</a>
            </div>
            
        </div>
        <?php
                }
            ?>
       
    </div>
    <!-- /recent posts box -->
</div>
