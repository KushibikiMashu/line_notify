<?php 

$url = 'https://notify-api.line.me/api/notify';

// トークルーム
$token = '';

date_default_timezone_set('Asia/Tokyo');

// 付き合い始めの日
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
	'608', // プレゼントボックス
	'301', // カクテル
	'269', // ハート
	'268', // 虹
);

// スタンプをランダムに選択
$stamp_key = array_rand($stamps, 1);

if($date !== 0){

	$message = PHP_EOL
			. '🎉おめでとう🎉' . PHP_EOL
			.'二人が付き合ってから' . PHP_EOL
			. $diff .'日が経ちました😍' . PHP_EOL
			. '今日で' . $year . '年と' . $date . '日です💕' . PHP_EOL
			. 'これからもよろしくね😘';

} else {

	$message = PHP_EOL
			. '🎉おめでとう🎉' . PHP_EOL
			.'二人が付き合ってから' . $diff .'日が経ちました💕';

	$message .= PHP_EOL
			. '0年も続くなんてすごい！' . PHP_EOL
			. 'これからもよろしくね😘';

}

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