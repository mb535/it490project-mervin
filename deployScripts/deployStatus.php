#!/usr/bin/php

<?php

require_once('/home/mervin/git/rabbitmqphp_example/path.inc');
require_once('/home/mervin/git/rabbitmqphp_example/get_host_info.inc');
require_once('/home/mervin/git/rabbitmqphp_example/rabbitMQLib.inc');

$stdin = fopen('php://stdin', 'r');
echo 'Update Status Version: ';
$version = trim(fgets($stdin));

$stdin = fopen('php://stdin', 'r');
echo 'Change Status to(good/pending): ';
$status = trim(fgets($stdin));




$client = new rabbitMQClient("/home/mervin/git/rabbitmqphp_example/testRabbitMQ.ini","deployServer");
             $request = array();
             $request['type'] = "FEstatusQA";
	     $request['version'] = $version;
             $request['statusName'] = $status;
             $response = $client->send_request($request);
             echo $response . PHP_EOL;
	     exit();
?>
