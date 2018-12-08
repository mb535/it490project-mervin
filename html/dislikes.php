<?php 
error_reporting(0); 
@ini_set('display_errors', 0); 
include 'rabbitmqphp_example/testRabbitMQClient.php';
session_start();


if (!isset($_SESSION["user"]))
{
 echo "<script type='text/javascript'>alert('Please Login First');</script>";
 header('Location: index.html');
}

$user = $_SESSION["user"];
$meal = $_SESSION["mealName"];



$response = dislikeUpdater($user, $meal);

if($response == 1)
{
	echo "Updated";
	header("Refresh:0; url=display.php?value=$meal");
}
else
{
	echo "try again";
}


?>
