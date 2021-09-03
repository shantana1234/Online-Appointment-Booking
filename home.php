<?php include "session.php"; ?>
<html>

<head>
<title></title>

  <link rel="stylesheet" type="text/css" href="style_home.css">
    </head>
<body>
    <header>
        <div class="nav">
            <ul class="menu">
            <li><a href="about.php">About Us</a></li>
             <li><a href="check.php">check appointment</a></li>
            </ul>
        </div>
        <div class ="get">
        <h2>Book Appointment </h2><a href="apointment.php">Here</a><br>
        </div>
    <div class ="loginbox">
    <img src="avatar.jpg" class="avatar">
         <h1>Login Here</h1>
        <form action="home.php" method="POST">
            <p>Name : </p>
         <input type="text" name="username" placeholder="enter Username">
         <p>Password: </p>  
         <input type ="password" name="passward"  placeholder="enter password">
         <input type="submit" name="login" value="login">
         <a href="forgot.php">Lost your passward?</a><br>
         <a href="registration.php">Don't Have any accont?</a>
    
        </form>
        </div>
    </header>
</body>
</html>