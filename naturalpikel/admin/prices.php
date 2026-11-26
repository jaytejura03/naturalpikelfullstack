<?php

require_once "../includes/auth.php";
require_once "../config/database.php";
require_once "../includes/functions.php";


/* ========================================
   GET PRODUCTS + PRICES
======================================== */

$stmt = $pdo->query("
    SELECT
        p.id,
        p.name,
        p.sort_order,

        MAX(
            CASE
                WHEN pp.weight = '250g'
                THEN pp.price
            END
        ) AS price_250g,

        MAX(
            CASE
                WHEN pp.weight = '500g'
                THEN pp.price
            END
        ) AS price_500g,

        MAX(
            CASE
                WHEN pp.weight = '1Kg'
                THEN pp.price
            END
        ) AS price_1kg

    FROM products p

    LEFT JOIN product_prices pp
        ON p.id = pp.product_id

    GROUP BY
        p.id,
        p.name,
        p.sort_order

    ORDER BY
        p.sort_order ASC,
        p.id ASC
");

$products = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Manage Prices | Natural Pickle</title>


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


        .top-actions {

            display: flex;

            gap: 10px;

        }


        .btn-premium {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            border-radius: 10px;

            padding: 11px 17px;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;

            transition: .25s;

        }


        .btn-dashboard {

            color: var(--green);

            background: white;

            border: 1px solid var(--border);

        }


        .btn-dashboard:hover {

            border-color: var(--green);

            color: var(--green);

        }


        /* ========================================
           INFO BAR
        ======================================== */

        .price-info {

            display: flex;

            align-items: center;

            gap: 12px;

            background: #fffaf0;

            border: 1px solid #f0dfad;

            border-radius: 14px;

            padding: 15px 18px;

            margin-bottom: 22px;

            color: #765d1d;

            font-size: 13px;

        }


        .price-info i {

            font-size: 20px;

            color: var(--gold);

        }


        /* ========================================
           PRICE TABLE CARD
        ======================================== */

        .price-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(0,0,0,.035);

        }


        .card-header-custom {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px 24px;

            border-bottom: 1px solid var(--border);

        }


        .card-header-custom h5 {

            margin: 0;

            color: var(--green-dark);

            font-size: 16px;

            font-weight: 700;

        }


        .product-count {

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


        .price-table {

            width: 100%;

            margin: 0;

            border-collapse: collapse;

        }


        .price-table thead th {

            background: #fafcf9;

            color: var(--muted);

            text-transform: uppercase;

            letter-spacing: .7px;

            font-size: 10px;

            font-weight: 700;

            padding: 16px 22px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;

        }


        .price-table tbody td {

            padding: 18px 22px;

            border-bottom: 1px solid #edf0ee;

            vertical-align: middle;

            font-size: 13px;

        }


        .price-table tbody tr:last-child td {

            border-bottom: none;

        }


        .price-table tbody tr {

            transition: .2s;

        }


        .price-table tbody tr:hover {

            background: #fcfdfb;

        }


        /* ========================================
           PRODUCT
        ======================================== */

        .product-name {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .product-icon {

            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--cream);

            color: var(--green);

            font-size: 18px;

        }


        .product-name strong {

            display: block;

            color: var(--green-dark);

            font-size: 13px;

        }


        .product-name small {

            display: block;

            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;

        }


        /* ========================================
           PRICE
        ======================================== */

        .price-value {

            display: inline-flex;

            align-items: center;

            gap: 3px;

            padding: 8px 12px;

            background: #f5f8f5;

            border: 1px solid #e7ece8;

            border-radius: 9px;

            color: var(--green-dark);

            font-weight: 700;

            font-size: 13px;

            min-width: 85px;

        }


        .price-value i {

            color: var(--gold);

            font-size: 12px;

        }


        .price-missing {

            color: #a5ada8;

            font-size: 12px;

        }


        /* ========================================
           EDIT BUTTON
        ======================================== */

        .edit-price {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 6px;

            padding: 8px 13px;

            border-radius: 9px;

            background: #eaf2ff;

            color: #3973c6;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;

        }


        .edit-price:hover {

            background: #3973c6;

            color: white;

        }


        /* ========================================
           EMPTY STATE
        ======================================== */

        .empty-state {

            text-align: center;

            padding: 60px 20px;

            color: var(--muted);

        }


        .empty-state i {

            display: block;

            font-size: 45px;

            color: #cdd5d0;

            margin-bottom: 15px;

        }


        .empty-state h5 {

            color: var(--green-dark);

        }


        /* ========================================
           MOBILE
        ======================================== */

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


            .top-actions {

                flex-direction: column;

            }


            .btn-premium {

                justify-content: center;

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


        <a
            href="prices.php"
            class="active"
        >

            <i class="bi bi-tags"></i>

            Prices

        </a>


        <a href="orders.php">

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

            <h1>Prices</h1>

            <p>
                Manage pickle prices and package sizes
            </p>

        </div>


        <div class="top-actions">

            <a
                href="dashboard.php"
                class="btn-premium btn-dashboard"
            >

                <i class="bi bi-arrow-left"></i>

                Dashboard

            </a>

        </div>

    </div>


    <!-- INFO -->

    <div class="price-info">

        <i class="bi bi-info-circle-fill"></i>

        <span>
            Manage prices for the available package sizes:
            <strong>250g</strong>,
            <strong>500g</strong> and
            <strong>1Kg</strong>.
        </span>

    </div>


    <!-- PRICE TABLE -->

    <div class="price-card">


        <div class="card-header-custom">

            <h5>

                <i class="bi bi-tags me-2"></i>

                Product Prices

            </h5>


            <span class="product-count">

                <?= count($products) ?> Products

            </span>

        </div>


        <div class="table-wrapper">

            <table class="price-table">


                <thead>

                    <tr>

                        <th>
                            Product
                        </th>

                        <th>
                            250g
                        </th>

                        <th>
                            500g
                        </th>

                        <th>
                            1Kg
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php if (empty($products)): ?>


                    <tr>

                        <td
                            colspan="5"
                            class="empty-state"
                        >

                            <i class="bi bi-tags"></i>

                            <h5>
                                No Products Found
                            </h5>

                            <p>
                                Add products before managing their prices.
                            </p>

                        </td>

                    </tr>


                <?php else: ?>


                    <?php foreach ($products as $product): ?>


                        <tr>


                            <!-- PRODUCT -->

                            <td>

                                <div class="product-name">

                                    <div class="product-icon">

                                        <i class="bi bi-jar"></i>

                                    </div>


                                    <div>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $product["name"]
                                            ) ?>

                                        </strong>

                                        <small>

                                            Product #<?= (int) $product["id"] ?>

                                        </small>

                                    </div>

                                </div>

                            </td>


                            <!-- 250g -->

                            <td>

                                <?php if ($product["price_250g"] !== null): ?>

                                    <span class="price-value">

                                        <i class="bi bi-currency-rupee"></i>

                                        <?= number_format(
                                            $product["price_250g"],
                                            2
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="price-missing">
                                        Not set
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- 500g -->

                            <td>

                                <?php if ($product["price_500g"] !== null): ?>

                                    <span class="price-value">

                                        <i class="bi bi-currency-rupee"></i>

                                        <?= number_format(
                                            $product["price_500g"],
                                            2
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="price-missing">
                                        Not set
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- 1Kg -->

                            <td>

                                <?php if ($product["price_1kg"] !== null): ?>

                                    <span class="price-value">

                                        <i class="bi bi-currency-rupee"></i>

                                        <?= number_format(
                                            $product["price_1kg"],
                                            2
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="price-missing">
                                        Not set
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <a
                                    href="product-edit.php?id=<?= (int) $product["id"] ?>"
                                    class="edit-price"
                                >

                                    <i class="bi bi-pencil"></i>

                                    Edit Prices

                                </a>

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