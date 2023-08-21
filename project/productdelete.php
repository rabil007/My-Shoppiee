<?php
include_once('connection.php');
$id=$_GET['id'];
$sql="DELETE FROM products WHERE id='$id'";
$result=mysqli_query($connection,$sql);
?>