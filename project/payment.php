<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CART</title>

</head>
<?php
include_once('connection.php');
session_start();
$id = $_GET['id'];
$uid = $_SESSION['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$sql2 = "SELECT * FROM user WHERE id='$uid'";
$result2 = mysqli_query($connection, $sql2);
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
$num2 = mysqli_fetch_assoc($result2);
if ($num) {

  ?>

  <body>

    <form action="" method="post">
      <main>
        <div class="basket">
          <!-- <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div> -->
          <div class="basket-labels">
            <ul>
              <li class="item item-heading">Item</li>
              <li class="price">Price</li>
              <li class="quantity">Quantity</li>
              <li class="subtotal">Subtotal</li>
            </ul>
          </div>


          <?php
          while ($data = mysqli_fetch_array($result)) {
            ?>

            <div class="basket-product">
              <div class="item">
                <div class="product-image">
                  <img src="<?php echo $data['pimage']; ?>" alt="Placholder Image 2" class="product-frame">
                </div>
                <div class="product-details">
                  <h1><strong><span class="item-quantity">1 x</span>APPLE</strong>
                    <?php echo $data['pname']; ?>
                  </h1>
                  <p><strong>
                      <?php echo $data['pdetails']; ?>
                    </strong></p>
                  <p>
                    <?php echo $num2['uname']; ?>
                  </p>
                </div>
              </div>
              <div class="price">
                ₹<?php echo $data['pprize'] ?>
              </div>
              <div class="quantity">
                <input type="number" value="4" min="1" class="quantity-field">
              </div>
              <div class="subtotal">₹<?php echo $data['pprize'] ?></div>
              <div class="remove">
              <a style="color: red" onclick="return confirm('are you sure you want to remove this product from your cart?')"
                  href="delete_cart.php?id=<?php echo $data['id'] ?>">REMOVE</a>              </div>
            </div>
          </div>
          <aside>
            <div class="summary">
              <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
              <div class="summary-subtotal">
                <div class="subtotal-title">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal">₹<?php echo $data['pprize'] ?></div>
                <div class="summary-promo hide">
                  <div class="promo-title">Promotion</div>
                  <div class="promo-value final-value" id="basket-promo"></div>
                </div>
              </div>
              <div class="summary-delivery">
                <select name="delivery-collection" class="summary-delivery-selection">
                  <option value="0" selected="selected">Select Collection or Delivery</option>
                  <option value="collection">Collection</option>
                  <option value="first-class">Royal Mail 1st Class</option>
                  <option value="second-class">Royal Mail 2nd Class</option>
                  <option value="signed-for">Royal Mail Special Delivery</option>
                </select>
              </div>
              <div class="summary-total">
                <div class="total-title">Total</div>
                <div class="total-value final-value" id="basket-total">₹<?php echo $data['pprize'] ?></div>
              </div>
              <div class="summary-checkout">
                <button name="order" class="checkout-cta ">Add TO Cart</button><br>
                <button style="background-color: #FF523B" name="buy" class="checkout-cta ">Order Place</button>
              </div>
            </div>
          </aside>
        </main>
      </form>
    </body>

    <?php
    if (isset($_POST['order'])) {
      $uname = $num2['uname'];
      $pname = $data['pname'];
      $pprice = $data['pprize'];
      $pimg = $data['pimage'];
      $sql3 = "INSERT INTO cart(uname,pname,pprice,pimg,product_id,uid)VALUES('$uname','$pname','$pprice','$pimg','$id','$uid')";
      $result3=mysqli_query($connection,$sql3);
    }
          }
}

?>
<style>
  @charset "utf-8";

  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,600);

  html,
  html a {
    -webkit-font-smoothing: antialiased;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
  }

  body {
    border: 1px solid grey;
    box-shadow: 1px 1px 20px 1px;
    background-color: #fff;
    color: #666;
    font-family: "Open Sans", sans-serif;
    font-size: 62.5%;
    margin: 200 auto;
    width: fit-content;
  }

  a {
    border: 0 none;
    outline: 0;
    text-decoration: none;
  }

  strong {
    font-weight: bold;
  }

  p {
    margin: 0.75rem 0 0;
  }

  h1 {
    font-size: 0.75rem;
    font-weight: normal;
    margin: 0;
    padding: 0;
  }

  input,
  button {
    border: 0 none;
    outline: 0 none;
  }

  button {
    background-color: #666;
    color: #fff;
  }

  button:hover,
  button:focus {
    background-color: #555;
  }

  img,
  .basket-module,
  .basket-labels,
  .basket-product {
    width: 100%;
  }

  input,
  button,
  .basket,
  .basket-module,
  .basket-labels,
  .item,
  .price,
  .quantity,
  .subtotal,
  .basket-product,
  .product-image,
  .product-details {
    float: left;
  }

  .price:before,
  .subtotal:before,
  .subtotal-value:before,
  .total-value:before,
  .promo-value:before {
    content: "£";
  }

  .hide {
    display: none;
  }

  main {
    clear: both;
    font-size: 0.75rem;
    margin: 0 auto;
    overflow: hidden;
    padding: 1rem 0;
    width: 960px;
  }

  .basket,
  aside {
    padding: 0 1rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .basket {
    width: 70%;
  }

  .basket-module {
    color: #111;
  }

  label {
    display: block;
    margin-bottom: 0.3125rem;
  }

  .promo-code-field {
    border: 1px solid #ccc;
    padding: 0.5rem;
    text-transform: uppercase;
    transition: all 0.2s linear;
    width: 48%;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -o-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }

  .promo-code-field:hover,
  .promo-code-field:focus {
    border: 1px solid #999;
  }

  .promo-code-cta {
    border-radius: 4px;
    font-size: 0.625rem;
    margin-left: 0.625rem;
    padding: 0.6875rem 1.25rem 0.625rem;
  }

  .basket-labels {
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    margin-top: 1.625rem;
  }

  ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  li {
    color: #111;
    display: inline-block;
    padding: 0.625rem 0;
  }

  li.price:before,
  li.subtotal:before {
    content: "";
  }

  .item {
    width: 55%;
  }

  .price,
  .quantity,
  .subtotal {
    width: 15%;
  }

  .subtotal {
    text-align: right;
  }

  .remove {
    bottom: 1.125rem;
    float: right;
    position: absolute;
    right: 0;
    text-align: right;
    width: 45%;
  }

  .remove button {
    background-color: transparent;
    color: #777;
    float: none;
    text-decoration: underline;
    text-transform: uppercase;
  }

  .item-heading {
    padding-left: 4.375rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .basket-product {
    border-bottom: 1px solid #ccc;
    padding: 1rem 0;
    position: relative;
  }

  .product-image {
    width: 35%;
  }

  .product-details {
    width: 65%;
  }

  .product-frame {
    border: 1px solid #aaa;
  }

  .product-details {
    padding: 0 1.5rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .quantity-field {
    background-color: #ccc;
    border: 1px solid #aaa;
    border-radius: 4px;
    font-size: 0.625rem;
    padding: 2px;
    width: 3.75rem;
  }

  aside {
    float: right;
    position: relative;
    width: 30%;
  }

  .summary {
    background-color: #eee;
    border: 1px solid #aaa;
    padding: 1rem;
    width: 250px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .summary-total-items {
    color: #666;
    font-size: 0.875rem;
    text-align: center;
  }

  .summary-subtotal,
  .summary-total {
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    clear: both;
    margin: 1rem 0;
    overflow: hidden;
    padding: 0.5rem 0;
  }

  .subtotal-title,
  .subtotal-value,
  .total-title,
  .total-value,
  .promo-title,
  .promo-value {
    color: #111;
    float: left;
    width: 50%;
  }

  .summary-promo {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }

  .promo-title {
    float: left;
    width: 70%;
  }

  .promo-value {
    color: #8b0000;
    float: left;
    text-align: right;
    width: 30%;
  }

  .summary-delivery {
    padding-bottom: 3rem;
  }

  .subtotal-value,
  .total-value {
    text-align: right;
  }

  .total-title {
    font-weight: bold;
    text-transform: uppercase;
  }

  .summary-checkout {
    display: block;
  }

  .checkout-cta {
    display: block;
    float: none;
    font-size: 0.75rem;
    text-align: center;
    text-transform: uppercase;
    padding: 0.625rem 0;
    width: 100%;
  }

  .summary-delivery-selection {
    background-color: #ccc;
    border: 1px solid #aaa;
    border-radius: 4px;
    display: block;
    font-size: 0.625rem;
    height: 34px;
    width: 100%;
  }

  @media screen and (max-width: 640px) {

    aside,
    .basket,
    .summary,
    .item,
    .remove {
      width: 100%;
    }

    .basket-labels {
      display: none;
    }

    .basket-module {
      margin-bottom: 1rem;
    }

    .item {
      margin-bottom: 1rem;
    }

    .product-image {
      width: 40%;
    }

    .product-details {
      width: 60%;
    }

    .price,
    .subtotal {
      width: 33%;
    }

    .quantity {
      text-align: center;
      width: 34%;
    }

    .quantity-field {
      float: none;
    }

    .remove {
      bottom: 0;
      text-align: left;
      margin-top: 0.75rem;
      position: relative;
    }

    .remove button {
      padding: 0;
    }

    .summary {
      margin-top: 1.25rem;
      position: relative;
    }
  }

  @media screen and (min-width: 641px) and (max-width: 960px) {
    aside {
      padding: 0 1rem 0 0;
    }

    .summary {
      width: 28%;
    }
  }

  @media screen and (max-width: 960px) {
    main {
      width: 100%;
    }

    .product-details {
      padding: 0 1rem;
    }
  }
</style>
<script>
  /* Set values + misc */
  var promoCode;
  var promoPrice;
  var fadeTime = 300;

  /* Assign actions */
  $(".quantity input").change(function () {
    updateQuantity(this);
  });

  $(".remove button").click(function () {
    removeItem(this);
  });

  $(document).ready(function () {
    updateSumItems();
  });

  $(".promo-code-cta").click(function () {
    promoCode = $("#promo-code").val();

    if (promoCode == "10off" || promoCode == "10OFF") {
      //If promoPrice has no value, set it as 10 for the 10OFF promocode
      if (!promoPrice) {
        promoPrice = 10;
      } else if (promoCode) {
        promoPrice = promoPrice * 1;
      }
    } else if (promoCode != "") {
      alert("Invalid Promo Code");
      promoPrice = 0;
    }
    //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
    if (promoPrice) {
      $(".summary-promo").removeClass("hide");
      $(".promo-value").text(promoPrice.toFixed(2));
      recalculateCart(true);
    }
  });

  /* Recalculate cart */
  function recalculateCart(onlyTotal) {
    var subtotal = 0;

    /* Sum up row totals */
    $(".basket-product").each(function () {
      subtotal += parseFloat($(this).children(".subtotal").text());
    });

    /* Calculate totals */
    var total = subtotal;

    //If there is a valid promoCode, and subtotal < 10 subtract from total
    var promoPrice = parseFloat($(".promo-value").text());
    if (promoPrice) {
      if (subtotal >= 10) {
        total -= promoPrice;
      } else {
        alert("Order must be more than £10 for Promo code to apply.");
        $(".summary-promo").addClass("hide");
      }
    }

    /*If switch for update only total, update only total display*/
    if (onlyTotal) {
      /* Update total display */
      $(".total-value").fadeOut(fadeTime, function () {
        $("#basket-total").html(total.toFixed(2));
        $(".total-value").fadeIn(fadeTime);
      });
    } else {
      /* Update summary display. */
      $(".final-value").fadeOut(fadeTime, function () {
        $("#basket-subtotal").html(subtotal.toFixed(2));
        $("#basket-total").html(total.toFixed(2));
        if (total == 0) {
          $(".checkout-cta").fadeOut(fadeTime);
        } else {
          $(".checkout-cta").fadeIn(fadeTime);
        }
        $(".final-value").fadeIn(fadeTime);
      });
    }
  }

  /* Update quantity */
  function updateQuantity(quantityInput) {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children(".price").text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children(".subtotal").each(function () {
      $(this).fadeOut(fadeTime, function () {
        $(this).text(linePrice.toFixed(2));
        recalculateCart();
        $(this).fadeIn(fadeTime);
      });
    });

    productRow.find(".item-quantity").text(quantity);
    updateSumItems();
  }

  function updateSumItems() {
    var sumItems = 0;
    $(".quantity input").each(function () {
      sumItems += parseInt($(this).val());
    });
    $(".total-items").text(sumItems);
  }

  /* Remove item from cart */
  function removeItem(removeButton) {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function () {
      productRow.remove();
      recalculateCart();
      updateSumItems();
    });
  }

</script>

</html>