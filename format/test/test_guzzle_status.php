<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$token = 'トークンを設定する';

$client = new Client(['base_uri' => 'https://notify-api.line.me/api/']);

$response = $client->get('status',
	['headers' => ['Authorization' => 'Bearer ' . $token]]);

var_dump($response);
