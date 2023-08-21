<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE USER</title>
</head>
<?php
include_once('connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

?>

<body
    style="background:linear-gradient(45deg, #49a09d, #5f2c82);justify-content: center;text-align: center;border: 1px solid black;width: 300px;align-items: center;margin: 300px 800px;">
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>UPDATE</h1>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['id']; ?>" placeholder="id"
            name="id" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['pname']; ?>"
            placeholder="pname" name="pname" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['pprize']; ?>" name="pprize"
            placeholder="prize" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="file" value="<?php echo $row['pimage']; ?>" name="pimage"
            placeholder="image" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['pdetails']; ?>"
            name="pdetails" placeholder="details" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="submit" value="submit" name="submit" id=""><br><br>
    </form>

</body>
<?php
if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $pprize = $_POST['pprize'];
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmp_name=$_FILES['pimage']['tmp_name'];
    $pdetails = $_POST['pdetails'];
    $sql2 = "UPDATE products SET pname='$pname',pprize='$pprize',pimage='$pimage',pdetails='$pdetails'WHERE id='$id'";
    $result2 = mysqli_query($connection, $sql2);
    if ($result2) {
        move_uploaded_file($pimage_tmp,$pimage);
    }
    if ($result2) {
        echo "updated";
        header('location:producttable.php');
    } else {
        echo "error";
    }
}

?>

</html>