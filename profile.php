<?php include "session.php"; ?>
<?php

if(isset($_SESSION['username'])){
    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_user_profile_query)){
        
        $db_id = $row['id'];
        $db_username = $row['username'];
        $db_passward = $row['passward'];
        $db_email = $row['email'];
        $db_phone = $row['phone'];
    
    }
}
?>

<html>
<head>
<title></title>
     <link rel="stylesheet" type="text/css" href="style_profile.css">
</head>
<body>
<header>
    
   <div class ="profile">
       <form action="profile.php" method="POST">
        <h1><a href="logout.php">LOGOUT</a></h1>
        <h2>Welcome <?php echo $db_username;?> !! </h2>  
        <p><b>USER_NAME : </b></p><?php echo "$db_username"; ?>
        <p><b>EMAIL : </b></p><?php echo $db_email; ?>
        <p><b>PHONE NUMBER : </b></p><?php echo $db_phone; ?>
        <p><a href ="app.php"><b>Check Your Appointment List</b></a></p>
           
     </form>
        </div>
    </header>
</body>
</html>