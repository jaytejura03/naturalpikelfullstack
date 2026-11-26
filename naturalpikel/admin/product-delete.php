<?php
require_once "../includes/auth.php";

require_once "../config/database.php";
require_once "../includes/functions.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id > 0) {

    $stmt = $pdo->prepare("
        DELETE FROM products
        WHERE id = ?
    ");

    $stmt->execute([$id]);
}

header("Location: products.php");
exit;