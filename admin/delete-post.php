<?php
include("../database/conn.php");
 $id = $_GET['delid'];
 $catid = $_GET['catid'];
 $sql= "DELETE FROM `post` WHERE `post_id`= '$id';";
 $sql .="UPDATE `category` SET post= post-1 WHERE `category_id` = '$catid'";
//  $sql .= "UPDATE category SET post = post+1 WHERE `category_id` = '$cate'";

 $run = mysqli_multi_query($conn,$sql);
 if ($run) {
     header("Refresh:0, url=./post.php");
 }

?>