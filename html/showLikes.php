<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
//include('rabbitmqphp_example/testRabbitMQClient.php');
session_start();
if (!isset($_SESSION["user"]))
{
 header('Location: index.html');
}
showLikes($user);
$userLikes = $_SESSION['userLikes'];
foreach($userLikes as $key => $Likes){
    foreach($Likes as $key => $value){
        if($key == "mealName1" && $value != ""){
	      foodLookup($value);
              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='deleteLike.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
	if($key == "mealName2" && $value != ""){
	      foodLookup($value);
              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='deleteLike.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
	if($key == "mealName3" && $value != ""){
	     
	      foodLookup($value);
              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='deleteLike.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
	if($key == "mealName4" && $value != ""){
	      foodLookup($value);
              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='deleteLike.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
	if($key == "mealName5" && $value != ""){
	      foodLookup($value);
              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='deleteLike.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
	//exit();
    }
}

//unset($_SESSION['userLikes']);
?>
