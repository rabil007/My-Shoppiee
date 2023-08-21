<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1c62ee6da0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

</head>

<body style="background-color: ">

    <?php
    include_once('connection.php');
    session_start();
    $id=$_SESSION['id'];
    if (empty($_SESSION['username'])) {
        header('location:login.php');
    }
    $sqll = "SELECT * FROM user WHERE id='$id'";
    $data1 = mysqli_query($connection, $sqll);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
        while ($result = mysqli_fetch_array($data1)) {
            ?>
            <a style="text-shadow: orange 3px 3px;color: #1570B6;  " class="navbar-brand p-3 " href="#">
                <h2>&NonBreakingSpace;MYSHOPPIEE <img src="logo.png" alt="" srcset="" width="60px"> </h2>
            </a>
            <img class="mx-5" src="log.png" alt="" width="60px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul id="ul" style="align-items: center;" class="navbar-nav m-aut0 h5 mx-5">
                    <style>
                        #ul li:hover {
                            background-color: grey;
                        }
                    </style>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house"></i> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-box"></i> Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php"><i class="fa-solid fa-heart"></i> Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> Contacts Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="" style="border-radius: 50%; " src="<?php echo $result['img'] ?>" alt="" srcset=""
                                width="40px" height="40px">

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                    <?php echo $result['uname'] ?>
                                </a></li>
                            <li><a class="dropdown-item" href="reg.php">New User</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a style="color: red;" class="dropdown-item" href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
           
            <a href="cart2.php?id=<?php echo $id ?>"><i class="fa-solid fa-cart-shopping fa-2xl mx-5"
                    style="color: black;"></i></a>

            <?php

        }
        ?>
    </nav>
    <!-- ------------nav---------------- -------------------------------------------------->




    <div class="main">
        <h1 style="font-family: sans-serif;font-weight: 600;padding-top: 50px;text-shadow: white 3px 3px;">WELCOME TO MY
            SHOPPIEE</h1>


    </div>
    <div style="display: flex;background-color: #F1F3F6;border-bottom:1px solid gainsboro ;box-shadow: 0px 1px 1000px 0px;"
        class=" categories">
        <div style="display: block;text-align: center;" class="flex1 px-3 mx-3">
            <img src="groceries.png" alt="" srcset=""><br>
            <h6>Grocery</h6>
        </div>
        <div style="display: block;text-align: center;" class="flex2 px-3">
            <img src="mob.webp" alt="" srcset=""><br>
            <h6>Mobiles</h6>
        </div>
        <div style="display: block;text-align: center;" class="flex3 px-3">
            <img src="home2.png" alt="" srcset=""><br>
            <h6>Home & Furniture</h6>
        </div>
        <div style="display: block;text-align: center;" class="flex4 px-3">
            <img src="app.webp" alt="" srcset=""><br>
            <h6>Appliances</h6>
        </div>
        <div style="display: block;" text-align: center; class="flex5 px-3">
            <img src="beauty.webp" alt="" srcset=""><br>
            <h6>Beauty,Toy</h6>
        </div>
        <div style="display: block;text-align: center;" class="flex6 px-3">
            <img src="electronics.webp" alt="" srcset=""><br>
            <h6>Electronics</h6>
        </div>
        <div style="display: block;" class="flex7 px-3">
            <img src="top.webp" alt="" srcset=""><br>
            <h6>Top Offers</h6>
        </div>
        <div style="display: block;" class="flex8 px-3">
            <img src="travel.webp" alt="" srcset=""><br>
            <h6>Travel</h6>
        </div>
        <div style="display: block;" class="flex9 px-3">
            <img src="two.webp" alt="" srcset=""><br>
            <h6>Two Wheelers</h6>
        </div>
    </div>

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots ------------------------------------------------------------->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div style="border: none;outline: none;box-shadow: 1px 0px 30px -10px;" class="carousel-inner">
            <div class="carousel-item active">
                <img src="5990174.jpg" alt="Los Angeles" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="4445791.jpg" alt="Chicago" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="offer.avif" alt="New York" class="d-block w-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div><br><br><br>

    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    

    if ($num) {
        ?>




        <div class="container-fluid">
            <style>
                .card:hover {
                    box-shadow: 2px 2px 30px 0px;
                }
            </style>
            <div class="row">
                <?php
                while ($data = mysqli_fetch_assoc($result)) {
                    $pid = $data['id'];
                    $id = $_SESSION['id'];
                    ?>


                    <div id="card" style="align-items: center;" class="card col-lg-3 mx-1 my-3"><br>
                        <img src="<?php echo $data['pimage']; ?>" alt="" srcset="" width="300px">
                        <div class="p" style="text-align: center;"><br>
                            <p class="h3">
                                <?php echo $data['pname'] ?>
                            </p>
                            <p class="h5">
                                PRICE : ₹
                                <?php echo $data['pprize'] ?>
                            </p>
                            <p class="h6">
                                DETAILS:
                                <?php echo $data['pdetails'] ?>
                            </p>
                        </div><br>
                        <div style="display: flex;" class="btn">
                            <a href="payment.php?id=<?php echo $data['id'] ?>"><button style="margin-top: auto;" type="button"
                                    class="btn btn-outline-danger">BUY NOW</button></a>&NonBreakingSpace;&NonBreakingSpace;
                            <a href="payment2.php?id=<?php echo $data['id'];?>">
                            <button
                                    style="margin-top: auto;" name="order" type="button" class="btn btn-outline-primary">ADD TO
                                    CART</button></a>
                        </div><br>
                    </div>
                    <?php
                
                }
    } else {
        echo "data not inserted";
    }
    ?>
            <div style="display: flex;text-align: center;justify-content: center;" class="flex">

                <a style="text-decoration: none;text-align: cente;" href="">1
                </a>&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
                <a style="text-decoration: none;text-align: cente;" href="">2
                </a>&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
                <a style="text-decoration: none;text-align: cente;" href="">3
                </a>&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
                <a style="text-decoration: none;text-align: center;" href="">NEXT ></a><br>

            </div>
        </div>
    </div><br><br>
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="<i class=" fa-brands fa-facebook-f></i>
                    <i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://index.com/">MYSHOPPIEE.COM</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>