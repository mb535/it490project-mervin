#!/usr/bin/php

<?php

require_once('/home/mervin/git/rabbitmqphp_example/path.inc');
require_once('/home/mervin/git/rabbitmqphp_example/get_host_info.inc');
require_once('/home/mervin/git/rabbitmqphp_example/rabbitMQLib.inc');


$stdin = fopen('php://stdin', 'r');
echo 'What version is this? ';
$version = trim(fgets($stdin));
//echo $version . PHP_EOL;
shell_exec("sudo tar -cvf /var/files/FEversion$version.tar.gz html");
shell_exec("sudo scp /var/files/FEversion$version.tar.gz  christian@192.168.1.168:/home/christian/var");
shell_exec("sudo rm /var/files/FEversion$version.tar.gz");


$client = new rabbitMQClient("/home/mervin/git/rabbitmqphp_example/testRabbitMQ.ini","deployServer");
             $request = array();
             $request['type'] = "FEQA";
	     $request['version'] = $version;
             $request['packageName'] = "FEversion$version.tar.gz";
             $response = $client->send_request($request);
             echo $response . PHP_EOL;
	     exit();
?>


