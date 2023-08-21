<?php
include_once('connection.php');
$id=$_GET['id'];
$sql="DELETE FROM user WHERE id='$id'";
$result=mysqli_query($connection,$sql);
if ($result) {
   header('location:dashboard.php');
}

?>