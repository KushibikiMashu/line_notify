<?php 

define('LINE_API_URL' , 'https://notify-api.line.me/api/notify');
define('LINE_API_TOKEN' , 'トークンを設定する');

function post_message($message){

	$data = array('message' => $message);
	$data = http_build_query($data, '', '&');

	// おそらく下記のコードでも同じ
	// $data = http_build_query($data);

	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' =>
				"Authorization: Bearer " . LINE_API_TOKEN . '\n'
				. "Content-Type: application/x-www-form-urlencoded" . '\n'
				. 'Content-Length: ' . strlen($data) . '\n',
			'content' => $data
		)
	);

	$context = stream_context_create($options);
	$resultJson = file_get_contents(LINE_API_URL, false, $context);
	$resultArray = json_decode($resultJson, true);

var_dump($http_response_header);
var_dump($options);
var_dump($resultJson);
var_dump($context);
var_dump($resultJson);

	if($resultArray['status'] !== 200){
		return false;
	}

	return true;

}

post_message('test');