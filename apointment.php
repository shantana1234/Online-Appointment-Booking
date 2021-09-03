<?php include "connections.php" ?>

<?php

if(isset($_POST['submit'])){
    $doctor = $_POST['dc'];
    $patientname = $_POST['patientname'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $day = $_POST['day'];  
    $time = $_POST['time']; 
    $status = "Pending";
    
    $connection = mysqli_connect('localhost', 'root' ,'', 'appointment');
    
    $query ="INSERT INTO gets(dc, patientname ,roll, phone, day ,time ,Status)" ;
    $query.= "VALUES( '$doctor','$patientname','$roll', '$phone', '$day' ,'$time','$status')" ;
    $result =  mysqli_query( $connection, $query);
                           if(!$result){
                               die("query failed");
                           } 
    
}
?>

<html>
<head>
    <title></title>
             <link rel="stylesheet" type="text/css" href="style_app.css">
    
</head>
<body>
<header>
    <div class = "loginbox">
<h2>Appointment Booking Form</h1>
        <p>Doctor : </p>&nbsp<form action = "apointment.php" method ="POST" >
        <select name="dc">
    <option>doctor</option>
          <?php include "connections.php";
                    $query = "SELECT username FROM users";
                    $select_user_query = mysqli_query($connection, $query);
  
                    if(!$select_user_query){
                         die("query failed". mysqli_error($connection));
                                     }
    
                    while($row = mysqli_fetch_array($select_user_query)){
                         $db_username = $row['username']; 
            ?>

     <option value = "<?php echo $db_username ; ?>"> <?php echo "$db_username" ?></option>
        <?php
                    }
        ?>
        
    </select>
 <br>   
<b>patient name :</b><input type="text" name="patientname" placeholder="enter Username"> <br>
<b>Roll number: </b><input type ="int" name="roll"  placeholder="enter your roll number"><br>
<b>Phone number: </b><input type ="text" name="phone"  placeholder="enter your phone number"><br>
<b>Date</b> : <input type ="date" name= "day"><br>
<p>time: </p><form action = "apointment.php" method ="POST" >
        <select name = "time">
            <option value ="select a Time">Select a Time</option>
            <option value = "10.00-11.00">10.00-11.00</option>
            <option value = "11.00-12.00">11.00-12.00</option>
            <option value = "12.00-1.00">12.00-1.00</option>
            <option value = "3.00-4.00">3.00-4.00</option>
            <option value = "4.00-5.00">4.00-5.00</option>
            <option value = "5.00-6.00">5.00-6.00</option>
     </select> <br>  <br>  
<input type="submit" name="submit" value="Submit"><br>
               <a href="home.php">GO BACK</a>
        </form></form>
    </div>
</header>
</body>
</html>