<?php
session_start();
include('/home/mervin/git/rabbitmqphp_example/testRabbitMQClient.php');
$user_search = $_GET['value'];
if($user_search == $_GET['value']){
	foodDisplay($user_search);
	$user_search = "";
	}
$user_search = "";
echo "<strong>".$_SESSION['mealName']."</strong>";
$image = $_SESSION['mealImage'];
echo "<br>Meal image is: ". "<br>". "<img src=$image width=175 height=200 />". "<br>";


$measuredIngre = array_combine($_SESSION['mealIngre'], $_SESSION['mealMeasure']);

$table = "<table>";
$table .= "<tr><td><strong>Measurements<strong></td><td><strong>Ingredients</strong></br></tr>";







foreach($measuredIngre as $key => $value){
	$table .= "<tr>";
	$table .= "<td>"."<pre>".$value."</pre>"."</td>";
	$table .= "<td>".$key."</td>";
	$table .= "</tr>";

	//echo $key." ".$value."<br>";
}
$table .= "</table>";
echo $table;

echo "<br><strong>Instructions: ". "</strong><br>";
$instructions = preg_split('/(?<=[.?!])\s+/' , $_SESSION['mealInst'], -1 , PREG_SPLIT_NO_EMPTY);
//$x = "1" ;
foreach($instructions as $step){
	//$step = ltrim($step, "STEP ".$x." -");
	echo $step."<br>";
	//$x++;
	}

unset($_SESSION['mealName']);
unset($_SESSION['mealMeasure']);
unset($_SESSION['mealIngre']);
unset($_SESSION['mealImage']);
unset($_SESSION['mealInst']);











?>

<a href= 'homepage.php'>Go Back</a>
