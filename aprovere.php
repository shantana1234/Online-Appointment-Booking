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
    <div class="hii">
        <form action="aprovere.php" method="post">
    <?php
      while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_patientname = $row['patientname'];
        $db_roll = $row['roll'];
        $db_phone = $row['Phone'];
        $db_date = $row['day'];
        $db_time = $row['time'];
        $db_status = $row['Status'];
          
             
        ?>
            
<table border="15">
                 <thead>
                    <th><b>PATIENT_NAME : </b></th>
                    <th><b>PATIENT_ROLL : </b></th>
                    <th><b>DATE : </b></th>
                    <th><b>TIME : </b></th>
                    <th>Status</th>
                    <th>SUBMIT</th>
                </thead>
                <tr>
                    <td><?php echo "$db_patientname";?></td>
                    <td><?php echo "$db_roll"; ?></td>
                    <td><?php echo "$db_date"; ?></td>
                    <td><?php echo "$db_time"; ?></td>
                    <td><select  name = "am">
                            <option value = "APPROVE">APPROVE</option>
                            <option value = "REJECTED">REJECTED</option>
                        </select></td>
                    <td><input type ="submit" name="submit" value="submit"></td>
                    
                </tr>
</table>
    
     <?php
      }
       if(isset($_POST['submit'])){
       if(mysqli_num_rows($select_user_query) >0 ){ 
         $status = $_POST['am'];
         $result = "UPDATE gets SET Status = '$status'  WHERE id = '$db_id' " ;
         $result2 =  mysqli_query($connection, $result);
 
$account_sid = 'ACe9e74533470acb939467cea14159088b';
$auth_token = '7ab381b8bb8a113a05160f5fd9a31b6e';
$twilio_number = "+18446737056";
if($status == "APPROVE"){
$msg = "Dear ".$db_patientname.", Your Appointment has been approved.Please Come On Time. Thank you.\n RUET MEDICAL CENTER";}
else $msg = "Dear ".$db_patientname.", Your Appointment has been Rejected . Please Try another Time.Thank you. \n RUET MEDICAL CENTER" ;
               
$client = new Client($account_sid, $auth_token);
$message = $client->messages->create(
    $db_phone,
    array(
        'from' => $twilio_number,
        'body' => $msg
    )
    
);
       
    }}
    ?>   
   </form>
            </div>
    </header>
</body>
</html>
