<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT ADD</title>
    <style>
        .main{
            display: flex;
            justify-content: center;
        }
        form{
            margin-top: 100px;
            background-color: antiquewhite;
            padding: 20px;
        }
        input{
            padding: 6px;
            border: 1px solid gray;
            border-radius: 5px;
            width: 30vw;
        }

    </style>
</head>
<body>
    <?php
    include_once('connection.php');
    ?>

    <div class="main">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Product Name</label><br>
        <input type="text" name="pname"><br><br>
        <label for="">Product Price</label><br>
        <input type="text" name="pprice"><br><br>
        <label for="">Product Image</label><br>
        <input type="file" name="pimg"><br><br>
        <label for="">Product Details</label><br>
        <input type="text" name="pdetails"><br><br>
        
        <center>
        <input type="submit" name="ok" style="width:10vw;">
        </center>
        
    </form>


    </div>

    <?php

    if(isset($_POST['ok'])){
        $name = $_POST['pname'];
        $price = $_POST['pprice'];
        $details = $_POST['pdetails'];
        $img_name = $_FILES['pimg']['name'];
        $img_tmp_name = $_FILES['pimg']['tmp_name'];

        $sql = "INSERT INTO products(pname,pprize,pimage,pdetails)VALUES('$name','$price','$img_name','$details')";

        $result = mysqli_query($connection,$sql);
        if($result){
            move_uploaded_file($img_tmp_name,$img_name);
        }

        if($result){
            ?>
            <script>
                alert('product added');
                
            </script>
            
            <?php
            header('location:index.php');
        }
    }
    ?>
</body>
</html>