<?php
 include_once 'server.php';
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

}
?>
<?php

 $user=$_SESSION['username'];
 $user_check_query = "SELECT * FROM buyer_registration WHERE ACN='$user' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);

?>


<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
else{
    $cart_count=0;
}
?>
<?php
if(isset($_POST['checkout'])){
    $date=date("Y-m-d");
      foreach ($_SESSION["shopping_cart"] as $product){
    $quant=mysqli_real_escape_string($db,$product["quantity"]);
    $name=mysqli_real_escape_string($db,$product["name"]);
    $price=mysqli_real_escape_string($db, $product["price"]*$product["quantity"]);
    $acn=$_SESSION['username'];
    $radio=mysqli_real_escape_string($db, $_POST['radio1']);
    $query="INSERT INTO orders (`id`, `ACN`, `products`, `quant`, `price`, `date`, `payment_mode`, `shipping_address`)
     VALUES (NULL,'$acn','$name','$quant','$price','$date','$radio',NULL) ";
      $result = mysqli_query($db, $query);
      }
if(isset($_POST['radio1']) && ($_POST['radio1']) == "dbt"){

    header("Location: payment.php");

 }
 else{
    header("Location:bhome.php");
 }

}
    ?>
<!doctype html>
<html lang="en">

<head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    // console.log("hello world");
    $(document).ready(function() {
        $(".footerNew").load("footer.html");

    });
    </script>


</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand" href="bhome.php"><img id="navbarimg" src="images/logo.png" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li>
                    <div class="cart_div">
                        <a href="cart.php">
                            <img src="images/cart-icon.png" /> Cart
                            <span><?php echo $cart_count; ?></span></a>
                    </div>
                </li>
                <li class="nav-item">

                </li>
            </ul>
        </div>
        <p style="margin-right:30px; margin-top:15px; font-weight:bold;">
            Welcome<span><?php echo " ".$_SESSION["username"] ?></span></p>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
    <hr>

    <div class="back-img">
        <div class="cart">
            <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>ITEM NAME</td>
                        <td>QUANTITY(kg)</td>
                        <td>UNIT PRICE</td>
                        <td>ITEMS TOTAL</td>
                        <td>TAX</td>

                    </tr>
                    <?php
foreach ($_SESSION["shopping_cart"] as $product){
?>
                    <tr>
                        <td><img src='<?php echo $product["image"]; ?>' width="100" height="80" /></td>
                        <td><?php echo $product["name"]; ?><br />
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>Remove Item</button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="change" />
                                <select name='quantity' class='quantity' onChange="this.form.submit()">
                                    <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                                    <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                                    <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                                    <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                                    <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                                    <option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
                                    <option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
                                    <option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
                                    <option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
                                    <option <?php if($product["quantity"]==10) echo "selected";?> value="10">10</option>
                                    <option <?php if($product["quantity"]==11) echo "selected";?> value="11">11</option>
                                    <option <?php if($product["quantity"]==12) echo "selected";?> value="12">12</option>
                                    <option <?php if($product["quantity"]==13) echo "selected";?> value="13">13</option>
                                    <option <?php if($product["quantity"]==14) echo "selected";?> value="14">14</option>
                                    <option <?php if($product["quantity"]==15) echo "selected";?> value="15">15</option>
                                    <option <?php if($product["quantity"]==16) echo "selected";?> value="16">16</option>
                                    <option <?php if($product["quantity"]==17) echo "selected";?> value="17">17</option>
                                    <option <?php if($product["quantity"]==18) echo "selected";?> value="18">18</option>
                                    <option <?php if($product["quantity"]==19) echo "selected";?> value="19">19</option>
                                    <option <?php if($product["quantity"]==20) echo "selected";?> value="20">20</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo "$".$product["price"]; ?></td>
                        <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
                        <?php
                            $tax=$product["price"]*$product["quantity"]+0.10*$product["price"]*$product["quantity"];
                        ?>
                        <td><?php echo "10%"?></td>
                    </tr>
                    <?php
$total_price += ($product["price"]*$product["quantity"]);

}
$total_price +=$tax;
?>
                    <tr>
                        <td colspan="5" align="right">
                            <form action="" method="post">
                                <strong name="totalprice">TOTAL: <?php echo "$".$total_price; ?></strong>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
}else{
    ?>
            <script>
            alert("Cart is empty!!")
            </script>
            <?php
	}
?>
        </div>
        <div class=billing>
            <h2>Billing Details</h2>
            <form action="" method="post">
                <table cellspacing="20">
                    <tr id="row">
                        <td>
                            <label for="name">Order number:</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo rand(10,1000);?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Name:</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['Owner'];?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Organization:</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['OrgName'];?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Phone Number:</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['PhoneNum'];?>" name="phoneNumber">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Postal Code:</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['PostalCode'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Email Address:</label>
                        </td>
                        <td>
                            <input type="email" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Address:</label>
                        </td>
                        <td>
                            <textarea name="address" id="" cols="23" rows="3"></textarea>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
        <div class="payment">
            <h2>Shipping services</h2>
            <div class="tile1">
                <div class="bg">
                    <p>Express shippment</p>
                    <h1>$40</h1>

                </div>
            </div>
            <div class="tile2">
                <div class="bg">
                    <p>Normal Shippment</p>
                    <h1>Free</h1>

                </div>
            </div>
            <div class="tile2">
                <div class="bg">
                    <p>Lorem ipsum dolor</p>
                    <h1>Free</h1>

                </div>
            </div>
            <div class="payment-details">
                <h2>Payment Details</h2>
                <p>Specify the order number while making online payment. Your order will be shipped once payment is
                    credited to us</p>
                <form action="" method="post">
                    <div class="radio-item">
                        <input type="radio" id="buyer" name="radio1" value="dbt">
                        <label for="buyer" style="color:black">Online Payment</label>
                    </div>
                    <!--end of radio-item-->
                    <br>
                    <div class="radio-item">
                        <input type="radio" id="admin" name="radio1" value="cod" checked>
                        <label for="admin" style="color:black">Cash on delivery</label>
                    </div>
                    <br>
                    <button type="submit" id="checkout" class="btn btn-lg btn-danger" name="checkout">Checkout</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="navbar-fixed-bottom">
        <div class="footerNew">

        </div>
    </footer>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>