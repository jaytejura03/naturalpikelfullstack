<?php

require_once "../config/database.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";


// ========================================
// DASHBOARD DATA
// ========================================

$productCount = $pdo->query("
    SELECT COUNT(*)
    FROM products
")->fetchColumn();


$orderCount = $pdo->query("
    SELECT COUNT(*)
    FROM orders
")->fetchColumn();


$pendingOrders = $pdo->query("
    SELECT COUNT(*)
    FROM orders
    WHERE status = 'Pending'
")->fetchColumn();


$totalSales = $pdo->query("
    SELECT COALESCE(SUM(total), 0)
    FROM orders
    WHERE status != 'Cancelled'
")->fetchColumn();


$adminName = $_SESSION["admin_name"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard | Natural Pickle</title>


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

            font-family: "Inter", sans-serif;

            background: #f6f8f5;

            color: var(--text);

        }


        /* ========================================
           SIDEBAR
        ======================================== */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

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

            border-radius: 14px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: var(--gold);

            color: var(--green-deep);

            font-size: 22px;

        }


        .brand-text {

            line-height: 1.1;

        }


        .brand-text strong {

            display: block;

            font-family: "DM Serif Display", serif;

            font-size: 21px;

            color: white;

        }


        .brand-text small {

            color: rgba(255,255,255,.55);

            font-size: 11px;

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

            color: rgba(255,255,255,.72);

            text-decoration: none;

            padding: 12px 13px;

            margin-bottom: 5px;

            border-radius: 11px;

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

            margin-bottom: 35px;

        }


        .page-title h1 {

            font-family: "DM Serif Display", serif;

            font-size: 38px;

            color: var(--green-dark);

            margin: 0;

        }


        .page-title p {

            margin: 5px 0 0;

            color: var(--muted);

            font-size: 14px;

        }


        .admin-profile {

            display: flex;

            align-items: center;

            gap: 12px;

            background: white;

            padding: 8px 14px 8px 8px;

            border-radius: 50px;

            border: 1px solid var(--border);

        }


        .admin-avatar {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background: var(--green);

            color: white;

            font-weight: 700;

        }


        .admin-profile strong {

            display: block;

            font-size: 13px;

        }


        .admin-profile small {

            color: var(--muted);

            font-size: 11px;

        }


        /* ========================================
           STAT CARDS
        ======================================== */

        .stats-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 30px;

        }


        .stat-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 18px;

            padding: 23px;

            position: relative;

            overflow: hidden;

            transition: .25s;

        }


        .stat-card:hover {

            transform: translateY(-4px);

            box-shadow:
                0 12px 30px rgba(0,0,0,.07);

        }


        .stat-icon {

            width: 48px;
            height: 48px;

            border-radius: 14px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-bottom: 18px;

        }


        .green-icon {

            background: #e7f5ed;

            color: var(--green);

        }


        .gold-icon {

            background: #fff5d8;

            color: #a77b16;

        }


        .blue-icon {

            background: #e8f1ff;

            color: #3973c6;

        }


        .red-icon {

            background: #ffebeb;

            color: #c44747;

        }


        .stat-card small {

            color: var(--muted);

            font-size: 12px;

            font-weight: 600;

        }


        .stat-card h2 {

            font-size: 28px;

            margin: 5px 0 0;

            color: var(--green-dark);

            font-weight: 800;

        }


        /* ========================================
           QUICK ACTIONS
        ======================================== */

        .section-title {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 15px;

        }


        .section-title h4 {

            font-size: 18px;

            font-weight: 700;

            margin: 0;

            color: var(--green-dark);

        }


        .quick-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;

        }


        .quick-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 18px;

            padding: 25px;

            text-decoration: none;

            color: inherit;

            transition: .25s;

            display: block;

        }


        .quick-card:hover {

            transform: translateY(-4px);

            border-color: var(--gold);

            box-shadow:
                0 12px 30px rgba(0,0,0,.06);

        }


        .quick-card-icon {

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 15px;

            background: var(--cream);

            color: var(--green);

            font-size: 23px;

            margin-bottom: 18px;

        }


        .quick-card h5 {

            margin-bottom: 6px;

            font-size: 16px;

            font-weight: 700;

        }


        .quick-card p {

            margin: 0;

            color: var(--muted);

            font-size: 13px;

        }


        .quick-card .arrow {

            float: right;

            color: var(--gold);

            font-size: 20px;

        }


        /* ========================================
           MOBILE
        ======================================== */

        @media (max-width: 1100px) {

            .stats-grid {

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


            .admin-profile {

                display: none;

            }


            .stats-grid,

            .quick-grid {

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

        <a
            href="dashboard.php"
            class="active"
        >

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


        <a href="orders.php">

            <i class="bi bi-bag-check"></i>

            Orders

        </a>

    </nav>


    <div class="sidebar-title mt-4">
        Account
    </div>


    <nav>

        <a href="../index.php" target="_blank">

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
     MAIN CONTENT
======================================== -->

<main class="main">


    <!-- TOP BAR -->

    <div class="topbar">

        <div class="page-title">

            <h1>Dashboard</h1>

            <p>
                Welcome back, <?= htmlspecialchars($adminName) ?>
            </p>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">

                <?= strtoupper(substr($adminName, 0, 1)) ?>

            </div>

            <div>

                <strong>
                    <?= htmlspecialchars($adminName) ?>
                </strong>

                <small>
                    Administrator
                </small>

            </div>

        </div>

    </div>


    <!-- ========================================
         STATISTICS
    ======================================== -->

    <div class="stats-grid">


        <!-- PRODUCTS -->

        <div class="stat-card">

            <div class="stat-icon green-icon">

                <i class="bi bi-box-seam"></i>

            </div>

            <small>Total Products</small>

            <h2>
                <?= $productCount ?>
            </h2>

        </div>


        <!-- ORDERS -->

        <div class="stat-card">

            <div class="stat-icon blue-icon">

                <i class="bi bi-bag-check"></i>

            </div>

            <small>Total Orders</small>

            <h2>
                <?= $orderCount ?>
            </h2>

        </div>


        <!-- PENDING -->

        <div class="stat-card">

            <div class="stat-icon gold-icon">

                <i class="bi bi-clock-history"></i>

            </div>

            <small>Pending Orders</small>

            <h2>
                <?= $pendingOrders ?>
            </h2>

        </div>


        <!-- SALES -->

        <div class="stat-card">

            <div class="stat-icon red-icon">

                <i class="bi bi-currency-rupee"></i>

            </div>

            <small>Total Sales</small>

            <h2>
                ₹<?= number_format($totalSales, 2) ?>
            </h2>

        </div>


    </div>


    <!-- ========================================
         QUICK ACTIONS
    ======================================== -->

    <div class="section-title">

        <h4>Quick Management</h4>

    </div>


    <div class="quick-grid">


        <!-- PRODUCTS -->

        <a
            href="products.php"
            class="quick-card"
        >

            <span class="arrow">
                <i class="bi bi-arrow-up-right"></i>
            </span>

            <div class="quick-card-icon">

                <i class="bi bi-box-seam"></i>

            </div>

            <h5>
                Manage Products
            </h5>

            <p>
                Add, edit and manage your pickle products.
            </p>

        </a>


        <!-- PRICES -->

        <a
            href="prices.php"
            class="quick-card"
        >

            <span class="arrow">
                <i class="bi bi-arrow-up-right"></i>
            </span>

            <div class="quick-card-icon">

                <i class="bi bi-tags"></i>

            </div>

            <h5>
                Manage Prices
            </h5>

            <p>
                Update product prices and package sizes.
            </p>

        </a>


        <!-- ORDERS -->

        <a
            href="orders.php"
            class="quick-card"
        >

            <span class="arrow">
                <i class="bi bi-arrow-up-right"></i>
            </span>

            <div class="quick-card-icon">

                <i class="bi bi-bag-check"></i>

            </div>

            <h5>
                Manage Orders
            </h5>

            <p>
                View orders and update their status.
            </p>

        </a>


    </div>


</main>


</body>

</html>