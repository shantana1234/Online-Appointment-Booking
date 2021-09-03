<?php include "session.php" ?>
<?php
$connection = mysqli_connect('localhost', 'root' ,'', 'appointment');
$query = "SELECT * FROM gets ";
    
    $select_user_query = mysqli_query($connection, $query);
  
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }


?>
<html>
<head>
</head>
<body >
    <style>
        body{background-color: blanchedalmond;background-clip:border-box;}
        table{font-family: sans-serif;font-size: 20px;color: black; table-layout: auto;text-shadow ; fontwidth=100% ;}
        th{font-family: cursive;color:darkblue;}
        h{font-size-adjust: auto;font-size: 30px;color: darkgrey;}
   </style>
    <h>Check And Get Your Appointment Confirmation </h><br><br>
    <table border="10">
        <thead>
        <th>Doctor Name</th>
        <th>Patient Name</th>
        <th>Patient Roll</th>
        <th>appointment date </th>
        <th>appointment time </th>
        <th>Status </th>
         </thead>
       <tr>
        <?php
           while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_patientname = $row['patientname'];
        $db_roll = $row['roll'];
        $db_date = $row['day'];
        $db_time = $row['time'];
        $db_dc = $row['dc'];
        $db_status = $row['Status'];
        ?>
        <td><?php echo "$db_dc"; ?></td>
        <td><?php echo "$db_patientname";?></td>
        <td><?php echo "$db_roll"; ?></td>
        <td><?php echo "$db_date"; ?></td>
        <td><?php echo "$db_time"; ?></td>
           <td><?php echo "$db_status"; ?></td>
        </tr>
        <?php
           }
           ?>
    </table><br><br>
    <a href="home.php">GO TO HOME PAGE</a></body>
</html>