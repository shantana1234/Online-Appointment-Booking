<?php include "connections.php" ?>
<?php

   if(isset($_POST['submit'])){
       $pass = $_POST['pass'];
       $email = $_POST['email'];
       $query = "SELECT email FROM users WHERE email = '$email' ";
     $select_user_query = mysqli_query($connection, $query);
       
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }
    
     if(mysqli_num_rows($select_user_query) >0 ){ 
         $result = "UPDATE users SET passward = '$pass' WHERE email = '$email'";
         $result2 =  mysqli_query($connection, $result);
         if(isset($result2)){
             header("Location: ..//project/update.php");
         }
         else echo "failed";
    }
   }
?>



<html>
<head>
    
    <title></title>
    <link rel="stylesheet" type="text/css" href="style_forgot.css">
</head>
<body>
    <header><h>*Forgot your password? Please enter your email and reset the password*</h>
 <div class = "box">
    <form action="forgot.php" method="POST">
        <p><b>Email : </b></p>
        <input type="text" name="email" placeholder="enter your Email">
        <p><b>Password : </b></p>
        <input type="password" name="pass" placeholder="enter a new password">
        <p><b>Confirm Password : </b></p>
        <input type="password" name="pass" placeholder="enter  new password"><br>
        <input type="submit" name="submit" value="submit">
    </form>
     <a href="home.php">Go to privious page?</a>
     </div>
      </header>  
    
</body>
</html>