<?php

/**
 * @var array $update
 * @var array $lang
 * @var string $lang_code
 * @var TelegramBot $telegram
 * @var int $chat_id
 */

$question = $update['message']['reply_to_message']['text'];
$answer = $update['message']['text'] ?? '';

if ($question == $lang[$lang_code]['get_name']) {

    if (empty($answer)) {
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['get_name_error'],
        ]);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['get_name'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    } else {
        save_name($chat_id, $answer);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => sprintf($lang[$lang_code]['meet'], $answer),
        ]);
    }

}
