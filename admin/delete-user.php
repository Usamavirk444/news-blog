<?php
include("../database/conn.php");
 $id = $_GET['delid'];
 $sql= "DELETE FROM `user` WHERE `user_id`= '$id'";
 $run = mysqli_query($conn,$sql);
 if ($run) {
     header("Refresh:0, url=./users.php");
 }

?>