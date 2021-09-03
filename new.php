<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
if(isset($_POST['submit'])){
$account_sid = 'ACe9e74533470acb939467cea14159088b';
$auth_token = '7ab381b8bb8a113a05160f5fd9a31b6e';
$twilio_number = "+18446737056";

$client = new Client($account_sid, $auth_token);
$message = $client->messages->create(
    $_POST['num'],
    array(
        'from' => $twilio_number,
        'body' => $_POST['msg']
    )
    
);
    if($message->sid){
        echo "msg sent";
    }
}
?>
<html>
    <head>
    </head>
<body>
    <h1>Login Here</h1>
        <form action="phpmsg.php" method="POST">
            <p>Name : </p>
         <input type="text" name="username" placeholder="enter Username">
            <p>Sender: </p>
                    <input type="text" name="sender" placeholder="sender">

            <p>Number: </p>
                        <input type="text" name="num" placeholder="number">

            <p>Msg: </p> <textarea name= "mess" placeholder="msg" ></textarea>           

         
         <input type="submit" name="submit" value="submit">
    </form>
    </body></html>

