<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/thumbnail-gallery.css" rel="stylesheet">
<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
include('rabbitmqphp_example/testRabbitMQClient.php');

session_start();
//$s_id = session_id();
echo $s_id;
$user_search = $_POST['food'];
$type = $_POST['type'];
$cuisine = $_POST['cuisine'];
echo '<div class="container">';
if ($type == 'Recipe'){
	
	foodLookup($user_search);
	
}
elseif ($type == 'Ingredients'){
	ingreLookup($user_search);
}
elseif ($type == 'Country'){
	$cuisine = $user_search;
	cuisineLookup($cuisine);
}
elseif ($type == 'Category'){
	categoryLookup($user_search);
}


else{
	$type = "cuisine";
	cuisineLookup($cuisine);
}
//echo $cuisine;
//if ($type == 'cuisine')cuisineLookup($cuisine);

echo "</div>";
?>
<div class="container">
<a href= 'homepage.php'>Go Back</a>
</div>
