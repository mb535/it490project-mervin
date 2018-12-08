<?php
include 'rabbitmqphp_example/testRabbitMQClient.php';
session_start();
if (!isset($_SESSION["user"]))
{
 //header('Location: index.html');
}

$user = $_SESSION["user"];
$meal = $_SESSION['mealName'];

$response = favUpdater($user,$meal);

if($response == 1)
{
	echo "Updated";
	header("Refresh:1; url=display.php?value=$meal");
}
else
{
	echo "try again";
}

?>
