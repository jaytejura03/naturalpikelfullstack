<?php
require_once "../includes/auth.php";

require_once "../config/database.php";
require_once "../includes/functions.php";

$order_id = (int) ($_POST["order_id"] ?? 0);
$status = $_POST["status"] ?? "";

$allowed_statuses = [
    "Pending",
    "Confirmed",
    "Shipped",
    "Delivered",
    "Cancelled"
];

if (
    $order_id > 0 &&
    in_array($status, $allowed_statuses, true)
) {

    $stmt = $pdo->prepare("
        UPDATE orders
        SET status = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $status,
        $order_id
    ]);
}

header("Location: orders.php");
exit;