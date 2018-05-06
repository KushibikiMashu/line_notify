<?php 

// 参照した記事
// https://qiita.com/iitenkida7/items/576a8226ba6584864d95
// https://qiita.com/re-24/items/bfdd533e5dacecd21a7a#post%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89%E3%81%AE%E5%AE%9F%E8%A1%8C
// https://qiita.com/_takwat/items/870ffec6ce4562f54c9d

define('LINE_API_URL' , 'https://notify-api.line.me/api/notify');
define('LINE_API_TOKEN' , 'トークンを設定する');

$message = 'こんな風にLineに通知を送れます！';
$data = array('message' => $message);
$data = http_build_query($data);

$header = array(
		'Content-Type: application/x-www-form-urlencoded',
		'Authorization: Bearer ' . LINE_API_TOKEN,
		'Content-Length: ' .strlen($data),
);

$ch = curl_init(LINE_API_URL);

// curl_setopt($ch, CURLOPT_URL, LINE_API_URL); 
// curl_execの結果を文字列で返す
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// //ヘッダー追加オプション

// // この設定を使うとだと{"status":401,"message":"Missing authorization header"}の
// // エラーが出る
// // curl_setopt($ch, CURLOPT_HEADER, true);
 
// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

// // methodをPOSTに設定している
// curl_setopt($ch, CURLOPT_POST, true);

// // bodyを送信している。必須
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_POSTFIELDS => $data,
    CURLINFO_HEADER_OUT => true
);

curl_setopt_array($ch, $options);

// $info = curl_getinfo($ch);
$response = curl_exec($ch);
// $errorNo = curl_errno($ch);


// $optionに CURLINFO_HEADER_OUT を追加
var_dump(curl_getinfo($ch, CURLINFO_HEADER_OUT));
// "POST /api/notify HTTP/1.1
// Host: notify-api.line.me
// Method: POST
// Accept: text/html,application/xhtml+xml,application/xml;
// Content-Type: application/x-www-form-urlencoded
// Authorization: Bearer トークン
// Content-Length: 93
// "

var_dump($data);
// "message=Line%E3%81%AB%E9%80%9A%E7%9F%A5%E3%82%92%E9%80%81%E3%82%8A%E3%81%BE%E3%81%99%EF%B8%8F"

// var_dump(http_build_query($header));
// var_dump($info);

// $optionに CURLOPT_HEADER => true を追加
var_dump($response);
// "HTTP/1.1 200 OK
// Server: nginx
// Date: Mon, 23 Apr 2018 09:53:55 GMT
// Content-Type: application/json;charset=UTF-8
// Transfer-Encoding: chunked
// Connection: keep-alive
// Keep-Alive: timeout=3
// X-RateLimit-Limit: 1000
// X-RateLimit-ImageLimit: 50
// X-RateLimit-Remaining: 989
// X-RateLimit-ImageRemaining: 50
// X-RateLimit-Reset: 1524480281

// {"status":200,"message":"ok"}"

curl_close($ch); //終了
