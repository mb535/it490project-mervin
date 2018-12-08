
<html>
	<style>
	.countrybutton{
		width:100px; 
		height:75px;
		object-fit: cover;
 
		background-color: Transparent;
		background-repeat:   no-repeat;
    		background-size:     cover;
    		border: none;
    		cursor: pointer;
   		
    		outline: none;
		}


	</style>
  	<head>
	
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=2, shrink-to-fit=no">
   	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>Recipe Finder - </title>

    	<!-- Bootstrap core CSS -->
    	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<!-- Custom styles for this template -->
    	<link href="css/thumbnail-gallery.css" rel="stylesheet">

	</head>	

	<div class="container">

	<?php
	error_reporting(0); 
	@ini_set('display_errors', 0); 
	session_start();
	if (!isset($_SESSION["user"]))
	{
		echo "<script type='text/javascript'>alert('Please Login First');</script>";
		header('Location: index.html');
	}
	include('rabbitmqphp_example/testRabbitMQClient.php');
	$user_search = $_GET['value'];

	if($user_search == $_GET['value']){
		foodDisplay($user_search);
		
		$user_search = "";
		}
	$user_search = "";
	echo "<h1>".$_SESSION['mealName']."</h1>";
	$image = $_SESSION['mealImage'];
	echo "<img src=$image width=175 height=200 />". "<br>";


	$measuredIngre = array_combine($_SESSION['mealIngre'], $_SESSION['mealMeasure']);

	$table = "<table>";
	$table .= "<tr><td><h1>Ingredients&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1></td><td><h1>Measurements</h1></td></tr>";







	foreach($measuredIngre as $key => $value){
		$table .= "<tr>";
		$table .= "<td>".$key."</td>";
		$table .= "<td>".$value."</td>";
		$table .= "</tr>";

		//echo $key." ".$value."<br>";
	}
	$table .= "</table>";
	echo $table;

	echo "<br><h1>Instructions: ". "</h1>";
	$instructions = preg_split('/(?<=[.?!])\s+/' , $_SESSION['mealInst'], -1 , PREG_SPLIT_NO_EMPTY);
	//$x = "1" ;
	foreach($instructions as $step){
		//$step = ltrim($step, "STEP ".$x." -");
		echo $step."<br>";
		//$x++;
		}



	//session_start();
	//$mealName = $_SESSION['mealName'];
	//$comments = showComments($mealName);


	//endforeach;
	?>
	<br><br>
	<form action="recommendUpdater.php" method="POST" style="display: inline;">
	<input type = "submit" value = "Like">
	</form>&nbsp;&nbsp;&nbsp;&nbsp;
	<form action="dislikes.php" method="POST" style="display: inline;">
	<input type = "submit" value = "Dislike">
	</form>&nbsp;&nbsp;&nbsp;&nbsp;
	<form action="favorite.php" method="POST" style="display: inline;">
	<input type = "submit" value = "Favorite">
	</form>&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="profilePage.php">Profile</a>
	<br><br>
	
	
	</div>



	<div class="container">

	<h1>Leave A Comment</h1>
	<form action="insertComment.php" method=POST>

	<div>
	<input type="text" name="comment" class="form-control" id="comment" placeholder="enter Comment" autocomplete="off">
	</div>
	<br>
	<input type="submit" class="btn btn-info" value="Submit">
	<br><br>
	<h1>Comments</h1>
	<?php 
	include("showComments.php");
	?>

	<br>
	<a href= 'homepage.php'>Go Back</a>
	</div>
</html>



<?php
//session_start();
//unset($_SESSION['mealName']);
unset($_SESSION['mealMeasure']);
unset($_SESSION['mealIngre']);
unset($_SESSION['mealImage']);
unset($_SESSION['mealInst']);
unset($_SESSION['showComment']);
unset($_SESSION['userFavs']);
?>

