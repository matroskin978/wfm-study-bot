<?php

/**
 * @var array $lang
 */

$lang_keyboard = [
    [
        ['text' => '🇷🇺 Русский', 'callback_data' => 'ru'],
        ['text' => '🇺🇸󠁧󠁢󠁥󠁮󠁧󠁿 English', 'callback_data' => 'en'],
    ]
];

$main_keyboard = [
    'ru' => [
        [$lang['ru']['diary_btn'], $lang['ru']['report_btn']],
        [$lang['ru']['graph_btn'], $lang['ru']['pa_btn']],
    ],
    'en' => [
        [$lang['en']['diary_btn'], $lang['en']['report_btn']],
        [$lang['en']['graph_btn'], $lang['en']['pa_btn']],
    ],
];

$pa_keyboard = [
    'ru' => [
        [$lang['ru']['ru_btn'], $lang['ru']['en_btn']],
        [$lang['ru']['del_btn'], $lang['ru']['pay_btn']],
        [$lang['ru']['main_menu_btn']],
    ],
    'en' => [
        [$lang['en']['ru_btn'], $lang['en']['en_btn']],
        [$lang['en']['del_btn'], $lang['en']['pay_btn']],
        [$lang['en']['main_menu_btn']],
    ],
];
