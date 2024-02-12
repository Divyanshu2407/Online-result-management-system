<?php
if (isset($_POST['submit'])) {

    include('dbcon.php');

    $CLASS = $_POST['class'];
    $ROLLNo = $_POST['rollno'];

    $sql = "SELECT * FROM `student_data` WHERE `u_class`=? AND `u_rollno`=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $CLASS, $ROLLNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        $sql2 = "SELECT * FROM `user_mark` WHERE `u_class`=? AND `u_rollno`=?";
        $stmt2 = mysqli_prepare($con, $sql2);
        mysqli_stmt_bind_param($stmt2, "ss", $CLASS, $ROLLNo);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);

        if ($result2->num_rows > 0) {
            $data2 = $result2->fetch_assoc();
            ?>

<html>
    <head>
        <title>Result</title>
        <link rel="stylesheet" href="CSS/result.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="index.php"><b>HOME</b></a></li>
                        <li><a href="admin/aboutus.php"><b>ABOUT</b></a></li>
                        <li><a href="admin/contactus.php"><b>CONTACT</b></a></li>
                        <li><a href="login.php"><b>ADMIN LOGIN</b></a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <form method="post" action="result.php">
                    <table class="table">
                        <img src="Profileimage/<?php  echo $data['u_image']; ?>" class="image2" />
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $data['u_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Class:</th><td><?php echo $data2['u_class']; ?></td>
                        </tr>
                        <tr>
                            <th>Roll No:</th>
                            <td><?php echo $data['u_rollno']; ?></td>
                        </tr>
                        <tr>
                            <th>Father Name:</th>
                            <td><?php echo $data['u_father']; ?></td>
                        </tr>
                        <tr>
                            <th>City :</th>
                            <td><?php echo $data['u_city']; ?></td>
                        </tr>
                    </table>
                    <table class="table2">
                        <tr>
                            <th class="table2 color">Suject</th>
                            <th class="table2 color">Mid-Term Marks</th>
                            <th class="table2 color">Final-Term Marks</th>
                            <th class="table2 color"> Total</th>
                            <th class="table2 color">Maximum Marks</th>
                        </tr>
                        <tr>
                            
                        <th class="table2 color">Hindi</th>
                        <th class="table2"><?php echo $data2['u_hindi1']; ?></th>
                        <th class="table2"><?php echo $data2['u_hindi2']; ?></th>
                        <th class="table2"><?php echo $total1 = $data2['u_hindi1']+$data2['u_hindi2']; ?> </th>
                        <th class="table2">200</th>
                    </tr>
                    <tr>  
                        <th class="table2 color">English</th>
                        <th class="table2"><?php echo $data2['u_english1']; ?></th>
                        <th class="table2"><?php echo $data2['u_english2']; ?></th>
                        <th class="table2"><?php echo $total2 = $data2['u_english1']+$data2['u_english2']; ?> </th>
                        <th class="table2">200</th>
                    </tr>
                    <tr>
                        <th class="table2 color">Math</th>
                        <th class="table2"><?php echo $data2['u_math1']; ?></th>
                        <th class="table2"><?php echo $data2['u_math2']; ?></th>
                        <th class="table2"><?php echo $total3 = $data2['u_math1']+$data2['u_math2']; ?> </th>
                        <th class="table2">200</th>
                    </tr>
                    <tr>
                        <th class="table2 color">Physics</th>
                        <th class="table2"><?php echo $data2['u_physics1']; ?></th>
                        <th class="table2"><?php echo $data2['u_physics2']; ?></th>
                        <th class="table2"><?php echo $total4 = $data2['u_physics1']+$data2['u_physics2']; ?></th>
                        <th class="table2">200</th>
                    </tr>
                    <tr>
                        <th class="table2 color">Chemistry</th>
                        <th class="table2"><?php echo $data2['u_chemistry1']; ?></th>
                        <th class="table2"><?php echo $data2['u_chemistry2']; ?></th>
                        <th class="table2"><?php echo $total5 = $data2['u_chemistry1']+$data2['u_chemistry2']; ?></th>
                        <th class="table2">200</th>
                    </tr>
                    <tr>
                        <th class="color">Total</th>
                        <th>
                            <?php echo $data2['u_hindi1'] + $data2['u_english1'] + $data2['u_math1'] + $data2['u_physics1'] + $data2['u_chemistry1']; ?>
                        </th>
                        <th>
                            <?php echo $data2['u_hindi2'] + $data2['u_english2'] + $data2['u_math2'] + $data2['u_physics2'] + $data2['u_chemistry2']; ?>
                        </th>
                        <th><span class="colorchange"><?php echo $all = $total1 + $total2 + $total3 + $total4 + $total5; ?></span></th>
                        
                        <th>1000</th>
                        
                    </tr>
                </table>
                    <span class="colorchange1">
                        <?php 
                        if($all <= 250) 
                        {
                            echo " Sorry, you failed😔. ";
                        }
                        else
                        {
                            echo " Congratulations! you passed😊. ";
                        }
                        ?>
                        </span>
                    <marquee class="dk" behaviour="scroll" direction="left"> <p>Your results have been declared. Please review your marks and if you notice any discrepancies, contact the authorities. </p></marquee>
                </form>
            </div>
        </header>
    </body>
    </html>
    <?php
    } else {
        ?>
        <script>
        alert('Records not found');
        window.open('index.php', '_self');
        </script>
        <?php
        }
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
    }
}
?>