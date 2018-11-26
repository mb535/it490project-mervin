<?php
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
session_start();
$cuisine = $_POST['cuisine'];
$type = "cuisine";
echo $cuisine;
if ($type == 'cuisine')cuisineLookup($cuisine);




?>
<a href= 'homepage.php'>Go Back</a>

