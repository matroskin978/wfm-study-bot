<?php

/**
 * @var array $update
 * @var TelegramBot $telegram
 * @var int $chat_id
 */

$text = $update['callback_query']['data'];

if ($text == 'en' || $text == 'ru') {

    $lang_code = $text;
    set_lang($chat_id, $lang_code);
    $telegram->someRequest('answerCallbackQuery', [
        'callback_query_id' => $update['callback_query']['id'],
//        'text' => "Choose: {$lang_code}",
//        'show_alert' => true,
    ]);
    /*$telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => "Choose: {$lang_code}",
    ]);*/
    $telegram->someRequest('editMessageText', [
        'chat_id' => $chat_id,
        'message_id' => $update['callback_query']['message']['message_id'],
        'text' => "Choose: {$lang_code}",
    ]);

}
