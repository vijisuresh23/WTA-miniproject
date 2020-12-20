<?php
include 'server.php';
$name="select Fname,Lname,PhoneNum from fam_registration where KCN=".$_SESSION["username"]."";
$res=mysqli_query($db, $name);
$user = mysqli_fetch_row($res);
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
}
?>

<?php
   if (isset($_POST['change_farmer'])) {
    // receive all input values from the form
    $kissan = mysqli_real_escape_string($db, $_POST['username']);
    $firstname = mysqli_real_escape_string($db, $_POST['fname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lname']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['cpass']);
    $phoneNumber=mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "UPDATE fam_registration  SET Password='$password',PhoneNum='$phoneNumber' WHERE KCN='$kissan'";
    mysqli_query($db, $query);
        ?>
<script>
alert("changes saved!!");
</script>
<?php
}
?>

<?php

$user_check_query = "SELECT * FROM bank_details WHERE KCN=".$_SESSION["username"]." LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$col = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="cart.css">
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
        <div class="wrapper">
            <h3>Edit profile</h3>
            <form action="fedit.php" method="post" class="form">

                <div class="inputfield terms">
                    <label class="label">Kissan card Number:</label>
                    <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly>
                </div>
                <div class="inputfield">
                    <label class="label">FirstName:</label>
                    <input type="text" value="<?php echo $user[0]?>" name="fname" required readonly>
                </div>
                <div class="inputfield">
                    <label class="label" for="lname" ;>LasteName:</label>
                    <input type="text" value="<?php echo $user[1]?>" name="lname" required readonly>
                </div>
                <div class="inputfield">
                    <label class="label" for="password" ;>Password:</label>
                    <input type="password" placeholder="password" name="password" required id="password">
                </div>
                <div class="inputfield">
                    <label class="label" for="cpass" ;>Confirm Password:</label>
                    <input type="password" placeholder="confirm Password" name="cpass" required id="cpass">
                </div>
                <div class="inputfield">
                    <label class="label" for="phone" ;>Phone Number:</label>
                    <input type="text" value="<?php echo $user[2]?>" name="phoneNumber" required id="phoneNumber">
                </div>
                <div class="inputfield">
                    <button type="submit" class="btn" name="change_farmer" style="width:100px">Save</button>
                </div>
            </form>
            <br>
            <br>
            <form action="fedit.php" method="post" class="form">
                <h3>Bank account Details</h3>
                <div class="inputfield">
                    <label class="label" for="fname" ;>Account holder Name:</label>
                    <input type="text" name="Aname" value="<?php echo $col['name']?>" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="lname" ;>Account Number:</label>
                    <input type="text" name="Anumber"  value="<?php echo $col['number']?>" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="password" ;>Bank Name:</label>
                    <input type="text" name="Bname" value="<?php echo $col['ifsc']?>" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="password" ;>IFSC Code:</label>
                    <input type="text" name="ifsc" value="<?php echo $col['branch']?>" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="cpass" ;>Branch Name:</label>
                    <input type="text" name="Brname" value="<?php echo $col['Bank_name']?>"  required>
                </div>
                <div class="inputfield">
                    <button type="submit" class="btn" name="add_bank" style="width:100px">Add</button>
                </div>
            </form>


        </div>
    </div>
    <br>
    <br>


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
