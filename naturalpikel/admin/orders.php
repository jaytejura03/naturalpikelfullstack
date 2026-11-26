<?php

require_once "../includes/auth.php";
require_once "../config/database.php";
require_once "../includes/functions.php";


/* ========================================
   GET ORDERS
======================================== */

$stmt = $pdo->query("
    SELECT *
    FROM orders
    ORDER BY created_at DESC
");

$orders = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Orders | Natural Pickle</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    >


    <!-- Google Fonts -->

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        :root {

            --green: #0b6b3a;
            --green-dark: #063d25;
            --green-deep: #032719;

            --gold: #d4a72c;
            --gold-light: #f2d477;

            --cream: #fffaf0;

            --text: #24352d;
            --muted: #718078;

            --border: #e7ece8;

        }


        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background: #f6f8f5;

            color: var(--text);

            font-family: "Inter", sans-serif;

        }


        /* ========================================
           SIDEBAR
        ======================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 250px;
            height: 100vh;

            background:
                linear-gradient(
                    180deg,
                    var(--green-deep),
                    var(--green-dark)
                );

            padding: 28px 18px;

            color: white;

            z-index: 1000;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 10px 28px;

            border-bottom:
                1px solid rgba(255,255,255,.12);

            margin-bottom: 25px;

        }


        .brand-icon {

            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: var(--gold);

            color: var(--green-deep);

            font-size: 22px;

        }


        .brand-text strong {

            display: block;

            font-family: "DM Serif Display", serif;

            font-size: 21px;

            color: white;

        }


        .brand-text small {

            color: rgba(255,255,255,.5);

            font-size: 10px;

            letter-spacing: 1px;

        }


        .sidebar-title {

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            color: rgba(255,255,255,.4);

            padding: 0 12px;

            margin-bottom: 10px;

        }


        .sidebar a {

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 12px 13px;

            margin-bottom: 5px;

            border-radius: 11px;

            color: rgba(255,255,255,.7);

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition: .25s;

        }


        .sidebar a i {

            font-size: 18px;

        }


        .sidebar a:hover,

        .sidebar a.active {

            background: rgba(255,255,255,.1);

            color: white;

        }


        .sidebar a.active {

            border-left: 3px solid var(--gold);

        }


        .logout-link {

            margin-top: 30px !important;

            color: #ffb4b4 !important;

        }


        .logout-link:hover {

            background: rgba(255,70,70,.1) !important;

        }


        /* ========================================
           MAIN
        ======================================== */

        .main {

            margin-left: 250px;

            min-height: 100vh;

            padding: 35px;

        }


        /* ========================================
           TOP BAR
        ======================================== */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 30px;

        }


        .page-title h1 {

            margin: 0;

            color: var(--green-dark);

            font-family: "DM Serif Display", serif;

            font-size: 38px;

        }


        .page-title p {

            margin: 5px 0 0;

            color: var(--muted);

            font-size: 14px;

        }


        .dashboard-btn {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 11px 17px;

            border-radius: 10px;

            background: white;

            border: 1px solid var(--border);

            color: var(--green);

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: .25s;

        }


        .dashboard-btn:hover {

            border-color: var(--green);

            color: var(--green);

        }


        /* ========================================
           ORDER SUMMARY
        ======================================== */

        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 25px;

        }


        .summary-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .summary-icon {

            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 13px;

            font-size: 20px;

        }


        .summary-green {

            background: #e7f5ed;

            color: var(--green);

        }


        .summary-gold {

            background: #fff5d8;

            color: #a77b16;

        }


        .summary-blue {

            background: #e8f1ff;

            color: #3973c6;

        }


        .summary-card small {

            display: block;

            color: var(--muted);

            font-size: 11px;

            margin-bottom: 3px;

        }


        .summary-card strong {

            color: var(--green-dark);

            font-size: 22px;

        }


        /* ========================================
           ORDERS CARD
        ======================================== */

        .orders-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(0,0,0,.035);

        }


        .orders-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px 24px;

            border-bottom: 1px solid var(--border);

        }


        .orders-header h5 {

            margin: 0;

            color: var(--green-dark);

            font-size: 16px;

            font-weight: 700;

        }


        .order-count {

            background: #e8f5ee;

            color: var(--green);

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 700;

        }


        .table-wrapper {

            overflow-x: auto;

        }


        .orders-table {

            width: 100%;

            margin: 0;

            border-collapse: collapse;

        }


        .orders-table thead th {

            background: #fafcf9;

            color: var(--muted);

            text-transform: uppercase;

            letter-spacing: .6px;

            font-size: 10px;

            font-weight: 700;

            padding: 15px 18px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;

        }


        .orders-table tbody td {

            padding: 16px 18px;

            border-bottom: 1px solid #edf0ee;

            vertical-align: middle;

            font-size: 12px;

        }


        .orders-table tbody tr:last-child td {

            border-bottom: none;

        }


        .orders-table tbody tr {

            transition: .2s;

        }


        .orders-table tbody tr:hover {

            background: #fcfdfb;

        }


        /* ========================================
           ORDER ID
        ======================================== */

        .order-id {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 10px;

            border-radius: 8px;

            background: var(--cream);

            color: var(--green);

            font-weight: 800;

            font-size: 12px;

        }


        /* ========================================
           CUSTOMER
        ======================================== */

        .customer-name {

            display: block;

            color: var(--green-dark);

            font-weight: 700;

            font-size: 13px;

        }


        .customer-phone {

            display: block;

            margin-top: 3px;

            color: var(--muted);

            font-size: 11px;

        }


        /* ========================================
           PRODUCT
        ======================================== */

        .product-name {

            color: var(--green-dark);

            font-weight: 600;

        }


        .weight {

            color: var(--muted);

            font-size: 11px;

            margin-top: 3px;

        }


        /* ========================================
           QUANTITY
        ======================================== */

        .quantity {

            width: 30px;
            height: 30px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            background: #f4f6f4;

            border-radius: 9px;

            color: var(--green-dark);

            font-weight: 700;

        }


        /* ========================================
           TOTAL
        ======================================== */

        .order-total {

            color: var(--green-dark);

            font-weight: 800;

            white-space: nowrap;

        }


        /* ========================================
           STATUS SELECT
        ======================================== */

        .status-form {

            margin: 0;

        }


        .status-select {

            min-width: 125px;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 7px 30px 7px 10px;

            font-size: 11px;

            font-weight: 600;

            color: var(--green-dark);

            background-color: #f8faf8;

            cursor: pointer;

        }


        .status-select:focus {

            border-color: var(--green);

            box-shadow:
                0 0 0 3px rgba(11,107,58,.1);

        }


        /* ========================================
           DATE
        ======================================== */

        .order-date {

            white-space: nowrap;

            color: var(--muted);

            font-size: 11px;

        }


        /* ========================================
           EMPTY STATE
        ======================================== */

        .empty-state {

            text-align: center;

            padding: 65px 20px !important;

            color: var(--muted);

        }


        .empty-state i {

            display: block;

            font-size: 48px;

            color: #cdd5d0;

            margin-bottom: 15px;

        }


        .empty-state h5 {

            color: var(--green-dark);

        }


        /* ========================================
           MOBILE
        ======================================== */

        @media (max-width: 1000px) {

            .summary-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

        }


        @media (max-width: 768px) {

            .sidebar {

                position: static;

                width: 100%;

                height: auto;

            }


            .sidebar nav {

                display: flex;

                flex-wrap: wrap;

                gap: 5px;

            }


            .sidebar a {

                margin: 0;

            }


            .main {

                margin-left: 0;

                padding: 22px;

            }


            .topbar {

                align-items: flex-start;

                gap: 15px;

            }


            .page-title h1 {

                font-size: 30px;

            }


            .summary-grid {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<!-- ========================================
     SIDEBAR
======================================== -->

<aside class="sidebar">


    <div class="brand">

        <div class="brand-icon">

            <i class="bi bi-flower1"></i>

        </div>

        <div class="brand-text">

            <strong>Natural Pickle</strong>

            <small>ADMIN PANEL</small>

        </div>

    </div>


    <div class="sidebar-title">
        Management
    </div>


    <nav>

        <a href="dashboard.php">

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <a href="products.php">

            <i class="bi bi-box-seam"></i>

            Products

        </a>


        <a href="prices.php">

            <i class="bi bi-tags"></i>

            Prices

        </a>


        <a
            href="orders.php"
            class="active"
        >

            <i class="bi bi-bag-check"></i>

            Orders

        </a>

    </nav>


    <div class="sidebar-title mt-4">
        Account
    </div>


    <nav>

        <a
            href="../index.php"
            target="_blank"
        >

            <i class="bi bi-globe2"></i>

            View Website

        </a>


        <a
            href="logout.php"
            class="logout-link"
        >

            <i class="bi bi-box-arrow-right"></i>

            Logout

        </a>

    </nav>

</aside>


<!-- ========================================
     MAIN
======================================== -->

<main class="main">


    <!-- HEADER -->

    <div class="topbar">

        <div class="page-title">

            <h1>Customer Orders</h1>

            <p>
                View and manage customer orders
            </p>

        </div>


        <a
            href="dashboard.php"
            class="dashboard-btn"
        >

            <i class="bi bi-arrow-left"></i>

            Dashboard

        </a>

    </div>


    <!-- ========================================
         SUMMARY
    ======================================== -->

    <?php

    $totalOrders = count($orders);

    $pendingCount = 0;

    $confirmedCount = 0;

    foreach ($orders as $order) {

        if ($order["status"] === "Pending") {
            $pendingCount++;
        }

        if ($order["status"] === "Confirmed") {
            $confirmedCount++;
        }

    }

    ?>


    <div class="summary-grid">


        <div class="summary-card">

            <div class="summary-icon summary-blue">

                <i class="bi bi-bag-check"></i>

            </div>

            <div>

                <small>Total Orders</small>

                <strong>
                    <?= $totalOrders ?>
                </strong>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon summary-gold">

                <i class="bi bi-clock-history"></i>

            </div>

            <div>

                <small>Pending</small>

                <strong>
                    <?= $pendingCount ?>
                </strong>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon summary-green">

                <i class="bi bi-check-circle"></i>

            </div>

            <div>

                <small>Confirmed</small>

                <strong>
                    <?= $confirmedCount ?>
                </strong>

            </div>

        </div>


    </div>


    <!-- ========================================
         ORDERS TABLE
    ======================================== -->

    <div class="orders-card">


        <div class="orders-header">

            <h5>

                <i class="bi bi-receipt me-2"></i>

                All Customer Orders

            </h5>


            <span class="order-count">

                <?= $totalOrders ?> Orders

            </span>

        </div>


        <div class="table-wrapper">

            <table class="orders-table">


                <thead>

                    <tr>

                        <th>Order</th>

                        <th>Customer</th>

                        <th>Product</th>

                        <th>Qty</th>

                        <th>Total</th>

                        <th>Status</th>

                        <th>Date</th>

                    </tr>

                </thead>


                <tbody>


                <?php if (empty($orders)): ?>


                    <tr>

                        <td
                            colspan="7"
                            class="empty-state"
                        >

                            <i class="bi bi-bag-x"></i>

                            <h5>
                                No Orders Found
                            </h5>

                            <p>
                                Customer orders will appear here.
                            </p>

                        </td>

                    </tr>


                <?php else: ?>


                    <?php foreach ($orders as $order): ?>


                        <tr>


                            <!-- ORDER ID -->

                            <td>

                                <span class="order-id">

                                    #<?= (int) $order["id"] ?>

                                </span>

                            </td>


                            <!-- CUSTOMER -->

                            <td>

                                <span class="customer-name">

                                    <?= htmlspecialchars(
                                        $order["customer_name"]
                                    ) ?>

                                </span>

                                <span class="customer-phone">

                                    <i class="bi bi-telephone me-1"></i>

                                    <?= htmlspecialchars(
                                        $order["phone"]
                                    ) ?>

                                </span>

                            </td>


                            <!-- PRODUCT -->

                            <td>

                                <span class="product-name">

                                    <?= htmlspecialchars(
                                        $order["product_name"]
                                    ) ?>

                                </span>

                                <div class="weight">

                                    <?= htmlspecialchars(
                                        $order["weight"]
                                    ) ?>

                                </div>

                            </td>


                            <!-- QUANTITY -->

                            <td>

                                <span class="quantity">

                                    <?= (int) $order["quantity"] ?>

                                </span>

                            </td>


                            <!-- TOTAL -->

                            <td>

                                <span class="order-total">

                                    ₹<?= number_format(
                                        $order["total"],
                                        2
                                    ) ?>

                                </span>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <form
                                    method="POST"
                                    action="order-status.php"
                                    class="status-form"
                                >

                                    <input
                                        type="hidden"
                                        name="order_id"
                                        value="<?= (int) $order["id"] ?>"
                                    >


                                    <select
                                        name="status"
                                        class="status-select"
                                        onchange="this.form.submit()"
                                    >

                                        <option
                                            value="Pending"
                                            <?= $order["status"] === "Pending"
                                                ? "selected"
                                                : "" ?>
                                        >
                                            Pending
                                        </option>


                                        <option
                                            value="Confirmed"
                                            <?= $order["status"] === "Confirmed"
                                                ? "selected"
                                                : "" ?>
                                        >
                                            Confirmed
                                        </option>


                                        <option
                                            value="Shipped"
                                            <?= $order["status"] === "Shipped"
                                                ? "selected"
                                                : "" ?>
                                        >
                                            Shipped
                                        </option>


                                        <option
                                            value="Delivered"
                                            <?= $order["status"] === "Delivered"
                                                ? "selected"
                                                : "" ?>
                                        >
                                            Delivered
                                        </option>


                                        <option
                                            value="Cancelled"
                                            <?= $order["status"] === "Cancelled"
                                                ? "selected"
                                                : "" ?>
                                        >
                                            Cancelled
                                        </option>

                                    </select>

                                </form>

                            </td>


                            <!-- DATE -->

                            <td>

                                <span class="order-date">

                                    <?= date(
                                        "d M Y",
                                        strtotime($order["created_at"])
                                    ) ?>

                                    <br>

                                    <?= date(
                                        "h:i A",
                                        strtotime($order["created_at"])
                                    ) ?>

                                </span>

                            </td>


                        </tr>


                    <?php endforeach; ?>


                <?php endif; ?>


                </tbody>

            </table>

        </div>

    </div>


</main>


</body>

</html>