<?php
//require('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
$user = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['type'];
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
//echo $user; 
//echo $pass;
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";
switch ($type)
{
	case "login":
		$response = "login, yeah we can do that";
		//echo json_encode($response);
	break;
}
echo json_encode($response);
exit(0);

?>
