<?php include "header.php";
if (empty($_SESSION['username'])) {
    header("Location:./index.php");   

}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                          $sql = "SELECT * FROM `post` p INNER JOIN `category` c ON p.category=c.category_id INNER JOIN user ON p.author=user.user_id";
                          $run = mysqli_query($conn,$sql);
                          $sno =1;
                          while ($fetch = mysqli_fetch_array($run)) {
                        ?>
                        <tr>
                        <td class='id'><?php echo $sno++;?></td>
                              <td><?php echo $fetch['title'];?></td>
                              <td><?php echo $fetch['category_name']?></td>
                              <td><?php echo $fetch['post_date']?></td>
                              <td><?php 
                                if ($fetch['role'] == 1) {
                                    echo "Admin";
                                }else{
                                    echo "User";
                                }?></td>
                              <td class='edit'><a href="update-post.php?updateid=<?php echo $fetch['post_id'];?>"><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href="delete-post.php?delid=<?php echo $fetch['post_id'];?>&catid=<?php echo $fetch['category'];?>"><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php      
                          }
                          ?>
                         
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
