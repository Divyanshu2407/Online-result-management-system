<?php
session_start();

if (isset($_SESSION['uid'])) {
    echo " ";
} else {
    header('location: ../login.php');
}
?>
<html>
    <head>
        <title>Student Details</title>
        <link rel="stylesheet" href="../CSS/allstudentdata.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="../index.php"><b>Home</b></a></li>
                        <li><a href="aboutus.php"><b>About Us</b></a></li>
                        <li><a href="contactus.php"><b>Contact Us</b></a></li>
                        <li class="logout"><a href="admindash.php"><b>Dashboard</b></a></li></ul>
                    </div>
                </nav>
                <div class="main-content-header">
                    <h2>Student Records</h2>
                    <form>
                        <table>
                            <tr>
                                <th class="id_h1">Id</th>
                                <th class="name_h1">Name</th>
                                <th class="contact_h1">Class</th>
                                <th class="contact_h1">RollNo</th>
                                <th class="contact_h1">Father Name</th>
                                <th class="contact_h1">Mother Name</th>
                                <th class="contact_h1">City</th>
                                <th class="name_h1">Mobile No</th>
                            </tr>
                            
                            <?php
                            include('../dbcon.php');
                            $sql = "SELECT * FROM `student_data`";
                            $run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_assoc($run)) {
                                    ?>
                                    <tr>
                                        <th class="id_h"><?php echo $row['id']; ?></th>
                                        <th class="name_h"><?php echo $row['u_name']; ?></th>
                                        <th class="email_h"><?php echo $row['u_class']; ?></th>
                                        <th class="contact_h"><?php echo $row['u_rollno']; ?></th>
                                        <th class="contact_h"><?php echo $row['u_father']; ?></th>
                                        <th class="contact_h"><?php echo $row['u_mother']; ?></th>
                                        <th class="contact_h"><?php echo $row['u_city']; ?></th>
                                        <th class="message_h"><?php echo $row['u_mobile']; ?></th>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3'> No record found </td></tr>";
                                }
                                ?>
                                </table>
                            </form>
                        </div>
                    </header>
                </body>
            </html>
