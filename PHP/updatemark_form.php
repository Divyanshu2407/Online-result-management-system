<?php
session_start();

if(isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}
?>

<?php
include('../dbcon.php');
$rollno = $_GET['sid'];

$sql = "SELECT * FROM `student_data` WHERE `u_rollno`='$rollno'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);

$class = $row['u_class'];

$sql2 = "SELECT * FROM `user_mark` WHERE `u_class`='$class'";
$run2 = mysqli_query($con, $sql2);
$data = mysqli_fetch_assoc($run2);

?>

<html>
    <head>
        <title>Update Mark Details</title>
        <link rel="stylesheet" href="../CSS/updatemarkform.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="../index.php"><b>Home</b></a></li>
                        <li><a href="aboutus.php"><b>About</b></a></li>
                        <li><a href="contactus.php"><b>Contact</b></a></li>
                        <li><a href="admindash.php"><b>Dashboard</b></a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <form method="post" action="update_mark_data.php">
                    <table>
                        <h4>
                            <tr>
                                <th class="j2">Student  Name  : </th>
                                <td class="j3"><span class="span"><?php echo $row['u_name']; ?></span></td>
                            </tr>
                        </h4>
                        
                        <h4>
                            <tr>
                                <th class="j2">Student Class: </th>
                                <td class="j3"><span class="span"><?php echo $row['u_class']; ?></span></td>
                            </tr>
                        </h4>
                        
                        <h4>
                            <tr>
                                <th class="j2">Student RollNo: </th>
                                <td class="j3"><span class="span"><?php echo $row['u_rollno']; ?></span></td>
                            </tr>
                        </h4>
                    </table>
                    <table class="table1">
                        <span><h4 class="h3"> First Term Exam </h4></span>
                        <tr>
                            <th>Hindi</th> <th>English</th> <th>Math</th>
                        </tr>
                        <tr>
                            <td class="table"><input type='text' name='hindi1' placeholder="Hindi" value="<?php echo $data['u_hindi1']; ?>" class="field1" required/></td>
                        <td class="table"><input type='text' name='english1' placeholder="English" value="<?php echo $data['u_english1']; ?>" class="field1"/></td>
                    <td class="table"><input type='text' name='math1' placeholder="Math" value="<?php echo $data['u_math1']; ?> " class="field1" required/>
                </td>
            </tr>
        </table>
        <table class="table2">
            <tr>
                <th>Physics</th> <th>Chemistry</th>
            </tr>
            <tr>
                <td class="table"><input type='text' name='physics1' placeholder="Physics" value="<?php echo $data['u_physics1']; ?> " class="field1"required/></td>
                <td class="table"><input type='text' name='chemistry1' placeholder="Chemistry" value="<?php echo $data['u_chemistry1']; ?> " class="field1"required/></td>
            </tr>
        </table>
        <span><h4 class="h3"> Second Term Exam </h4></span>
        <table class="table1">
            <tr>
                <th>Hindi</th> <th>English</th> <th>Math</th>
            </tr>
            <tr>
                <td class="table"><input type='text' name='hindi2' placeHolder="Hindi" value="<?php echo $data['u_hindi2']; ?> " class="field1"required/></td>
                <td class="table"><input type='text' name='english2'placeholder="English" value="<?php echo $data['u_english2']; ?> " class="field1"required/></td>
                <td class="table"><input type='text' name='math2' placeholder="Math" value="<?php echo $data['u_math2']; ?> " class="field1"required/></td>
            </tr>
        </table>
        <table class="table2">
            <tr>
                <th>Physics</th> <th>Chemistry</th>
            </tr>
            <tr>
                <td class="table"><input type='text' name='physics2' placeholder="Physics"value="<?php echo $data['u_physics2']; ?> " class="field1"required/></td>
                <td class="table"><input type='text' name='chemistry2'placeholder="Chemistry" value="<?php echo $data['u_chemistry2']; ?> " class="field1"required/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="rollno" value="<?php echo $row['u_rollno']; ?>"/></td>
            </tr>
            <tr>
                <td align="center" colspan="3"><input type="submit" name="submit" value="SUBMIT" class="submit"/>
            </td>
        </tr>
    </table>
</form>
</div>
</header>
</body>
</html>