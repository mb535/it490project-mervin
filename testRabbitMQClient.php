#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
//$request = array();
//$request['type'] = $type;
//$request['username'] = $user;
//$request['password'] = $pass;
//$request['message'] = "HI";               
//$response = $client->send_request($request);
/*
switch($type)
{
	case "login":
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
		$request = array();
		$request['type'] = $type;
		$request['username'] = $user;
		$request['password'] = $pass;
		$request['message'] = "HI";
		$response = $client->send_request($request);
		//echo "client received response: ".PHP_EOL;
		//print_r($response);

		break;
	case "register":
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
		$request = array();
                $request['type'] = $type;
                $request['username'] = $user;
		$request['password'] = $pass;
		$request['email'] = $email;
                $request['message'] = "HI";
                $response = $client->send_request($request);

		//$response = $client->publish($request);
		break;
}


echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";
*/
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
    // print_r($response);
    $mealID = $response['meals']['0']['strMeal'];
    print_r ("<strong> Meal ID is: </strong>" . $mealID . "<br />");
    //return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;


}
?>
