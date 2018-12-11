<?php
//include('/home/homepath.php');
//gethome();
//124444444;
include 'rabbitmqphp_example/testRabbitMQClient.php';
//error_reporting(E_ALL);

session_start();
session_unset();
$user = $_POST['username'];
$password =sha1($_POST['password']);
$response = login($user,$password);


if($response == 0)
  {
    echo "<script type='text/javascript'>alert('Failed, try again');</alert>";
    header( "Refresh:0; url=index.html");
  }

elseif($response == 1)
	{
	echo "Welcome!";
	//$s_id= $session_id();
	$_SESSION["user"] = $user;
	echo $user;
	header( "Refresh:0; url=homepage.php");
  	}





?>
