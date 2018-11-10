<?php
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');

session_start();
//$s_id = session_id();
echo $s_id;
$user_search = $_POST['food'];
$type = $_POST['type'];
$cuisine = $_POST['cuisine'];
if ($type == 'Recipe'){foodLookup($user_search);}
elseif ($type == 'Ingredients'){ingreLookup($user_search);}
elseif ($type == 'Country'){
	$cuisine = $user_search;
	cuisineLookup($cuisine);
}
elseif ($type == 'Category'){categoryLookup($user_search);}


else{
	$type = "cuisine";
	cuisineLookup($cuisine);}
//echo $cuisine;
//if ($type == 'cuisine')cuisineLookup($cuisine);


?>

<a href= 'homepage.php'>Go Back</a>

