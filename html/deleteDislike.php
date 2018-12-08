<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
include 'rabbitmqphp_example/testRabbitMQClient.php';
session_start();

$user = $_SESSION["user"];
$meal = $_POST['delete'];
$meal = str_replace("Delete","",$meal);
$meal = ltrim($meal);

$response = dislikeDelete($user,$meal);



if($response == 1)
{
	header("Refresh:0; url=profilePage.php");
}
else
{
	echo "try again";
}
	
?>
