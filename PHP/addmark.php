<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
    exit();
}
?>

<html>
    <head>
        <title>Add Marks</title>
        <link rel="stylesheet" href="../CSS/addmark.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        
                        <li><a href="../index.php"> Home </a></li>
                        <li><a href="aboutus.php"> About Us</a></li>
                        <li><a href="contactus.php"> Contact Us</a></li>
                        <li class="logout"><a href="admindash.php"> Dashboard </a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <h2>Enter the Details of Student</h2>
                <form method="post" enctype="multipart/form-data" action="secondstep.php">
                    <table class="table1">
                        <tr>
                            <th>Name:</th>   <th>Class:</th> <th>Roll No:</th>
                        </tr>
                        <tr>
                            <td class="table"><input type='text' name='name' placeholder='Enter Full Name' required class="field1"/></td>
                            <td class="table"><input type='text' name='class' placeholder='Class' required class="field1"/></td>
                            <td class="table"><input type='text' name='rollno' placeholder='RollNo' required class="field1"/></td>
                            
                        </tr>
                    </table>
                    <table class="table1">
                        <tr>
                            <th>Father Name:</th>   <th> Mother Name:</th> <th>Mobile No:</th><th>City:</th>
                        </tr>
                        <tr>
                            <td class="table"><input type='text' name='father' placeholder="Father's Name" required class="field1"/></td>
                            <td class="table"><input type='text' name='mother' placeholder="Mother's Name" required class="field1"/></td>
                            <td class="table"><input type='text' name='mobile' placeholder='Mobile No' required class="field1"/></td>
                            <td class="table"><input type='text' name='city' placeholder='City' required class="field1"/></td>
                        </tr>
                    </table>
                    <table class="table2">
                        <tr>
                            <th>Profile Image</th>
                            <td><input type="file" name="img" required/></td>
                        </tr> 
                    </table>
                    <table class="table3">
                        <tr>
                            <td align="center" colspan="3"><input type="submit" name="submit" value="NEXT" class="next_Step"/></td>  
                        </tr>
                    </table>
                </form>
            </div>
        </header>
    </body>
</html> 