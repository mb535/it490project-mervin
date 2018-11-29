#!/usr/bin/php

<?php

require_once('/home/mervin/git/rabbitmqphp_example/path.inc');
require_once('/home/mervin/git/rabbitmqphp_example/get_host_info.inc');
require_once('/home/mervin/git/rabbitmqphp_example/rabbitMQLib.inc');



$client = new rabbitMQClient("/home/mervin/git/rabbitmqphp_example/testRabbitMQ.ini","deployServer");
             $request = array();
             $request['type'] = "FERollbackQA";
             $request['packageName'] = "FEversion";
             $response = $client->send_request($request);
             echo $response . PHP_EOL;
	     exit();
?>

