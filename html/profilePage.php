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
//sleep(3);
$user = $_SESSION["user"];

include('showFavorites.php');



echo "<br><br><h1>These are your Likes:</h1>";

include('showLikes.php');

echo "<h1>These are your Dislikes:</h1>";

include('showDislikes.php');

//unset($_SESSION['userFavs']);
?>

<a href= 'homepage.php'>Go Back</a>
