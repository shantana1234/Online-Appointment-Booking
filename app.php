<?php include "session.php" ?>
<?php 
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client ;
$connection = mysqli_connect('localhost', 'root' ,'', 'appointment');


if(isset($_SESSION['username'])){
    
 $username = $_SESSION['username'];
$query = "SELECT * FROM gets WHERE dc = '{$username}' ";
    
    $select_user_query = mysqli_query($connection, $query);
  
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }
}
?>
<html>

<head>
<title>your appointments!</title>
    <link rel="stylesheet" type="text/css" href="style_app_list.css">
    </head>
<body>
    <header>
        <h1>&nbsp&nbsp&nbsp<?php echo "$username"; ?>'s Appointment List- </h1> 
        <h2><a href="profile.php">Go back to your profile</a></h2>
    <form action="app.php" method="POST">   
        <div class="hii">
        <table border = "10">
                 <thead>
                    <th>PATIENT NAME </th>
                    <th>PATIENT ROLL </th>
                    <th>DATE  </th>
                    <th>TIME  </th>
                    <th>CHECK</th>
                    <th>STATUS</th>
                </thead>
    
      <tr>
<?php
    $i = 1;
    while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_patientname = $row['patientname'];
        $db_roll = $row['roll'];
        $db_phone = $row['Phone'];
        $db_date = $row['day'];
        $db_time = $row['time'];
        $db_status = $row['Status'];?>
          
                   <td><?php echo "$db_patientname";?></td>
                    <td><?php echo "$db_roll"; ?></td>
                    <td><?php echo "$db_date"; ?></td>
                    <td><?php echo "$db_time"; ?></td>
                    <?php echo "<td><input type='checkbox' name='check[$i]' value='$db_id'/>"; ?>
                    <td><?php echo "$db_status" ; ?></td>
                    
                    
                </tr>
      
        
     <?php
        $i++;
      }
?>
    </table>
        <p><input type ="submit" name="submit" value="submit"></p>
      <p><input type ="submit" name="submit2" value="Send SMS To the rejected booking "></p>
        <?php
if(isset($_POST['submit']))
{
        if(isset($_POST['check']))
            {
                    foreach ($_POST['check'] as $value){
                        $sql = "update gets set status ='Approved' where id = '$value'" ; 
                        $result2 =  mysqli_query($connection, $sql);
$sms = "SELECT * FROM gets WHERE id = '$value'" ;
$user_query = mysqli_query($connection, $sms);
 while($row = mysqli_fetch_array($user_query)){
        $name = $row['patientname'];
        $To = $row['Phone'];
$account_sid = 'ACe9e74533470acb939467cea14159088b';
$auth_token = '7ab381b8bb8a113a05160f5fd9a31b6e';
$twilio_number = "+18446737056";
$msg = " \nDear ".$name.", Your Appointment has been approved.\nPlease Come On Time. \nThank you.\n-RUET MEDICAL CENTER";
$client = new Client($account_sid, $auth_token);
                        
$message = $client->messages->create(
    $To,
    array(
        'from' => $twilio_number,
        'body' => $msg
    )
    
);
                        
                    }
        }
        }
}
 if(isset($_POST['submit2'])){
     $pen = "Pending" ;
$sms2 = "SELECT * FROM gets WHERE Status = '$pen'" ;
$user_quy = mysqli_query($connection, $sms2);
 while($row = mysqli_fetch_array($user_quy)){
        $name = $row['patientname'];
        $To = $row['Phone'];
$account_sid = 'ACe9e74533470acb939467cea14159088b';
$auth_token = '7ab381b8bb8a113a05160f5fd9a31b6e';
$twilio_number = "+18446737056";
$msg = " \nDear ".$name.", Your Appointment has been rejected.\nPlease try on another time.\nThank you.\n-RUET MEDICAL CENTER";
$client = new Client($account_sid, $auth_token);
                        
$message = $client->messages->create(
    $To,
    array(
        'from' => $twilio_number,
        'body' => $msg
    )
    
);
$sql = "update gets set status ='Rejected' where Status = '$pen' " ; 
$result2 =  mysqli_query($connection, $sql);
     
 }
 }
      
      
?>
        
</form>
        </div>
    </header>
</body>
</html>