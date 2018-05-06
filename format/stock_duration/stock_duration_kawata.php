<?php 

$url = 'https://notify-api.line.me/api/notify';

// 自分への1:1のトークン
$token = '';

date_default_timezone_set('Asia/Tokyo');

$stock_name = '社名[0000]';

// 取得日
$start = strtotime('0000-00-00');

// 今日の日付
$date = new Datetime();
$today = strtotime($date->format('Y-m-d'));

// 日数計算
$diff = (($today - $start) / 86400);

$year = floor($diff / 365);
$date = $diff % 365;

// スタンプを取得
$stamps = array(
	'282', // 袋のお金
	'283', // 札束
);

// スタンプをランダムに選択
$stamp_key = array_rand($stamps, 1);

$message = PHP_EOL
		. '🎉おめでとう🎉' . PHP_EOL
		. $stock_name . 'を保有してから' . PHP_EOL
		. $diff .'日が経ちました💰' . PHP_EOL
		// . '今日で' . $year . '年と' . $date . '日です💰' . PHP_EOL
		. 'これからもガッチリホールド😍';


$data = array('message' => $message, 'stickerPackageId' => 4, 'stickerId' => $stamps[$stamp_key]);
$data = http_build_query($data);

$header = array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $token,
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