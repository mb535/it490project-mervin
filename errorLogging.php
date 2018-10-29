<?php
error_reporting(E_ALL);
function sendError($errno, $errstr, $errfile, $errline) {
	echo $errstr;
	switch ($errno) {
	case E_ERROR:
	case E_PARSE:
	case E_CORE_ERROR:
	case E_CORE_WARNING:
	case E_COMPILE_ERROR:
	case E_COMPILE_WARNING:
	case E_WARNING:
	case E_RECOVERABLE_ERROR:
	case E_NOTICE:
	case E_DEPRECATED:
	case E_USER_DEPRECATED:
	case E_STRICT:
        case E_USER_NOTICE:
	case E_USER_WARNING:
	case E_USER_ERROR:
	case E_ALL:
             $client = new rabbitMQClient("testRabbitMQ.ini","errorServer");
             $request = array();
             $request['type'] = "error";
             $request['errorString'] = $errstr;
	     $request['errorFile'] = $errfile;
	     $request['errorLine'] = $errline;
	     $response = $client->send_request($request);
             exit();
	     break;
	default:
	     $client = new rabbitMQClient("testRabbitMQ.ini","errorServer");
             $request = array();
             $request['type'] = "error";
             $request['errorString'] = $errstr;
             $request['errorFile'] = $errfile;
             $request['errorLine'] = $errline;
	     $response = $client->send_request($request);
	     exit();
             break;
    }
}

set_error_handler("sendError");
?>
