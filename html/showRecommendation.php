<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
//include('rabbitmqphp_example/testRabbitMQClient.php');
session_start();
if (!isset($_SESSION["user"]))
{
 header('Location: index.html');
}
showRecommendation($user);
$userRec = $_SESSION['userRecommendation'];
//print_r($user_Rec);


foreach($userRec as $key => $Rec){
    foreach($Rec as $key => $value){
        if($key == "mealName"){
		header("Refresh:0; url=display.php?value=$value");
		//echo "<br><a href='display.php?value=".$value."'>$value</a><br>";			       
        }
	if($key == "mealImage"){
		//echo "Meal image is: "."<br>"."<img src=$value width=175 height=200 />"."<br>";	
	}
    }
}

//unset($_SESSION['userRecommendation']);

?>
