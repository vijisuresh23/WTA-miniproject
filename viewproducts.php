<?php
include 'server.php';
if(isset($_GET['id'])){
    $query="UPDATE new_product SET Mark=2 WHERE id=".$_GET['id']."";
    $res=mysqli_query($db,$query);
}

$result = mysqli_query($db,"SELECT * FROM new_product WHERE Mark=1");
?>
<!doctype html>
<html lang="en">

<head>
    <title>View Products</title>
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
                    <a class="nav-link" href="viewproducts.php">New Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transportation.php">Transportation</a>
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
        <div class="wrapper">
            <?php
        while($row= mysqli_fetch_array($result)){
            ?>

            <label hidden name="id">id:<?php echo $row['id'];?></label>
            <label class="label">Kissan Card Number:<?php echo $row['KCN'];?></label><br>
            <label class="label">Product Name:<?php echo $row['Name'];?></label><br>
            <label class="label">Quantity:<?php echo $row['Quantity'];?> kg</label><br>
            <label class="label">Expected Price:<?php echo $row['Price'];?> per kg</label><br>
            <label class="label">Product description:<?php echo $row['Info'];?></label><br>
            <label class="label">Year of growth:<?php echo $row['Year'];?></label><br>
            <button name="reject" class="btn btn-danger"><a
                    href="viewproducts.php?id=<?php echo $row["id"]; ?>">Reject</a></button>




            <hr>
            <?php


            // echo $res;
            }
            ?>
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