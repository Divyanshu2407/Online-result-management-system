<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}


?>
<html>
  <head>
    <title>Update Record</title>
    <link rel="stylesheet" href="../CSS/updatemark.css" type="text/css">
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
            <li class="logout"><a href="admindash.php"><b>Dashboard</b></a></li>
          </ul>
        </div>
      </nav>
      <div class="main-content-header">
        <form method="post" action="updatemark.php">
          <table class="table1">
            <h1>Search for student and Update their marks</h1>
            <tr >
              <th class="h_1">Enter Class: </th>
              <td><input type="text" name="class" class="box" placeholder="Class" /></td>
              <th>Roll No: </th>
              <td><input type="text" name="rollno" class ="box" placeholder="RollNo"/></td>
              <th ><input type="submit" value="SEARCH" name="submit" class="submit"/></th>
            </tr>
          </table>
          <table class="table2">
            <tr> 
              <th class="student_id box1">Id</th>
              <th class="student_class box1">Name</th>
              <th class="student_class box1">Father Name</th>
              <th class="student_class box1">Address</th>
              <th class="student_class box1">Class</th>
              <th class="student_class box1">Roll No</th>
              <th class="student_edit box1">Edit</th>
            </tr>
            <?php
            if(isset($_POST['submit']))
            {
              include('../dbcon.php');
              $class=$_POST['class'];
              $rollno=$_POST['rollno'];
              
              $sql="SELECT * FROM `student_data` WHERE `u_class`='$class'  AND `u_rollno`='$rollno' ";
              $run=mysqli_query($con,$sql);
              if(mysqli_num_rows($run)<0)
              {
                ?>
                <script>
                alert('No Record Found');
                </script>
                <?php
                } else {
                  while($data=mysqli_fetch_assoc($run)) {
                    ?>
                    <tr>
                      <th class="student_id"> <?php  echo $data['id'].'<br>'; ?></th>
                      <th class="student_class2"> <?php  echo $data['u_name'].'<br>'; ?></th> 
                      <th class="student_class2"> <?php  echo $data['u_father'].'<br>'; ?></th> 
                      <th class="student_class2"> <?php  echo $data['u_city'].'<br>'; ?></th> 
                      <th class="student_class2"> <?php  echo $data['u_class'].'<br>'; ?></th> 
                      <th class="student_class2"> <?php  echo $data['u_rollno'].'<br>'; ?></th> 
                      <th class="student_edit"><a href="updatemark_form.php?sid=<?php echo $data['u_rollno']; ?>">Edit</a></th> 
                    </tr>    
                    <?php  
                    }
                    
                  }
                }
                ?>
                </table>   
              </form>
            </div>
          </header>
        </body>
        </html>