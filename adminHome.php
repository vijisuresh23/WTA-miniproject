<?php
include 'server.php';
$result = mysqli_query($db,"SELECT * FROM price_details");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <!-- <link rel="stylesheet" href="cart.css"> -->
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
                <li class="nav-item ">
                    <a class="nav-link" href="viewproducts.php">New Products</a>
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
    <div class="admin-bg">
        <div class="container">
            <h2 id="h2">Price Chart</h2>
            <table class="table  table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price(/kg)</th>
                        <th scope="col">Last Update</th>
                        <th scope="col"></th>

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
?>
                    <tr class="<?php if(isset($classname)) echo $classname;?>">
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><button type="button" class="btn btn-lg btn-danger" data-toggle="popover"
                                title="Popover title" data-content="Navigate to bottom og the page!!"><a
                                    href="adminHome.php?userid=<?php echo $row["id"]; ?>">Update</a></button>
                        </td>
                    </tr>
                    <?php
$i++;
}
?>

                </tbody>
            </table>

        </div>
        <?php
if(count($_POST)>0) {

// Creating new date format from that timestamp
$date=$_POST['date'];
$new_date=date('Y-m-d',strtotime($date));
mysqli_query($db,"UPDATE price_details set id='" . $_POST['userid'] . "', product_name='" . $_POST['first_name'] . "',price='" . $_POST['last_name'] . "', date='$new_date'  WHERE id='" . $_POST['userid'] . "'");
$message = "Record Modified Successfully";
}
if(isset($_GET['userid'])){
$result = mysqli_query($db,"SELECT * FROM price_details WHERE id='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
}
?>
        <div class="card" style="width: 25rem; height:20rem;">
            <form name="frmUser" method="post" action="">
                ID:
                <input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
                <input type="text" name="userid" value="<?php echo $row['id']; ?>" readonly>
                <br>
                Product Name:
                <input type="text" name="first_name" class="txtField" value="<?php echo $row['product_name']; ?>"
                    readonly>
                <br>
                Price:
                <input type="text" name="last_name" class="txtField" value="<?php echo $row['price']; ?>">
                <br>
                Date:
                <input type="date" name="date" class="txtField" value="<?php echo $row['date']; ?>">
                <br>
                <button type="submit" name="submit" class="btn btn-lg btn-danger"><a
                        href="adminHome.php"></a>Update</button>
            </form>
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