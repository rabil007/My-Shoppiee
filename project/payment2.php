<?php
include_once('connection.php');
session_start();
$uid = $_SESSION['id'];
$uname = $_SESSION['username'];
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($connection, $sql);
$data=mysqli_fetch_assoc($result);
$img = $data['pimage'];
$img_tmp = $data['pimage'];
$pname=$data['pname'];
$pprice = $data['pprize'];
$sql2 = "INSERT INTO cart(pimg,uname,pname,pprice,product_id,uid)VALUES('$img','$uname','$pname','$pprice','$id','$uid')";
$result2 = mysqli_query($connection, $sql2);
if ($result2) {
    move_uploaded_file($img_tmp, $img);
}
if ($result2) {
    header('location:index.php');
} else {
    echo "not inserted";
}

?>