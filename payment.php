<?php
include 'server.php';
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    else{
        $cart_count=0;
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Pyment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="cart.css">
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
        <div class="wrapper1">
            <h3>Online Payment</h3>
            <p>Accepted Cards</p>
            <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <!--end of icon-container-->
            <table>
                <tr>
                    <td>
                        <p>Order No:</p>
                    </td>
                    <td>
                        <input type="text" id="cname" name="ordernumber" placeholder="234">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Name on Card:</p>
                    </td>
                    <td>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Credit card number:</p>
                    </td>
                    <td>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Exp Month:</p>
                    </td>
                    <td>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Exp Year:</p>
                    </td>
                    <td>
                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>CVV:</p>
                    </td>
                    <td>
                        <input type="text" id="cvv" name="cvv" placeholder="352">
                    </td>
                </tr>

            </table>

            <button type="submit" id="checkout" class="btn btn-lg btn-danger" name="checkout"><a
                    href="logout.php">Checkout</a></button>


        </div>
    </div>
    <!--end of col-50-->
    <div class="footerNew">

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