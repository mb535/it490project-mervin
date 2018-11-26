<?php
//include('/home/homepath.php');
//gethome();

include 'rabbitmqphp_example/testRabbitMQClient.php';
error_reporting(E_ALL);

session_start();

$user = $_POST['username'];
$password =sha1($_POST['password']);
$response = login($user,$password);


if($response == 0)
  {
    echo "Failed, try again";
    header( "Refresh:1; url=index.html");
  }

elseif($response == 1)
	{
	echo "Welcome!";
	//$s_id= $session_id();
	$_SESSION["user"] = $user;
	echo $user;
	header( "Refresh:3; url=homepage.php");
  	}





?>
