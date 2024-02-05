<?php
session_start();

if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}
?>

<html>
    <head>
        <title>Delete Mark</title>
        <link rel="stylesheet" href="../CSS/updatemark.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
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
                <form method="post" action="deleteform.php">
                    <table class="table1">
                        <h1 align="center">Search for student & Delete their marks</h1>
                        <tr>
                            <th>Student Class: </th>
                            <td><input type="text" name="class" placeholder="Class" class="box"/></td>
                            <th>Student Rollno: </th>
                            <td><input type="text" name="rollno" placeholder="Roll No." class="box"/></td>
                            <th><input type="submit" value="SEARCH" name="submit" class="submit" /></th>
                        </tr>
                    </table>
                    <table class="table2">
                        <tr>
                            <th class="student_id">Id</th>
                            <th class="student_class">Name</th>
                            <th class="student_class">Father Name</th>
                            <th class="student_class">Address</th>
                            <th class="student_class">Class</th>
                            <th class="student_class">Roll No</th>
                            <th class="student_edit">Delete</th>
                        </tr>
                        <?php
                        if (isset($_POST['submit'])) {
                            include('../dbcon.php');
                            $class = mysqli_real_escape_string($con, $_POST['class']);
                            $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
                            $sql = "SELECT * FROM `student_data` WHERE `u_class`='$class'  AND `u_rollno`='$rollno' ";
                            $run = mysqli_query($con, $sql);
                            
                            if (mysqli_num_rows($run) > 0) {
                                while ($data = mysqli_fetch_assoc($run)) {
                                    ?>
                                    <tr>
                                        <th class="student_class2"><?php echo $data['id']; ?></th>
                                        <th class="student_class2"><?php echo $data['u_name']; ?></th>
                                        <th class="student_class2"><?php echo $data['u_father']; ?></th>
                                        <th class="student_class2"><?php echo $data['u_city']; ?></th>
                                        <th class="student_class2"><?php echo $data['u_class']; ?></th>
                                        <th class="student_class2"><?php echo $data['u_rollno']; ?></th>
                                        <th class="student_class2"><a href="delete_data.php?sid=<?php echo $data['u_rollno']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></th>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7" align="center">No Record Found</td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                                </table>
                            </form>
                        </div>
                    </header>
                </body>
            </html>
