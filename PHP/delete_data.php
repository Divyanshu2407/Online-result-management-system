<?php

include('../dbcon.php');

$rollno = mysqli_real_escape_string($con, $_REQUEST['sid']);

$sql1 = "DELETE FROM `user_mark` WHERE `u_rollno`='$rollno';";
$sql2 = "DELETE FROM `student_data` WHERE `u_rollno`='$rollno';";

$run1 = mysqli_query($con, $sql1);
$run2 = mysqli_query($con, $sql2);

if ($run1 && $run2) {
    ?>
    <script>
    alert('Data deleted successfully');
    window.open('deleteform.php?sid=<?php echo $rollno; ?>', '_self');
    </script>
    <?php
    } else {
        ?>
        <script>alert('Error deleting data');
        window.history.back();
        </script>
        <?php
        error_log(mysqli_error($con));
    }
    ?>
