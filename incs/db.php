<?php

$db = [
    'host' => DB_HOST,
    'user' => DB_USER,
    'pass' => DB_PASS,
    'db' => DB_NAME,
];

$dsn = "mysql:host={$db['host']};dbname={$db['db']};charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $db['user'], $db['pass'], $opt);
