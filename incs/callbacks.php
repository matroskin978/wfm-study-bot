<?php

/**
 * @var array $update
 * @var array $lang
 * @var TelegramBot $telegram
 * @var int $chat_id
 */

$text = $update['callback_query']['data'];

if ($text == 'en' || $text == 'ru') {

    $lang_code = $text;
    set_lang($chat_id, $lang_code);
    $telegram->someRequest('answerCallbackQuery', [
        'callback_query_id' => $update['callback_query']['id'],
    ]);

    $telegram->someRequest('editMessageText', [
        'chat_id' => $chat_id,
        'message_id' => $update['callback_query']['message']['message_id'],
        'text' => $lang[$lang_code]['active_lang'],
    ]);

    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => $lang[$lang_code]['get_name'],
        'reply_markup' => $telegram->forceReply(),
    ]);

}
