<?php 

$url = 'https://notify-api.line.me/api/notify';
$token = '';

$message = 'メッセージを変えることもできます';
$data = array('message' => $message);
$data = http_build_query($data);

$header = array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $token,
        'Content-Length: ' .strlen($data),
);

$ch = curl_init($url);

$options = array(
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_POST            => true,
    CURLOPT_HTTPHEADER      => $header,
    CURLOPT_POSTFIELDS      => $data,
);

curl_setopt_array($ch, $options);

$info = curl_getinfo($ch);
$response =  curl_exec($ch);

var_dump($response);

curl_close($ch);