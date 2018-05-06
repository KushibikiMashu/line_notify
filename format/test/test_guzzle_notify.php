<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

date_default_timezone_set('Asia/Tokyo');

$relation = strtotime('2016-05-03');

$date = new Datetime();
$today = strtotime($date->format('Y-m-d'));
$diff = (($today - $relation) / 86400);

// 1:1の通知
$token = 'トークンを設定する';

$message = PHP_EOL . 'おめでとう！' . '二人が付き合ってから' . $diff .'日が経ちました！';


$client = new Client(['base_uri' => 'https://notify-api.line.me/api/']);

$client->post('notify', [
	'headers' => [
		'Content-Type'	=>	'application/x-www-form-urlencoded',
		'Authorization'	=>	'Bearer ' . $token
	],
	'form_params' => [
		'message'	=>	$message
	]
]);