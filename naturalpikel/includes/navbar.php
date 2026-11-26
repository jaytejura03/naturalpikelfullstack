<?php
// Retrieve current page filename to set active link dynamically
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">

    <link
        href="assets/css/boostrap.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    
<nav class="navbar navbar-expand-lg fixed-top premium-navbar" id="navbar">
    <div class="container">

        <!-- Brand Logo -->
        <a class="navbar-brand premium-brand" href="index.php">
            <img
                src="assets/uploads/products/Naturalpickel.png"
                alt="<?= function_exists('getSetting') ? htmlspecialchars(getSetting('site_name')) : 'Natural Pickle'; ?>"
            >
        </a>

        <!-- Mobile Toggler -->
        <button
            class="navbar-toggler premium-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu"
            aria-controls="navMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Navigation Links & Action Buttons -->
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link premium-nav-link <?= ($currentPage == 'index.php') ? 'active' : ''; ?>" href="index.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link premium-nav-link <?= ($currentPage == 'about.php') ? 'active' : ''; ?>" href="about.php">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link premium-nav-link <?= ($currentPage == 'products.php') ? 'active' : ''; ?>" href="products.php">
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link premium-nav-link <?= ($currentPage == 'price-list.php') ? 'active' : ''; ?>" href="price-list.php">
                        Price List
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link premium-nav-link <?= ($currentPage == 'contact.php') ? 'active' : ''; ?>" href="contact.php">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
    <a
        class="nav-link premium-nav-link"
        href="track-order.php"
    >
        Track Order
    </a>
</li>
                <!-- Order Button -->
                <li class="nav-item order-nav-item">
                    <a class="premium-order-btn" href="order.php">
                        <span>Order Now</span>
                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </li>

                <!-- Admin Button -->
                <li class="nav-item admin-nav-item">
                    <a class="premium-admin-btn" href="admin/login.php">
                        <i class="bi bi-person-lock"></i>
                        <span>Admin</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>