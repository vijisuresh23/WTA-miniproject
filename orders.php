<?php
include 'server.php';
$result = mysqli_query($db,"SELECT * FROM orders");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Orders</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    // console.log("hello world");
    $(document).ready(function() {
        $(".footer").load("footer.html");

    });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand" href="adminHome.php"><img id="navbarimg" src="images/logo.png" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="viewproducts.php">New Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transportation.php">Transportation <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">Orders</a>
                </li>
            </ul>
        </div>
        <p style="margin-right:30px; margin-top:15px; font-weight:bold;">
            Welcome<span><?php echo " ".$_SESSION["username"] ?></span></p>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
    <hr>
    <div class="admin-bg1">

        <h2 id="h2">Transportation</h2>
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>
                    <th scope="col">ProductName</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Payment Mode</th>
                    <th scope="col">Stauts</th>
                </tr>
            </thead>
            <tbody>
                <?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
if($row["status"]==0){
    $status="pending";
}else{
    $status="Delivered";
}
?>
                <tr class="<?php if(isset($classname)) echo $classname;?>">
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["ACN"]; ?></td>
                    <td><?php echo $row["products"]; ?></td>
                    <td><?php echo $row["quant"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["payment_mode"]; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
                <?php
$i++;
}
?>

            </tbody>
        </table>

    </div>
    </div>
    </div>
    <div class="footer">

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