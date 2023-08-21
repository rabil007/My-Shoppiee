<?php
include_once('connection.php');
$pid=$_GET['id'];
$sql="DELETE FROM cart WHERE id='$pid'";
$result=mysqli_query($connection,$sql);
if ($result) {
}
?>