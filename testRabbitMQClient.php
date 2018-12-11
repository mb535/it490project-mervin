
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//error_log(print_r($v, TRUE), 3, '/var/www/html/errors.txt');
//echo $argv[0]." END".PHP_EOL;


error_reporting(0); 
@ini_set('display_errors', 0); 
//echo whichServer(); 

function whichServer() { 
	set_time_limit(0); 
	$address = '192.168.1.132'; 
	$port = '15672'; 
	$fp = fsockopen($address, $port, $errno, $errstr); 
	if($fp) {
		return "testServer"; 
	} 
	else {	
		return "failServer"; 
	} 
}

//$server = (string)$server;
//echo $server;
function login($user,$password){
    $server = whichServer(); 
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "login";
    $request['username'] = $user;
    $request['password'] = $password;
    
    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}
function register($user,$password, $email)
  {
    $server = whichServer(); 
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "register";
    $request['username'] = $user;
    $request['password'] = $password;
    $request['email'] = $email;

    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}
/*
function validateSession(){
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $s_id = session_id();
    $request = array();
    $request['type'] = "validate_session";
    $request['sessionId'] = $s_id;

}
*/
function foodLookup($user_search){
    	$server = whichServer(); 
	$client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "foodLookup";
    $request['search'] = $user_search;


    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;

    $response = json_decode($response);
    //print_r($response);

    foreach($response as $key => $meals){
	foreach($meals as $key => $value){
		if($key == "mealName"){
			echo "<strong>". $value. "</strong>";		
			echo "<br><strong><a href='display.php?value=".$value."'>Instructions</a></strong><br>";
			
		}
		if($key == "mealMeasure"){
			//$_SESSION['mealMeasure'] = $value;
	
		}
		if($key == "mealIngredients"){
			//$_SESSION['mealIngre']= $value;
		}
		
		if($key == "mealImage"){
			//$_SESSION['mealImage'] = $value;
			echo "<img src=$value width=175 height=200 />". "<br><br>";		
		
		}
		if($key == "mealInstructions"){
			//$_SESSION['mealInst'] = $value;
			//echo "<br><a href='display.php'>Instructions</a><br>";	
			
			
		}
	}
    }

    //$mealID = $response['meals']['0']['strMeal'];
    //print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
function foodDisplay($user_search){
	$server = whichServer(); 
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "foodLookup";
    $request['search'] = $user_search;


    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;

    $response = json_decode($response);
    //print_r($response);

    foreach($response as $key => $meals){
	foreach($meals as $key => $value){
		//print_r(("<br><br><strong> Meal name is: </strong>" . $value . "<br />");
		if($key == "mealName"){
			$_SESSION['mealName'] = $value;
			//echo "<br><strong>Meal name is: ". $value. "</strong><br>";
			
		}
		if($key == "mealMeasure"){
			$_SESSION['mealMeasure'] = $value;
	
		}
		if($key == "mealIngredients"){
			$_SESSION['mealIngre']= $value;
		}
		
		
		if($key == "mealInstructions"){
			$_SESSION['mealInst'] = $value;
			//echo "<br><a href='display.php'>Instructions</a><br>";	
			
			
		}
		if($key == "mealImage"){
			$_SESSION['mealImage'] = $value;
			//echo "Meal image is: ". "<br>". "<img src=$value width=175 height=200 />". "<br>";		
		
		}
		if($key == "mealCategory"){
			$_SESSION['mealCategory'] = $value;
		}
	}
    }

    //$mealID = $response['meals']['0']['strMeal'];
    //print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    //echo "\n\n";
    //echo $argv[0]." END".PHP_EOL;


}
function cuisineLookup($cuisine){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "cuisineLookup";
    $request['search'] = $cuisine;


    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    $response = json_decode($response);
    

   //$x = 0;
  
    foreach($response as $key => $meals){
	foreach($meals as $key => $value){
		//print_r(("<br><br><strong> Meal name is: </strong>" . $value . "<br />");
		if($key == "mealName"){
			//$_SESSION['mealName'] = $value;
			echo "<strong>". $value. "</strong>";		
			echo "<br><strong><a href='display.php?value=".$value."'>Instructions</a></strong><br>";
		}
		if($key == "mealIngredients"){
			//$_SESSION['mealIngre'] = $value;
			//echo "<br><strong>Ingredients: ". "</strong><br>";
			
		}
		if($key == "mealMeasure"){
			//$_SESSION['mealMeasure'] = $value;
	
		}
		if($key == "mealInstructions"){
			//$_SESSION['mealInst'] = $value;
				
		}
		//print_r("<img src= $meals['mealImage'] width=175 height=200 />");
		if($key == "mealImage"){
			//$_SESSION['mealImage'] = $value;
			//$mealImg = base64_encode($mealImg);
			echo "<img src=$value width=175 height=200 />". "<br><br>";		
		
		}
		
	}
	
    }


    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
function ingreLookup($user_search){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "ingreLookup";
    $request['search'] = $user_search;


    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;

    $response = json_decode($response);
    //print_r($response);

  
    foreach($response as $key => $meals){
	foreach($meals as $key => $value){
		//print_r(("<br><br><strong> Meal name is: </strong>" . $value . "<br />");
		if($key == "mealName"){
			//$_SESSION['mealName'] = $value;
			echo "<strong>". $value. "</strong>";		
			echo "<br><strong><a href='display.php?value=".$value."'>Instructions</a></strong><br>";
		}
		if($key == "mealIngredients"){
			//$_SESSION['mealIngre'] = $value;
			//echo "<br><strong>Ingredients: ". "</strong><br>";
			
		}
		if($key == "mealMeasure"){
			//$_SESSION['mealMeasure'] = $value;
	
		}
		if($key == "mealInstructions"){
			//$_SESSION['mealInst'] = $value;
				
		}
		//print_r("<img src= $meals['mealImage'] width=175 height=200 />");
		if($key == "mealImage"){
			//$_SESSION['mealImage'] = $value;
			//$mealImg = base64_encode($mealImg);
			echo "<img src=$value width=175 height=200 />". "<br><br>";		
		
		}
		
	}
    }

    //$mealID = $response['meals']['0']['strMeal'];
    //print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
function showComments($mealName){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "commentLookup";
    $request['search'] = $mealName;


    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;

    $response = json_decode($response);
    //print_r($response);
    $_SESSION['showComment'] = $response;
    //return $response;
    
    //print_r($response);


}

function addComment($mealName, $user, $date, $comment){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "commentInsert";
    $request['search'] = $mealName;
    $request['username'] = $user;
    $request['date'] = $date;
    $request['comment'] = $comment;
    $response = $client->send_request($request);
    //$response = $client->publish($request);
    //echo "client received response: ".PHP_EOL;

    //$response = json_decode($response);
    return $response;
    //print_r($response);

}

function recommendUpdater($user,$meal,$category){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "recommendUpdater";
    $request['search'] = $user;
    $request['mealName'] = $meal;
    $request['category'] = $category;
    $response = $client->send_request($request);
    return $response;

}

function dislikeUpdater($user, $meal){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "dislikeUpdater";
    $request['search'] = $user;
    $request['mealName'] = $meal;
    $response = $client->send_request($request);
    return $response;

}

function dislikeDelete($user, $meal){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "dislikeDelete";
    $request['search'] = $user;
    $request['mealName'] = $meal;
    $response = $client->send_request($request);
    return $response;
}

function likeDelete($user,$meal){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "likeDelete";
    $request['search'] = $user;
    $request['mealName'] = $meal;
    $response = $client->send_request($request);
    return $response;

}

function showLikes($user){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "showLikes";
    $request['search'] = $user;
    $response = $client->send_request($request);
    $response = json_decode($response);
    $_SESSION['userLikes'] = $response;

}

function showDislikes($user){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "showDislikes";
    $request['search'] = $user;
    $response = $client->send_request($request);
    $response = json_decode($response);
    $_SESSION['userDislikes'] = $response;

}
function showRecommendation($user){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "showRecommendation";
    $request['search'] = $user;
    $response = $client->send_request($request);
    $response = json_decode($response);
    //print_r($response);
    $_SESSION['userRecommendation'] = $response;
}

function showFavorites($user){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "showFavs";
    $request['search'] = $user;
    $response = $client->send_request($request);
    $response = json_decode($response);
    $_SESSION['userFavs'] = $response;

}
function favUpdater($user, $meal){
	$server = whichServer();
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "favUpdater";
    $request['search'] = $user;
    $request['mealName'] = $meal;
    $response = $client->send_request($request);
    return $response;
}

function delFavorite($user, $meal){
	$server = whichServer();
    //echo $user;
    //echo $meal;
    $client = new rabbitMQClient("testRabbitMQ.ini","$server");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }
    $request = array();
    $request['type'] = "delFav";
    $request['search'] = $user;
    $request['mealName'] = $meal;

    $response = $client->send_request($request);
    return $response;
}


?>
