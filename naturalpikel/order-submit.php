<?php
require_once "config/database.php";
require_once "includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: order.php");
    exit;
}

$customer_name = trim($_POST["customer_name"] ?? "");
$phone         = trim($_POST["phone"] ?? "");
$address       = trim($_POST["address"] ?? "");
$product_id    = (int) ($_POST["product_id"] ?? 0);
$weight        = trim($_POST["weight"] ?? "");
$quantity      = (int) ($_POST["quantity"] ?? 0);


// ========================================
// BASIC VALIDATION
// ========================================

if (
    $customer_name === "" ||
    $phone === "" ||
    $address === "" ||
    $product_id <= 0 ||
    $weight === "" ||
    $quantity <= 0
) {
    die("Please fill all required fields.");
}


// ========================================
// GET PRODUCT
// ========================================

$stmt = $pdo->prepare("
    SELECT id, name
    FROM products
    WHERE id = ?
    AND status = 1
    LIMIT 1
");

$stmt->execute([$product_id]);

$product = $stmt->fetch();

if (!$product) {
    die("Invalid product.");
}


// ========================================
// GET PRICE
// ========================================

$stmt = $pdo->prepare("
    SELECT price
    FROM product_prices
    WHERE product_id = ?
    AND weight = ?
    LIMIT 1
");

$stmt->execute([
    $product_id,
    $weight
]);

$price = $stmt->fetchColumn();

if ($price === false) {
    die("Price not available for this product.");
}


// ========================================
// CALCULATE TOTAL
// ========================================

$total = $price * $quantity;


// ========================================
// SAVE ORDER
// ========================================

$stmt = $pdo->prepare("
    INSERT INTO orders
    (
        customer_name,
        phone,
        address,
        product_name,
        weight,
        quantity,
        price,
        total,
        status
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')
");

$stmt->execute([
    $customer_name,
    $phone,
    $address,
    $product["name"],
    $weight,
    $quantity,
    $price,
    $total
]);


// ========================================
// GET NEW ORDER ID
// ========================================

$order_id = $pdo->lastInsertId();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        Order Successful |
        <?= htmlspecialchars(getSetting('site_name', 'Natural Pickle')) ?>
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body>


<!-- ========================================
     SUCCESS PAGE
======================================== -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5 text-center">


                    <!-- SUCCESS ICON -->

                    <div
                        class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle"
                        style="
                            width:80px;
                            height:80px;
                            background:#e8f7ee;
                            color:#0b6b3a;
                            font-size:40px;
                        "
                    >

                        <i class="bi bi-check-lg"></i>

                    </div>


                    <!-- TITLE -->

                    <h2
                        class="mb-3"
                        style="color:#0b6b3a;"
                    >
                        Order Received!
                    </h2>


                    <!-- CUSTOMER -->

                    <p class="mb-4">

                        Thank you,

                        <strong>
                            <?= htmlspecialchars($customer_name) ?>
                        </strong>.

                        Your order has been successfully placed.

                    </p>


                    <!-- ORDER ID -->

                    <div
                        class="rounded-4 p-4 mb-4"
                        style="
                            background:#fffaf0;
                            border:2px solid #d4a72c;
                        "
                    >

                        <p class="mb-2 text-muted">
                            Your Order ID
                        </p>

                        <h1
                            class="mb-2"
                            style="color:#0b6b3a;"
                        >
                            #<?= htmlspecialchars($order_id) ?>
                        </h1>

                        <p class="mb-0 text-muted">

                            Please save this Order ID.
                            You will need it to track your order.

                        </p>

                    </div>


                    <!-- ORDER DETAILS -->

                    <div
                        class="text-start rounded-4 p-4 mb-4"
                        style="background:#f8f9fa;"
                    >

                        <h5
                            class="mb-3"
                            style="color:#0b6b3a;"
                        >
                            Order Details
                        </h5>


                        <p class="mb-2">

                            <strong>Product:</strong>

                            <?= htmlspecialchars($product["name"]) ?>

                        </p>


                        <p class="mb-2">

                            <strong>Weight:</strong>

                            <?= htmlspecialchars($weight) ?>

                        </p>


                        <p class="mb-2">

                            <strong>Quantity:</strong>

                            <?= $quantity ?>

                        </p>


                        <p class="mb-0">

                            <strong>Total:</strong>

                            ₹<?= number_format($total, 2) ?>

                        </p>

                    </div>


                    <!-- STATUS -->

                    <div class="mb-4">

                        <span
                            class="badge rounded-pill px-4 py-2"
                            style="
                                background:#fff3cd;
                                color:#856404;
                                font-size:14px;
                            "
                        >

                            <i class="bi bi-clock me-1"></i>

                            Pending Confirmation

                        </span>

                    </div>


                    <!-- BUTTONS -->

                    <div
                        class="d-flex justify-content-center gap-2 flex-wrap"
                    >

                        <a
                            href="track-order.php"
                            class="btn btn-success px-4"
                        >

                            <i class="bi bi-search me-1"></i>

                            Track My Order

                        </a>


                        <a
                            href="index.php"
                            class="btn btn-outline-success px-4"
                        >

                            <i class="bi bi-house me-1"></i>

                            Back to Home

                        </a>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>