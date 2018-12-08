<?php
error_reporting(0); 
@ini_set('display_errors', 0); 

include('rabbitmqphp_example/testRabbitMQClient.php');

$user = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$response = register($user,$password, $email);
if($response == 1)
  {
    echo "Good, now login!";
    header( "Refresh:1; url=index.html");
  }
  else
  {
  echo "Failed, try again";
  header( "Refresh:1; url=signup.html");
  
  }
?>
