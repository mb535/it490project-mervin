<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
//session_start();
//include('rabbitmqphp_example/testRabbitMQClient.php');


$mealName = $_SESSION['mealName'];
//echo $mealName;
showComments($mealName);
$mealComments = $_SESSION['showComment'];
//print_r($mealComments);
foreach($mealComments as $key => $comments){
	foreach($comments as $key => $value){
		if($key == "user"){ 
			echo $value;
			echo "<br>";
		}
		if($key == "date"){ 
			echo $value;
			echo "<br>";
		}
		if($key == "comment"){ 
			echo $value;
			echo "<br>";
		}
	
	}
	echo "<br>";
}

//unset($_SESSION['mealName']);
//unset($_SESSION['showComment']);
?>
