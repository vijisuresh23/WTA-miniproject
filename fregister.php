<?php  include('server.php');?>
<!doctype html>
<html lang="en">

<head>
    <title>Farmer registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="bg-img">
        <div class="wrapper">
            <div class="navbar-brand" href="#">
                <img id="navbarimg" src="images/logo.png" alt="logo">
            </div>
            <header>Farmer registration Form </header>
            <form method="POST" action="fregister.php" class="form">
                <div class="inputfield">
                    <label class="label" for="ksn" style="color:white" ;>KissanCardNumber:</label>
                    <input type="text" placeholder="Kissan_card_number" name="username" required id="username">
                </div>
                <div class="inputfield">
                    <label class="label" for="fname" style="color:white" ;>FirstName:</label>
                    <input type="text" placeholder="Firstname" name="fname" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="lname" style="color:white" ;>LasteName:</label>
                    <input type="text" placeholder="Lastname" name="lname" required>
                </div>
                <div class="inputfield">
                    <label class="label" for="password" style="color:white" ;>Password:</label>
                    <input type="password" placeholder="password" name="password" required id="password">
                </div>
                <div class="inputfield">
                    <label class="label" for="cpass" style="color:white" ;>Confirm Password:</label>
                    <input type="password" placeholder="confirm Password" name="cpass" required id="cpass">
                </div>

                <div class="inputfield">
                    <label class="label" for="state" style="color:white" ;>State:</label>
                    <select name="state" id="state" class="input" required>
                        <option value="default">Select</option>
                        <option value="Karnataka">Karnataka</option>

                    </select>
                </div>
                <div class="inputfield">
                    <label class="label" style="color:white" ;>District:</label>
                    <select name="district" id="district" class="input" required>
                        <option value="default">Select</option>
                        <option value="Tumkur">Tumkur</option>
                        <option value="Mandya">Mandya</option>
                        <option value="Mysore">Mysore</option>
                        <option value="Hassan">Hassan</option>
                        <option value="Bangalore Urban">Bangalore Urban</option>
                        <option value="Bangalore Rural">Bangalore Rural</option>
                        <option value="Kolar">Kolar</option>
                        <option value="Chamarajanagara">Chamarajanagara</option>

                    </select>

                </div>
                <div class="inputfield">
                    <label class="label" for="phone" style="color:white" ;>Phone Number:</label>
                    <input type="text" placeholder="PhoneNumber" name="phoneNumber" required id="phoneNumber">
                </div>
                <div class="inputfield">
                    <label class="label" for="postalcode" style="color:white" ;>Postal Code:</label>
                    <input type="text" placeholder="postal Code" name="postalCode" required id="postalCode">
                </div>
                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p style="color:white" ;>Agreed to terms and conditions</p>
                </div>
                <div class="inputfield">
                    <button type="submit" class="btn" name="reg_farmer"
                        onclick="return validate_farmer()">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>