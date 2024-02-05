<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" href="../CSS/contactus.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="row clearfix">
                    <ul class="main-nav" animate slideInDown>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="../login.php">Admin Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content-header">
                <form method='post'>
                    <table class="table">
                        <h2 class="search"> Please feel free to share any messages or concerns with us!</h2>
                        <tr>
                            <th class='name1'>Enter Your Name:</th>
                        </tr>
                        <tr>
                            <td class="table"><input type='text' name='name' placeholder='Full Name' required class="field1"/></td>
                        </tr>
                        <tr>
                            <th class='name1'>Enter your Email:</th>
                        </tr>
                            <td class='table'><input type='text' name='email' placeholder='abc@gmail.com' required class="field1"/></td>
                        </tr>
                        <tr>
                            <th class='name1'>Enter your Contact No:</th>
                        </tr>
                        <tr>
                            <td class='table'><input type='text' name='cont' placeholder='Contact No' required class="field1"/></td>
                        </tr>
                        <tr>
                            <th class='name1'>Type your Message:</th>
                        </tr>
                        <tr>
                            <td class="table"><textarea name="message" placeholder='Type here...:)' required class="field1"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan='4' align='center'><input type="submit" name='submit' value='SEND' class='submit'/></td>
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
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $contact = mysqli_real_escape_string($con, $_POST['cont']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $sql = "INSERT INTO `user_message`(`u_name`, `u_email`, `u_contact`, `u_message`) VALUES ('$username','$email','$contact','$message')";
        $run = mysqli_query($con, $sql);
        if($run)
        {
            ?>
            <script>
            alert('Your message has been sent to the Admin');
            </script>
            <?php
            }
        }
        ?>
                                