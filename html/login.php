<?php
//require('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
//$user = $_POST['username'];
//$pass = $_POST['password'];
//$type = $_POST['type'];
//$email= $_POST['email'];
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
//echo $user; 
//echo $pass;
session_start();

$user = $_POST['username'];
$password =sha1($_POST['password']);
$response = login($user,$password);


if($response == 0)
  {
    echo "Failed, try again";
    header( "Refresh:3; url=index.html");
  }

elseif($response == 1)
	{
	echo "Welcome!";
	$_SESSION["user"] = $user;
	echo $user;
	header( "Refresh:3; url=homepage.php");
  	}




/*
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
//$response = "unsupported request type, politely FUCK OFF";
switch ($type)
{
	case "login":
			
		//$response = "login, yeah we can do that";
		echo json_encode($response);
	break;
}
echo json_encode($response);
exit(0);
 */
?>
