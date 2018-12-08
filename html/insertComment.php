<?php
include 'rabbitmqphp_example/testRabbitMQClient.php';
//error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["user"]))
{
	echo "<script type='text/javascript'>alert('Please Login First');</script>";
	header('Location: index.html');
}


$mealName = $_SESSION['mealName'];
$user = $_SESSION["user"];
$date = date('m-d-Y H:i');
$comment = $_POST['comment'];

$response = addComment($mealName, $user, $date, $comment);

if($response == 0)
  {
    echo "Failed, try again";
    header( "Refresh:0; url=display.php?value=$mealName");
  }

elseif($response == 1)
	{


	header( "Refresh:1; url=display.php?value=$mealName");
  	}



?>
