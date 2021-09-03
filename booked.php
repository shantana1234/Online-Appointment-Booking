<?php include "session.php" ?>
<?php 
$connection = mysqli_connect('localhost', 'root' ,'', 'appointment');
$conn= mysqli_connect('localhost', 'root' ,'', 'cancle');

if(isset($_SESSION['username'])){
    
 $username = $_SESSION['username'];
$query = "SELECT * FROM gets WHERE dc = '{$username}' ";
    
    $select_user_query = mysqli_query($connection, $query);
  
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }
}
    
echo "hi";
?>
<?php
            if(isset($_POST['<?php echo "$ok" ;?>'])){
            
     $conn = mysqli_connect('localhost', 'root' ,'', 'booked');
     $query ="INSERT INTO book(patient)" ;
    $query.= "VALUES( '$db_patientname')" ;
    $result =  mysqli_query( $conn, $query);
                           if(!$result){
                               die("query failed");
                           } 
            }
        ?>



            if(isset($_POST['ok'])){
    $conn = mysqli_connect('localhost', 'root' ,'', 'booked');
    
    $query ="INSERT INTO book(patient)" ;
    $query.= "VALUES( '$db_patientname')" ;
    $result =  mysqli_query( $conn, $query);
                           if(!$result){
                               die("query failed");
                           } 
            }

<?php 
if(isset($_POST['<?php echo $db_id ;?>'])){
    $conn = mysqli_connect('localhost', 'root' ,'', 'booked');
    
    $query ="INSERT INTO book(patient)" ;
    $query.= "VALUES( '$db_patientname')" ;
    $result =  mysqli_query( $conn, $query);
                           if(!$result){
                               die("query failed");
                           } 
            }
if(isset($_POST['no'])){
    $connec = mysqli_connect('localhost', 'root' ,'', 'cancle');
    
    $query ="INSERT INTO can(patient)" ;
    $query.= "VALUES( '$db_patientname')" ;
    $result =  mysqli_query( $connec, $query);
                           if(!$result){
                               die("query failed");
                           } 
            }
?>










<table border="5">
                 <thead>
                    <th><b>PATIENT_NAME : </b></th>
                    <th><b>PATIENT_ROLL : </b></th>
                    <th><b>DATE : </b></th>
                    <th><b>TIME : </b></th>
                    <th>Status</th>
                </thead>
                <tr>
                       <td><?php echo "$db_patientname";?></td>
                        <td><?php echo "$db_roll"; ?></td>
                       <td><?php echo "$db_date"; ?></td>
                       <td><?php echo "$db_time"; ?></td>
                
                   
                </tr>
            </table>