<?php
session_start();

if (isset($_POST['submit'])) {
    include_once('connection.php');
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT id,username,password FROM members where username = '$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUserName = $row[1];
        $dbPassword = $row[2];
    }
    if ($username == $dbUserName && $password == $dbPassword) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
        header('Location: food-menu.php');
    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>


<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="../php/food-menu.php">Food Menu</a>
        <a href="../php/cart.php">Shopping Cart</a>
        <h2 class="logo">Class Dash</h2>
    </nav>

    <header>
        <h1>Login</h1>
    </header>

    <div class="img-container">
        <img class="homepage-img" src="../images/food.jfif" alt="Food Image">
    </div>


    <form method="POST" action="login.php" class="login-form">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-input" type="text" name="username" required placeholder="Username">
            </div>

            <div class="form-section">
                <input class="form-input" type="password" name="password" required placeholder="Enter password">
            </div>
        </div>

        <input type="submit" name="submit" value="Login" class="submit-btn">

    </form>
</body>



</html>