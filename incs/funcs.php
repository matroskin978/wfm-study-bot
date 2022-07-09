<?php

function get_chat_info(int $chat_id): array|false
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM chat_info WHERE chat_id = ?");
    $stmt->execute([$chat_id]);
    return $stmt->fetch();
}

function add_chat_info(int $chat_id, string $name, string $lang): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO chat_info (chat_id, first_name, lang) VALUES (?, ?, ?)");
    return $stmt->execute([$chat_id, $name, $lang]);
}

function set_lang(int $chat_id, string $lang): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE chat_info SET lang = ? WHERE chat_id = ?");
    return $stmt->execute([$lang, $chat_id]);
}

function save_name(int $chat_id, string $name): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE chat_info SET first_name = ? WHERE chat_id = ?");
    return $stmt->execute([$name, $chat_id]);
}
