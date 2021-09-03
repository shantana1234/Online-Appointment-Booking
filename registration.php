<?php include "connections.php"; ?>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $passward = $_POST['passward'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];  
    
    $query ="INSERT INTO users(username, passward , email,  phone )" ;
    $query.= "VALUES('$username','$passward', '$email' ,'$phone')" ;
    $result =  mysqli_query( $connection, $query);
                           if(!$result){
                               die("query failed");
                           }
    
}
?>
<html>

<head>
<title></title>

    <link rel="stylesheet" type="text/css" href="style_rej.css">
    </head>
<body>
    <header>
    
    <div class ="loginbox">
         <h1>Registration Form</h1>
        <br>
        <form action="registration.php" method="POST">
        <p>User Name: </p>
         <input type="text" name="username" placeholder="enter Username">
         <p>Password: </p>  
         <input type ="password" name="passward"  placeholder="enter password">
            <p>Email  </p>
         <input type="text" name="email" placeholder="enter a valid email">
         <p>Phone Number </p>  
         <input type ="text" name="phone"  placeholder="enter phone number">
         <input type="submit" name="submit" value="submit">
         <a href="home.php">GO BACK</a>
    
        </form>
        </div>
        </header>
    </body>
</html>
