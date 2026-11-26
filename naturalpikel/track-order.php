<?php

require_once "config/database.php";
require_once "includes/functions.php";

$order = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $order_id = trim($_POST["order_id"] ?? "");
    $phone    = trim($_POST["phone"] ?? "");

    if ($order_id === "" || $phone === "") {

        $error = "Please enter your Order ID and phone number.";

    } else {

        $stmt = $pdo->prepare("
            SELECT
                id,
                customer_name,
                phone,
                product_name,
                weight,
                quantity,
                total,
                status,
                created_at
            FROM orders
            WHERE id = ?
            AND phone = ?
            LIMIT 1
        ");

        $stmt->execute([
            $order_id,
            $phone
        ]);

        $order = $stmt->fetch();

        if (!$order) {
            $error = "Order not found. Please check your Order ID and phone number.";
        }
    }
}

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
        Track Order |
        <?= htmlspecialchars(getSetting('site_name', 'Natural Pickle')) ?>
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Main CSS -->
    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<?php include "includes/navbar.php"; ?>


<!-- =====================================================
TRACK ORDER
===================================================== -->

<main class="track-order-page">

    <!-- Hero -->

    <section class="track-order-hero">

        <div class="container">

            <div class="text-center">

                <span class="track-label">
                    <i class="bi bi-box-seam-fill"></i>
                    Order Tracking
                </span>

                <h1>
                    Track Your <span>Order</span>
                </h1>

                <p>
                    Check the latest status of your Natural Pickle order.
                </p>

            </div>

        </div>

    </section>


    <!-- Tracking Section -->

    <section class="track-order-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7 col-xl-6">

                    <div class="track-card">

                        <div class="track-card-icon">

                            <i class="bi bi-search"></i>

                        </div>

                        <h2>
                            Find Your Order
                        </h2>

                        <p class="track-description">
                            Enter your Order ID and the phone number
                            used when placing the order.
                        </p>


                        <?php if ($error): ?>

                            <div class="track-error">

                                <i class="bi bi-exclamation-circle-fill"></i>

                                <span>
                                    <?= htmlspecialchars($error) ?>
                                </span>

                            </div>

                        <?php endif; ?>


                        <form method="POST">


                            <!-- Order ID -->

                            <div class="mb-4">

                                <label class="track-form-label">
                                    Order ID
                                </label>

                                <div class="track-input">

                                    <i class="bi bi-hash"></i>

                                    <input
                                        type="number"
                                        name="order_id"
                                        placeholder="Example: 1025"
                                        value="<?= htmlspecialchars($_POST['order_id'] ?? '') ?>"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- Phone -->

                            <div class="mb-4">

                                <label class="track-form-label">
                                    Phone Number
                                </label>

                                <div class="track-input">

                                    <i class="bi bi-telephone-fill"></i>

                                    <input
                                        type="tel"
                                        name="phone"
                                        placeholder="Enter your phone number"
                                        value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                                        required
                                    >

                                </div>

                            </div>


                            <button
                                type="submit"
                                class="track-btn"
                            >

                                <span>
                                    Track My Order
                                </span>

                                <i class="bi bi-arrow-right"></i>

                            </button>

                        </form>


                        <?php if ($order): ?>

                            <div class="order-result">

                                <div class="result-header">

                                    <div>

                                        <small>
                                            ORDER ID
                                        </small>

                                        <h3>
                                            #<?= htmlspecialchars($order['id']) ?>
                                        </h3>

                                    </div>


                                    <?php

                                    $status = strtolower(
                                        trim($order['status'])
                                    );

                                    ?>

                                    <?php if ($status === 'confirmed'): ?>

                                        <span class="status-badge confirmed">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Confirmed
                                        </span>

                                    <?php elseif ($status === 'cancelled'): ?>

                                        <span class="status-badge cancelled">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Cancelled
                                        </span>

                                    <?php else: ?>

                                        <span class="status-badge pending">
                                            <i class="bi bi-clock-fill"></i>
                                            Pending
                                        </span>

                                    <?php endif; ?>

                                </div>


                                <div class="result-divider"></div>


                                <div class="order-detail">

                                    <span>
                                        Customer
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($order['customer_name']) ?>
                                    </strong>

                                </div>


                                <div class="order-detail">

                                    <span>
                                        Product
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($order['product_name']) ?>
                                    </strong>

                                </div>


                                <div class="order-detail">

                                    <span>
                                        Weight
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($order['weight']) ?>
                                    </strong>

                                </div>


                                <div class="order-detail">

                                    <span>
                                        Quantity
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($order['quantity']) ?>
                                    </strong>

                                </div>


                                <div class="order-detail total-row">

                                    <span>
                                        Total
                                    </span>

                                    <strong>
                                        ₹<?= number_format(
                                            (float)$order['total'],
                                            2
                                        ) ?>
                                    </strong>

                                </div>


                                <div class="order-date">

                                    <i class="bi bi-calendar3"></i>

                                    Ordered on
                                    <?= date(
                                        'd M Y, h:i A',
                                        strtotime($order['created_at'])
                                    ) ?>

                                </div>


                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<?php include "includes/footer.php"; ?>

</body>
</html>