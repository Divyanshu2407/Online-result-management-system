<?php
session_start();

if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../CSS/admindash.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                        <li class="logout"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <h1>DASHBOARD</h1>
                
                <h3><a href="addmark.php"> ☼ Add Student Marks </a></h3>
                <h3><a href="updatemark.php"> ☼ Update Student Marks </a></h3>
                <h3><a href="deleteform.php"> ☼ Delete Student Marks </a></h3>
                <h3><a href="allstudentdata.php"> ☼ Student Data </a></h3>
                <h3><a href="usermessage.php"> ☼ Messages by Student</a></h3>
            </div>
        </header>
    </body>
</html>
