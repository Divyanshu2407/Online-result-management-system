<?php
session_start();

if(isset($_SESSION['uid'])) {
    echo ""; 
} else {
    header('location: ../login.php');
    exit(); // Add exit after header to stop further execution
}
?>


<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="../CSS/secondstep.css" type="text/css">
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
                        <li><a href="admindash.php">Dashboard</a><li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                
            <form method="post" action="thirdstep.php">
                <h2> Add Exam mark </h2>
                <td><input type="hidden" name="class" class="class" value="<?php  echo $_POST['class']; ?>" required/></td>
                <td><input type="hidden" name="rollno" class="rollno" value="<?php  echo $_POST['rollno']; ?>" required/></td>
                
                <table class="table1">
                    <span> <h4 class="h3"> First Term Exam </h4></span>
                    
                    <tr>
                        <th>Hindi</th>   <th> English </th> <th>Math</th>
                    </tr>
                    <tr>
                        <td class="table"><input type='text' name='hindi1' placeholder='Hindi' required class="field1"/></td>
                        <td class="table"><input type='text' name='english1' placeholder='English' required class="field1"/></td>
                        <td class="table"><input type='text' name='math1' placeholder='Math' required class="field1"/></td>
                    </tr>
                    
                </table>
                <table class="table2">
                    <tr>
                        <th>Physics</th>   <th>Chemistry</th> 
                    </tr>
                    <tr>
                        <td class="table"><input type='text' name='physics1' placeholder='Physics' required class="field1"/></td>
                        <td class="table"><input type='text' name='chemistry1' placeholder='Chemistry' required class="field1"/></td>
                    </tr>
                    
                </table>
                <span> <h4 class="h3"> Second Term Exam </h4> </span>
                
                <table class="table1">
                    <tr>
                        <th>Hindi</th>   <th>English</th> <th>Math</th>
                    </tr>
                    <tr>
                        <td class="table"><input type='text' name='hindi2' placeholder='Hindi' required class="field1"/></td>
                        <td class="table"><input type='text' name='english2' placeholder='English' required class="field1"/></td>
                        <td class="table"><input type='text' name='math2' placeholder='Math' required class="field1"/></td>
                    </tr>
                </table>
                
                <table class="table2">
                    <tr>
                        <th>Physics</th>   <th>Chemistry</th> 
                    </tr>
                    <tr>
                        <td class="table"><input type='text' name='physics2' placeholder='Physics' required class="field1"/></td>
                        <td class="table"><input type='text' name='chemistry2' placeholder='Chemistry' required class="field1"/></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="5"><input type="submit" name="submit" value="SUBMIT" class="submit"/></td>   
                    </tr>
                </table>
            </form>
        </div>
    </header>
</body>
</html>

<?php
if(isset($_POST['submit']))
{ 
    include('../dbcon.php');
    
    $username = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
    $father = mysqli_real_escape_string($con, $_POST['father']);
    $mother = mysqli_real_escape_string($con, $_POST['mother']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    
    $imagename = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname, "../Profileimage/$imagename");
    
    $sql="INSERT INTO `Student_data`(`u_name`, `u_class`, `u_rollno`, `u_father`, `u_mother`, `u_mobile`, `u_city`, `u_image`) 
    VALUES ('$username','$class','$rollno','$father','$mother','$mobile','$city','$imagename')";
    $run=mysqli_query($con,$sql);
    if($run)
    {
        ?>
        <script>
        alert('first step is completed, and this is the next step');
        </script>
        <?php
        }
        else
        {
            ?>
            <script>
            alert('Failed');
            </script>
            <?php 
            }
        }
        ?>