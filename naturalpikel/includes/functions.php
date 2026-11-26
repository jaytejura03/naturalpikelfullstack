<?php

function e($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function redirect($url)
{
    header("Location: $url");
    exit;
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function getSetting($key, $default = '')
{
    global $pdo;

    $stmt = $pdo->prepare("
        SELECT setting_value
        FROM settings
        WHERE setting_key = ?
        LIMIT 1
    ");

    $stmt->execute([$key]);

    $value = $stmt->fetchColumn();

    return $value !== false ? $value : $default;
}