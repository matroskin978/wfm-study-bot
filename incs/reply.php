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
$date = date("Y-m-d");

// Name
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

// Diary
if ($question == $lang[$lang_code]['diary_1']) {

    if ((int)$answer < 1 || (int)$answer > 5) {
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_1_error'],
        ]);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_1'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    } else {
        $diary_id = get_diary_id($chat_id, $date);
        if (!$diary_id) {
            $diary_id = add_diary_row($chat_id, $date);
        }
        update_diary_column($diary_id, 'emotion_id', $answer);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_2'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    }
}

if ($question == $lang[$lang_code]['diary_2']) {

    if ((int)$answer < 1 || (int)$answer > 3) {
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_2_error'],
        ]);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_2'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    } else {
        $diary_id = get_diary_id($chat_id, $date);
        if (!$diary_id) {
            $diary_id = add_diary_row($chat_id, $date);
        }
        update_diary_column($diary_id, 'emotion_intense', $answer);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['diary_3'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    }
}

if ($question == $lang[$lang_code]['diary_3']) {

    $diary_id = get_diary_id($chat_id, $date);
    if (!$diary_id) {
        $diary_id = add_diary_row($chat_id, $date);
    }
    update_diary_column($diary_id, 'comment', $answer);
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => $lang[$lang_code]['diary_end'],
        'reply_markup' => $telegram->replyKeyboardMarkup([
            'keyboard' => $main_keyboard[$lang_code],
            'resize_keyboard' => true,
        ]),
    ]);
}

// Report
if ($question == $lang[$lang_code]['report_date_choose']) {
    $date_range = get_date_range($answer);
    if (!$date_range) {
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['report_get_date_error'],
        ]);
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $lang[$lang_code]['report_date_choose'],
            'reply_markup' => $telegram->forceReply(),
        ]);
    } else {
        if (!$report_data = get_report_by_dates($chat_id, $date_range)) {
            $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $lang[$lang_code]['report_data_empty'],
                'reply_markup' => $telegram->replyKeyboardMarkup([
                    'keyboard' => $main_keyboard[$lang_code],
                    'resize_keyboard' => true,
                ]),
            ]);
        } else {
            $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $lang[$lang_code]['report_file_create'],
            ]);
        }
    }

}
