<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/1c62ee6da0.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<div class="container">
  <div class="navbar">
    <div class="logo ">
      <a style="text-shadow: orange 3px 3px;color: #1570B6;  " class="navbar-brand p-3 " href="index.php">
        <h2>&NonBreakingSpace;MYSHOPPIEE <img src="logo.png" alt="" srcset="" width="60px"> </h2>
      </a>
    </div>
    <?php
    include_once('connection.php');
    $uid = $_GET['id'];
    $sql5 = "SELECT * FROM user WHERE id='$uid'";
    $data5 = mysqli_query($connection, $sql5);
    $result5 = mysqli_fetch_array($data5);


    ?>
    <div class="list mx-5">
      <ul style="display: flex;margin: auto;">
        <li class="nav-item active mx-3">
          <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Home </a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#"><i class="fa-solid fa-box"></i> Order</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="wishlist.php"><i class="fa-solid fa-heart"></i> Wishlist</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> Contacts Us</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#"><img src="<?Php echo $result5['img'] ?>" alt="" srcset="" width="30px"> <?Php echo $result5['uname'] ?></a>
        </li>
        
      </ul>
    </div>

  </div>
</div>

<!-- cart items details -->
<?php
include_once('connection.php');
error_reporting(0);
session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM cart WHERE uid='$id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_num_rows($result);
if ($row) {
  ?>

  <div class="small-container cart-page">
    <h6>&NonBreakingSpace;&NonBreakingSpace; DELIVER TO:
      <?Php echo $_SESSION['username']; ?>
    </h6>
    <table>
      <tr style="">
        <th style="background-color: #1570B6;text-align: center;">Product</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Subtotal</th>
      </tr>
      <?php
      while ($data = mysqli_fetch_array($result)) {

        ?>

        <tr>

          <td><br>
            <div class="cart-info">

              <img src="<?php echo $data['pimg']; ?>" alt="" />
              <div>
                <p>
                  <?php echo $data['pname']; ?>
                </p>
                <small>₹
                  <?php echo $data['pprice']; ?>
                </small>
                <br><br>
                <a onclick="return confirm('are you sure you want to remove this product from your cart?')"
                  href="delete_cart.php?id=<?php echo $data['id'] ?>">REMOVE</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" /></td>
          <td>₹
            <?php echo $data['pprice']; ?>
          </td>
        </tr>

        <?php

        $sum += $data['pprice'];

      }

      ?>


      <div class="total-price">
        <table style="border: 1px solid ;background-color: #FF523B;color: #fff;border-radius: 5px;width: 1050px;">
          <br><br>
          <tr>
            <td>Subtotal</td>
            <td>₹
              <?php echo $sum ?>.00
            </td>
          </tr>
          <?php $tax = ($sum / 100) * 10;
          ?>
          <tr>
            <td>Tax</td>
            <td>₹
              <?php echo $tax ?>
            </td>
          </tr>
          <tr>
            <td>Total</td>
            <td>₹
              <?php echo $sum + $tax ?>.00
            </td>
          </tr>
        </table><br>

        <div class=" button ">
          <a id="btn" href="order_place.php"><button
              style="border: 1px solid #FF523B;background-color: white;padding:10px;color: #1570B6;border-radius: 5px;">ORDER
              PLACE</button></a>

        </div>
      </div>
  </div>
  <?php
}
?>
<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="<i class=" fa-brands fa-facebook-f></i>
        <i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
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

<script>
  var MenuItems = document.getElementById('MenuItems');
  MenuItems.style.maxHeight = '0px';

  function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
      MenuItems.style.maxHeight = '200px';
    } else {
      MenuItems.style.maxHeight = '0px';
    }
  }
</script>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: "Poppins", sans-serif;
  }

  .navbar {
    display: flex;
    align-items: center;
    padding: 20px;
  }

  nav {
    flex: 1;
    text-align: right;
  }

  nav ul {
    display: inline-block;
    list-style-type: none;
  }

  nav ul li {
    display: inline-block;
    margin-right: 20px;
  }

  a {
    text-decoration: none;
    color: #555;
  }

  p {
    color: #555;
  }

  .container {
    max-width: 1300px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
  }

  .row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .col-2 {
    flex-basis: 50%;
    min-width: 300px;
  }

  .col-2 img {
    max-width: 100%;
    padding: 50px 0;
  }

  .col-2 h1 {
    font-size: 50px;
    line-height: 60px;
    margin: 25px 0;
  }

  .btn {
    display: inline-block;
    background: #ff523b;
    color: #ffffff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
  }

  .btn:hover {
    background: #563434;
  }

  .header {
    background: radial-gradient(#fff, #ffd6d6);
  }

  .header .row {
    margin-top: 70px;
  }

  .categories {
    margin: 70px 0;
  }

  .col-3 {
    flex-basis: 30%;
    min-width: 250px;
    margin-bottom: 30px;
  }

  .col-3 img {
    width: 100%;
  }

  .small-container {
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
  }

  .col-4 {
    flex-basis: 25%;
    padding: 10px;
    min-width: 200px;
    margin-bottom: 50px;
    transition: transform 0.5s;
  }

  .col-4 img {
    width: 100%;
  }

  .title {
    text-align: center;
    margin: 0 auto 80px;
    position: relative;
    line-height: 60px;
    color: #555;
  }

  .title::after {
    content: "";
    background: #ff523b;
    width: 80px;
    height: 5px;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%);
  }

  h4 {
    color: #555;
    font-weight: normal;
  }

  .col-4 p {
    font-size: 14px;
  }

  .rating .fas {
    color: #ff523b;
  }

  .rating .far {
    color: #ff523b;
  }

  .col-4:hover {
    transform: translateY(-5px);
  }

  /* Offer */

  .offer {
    background: radial-gradient(#fff, #ffd6d6);
    margin-top: 80px;
    padding: 30px 0;
  }

  .col-2 .offer-img {
    padding: 50px;
  }

  small {
    color: #555;
  }

  /* testimonial */

  .testimonial {
    padding-top: 100px;
  }

  .testimonial .col-3 {
    text-align: center;
    padding: 40px 20px;
    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.5s;
  }

  .testimonial .col-3 img {
    width: 100px;
    margin-top: 20px;
    border-radius: 50%;
  }

  .testimonial .col-3:hover {
    transform: translateY(-10px);
  }

  .fa-quote-left {
    font-size: 34px;
    color: #ff523b;
  }

  .col-3 p {
    font-size: 14px;
    margin: 12px 0;
    color: #777777;
  }

  .testimonial .col-3 h3 {
    font-weight: 600;
    color: #555;
    font-size: 16px;
  }

  .brands {
    margin: 100px auto;
  }

  .col-5 {
    width: 160px;
  }

  .col-5 img {
    width: 100%;
    cursor: pointer;
    filter: grayscale(100%);
  }

  .col-5 img:hover {
    width: 100%;
    cursor: pointer;
    filter: grayscale(0);
  }

  /* footer */

  .footer {
    background: #000;
    color: #8a8a8a;
    font-size: 14px;
    padding: 60px 0 20px;
  }

  .footer p {
    color: #8a8a8a;
  }

  .footer h3 {
    color: #ffffff;
    margin-bottom: 20px;
  }

  .footer-col-1,
  .footer-col-2,
  .footer-col-3,
  .footer-col-4 {
    min-width: 250px;
    margin-bottom: 20px;
  }

  .footer-col-1 {
    flex-basis: 30%;
  }

  .footer-col-2 {
    flex: 1;
    text-align: center;
  }

  .footer-col-2 img {
    width: 180px;
    margin-bottom: 20px;
  }

  .footer-col-3,
  .footer-col-4 {
    flex-basis: 12%;
    text-align: center;
  }

  ul {
    list-style-type: none;
  }

  .app-logo {
    margin-top: 20px;
  }

  .app-logo img {
    width: 140px;
  }

  .footer hr {
    border: none;
    background: #b5b5b5;
    height: 1px;
    margin: 20px 0;
  }

  .copyright {
    text-align: center;
  }

  .menu-icon {
    width: 28px;
    margin-left: 20px;
    display: none;
  }

  /* media query for menu */

  @media only screen and (max-width: 800px) {
    nav ul {
      position: absolute;
      top: 70px;
      left: 0;
      background: #333;
      width: 100%;
      overflow: hidden;
      transition: max-height 0.5s;
    }

    nav ul li {
      display: block;
      margin-right: 50px;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    nav ul li a {
      color: #fff;
    }

    .menu-icon {
      display: block;
      cursor: pointer;
    }
  }

  /* all products page */

  .row-2 {
    justify-content: space-between;
    margin: 100px auto 50px;
  }

  select {
    border: 1px solid #ff523b;
    padding: 5px;
  }

  select:focus {
    outline: none;
  }

  .page-btn {
    margin: 0 auto 80px;
  }

  .page-btn span {
    display: inline-block;
    border: 1px solid #ff523b;
    margin-left: 10px;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
  }

  .page-btn span:hover {
    background: #ff523b;
    color: #ffffff;
  }

  /* single product details */

  .single-product {
    margin-top: 80px;
  }

  .single-product .col-2 img {
    padding: 0;
  }

  .single-product .col-2 {
    padding: 20px;
  }

  .single-product h4 {
    margin: 20px 0;
    font-size: 22px;
    font-weight: bold;
  }

  .single-product select {
    display: block;
    padding: 10px;
    margin-top: 20px;
  }

  .single-product input {
    width: 50px;
    height: 40px;
    padding-left: 10px;
    font-size: 20px;
    margin-right: 10px;
    border: 1px solid #ff523b;
  }

  input:focus {
    outline: none;
  }

  .single-product .fas {
    color: #ff523b;
    margin-left: 10px;
  }

  .small-img-row {
    display: flex;
    justify-content: space-between;
  }

  .small-img-col {
    flex-basis: 24%;
    cursor: pointer;
  }

  /* cart items */

  .cart-page {
    margin: 90px auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  .cart-info {
    display: flex;
    flex-wrap: wrap;
  }

  th {
    text-align: left;
    padding: 5px;
    color: #ffffff;
    background: #ff523b;
    font-weight: normal;
  }

  td {
    padding: 10px 5px;
  }

  td input {
    width: 40px;
    height: 30px;
    padding: 5px;
  }

  td a {
    color: #ff523b;
    font-size: 12px;
  }

  td img {
    width: 80px;
    height: 80px;
    margin-right: 10px;
  }

  .total-price {
    display: flex;
    justify-content: flex-end;
  }

  .total-price table {
    border-top: 3px solid #ff523b;
    width: 100%;
    max-width: 400px;
  }

  td:last-child {
    text-align: right;
  }

  th:last-child {
    text-align: right;
  }

  /* account page */
  .account-page {
    padding: 50px 0;
    background: radial-gradient(#fff, #ffd6d6);
  }

  .form-container {
    background: #ffffff;
    width: 300px;
    height: 400px;
    position: relative;
    text-align: center;
    padding: 20px 0;
    margin: auto;
    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .form-container span {
    font-weight: bold;
    padding: 0 10px;
    color: #555555;
    cursor: pointer;
    width: 100px;
    display: inline-block;
  }

  .form-btn {
    display: inline-block;
  }

  .form-container form {
    max-width: 300px;
    padding: 0 20px;
    position: absolute;
    top: 130px;
    transition: transform 1s;
  }

  form input {
    width: 100%;
    height: 30px;
    margin: 10px 0;
    padding: 0 10px;
    border: 1px solid #ccc;
  }

  form .btn {
    width: 100%;
    border: none;
    cursor: pointer;
    margin: 10px 0;
  }

  form .btn:focus {
    outline: none;
  }

  #LoginForm {
    left: -300px;
  }

  #RegForm {
    left: 0;
  }

  form a {
    font-size: 12px;
  }

  #Indicator {
    width: 100px;
    border: none;
    background: #ff523b;
    height: 3px;
    margin-top: 8px;
    transform: translateX(100px);
    transition: transform 1s;
  }

  /* media query for less than 600 screen size */

  @media only screen and (max-width: 600px) {
    .row {
      text-align: center;
    }

    .col-2,
    .col-3,
    .col-4 {
      flex-basis: 100%;
    }

    .single-product .row {
      text-align: left;
    }

    .single-product .col-2 {
      padding: 20px 0;
    }

    .single-product h1 {
      font-size: 26px;
      line-height: 32px;
    }

    .cart-info p {
      display: none;
    }
  }
</style>