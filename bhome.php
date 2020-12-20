<?php
include('server.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($db,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
    $status = "Product is added to your cart!";
    ?>
<script>
alert("Product added to cart!!");
</script>
<?php
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
        $status = "Product is already added to your cart!";
        ?>
<script>
alert("Product already in cart!!");
</script>
<?php
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = "Product is added to your cart!";
    ?>
<script>
alert("Product added to cart!!");
</script>
<?php
	}

	}
}
?>
<?php
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
    <title>Home page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    // console.log("hello world");
    $(document).ready(function() {
        $(".footerNew2").load("footer.html");

    });
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand" href="adminHome.php"><img id="navbarimg" src="images/logo.png" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            </ul>
        </div>
        <div class="cart_div" style="margin-right:30px">
            <a href="cart.php"><img src="images/cart-icon.png" />
                <span><?php echo $cart_count; ?></span></a>
        </div>
        <p style="margin-right:30px; margin-top:15px; font-weight:bold;">
            Welcome<span><?php echo " ".$_SESSION["username"] ?></span></p>
        <a href="logout.php">Logout</a>
    </nav>
    <hr>
    <div class="back-img2">
        <div class="container">
            <div class="nav-bar">
            </div>
        </div>


        <div class="container-fluid" id="wrap">


            <?php
$result = mysqli_query($db,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
echo "<div class='product_wrapper'>
      <form method='post' action=''>
      <input type='hidden' name='code' value=".$row['code']." />
      <div class='image'><img src='".$row['image']."' /></div>
      <div class='name' id='table'>".$row['name']."</div>
         <div class='price'>$".$row['price']."<p>(/kg)</p></div>
      <button type='submit' class='buy'>Add to basket</button>
      </form>
         </div>";
}
mysqli_close($db);
?>

            <br /><br />
        </div>
        <div class="footerNew2">

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