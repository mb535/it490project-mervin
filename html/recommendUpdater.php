<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/thumbnail-gallery.css" rel="stylesheet">

<div class="container">


<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
include 'rabbitmqphp_example/testRabbitMQClient.php';
session_start();
if (!isset($_SESSION["user"]))
{
 echo "<script type='text/javascript'>alert('Please Login First');</script>";
 header('Location: index.html');
}

$user = $_SESSION["user"];
$meal = $_SESSION["mealName"];
$category = $_SESSION["mealCategory"];
echo $category;
$response = recommendUpdater($user,$meal,$category);

if($response == 1)
{
	echo "Updated";
	header("Refresh:0; url=display.php?value=$meal");
}
else
{
	echo "try again";
}

?>






</div>












