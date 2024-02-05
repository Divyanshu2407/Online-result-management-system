<?php
if(isset($_POST['submit'])) {
    include('../dbcon.php');

    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);

    $hindi1 = mysqli_real_escape_string($con, $_POST['hindi1']);
    $english1 = mysqli_real_escape_string($con, $_POST['english1']);
    $math1 = mysqli_real_escape_string($con, $_POST['math1']);
    $physics1 = mysqli_real_escape_string($con, $_POST['physics1']);
    $chemistry1 = mysqli_real_escape_string($con, $_POST['chemistry1']);

    $hindi2 = mysqli_real_escape_string($con, $_POST['hindi2']);
    $english2 = mysqli_real_escape_string($con, $_POST['english2']);
    $math2 = mysqli_real_escape_string($con, $_POST['math2']);
    $physics2 = mysqli_real_escape_string($con, $_POST['physics2']);
    $chemistry2 = mysqli_real_escape_string($con, $_POST['chemistry2']);
    
    $sql = "UPDATE `user_mark` SET 
    `u_hindi1` = '$hindi1', 
    `u_english1` = '$english1', 
    `u_math1` = '$math1', 
    `u_physics1` = '$physics1', 
    `u_chemistry1` = '$chemistry1',
    `u_hindi2` = '$hindi2', 
    `u_english2` = '$english2', 
    `u_math2` = '$math2', 
    `u_physics2` = '$physics2', 
    `u_chemistry2` = '$chemistry2' 
    WHERE `u_rollno` = '$rollno'";
    
    $run = mysqli_query($con, $sql);
    if($run) {
        ?>
        <script>
        alert('Data Updated');
        window.open('updatemark.php', '_self');        
        </script>
        <?php
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    ?>
