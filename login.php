<?php
session_start();

if (isset($_SESSION['uid'])) {
    header('location:PHP/admindash.php');
    exit();
}

include('dbcon.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $qry = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $run = mysqli_query($con, $qry);

    if (!$run) {
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_num_rows($run);

    if ($row < 1) {
        ?>
        <script>
            alert('Username or Password Not Match');
            window.location.href = 'login.php';
        </script>
        <?php
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];
        $_SESSION['uid'] = $id;
        header('location:PHP/admindash.php');
        exit();
    }
}
?>

<html>

<head>
    <title>Login here</title>
    <link rel="stylesheet" href="CSS/login.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="row clearfix">
                <ul class="main-nav" animate slideInDown>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="PHP/aboutus.php">About Us</a></li>
                    <li><a href="PHP/contactus.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="login-content-header">
            <form action="login.php" method="post">
                <h1 class="login_heading">Admin Login</h1>
                <table class="table">
                    <tr>
                        <th>Username:</th>
                        <td class="table"><input type="text" name="username" placeholder="Enter Username" class="field1"required /></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td class="table"><input type="password" name="password" placeholder="Enter Password" class="field1"required /></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3"><input type="submit" name="submit" value="SUBMIT" class="submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </header>
</body>
</html>