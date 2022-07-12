<?php

return [
    'ru' => [
        'start' => "Привет! Я твой бот-помощник 😉" . PHP_EOL . "Для продолжения общения выбери, пожалуйста, язык.",
        'active_lang' => "Язык чата: русский",
        'get_name' => "Давай знакомиться. Как тебя зовут?",
        'get_name_error' => "Не разобрал имя... попробуй еще раз.",
        'meet' => "Приятно познакомиться, %s! 😎" . PHP_EOL . "В меню ниже ты можешь видеть мой функционал. Я помогу тебе вести ежедневный дневник, строить график и делать отчет за выбранный период и т.д.",

        'pa_instruction' => "Ты в личном кабинете. Здесь можно изменить язык, произвести оплату или удалить данные из дневника.",
        'main_instruction' => "Ты в главном меню.",

        'diary_start' => "Это твой дневник, в который можно ежедневно заносить свои эмоции и мысли о них. Для этого достаточно ответить на несколько предложенных вопросов.",
        'diary_1' => '1. Какую эмоцию испытываешь? (В ответе напиши номер эмоции.)' . PHP_EOL . '1. Эмоция 1' . PHP_EOL . '2. Эмоция 2' . PHP_EOL . '3. Эмоция 3' . PHP_EOL . '4. Эмоция 4' . PHP_EOL . '5. Эмоция 5',
        'diary_2' => '2. Насколько эмоции интенсивны (от 1 до 3)? (В ответе напиши число от 1 до 3.)',
        'diary_3' => '3. Что думаешь по этому поводу?',
        'diary_end' => 'Спасибо! Данные за сегодня записаны в дневник. Возвращайся завтра.',
        'diary_1_error' => 'В ответе на предыдущий вопрос должна быть число от 1 до 5. Попробуй еще раз.',
        'diary_2_error' => 'В ответе на предыдущий вопрос должна быть число от 1 до 3. Попробуй еще раз.',

        'something' => "Я не смог тебя понять 🤔" . PHP_EOL . "Попробуй воспользоваться одной из команд ниже для общения со мной:" . PHP_EOL . PHP_EOL . "<b>/menu</b> - Главное меню". PHP_EOL . "<b>/en</b> - English" . PHP_EOL . "<b>/ru</b> - Русский",

        'diary_btn' => "Дневник",
        'report_btn' => "Отчет",
        'graph_btn' => "График",
        'pa_btn' => "ЛК",
        'ru_btn' => "Русский",
        'en_btn' => "English",
        'del_btn' => "Удалить данные",
        'pay_btn' => "Оплата",
        'main_menu_btn' => "Главное меню",
    ],

    'en' => [
        'start' => "Hello! I am your helper bot 😉" . PHP_EOL . "To continue communication, please select a language.",
        'active_lang' => "Chat language: English",
        'get_name' => "Let's get acquainted. What's your name?",
        'get_name_error' => "Didn't make out the name... try again.",
        'meet' => "Nice to meet you, %s! 😎" . PHP_EOL . "In the menu below you can see my functionality. I will help you keep a daily diary, build a schedule and make a report for the selected period, etc.",

        'pa_instruction' => "You are in your personal account. Here you can change the language, the number of bets or delete data from the diary.",
        'main_instruction' => "You are in main menu.",

        'diary_start' => "This is your diary in which you can enter your emotions and thoughts about them daily. To do this, it is enough to answer a few proposed questions.",
        'diary_1' => '1. What emotion do you feel? (Write the number of the emotion in the answer.)' . PHP_EOL . '1. Emotion 1' . PHP_EOL . '2. Emotion 2' . PHP_EOL . '3. Emotion 3' . PHP_EOL . '4. Emotion 4' . PHP_EOL . '5. Emotion 5',
        'diary_2' => '2. How intense are the emotions (from 1 to 3)? (Write a number from 1 to 3 in your answer.)',
        'diary_3' => '3. What do you think about this?',
        'diary_end' => 'Thank you! The data for today is recorded in the diary. Come back tomorrow.',
        'diary_1_error' => 'The answer to the previous question should be a number between 1 and 5. Try again.',
        'diary_2_error' => 'The answer to the previous question should be a number between 1 and 3. Try again.',

        'something' => "I couldn't understand you 🤔" . PHP_EOL . "Try using one of the commands below to chat with me:" . PHP_EOL . "Try using one of the commands below to communicate with me:" . PHP_EOL . PHP_EOL . "<b>/menu</b> - Main menu". PHP_EOL . "<b>/en</b> - English" . PHP_EOL . "<b>/ru</b> - Русский",

        'diary_btn' => "Diary",
        'report_btn' => "Report",
        'graph_btn' => "Graph",
        'pa_btn' => "PA",
        'ru_btn' => "Русский",
        'en_btn' => "English",
        'del_btn' => "Delete data",
        'pay_btn' => "Payment",
        'main_menu_btn' => "Main menu",
    ],
];
