<?php
session_start();

if (isset($_SESSION['uid'])) {
    // User is logged in.
} else {
    header('location: ../login.php');
    exit(); // Stop script execution after redirection.
}

include('../dbcon.php');

$sql = "SELECT * FROM `user_message`";
$run = mysqli_query($con, $sql);
?>

<html>
    <head>
        <title>Messages</title>
        <link rel="stylesheet" href="../CSS/usermessage.css" type="text/css">
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
                        <li class="logout"><a href="admindash.php">Dashboard</a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <table>
                    <tr>
                        <th class="id_h1">Id</th>
                        <th class="name_h1">Name</th>
                        <th class="email_h1">Email</th>
                        <th class="contact_h1">Contact No</th>
                        <th class="message_h1">Message</th>
                    </tr>

                <?php
                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                        <tr>
                            <th class="id_h1"><?php echo $row['id'] . '<br>'; ?></th>
                            <th class="name_h"><?php echo $row['u_name'] . '<br>'; ?></th>
                            <th class="email_h"><?php echo $row['u_email'] . '<br>'; ?></th>
                            <th class="contact_h"><?php echo $row['u_contact'] . '<br>'; ?></th>
                            <th class="message_h"><?php echo $row['u_message'] . '<br>'; ?></th>
                        </tr>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan=''>NO MESSAGE</td></tr>";
                    }
                    ?>
                    </table>
                </div>
            </header>
        </body>
        </html>