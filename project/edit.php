<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE USER</title>
</head>
<?php
include_once('connection.php');
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

?>

<body
    style="background:linear-gradient(45deg, #49a09d, #5f2c82);justify-content: center;text-align: center;border: 1px solid black;width: 300px;align-items: center;margin: 300px 800px;">
    <form  action="" method="POST">
        <h1>UPDATE</h1>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['id']; ?>" placeholder="id" name="id" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['uname']; ?>" placeholder="name" name="uname" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['email']; ?>" name="email" placeholder="email" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['unumber']; ?>" name="unumber" placeholder="Number" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['pass']; ?>" name="pass" placeholder="Password" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="text" value="<?php echo $row['uaddress']; ?>" name="uaddress" placeholder="address" id=""><br><br>
        <input style="border-radius: 3px;border: none;" type="submit" value="submit" name="submit" id=""><br><br>
    </form>

</body>
<?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $unumber = $_POST['unumber'];
    $pass = $_POST['pass'];
    $uaddress = $_POST['uaddress'];
    $sql2 = "UPDATE user SET uname='$uname',email='$email',unumber='$unumber',pass='$pass',uaddress='$uaddress'WHERE id='$id'";
    $result2 = mysqli_query($connection, $sql2);
    if ($result2) {
        echo "updated";
    } else {
        echo "error";
    }
}

?>

</html>