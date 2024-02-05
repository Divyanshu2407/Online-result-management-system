<html>
  <head>
    <title>Online Result Management System</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  </head>
  <body>
      <header>
        <nav>
          <div class="row clearfix">
              <ul class="main-nav" animate slideInDown>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="PHP/aboutus.php">About Us</a></li>
                  <li><a href="PHP/contactus.php">Contact Us</a></li>
                  <li><a href="login.php">Admin Login</a></li>
            </ul>
          </div>
      </nav>
      <div class="main-content-header">
        <form method="post" action="result.php">
          <table class="table">
            <br>
            <h2 class="search">CHECK YOUR RESULT HERE  :) </h2>
            <br>
            <tr>
              <th class="name1">CLASS: </th>
              <td class="table"><input type="text" name="class" placeholder=" Enter Class" required class="field1"/></td>
            </tr>
            <tr>
              <th class="name1">ROLLNo: </th>
              <td class="table"><input type="text" name="rollno" placeholder=" Enter RollNo." required class="field1"/></td>
            </tr> 
            <tr><td align="center" colspan="3"><input type="submit" name="submit" value="SUBMIT" class="submit"/></td>
          </tr>
        </table>
      </form>
    </div>
  </header>
</body>
</html>