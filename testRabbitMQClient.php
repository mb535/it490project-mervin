#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
//$request = array();
//$request['type'] = $type;
//$request['username'] = $user;
//$request['password'] = $pass;
//$request['message'] = "HI";               
//$response = $client->send_request($request);

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

echo $argv[0]." END".PHP_EOL;

