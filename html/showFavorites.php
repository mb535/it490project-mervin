<style>
ul li {
    float:left;
}
ul li.break {
    clear: right;
}
</style>


<ul>
<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
//include('rabbitmqphp_example/testRabbitMQClient.php');
session_start();
if (!isset($_SESSION["user"]))
{
 header('Location: index.html');
}

showFavorites($user);
?>



<?php
$i = 0;
$userFavs = $_SESSION['userFavs'];
foreach($userFavs as $key => $Fav){
    foreach($Fav as $key => $value){
        if($key == "mealName"){

	      foodLookup($value);

              //echo "<br><a href='display.php?value=".$value."'>$value</a><br><br>";
	      echo "<form action='delFavorites.php' method='POST' style='display: inline;'>";
	      echo "<input type = 'submit' value = 'Delete $value' name ='delete'><br> </form>";				       
        }
    }
}

//unset($_SESSION['userFavs']);
?>
