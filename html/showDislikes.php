<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
//include('rabbitmqphp_example/testRabbitMQClient.php');
session_start();
if (!isset($_SESSION["user"]))
{
 header('Location: index.html');
}
showDislikes($user);
$userDislikes = $_SESSION['userDislikes'];
foreach($userDislikes as $key => $Dislikes){
    foreach($Dislikes as $key => $value){
	if($key == "mealName"){
       		foodLookup($value);
       		//echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
		echo "<form action='deleteDislike.php' method='POST' style='display: inline;'>";
		echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";	
	}    
    }
}

unset($_SESSION['userDislikes']);
?>
