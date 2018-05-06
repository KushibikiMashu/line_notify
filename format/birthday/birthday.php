<?php 

$url = 'https://notify-api.line.me/api/notify';

// トークン
// $token = '';

date_default_timezone_set('Asia/Tokyo');

// 誕生日
$name = '';
$birthday = '0000-00-00';

// 誕生日をtimestampにする
$birthday = new Datetime($birthday);
$start = strtotime($birthday->format('Y-m-d'));

// 今日の日付
$date = new Datetime();
$today = strtotime($date->format('Y-m-d'));

// 日数計算
$diff = (($today - $start) / 86400);

$year = floor($diff / 365);
$date = $diff % 365;

$message = PHP_EOL
		. $name . 'の誕生日は' . $birthday->format('Y年n月d日') . 'です。' . PHP_EOL
		. $name . 'が生まれてから' .$diff .'日が経ちました🎉' . PHP_EOL
		. '今日で' . $year . '年と' . $date . '日です！';

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