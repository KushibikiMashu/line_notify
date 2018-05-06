<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$token = 'トークンを設定する';

$client = new Client(['base_uri' => 'https://notify-api.line.me/api/']);

$client->post('revoke', [
	'headers' => [
		'Content-Type'	=>	'application/x-www-form-urlencoded',
		'Authorization'	=>	'Bearer ' . $token
	]
]);