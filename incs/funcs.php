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

function get_diary_id(int $chat_id, string $created_at)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM diary WHERE chat_id = ? AND created_at = ?");
    $stmt->execute([$chat_id, $created_at]);
    return $stmt->fetchColumn();
}

function add_diary_row(int $chat_id, string $created_at): int
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO diary (chat_id, created_at) VALUES (?, ?)");
    $stmt->execute([$chat_id, $created_at]);
    return $pdo->lastInsertId();
}

function update_diary_column(int $id, string $column, int|string $value): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE diary SET `{$column}` = ? WHERE id = ?");
    return $stmt->execute([$value, $id]);
}
