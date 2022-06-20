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
