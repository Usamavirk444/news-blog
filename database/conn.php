<?php
session_start();
$conn = mysqli_connect("localhost","root","","news-cms");
if ($conn) {
    echo "working";
}
?>