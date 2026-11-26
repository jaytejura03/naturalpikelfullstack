<?php

require_once "../includes/auth.php";
require_once "../config/database.php";
require_once "../includes/functions.php";


/* ========================================
   GET PRODUCTS
======================================== */

$stmt = $pdo->query("
    SELECT *
    FROM products
    ORDER BY sort_order ASC, id ASC
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

    <title>Manage Products | Natural Pickle</title>


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
           TOP HEADER
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


        .btn-add {

            color: white;

            background: var(--green);

            border: 1px solid var(--green);

        }


        .btn-add:hover {

            background: var(--green-dark);

            color: white;

            transform: translateY(-1px);

        }


        /* ========================================
           PRODUCT TABLE CARD
        ======================================== */

        .product-card {

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


        .product-table {

            width: 100%;

            margin: 0;

            border-collapse: collapse;

        }


        .product-table thead th {

            background: #fafcf9;

            color: var(--muted);

            text-transform: uppercase;

            letter-spacing: .6px;

            font-size: 10px;

            font-weight: 700;

            padding: 15px 20px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;

        }


        .product-table tbody td {

            padding: 18px 20px;

            border-bottom: 1px solid #edf0ee;

            vertical-align: middle;

            font-size: 13px;

        }


        .product-table tbody tr:last-child td {

            border-bottom: none;

        }


        .product-table tbody tr {

            transition: .2s;

        }


        .product-table tbody tr:hover {

            background: #fcfdfb;

        }


        /* ========================================
           PRODUCT NAME
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


        .product-slug {

            display: block;

            color: var(--muted);

            font-size: 11px;

            margin-top: 3px;

        }


        /* ========================================
           BADGE
        ======================================== */

        .product-badge {

            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            background: #fff5d8;

            color: #967018;

            font-size: 11px;

            font-weight: 700;

        }


        .no-badge {

            color: #a3aaa6;

            font-size: 12px;

        }


        /* ========================================
           STATUS
        ======================================== */

        .status-badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

        }


        .status-active {

            background: #e7f5ed;

            color: var(--green);

        }


        .status-inactive {

            background: #eef0f1;

            color: #68716c;

        }


        /* ========================================
           SORT ORDER
        ======================================== */

        .sort-number {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 30px;
            height: 30px;

            border-radius: 9px;

            background: #f4f6f4;

            color: var(--green-dark);

            font-weight: 700;

            font-size: 12px;

        }


        /* ========================================
           ACTIONS
        ======================================== */

        .action-buttons {

            display: flex;

            gap: 7px;

        }


        .action-btn {

            width: 34px;
            height: 34px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            border-radius: 9px;

            text-decoration: none;

            transition: .2s;

            font-size: 14px;

        }


        .edit-btn {

            background: #eaf2ff;

            color: #3973c6;

        }


        .edit-btn:hover {

            background: #3973c6;

            color: white;

        }


        .delete-btn {

            background: #ffeded;

            color: #c44747;

        }


        .delete-btn:hover {

            background: #c44747;

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


        <a
            href="products.php"
            class="active"
        >

            <i class="bi bi-box-seam"></i>

            Products

        </a>


        <a href="prices.php">

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

            <h1>Products</h1>

            <p>
                Manage your pickle products
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


            <a
                href="product-add.php"
                class="btn-premium btn-add"
            >

                <i class="bi bi-plus-lg"></i>

                Add Product

            </a>

        </div>

    </div>


    <!-- PRODUCT TABLE -->

    <div class="product-card">


        <div class="card-header-custom">

            <h5>

                <i class="bi bi-box-seam me-2"></i>

                All Products

            </h5>


            <span class="product-count">

                <?= count($products) ?> Products

            </span>

        </div>


        <div class="table-wrapper">

            <table class="product-table">


                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Product</th>

                        <th>Badge</th>

                        <th>Status</th>

                        <th>Order</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>


                <?php if (empty($products)): ?>


                    <tr>

                        <td
                            colspan="6"
                            class="empty-state"
                        >

                            <i class="bi bi-box-seam"></i>

                            <h5>
                                No Products Found
                            </h5>

                            <p>
                                Add your first pickle product to get started.
                            </p>

                        </td>

                    </tr>


                <?php else: ?>


                    <?php foreach ($products as $product): ?>


                        <tr>


                            <!-- ID -->

                            <td>

                                <span class="sort-number">

                                    <?= (int) $product["id"] ?>

                                </span>

                            </td>


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


                                        <span class="product-slug">

                                            <?= htmlspecialchars(
                                                $product["slug"]
                                            ) ?>

                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- BADGE -->

                            <td>

                                <?php if (!empty($product["badge"])): ?>

                                    <span class="product-badge">

                                        <?= htmlspecialchars(
                                            $product["badge"]
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="no-badge">
                                        —
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if ($product["status"] == 1): ?>

                                    <span
                                        class="status-badge status-active"
                                    >

                                        <i class="bi bi-check-circle-fill"></i>

                                        Active

                                    </span>

                                <?php else: ?>

                                    <span
                                        class="status-badge status-inactive"
                                    >

                                        <i class="bi bi-dash-circle-fill"></i>

                                        Inactive

                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- SORT ORDER -->

                            <td>

                                <span class="sort-number">

                                    <?= (int) $product["sort_order"] ?>

                                </span>

                            </td>


                            <!-- ACTIONS -->

                            <td>

                                <div class="action-buttons">


                                    <a
                                        href="product-edit.php?id=<?= (int) $product["id"] ?>"
                                        class="action-btn edit-btn"
                                        title="Edit Product"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <a
                                        href="product-delete.php?id=<?= (int) $product["id"] ?>"
                                        class="action-btn delete-btn"
                                        title="Delete Product"
                                        onclick="return confirm('Are you sure you want to delete this product?');"
                                    >

                                        <i class="bi bi-trash3"></i>

                                    </a>


                                </div>

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