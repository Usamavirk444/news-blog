<?php include "header.php";
if ($_SESSION['role']== 0) {
    header("Location:./post.php");   

}
if (empty($_SESSION['username'])) {
    header("Location:./index.php");   

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                           $sql= "SELECT * FROM `user`";
                           $run = mysqli_query($conn,$sql);
                           $sno =1;
                           while ($fet = mysqli_fetch_assoc($run)) {
                               ?>
                                <tr>
                              <td class='id'><?php echo $sno++;?></td>
                              <td><?php echo $fet['first_name'] . " " .  $fet['last_name'] ;?></td>
                              <td><?php echo $fet['username'];?></td>
                              <td><?php 
                                if ($fet['role'] == 1) {
                                    echo "Admin";
                                }else{
                                    echo "User";
                                }
                              ?></td>
                              <td class='edit'><a href="update-user.php?updateid=<?php echo $fet['user_id'];?>"><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href="delete-user.php?delid=<?php echo $fet['user_id'];?>"><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                               <?php
                           }
                          
                           
                          ?>
                         
                      </tbody>
                  </table>
                     
                  <ul class='pagination admin-pagination'>
                     <li><a>1</a></li>;
                    
                    </ul>;
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
