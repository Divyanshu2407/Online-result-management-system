<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
} else {
    echo "";
}
?>

<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="../CSS/addmark.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        
    </head>
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <img src="../image/logo_1.png" class="logo"/>
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <h2> Student Details </h2>
            </div>
        </header>
    </body>
    </html>
    <?php
    if(isset($_POST['submit']))
    {
        include('../dbcon.php');
        $class=$_POST['class'];
        $rollno=$_POST['rollno'];
        
        $hindi1=$_POST['hindi1'];
        $english1=$_POST['english1'];
        $math1=$_POST['math1'];
        $physics1=$_POST['physics1'];
        $chemistry1=$_POST['chemistry1'];
        
        $hindi2=$_POST['hindi2'];
        $english2=$_POST['english2'];
        $math2=$_POST['math2'];
        $physics2=$_POST['physics2'];
        $chemistry2=$_POST['chemistry2'];
        
        $sql="INSERT INTO `user_mark`(`u_rollno`,`u_class`,`u_hindi1`, `u_english1`, `u_math1`, `u_physics1`, `u_chemistry1`, `u_hindi2`, `u_english2`, `u_math2`, `u_physics2`, `u_chemistry2`) 
        VALUES ('$rollno','$class','$hindi1','$english1','$math1','$physics1','$chemistry1','$hindi2','$english2','$math2','$physics2','$chemistry2')";
        
        $run=mysqli_query($con,$sql);if($run)
        {
            ?>
            <script>
            alert('Data Inserted');
            window.open('admindash.php?sid=<?php echo $rollno; ?>', '_self');
            </script>
            <?php
            }
        }
        ?>