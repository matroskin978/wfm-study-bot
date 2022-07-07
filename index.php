<?php

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('log_errors', 'on');
ini_set('error_log', __DIR__ . '/main_error.log');

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/incs/config.php';
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/TelegramBot.php';
require_once __DIR__ . '/incs/funcs.php';
require_once __DIR__ . '/incs/keyboards.php';
$lang = require_once __DIR__ . '/incs/phrase.php';

/**
 * @var array $lang_keyboard
 */

$telegram = new TelegramBot(TOKEN);
$update = $telegram->getWebhookUpdates();

file_put_contents(__DIR__ . '/logs.txt', print_r($update, 1), FILE_APPEND);

$text = $update['message']['text'] ?? '';
$name = $update['message']['chat']['first_name'] ?? '';

if (isset($update['message']['chat']['id'])) {
    $chat_id = $update['message']['chat']['id'];
} elseif (isset($update['callback_query']['message']['chat']['id'])) {
    $chat_id = $update['callback_query']['message']['chat']['id'];
}

$data = get_chat_info($chat_id);
if (empty($data)) {
    $lang_code = 'ru';
    add_chat_info($chat_id, $name, $lang_code);
} else {
    $lang_code = $data['lang'];
}

if ($text == '/start') {
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => $lang['ru']['start'] . PHP_EOL . PHP_EOL . $lang['en']['start'],
        'reply_markup' => $telegram->replyKeyboardMarkup([
            'inline_keyboard' => $lang_keyboard,
        ])
    ]);
} elseif (isset($update['callback_query'])) {

    // Callbacks
    require_once __DIR__ . '/incs/callbacks.php';

} else {
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => $lang[$lang_code]['something'],
    ]);
}
