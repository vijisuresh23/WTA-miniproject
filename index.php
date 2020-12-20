<?php  include('server.php');?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-img">
        <div class="content">
            <div class="navbar-brand" href="#">
                <img id="navbarimg" src="images/logo.png" alt="logo">
            </div>
            <header>Login Form</header>
            <form action="index.php" method="POST">
                <div class="fields">
                    <span class="fa fa-user"></span>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="fields  space">
                    <span class="fa fa-lock"></span>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="radio-item">
                    <input type="radio" id="farmer" name="category" value="1">
                    <label for="farmer">Farmer</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="buyer" name="category" value="0">
                    <label for="buyer">Buyer</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="admin" name="category" value="2" checked>
                    <label for="admin">Admin</label>
                </div>
                <div class="fields space">
                    <span></span>
                    <input type="submit" value="submit" name="login_user">
                </div>
            </form>
            <div class="extra">
                <span>
                    <p style="font-size: 15px; color: white; font-weight: bold;">Register as <a
                            href="fregister.php">Farmer</a> or <a href="bregister.php">Buyer</a></p>
                </span>
            </div>
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
</body>

</html>