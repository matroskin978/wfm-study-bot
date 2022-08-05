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

function get_date_range($dates): array|false
{
    $pattern = "#^([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4}) ?- ?([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4})$#";
    $pattern2 = "#^([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4})$#";

    if (preg_match($pattern, $dates, $matches) || preg_match($pattern2, $dates, $matches)) {
        $date1 = array_reverse(explode('.', $matches[1]));
        $date1[1] = str_pad($date1[1], 2, '0', STR_PAD_LEFT);
        $date1[2] = str_pad($date1[2], 2, '0', STR_PAD_LEFT);
        $date1 = implode('-', $date1);

        if (!empty($matches[2])) {
            $date2 = array_reverse(explode('.', $matches[2]));
            $date2[1] = str_pad($date2[1], 2, '0', STR_PAD_LEFT);
            $date2[2] = str_pad($date2[2], 2, '0', STR_PAD_LEFT);
            $date2 = implode('-', $date2);
        } else {
            $date2 = $date1;
        }

        if ($date2 > $date1) {
            return ['date1' => $date1, 'date2' => $date2];
        } else {
            return ['date1' => $date2, 'date2' => $date1];
        }
    }

    return false;
}

function get_report_by_dates($chat_id, $dates): array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM diary WHERE chat_id = ? AND created_at BETWEEN ? AND ?");
    $stmt->execute([$chat_id, $dates['date1'], $dates['date2']]);
    return $stmt->fetchAll();
}
