<?php
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');

session_start();
$s_id = session_id();
echo $s_id;
$user_search = $_POST['food'];
$type = $_POST['type'];

if ($type == 'Recipe')foodLookup($user_search);
if ($type == 'Ingredients')ingreLookup($user_search);
if ($type == 'Country')countryLookup($user_search);
if ($type == 'Category')categoryLookup($user_search);




?>

<a href= 'homepage.php'>Go Back</a>

