#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//error_log(print_r($v, TRUE), 3, '/var/www/html/errors.txt');
//require('errorLogging.php');
//$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
//$request = array();
//$request['type'] = $type;
//$request['username'] = $user;
//$request['password'] = $pass;
//$request['message'] = "HI";               
//$response = $client->send_request($request);

//echo $argv[0]." END".PHP_EOL;
function login($user,$password){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
			echo "<br><strong>Meal name is: ". $value. "</strong><br>";		
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
			echo "Meal image is: ". "<br>". "<img src=$value width=175 height=200 />". "<br>";		
		
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
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
	}
    }

    //$mealID = $response['meals']['0']['strMeal'];
    //print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
function cuisineLookup($cuisine){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
			echo "<br><strong>Meal name is: ". $value. "</strong><br>";		
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
			echo "Meal image is: ". "<br>". "<img src=$value width=175 height=200 />". "<br>";		
		
		}
		
	}
	
    }


    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
function ingreLookup($user_search){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
			echo "<br><strong>Meal name is: ". $value. "</strong><br>";		
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
			echo "Meal image is: ". "<br>". "<img src=$value width=175 height=200 />". "<br>";		
		
		}
		
	}
    }

    //$mealID = $response['meals']['0']['strMeal'];
    //print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
?>
