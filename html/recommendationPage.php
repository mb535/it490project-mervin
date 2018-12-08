<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/thumbnail-gallery.css" rel="stylesheet">

<div class="container">



<?php
error_reporting(0); 
@ini_set('display_errors', 0); 
include('rabbitmqphp_example/testRabbitMQClient.php');
session_start();
if (!isset($_SESSION["user"]))
{
 header('Location: index.html');
}

//$response = showRecommend($_SESSION["user"]);
echo "<br />";
$user = $_SESSION["user"];


include('showRecommendation.php');



?>


