
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "config/database.php";
require_once "includes/functions.php"; 



$stmt = $pdo->query("
    SELECT id, name
    FROM products
    WHERE status = 1
    ORDER BY sort_order ASC, id ASC
");

$products = $stmt->fetchAll();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Place Order |
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

    <!-- Your main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php include "includes/navbar.php"; ?>


<!-- =====================================================
ORDER PAGE
===================================================== -->

<main class="order-page">

    <!-- Hero -->
    <section class="order-hero">

        <div class="container">

            <div class="order-hero-content text-center">

                <span class="order-label">
                    <i class="bi bi-bag-heart-fill"></i>
                    Order Fresh Pickles
                </span>

                <h1>
                    Place Your <span>Order</span>
                </h1>

                <p>
                    Bring the authentic taste of Gujarat to your home.
                    Fill in your details and choose your favourite pickle.
                </p>

            </div>

        </div>

    </section>


    <!-- Order Form -->
    <section class="order-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-8 col-lg-9">

                    <div class="order-card">

                        <!-- Card Header -->

                        <div class="order-card-header">

                            <div class="order-icon">
                                <i class="bi bi-bag-heart-fill"></i>
                            </div>

                            <div>
                                <span>Natural Pickle</span>
                                <h2>Order Details</h2>
                            </div>

                        </div>


                        <!-- Form -->

                        <form
                            method="POST"
                            action="order-submit.php"
                            class="premium-order-form"
                        >


                            <!-- Customer Information -->

                            <div class="form-section-title">

                                <span class="form-number">
                                    01
                                </span>

                                <div>
                                    <h3>Your Information</h3>
                                    <p>
                                        Tell us where we should deliver your order.
                                    </p>
                                </div>

                            </div>


                            <div class="row g-4">

                                <!-- Name -->

                                <div class="col-md-6">

                                    <label class="premium-label">
                                        Your Name
                                    </label>

                                    <div class="input-wrapper">

                                        <i class="bi bi-person-fill"></i>

                                        <input
                                            type="text"
                                            name="customer_name"
                                            class="premium-input"
                                            placeholder="Enter your name"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- Phone -->

                                <div class="col-md-6">

                                    <label class="premium-label">
                                        Phone Number
                                    </label>

                                    <div class="input-wrapper">

                                        <i class="bi bi-telephone-fill"></i>

                                        <input
                                            type="tel"
                                            name="phone"
                                            class="premium-input"
                                            placeholder="Enter phone number"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- Address -->

                                <div class="col-12">

                                    <label class="premium-label">
                                        Delivery Address
                                    </label>

                                    <div class="input-wrapper textarea-wrapper">

                                        <i class="bi bi-geo-alt-fill"></i>

                                        <textarea
                                            name="address"
                                            class="premium-input"
                                            rows="4"
                                            placeholder="Enter your complete delivery address"
                                            required
                                        ></textarea>

                                    </div>

                                </div>

                            </div>


                            <!-- Product Selection -->

                            <div class="form-divider"></div>

                            <div class="form-section-title">

                                <span class="form-number">
                                    02
                                </span>

                                <div>
                                    <h3>Select Your Pickle</h3>
                                    <p>
                                        Choose your favourite homemade pickle.
                                    </p>
                                </div>

                            </div>


                            <div class="row g-4">

                                <!-- Product -->

                                <div class="col-md-6">

                                    <label class="premium-label">
                                        Select Pickle
                                    </label>

                                    <div class="select-wrapper">

                                        <i class="bi bi-jar-fill"></i>

                                        <select
                                            name="product_id"
                                            class="premium-select"
                                            required
                                        >

                                            <option value="">
                                                Select a product
                                            </option>

                                            <?php foreach ($products as $product): ?>

                                                <option
                                                    value="<?= $product['id'] ?>"
                                                >
                                                    <?= htmlspecialchars($product['name']) ?>
                                                </option>

                                            <?php endforeach; ?>

                                        </select>

                                        <i class="bi bi-chevron-down select-arrow"></i>

                                    </div>

                                </div>


                                <!-- Weight -->

                                <div class="col-md-6">

                                    <label class="premium-label">
                                        Weight
                                    </label>

                                    <div class="select-wrapper">

                                        <i class="bi bi-box-seam-fill"></i>

                                        <select
                                            name="weight"
                                            class="premium-select"
                                            required
                                        >

                                            <option value="">
                                                Select weight
                                            </option>

                                            <option value="250g">
                                                250 gm
                                            </option>

                                            <option value="500g">
                                                500 gm
                                            </option>

                                            <option value="1Kg">
                                                1 Kg
                                            </option>

                                        </select>

                                        <i class="bi bi-chevron-down select-arrow"></i>

                                    </div>

                                </div>


                                <!-- Quantity -->

                                <div class="col-md-6">

                                    <label class="premium-label">
                                        Quantity
                                    </label>

                                    <div class="input-wrapper">

                                        <i class="bi bi-plus-slash-minus"></i>

                                        <input
                                            type="number"
                                            name="quantity"
                                            class="premium-input"
                                            value="1"
                                            min="1"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>


                            <!-- Information -->

                            <div class="order-note">

                                <i class="bi bi-info-circle-fill"></i>

                                <div>

                                    <strong>
                                        Delivery Information
                                    </strong>

                                    <p>
                                        Courier delivery is available.
                                        Courier charges are extra.
                                    </p>

                                </div>

                            </div>


                            <!-- Submit -->

                            <button
                                type="submit"
                                class="premium-submit-btn"
                            >

                                <span>
                                    Place My Order
                                </span>

                                <i class="bi bi-arrow-right"></i>

                            </button>


                            <p class="secure-note">

                                <i class="bi bi-shield-check"></i>

                                Your information is used only to process your order.

                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<?php include "includes/footer.php"; ?>


</body>
</html>