<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center" style="background-color:#212529; background-repeat: no-repeat; background-size: 100% 100%; color: black;">
    <form action="includes/login.inc.php" method="post" class="form-signin">
        <img class="mb-4" src="" alt="" width="100" height="100">
        <img class="mb-4" src="images/logocac.png" alt="" width="200" height="200">
        <h1 class="h3 mb-3 font-weight-normal" style="font-size: x-large; color: #fff;">Please Login</h1>

        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p style="color: red;">Fill in all fields!</p>';
            } elseif ($_GET['error'] == "sqlerror") {
                echo '<p style="color: red;">Please try again!</p>';
            } elseif ($_GET['error'] == "wrongpwd") {
                echo '<p style="color: red;">Your password is incorrect!</p>';
            } elseif ($_GET['error'] == "nouser") {
                echo '<p style="color: red;">Incorrect Username & Email!</p>';
            }
        }
        ?>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="username" class="form-control" placeholder="Username/Email..." required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label style="font-size: x-large; color: #fff;">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="login-submit" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</body>
</html>
