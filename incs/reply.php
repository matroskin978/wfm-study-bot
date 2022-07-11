<?php

/**
 * @var array $update
 * @var array $main_keyboard
 * @var array $lang
 * @var string $lang_code
 * @var TelegramBot $telegram
 * @var int $chat_id
 */

$question = $update['message']['reply_to_message']['text'];
$answer = $update['message']['text'] ?? '';

if ($question == $lang[$lang_code]['get_name']) {

    $name = preg_replace("#[^a-zа-яё -]#ui", "", $answer);
    $name = trim($name);

    if (empty($name)) {
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
        save_name($chat_id, $name);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => sprintf($lang[$lang_code]['meet'], $name),
            'reply_markup' => $telegram->replyKeyboardMarkup([
                'keyboard' => $main_keyboard[$lang_code],
                'resize_keyboard' => true,
            ]),
        ]);
    }

}
