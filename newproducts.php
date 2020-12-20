<?php
include 'server.php';
$result = mysqli_query($db,"SELECT * FROM new_product");
$check_query = "SELECT * FROM new_product WHERE KCN=".$_SESSION["username"]." ";
$ans = mysqli_query($db, $check_query);
if (isset($_POST['postprod'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $name = mysqli_real_escape_string($db, $_POST['pname']);
    $quant = mysqli_real_escape_string($db, $_POST['quant']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $describe = mysqli_real_escape_string($db, $_POST['describe']);
    $year = mysqli_real_escape_string($db, $_POST['year']);

    $query = "INSERT INTO new_product (id,Name,Quantity,Price,Info,Year,KCN)
    VALUES(NULL, '$name', '$quant','$price','$describe','$year','$username')";
    mysqli_query($db, $query);
    ?>
<script>
alert("product posted!!");
</script>
<?php
 header("Location:newproducts.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Post Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="admin.css">
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
        <a class="navbar-brand" href="fhome.php"><img id="navbarimg" src="images/logo.png" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="newproducts.php">Post Products<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fedit.php">Edit profile</a>
                </li>
            </ul>
        </div>
        <p style="margin-right:30px; margin-top:15px; font-weight:bold;">
            Welcome<span><?php echo " ".$_SESSION["username"] ?></span></p>
        <a href="logout.php">Logout</a>
    </nav>
    <hr>
    <div class="back-img">
        <div class="cart">

            <h3>Terms and Conditions</h3>
            <ol>
                <li>
                    <span>The price of a crop is negotiable</span>
                </li>
                <li>
                    <span>If the product does not meet the required quantity and qulaity the product will be
                        rejected</span>
                </li>
                <li>
                    <span>Details provided about the product must be correct</span>
                </li>
                <li>
                    <span>Payment will be credited to the bank account information provided by you.</span>
                </li>
                <li>
                    <span>Payment can be ecpexted within 15 days from, the day for product collection</span>
                </li>
                <li>
                    <span>Add your bank account details in edit profile page for payment </span>
                </li>
            </ol>
        </div>
        <div class="billing">
            <h3>New product</h3>
            <form action="" method="post" class="form">

                <div class="inputfield terms">
                    <label class="label">Kissan card Number:</label>
                    <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly>
                </div>
                <div class="inputfield terms">
                    <label class="label">Product Name:</label>
                    <input type="text" name="pname" placeholder="name of product" required>
                </div>
                <div class="inputfield terms">
                    <label class="label">Quantity:</label>
                    <input type="text" name="quant" placeholder="quantity" required>
                </div>
                <div class="inputfield terms">
                    <label class="label">Expected Price:</label>
                    <input type="text" name="price" placeholder="Price you expect per kg" required>
                </div>
                <div class="inputfield terms">
                    <label class="label">Product Description:</label>
                    <input type="text" name="describe">
                </div>
                <div class="inputfield terms">
                    <label class="label">Year of growth:</label>
                    <select name="year" id="year" class="input" required style="width:100px">
                        <option value="default">Select</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>

                    </select>
                </div>
                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p style="color: black;">Agreed to terms and conditions</p>
                </div>
                <div class="inputfield">
                    <button type="submit" class="btn" name="postprod">Post</button>
                </div>
            </form>
        </div>
        <div class="payment">
            <h3>Previous products</h3>
            <table class="table  table-bordered">
                <thead>
                    <tr>
                        <th scope="col" hidden>#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stauts</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
$i=0;
if($ans){

while($row = mysqli_fetch_array($ans)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
if($row["Mark"]==1){
    $status="Accepted";
}
else{
    $status="Rejected";
}
?>
                    <tr class="<?php if(isset($classname)) echo $classname;?>">
                        <td hidden><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["Quantity"]; ?></td>
                        <td><?php echo $row["Price"]; ?></td>
                        <td><?php echo $status ?></td>
                    </tr>
                    <?php
$i++;
}
}
else{
    echo '<div>No products posted</div>';
}
?>

                </tbody>
            </table>
        </div>
    </div>
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