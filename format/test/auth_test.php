<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

        $uri = 'https://notify-bot.line.me/oauth/authorize?' .
            'response_type=code' . '&' .
            'client_id=' . config('services.line_notify.client_id') . '&' .
            'redirect_uri=' . config('services.line_notify.redirect_uri') . '&' .
            'scope=notify' . '&' .
            'state=' . csrf_token() . '&' .
            'response_mode=form_post';
        return redirect($uri);

return [

    'line_notify' => [
        'client_id' => env('LINE_NOTIFY_CLIENT_ID'),
        'secret'    => env('LINE_NOTIFY_CLIENT_SECRET'),
        'redirect_uri' => env('LINE_NOTIFY_CLIENT_CALLBACK_URI')
    ]
];
<?php
        $uri = 'https://notify-bot.line.me/oauth/authorize?' .
            'response_type=code' . '&' .
            'client_id=' . 'idを設定する' . '&' .
            'redirect_uri=' . 'http://molihua717.xsrv.jp/line/bot.html' . '&' .
            'scope=notify' . '&' .
            'state=' . csrf_token() . '&' .
            'response_mode=form_post';

?>

