<!-- index.php -->

<?php

require_once "config/database.php";
require_once "includes/functions.php";;

// // Get products
// $stmt = $pdo->query("
//     SELECT *
//     FROM products
//     WHERE status = 1
//     ORDER BY sort_order ASC
// ");

// $products = $stmt->fetchAll();


// Get prices
// $priceStmt = $pdo->query("
//     SELECT
//         p.id,
//         p.name,
//         MAX(CASE WHEN pp.weight = '250g' THEN pp.price END) AS price_250g,
//         MAX(CASE WHEN pp.weight = '500g' THEN pp.price END) AS price_500g,
//         MAX(CASE WHEN pp.weight = '1Kg' THEN pp.price END) AS price_1kg
//     FROM products p
//     LEFT JOIN product_prices pp
//         ON p.id = pp.product_id
//     WHERE p.status = 1
//     GROUP BY p.id, p.name
//     ORDER BY p.sort_order ASC
// ");

// $priceList = $priceStmt->fetchAll();

?>


<!DOCTYPE html><html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title><?= htmlspecialchars(getSetting('site_name')) ?> | Homemade Taste of Gujarat</title><!-- Bootstrap 5 --> <link
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
rel="stylesheet"
> <!-- Bootstrap Icons --> <link
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
rel="stylesheet"
> <!-- Google Fonts --> <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link
href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
> <!-- Advanced CSS --> <link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head><body>
  
<?php   include "includes/navbar.php"; ?>

<!-- =====================================================
HERO SECTION
===================================================== --><header id="home" class="hero"> <div class="hero-overlay"></div> <div class="container"><div class="row align-items-center min-vh-100">

<div class="col-lg-7">

 <div class="hero-content">

   <span class="hero-badge">
    <i class="bi bi-stars"></i>
    <?= htmlspecialchars(getSetting('hero_badge')) ?>
</span>

   <h1 class="hero-title">
    Natural
     <span>Pickle </span>
   </h1>

   <p>
    <?= htmlspecialchars(getSetting('hero_description')) ?>
</p>

   <div class="hero-buttons">

     <a href="#products" class="btn btn-gold btn-lg">
      Explore Pickles
       <i class="bi bi-arrow-right"> </i>
     </a>

     <a href="#contact" class="btn btn-outline-light btn-lg">
      Contact Us
     </a>

   </div>

   <div class="hero-features">

     <div>
       <i class="bi bi-check-circle-fill"> </i>
      Homemade
     </div>

     <div>
       <i class="bi bi-check-circle-fill"> </i>
      No Artificial Colours
     </div>

     <div>
       <i class="bi bi-check-circle-fill"> </i>
      No Vinegar
     </div>

   </div>

 </div>

</div>

</div>

</div> <div class="hero-scroll">
<span>Scroll to explore</span>
<i class="bi bi-arrow-down"></i>
</div></header>

<!-- =====================================================
WHY CHOOSE US
===================================================== -->
<section class="features-section section-padding"> <div class="container"><div class="text-center section-heading">

<span class="section-label">
    <?= htmlspecialchars(getSetting('features_label')) ?>
</span>
<h2>
<?= htmlspecialchars(getSetting('features_title')) ?>

</h2>

</div>

<div class="row g-4">

<div class="col-md-6 col-lg-3">

 <div class="feature-card">

   <div class="feature-icon">
     <i class="bi bi-house-heart"> </i>
   </div>

   <h3><?= htmlspecialchars(getSetting('feature_1_title')) ?></h3>
<p><?= htmlspecialchars(getSetting('feature_1_description')) ?></p>
 </div>

</div>

<div class="col-md-6 col-lg-3">

 <div class="feature-card">

   <div class="feature-icon">
     <i class="bi bi-droplet-half"> </i>
   </div>

   <h3><?= htmlspecialchars(getSetting('feature_2_title')) ?></h3>
<p><?= htmlspecialchars(getSetting('feature_2_description')) ?></p>

 </div>

</div>

<div class="col-md-6 col-lg-3">

 <div class="feature-card">

   <div class="feature-icon">
     <i class="bi bi-flower1"> </i>
   </div>

  <h3><?= htmlspecialchars(getSetting('feature_3_title')) ?></h3>
<p><?= htmlspecialchars(getSetting('feature_3_description')) ?></p>

 </div>

</div>

<div class="col-md-6 col-lg-3">

 <div class="feature-card">

   <div class="feature-icon">
     <i class="bi bi-heart"> </i>
   </div>

   <h3><?= htmlspecialchars(getSetting('feature_4_title')) ?></h3>
<p><?= htmlspecialchars(getSetting('feature_4_description')) ?></p>

 </div>

</div>

</div>

</div></section>

<?php   include "includes/footer.php"; ?>
</html>

<!-- about.php  -->

<?php
require_once "config/database.php";
require_once "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars(getSetting('site_name')) ?> | About Us
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body>

    <?php   include "includes/navbar.php"; ?>

    <main>

      <!-- =====================================================
ABOUT SECTION
===================================================== -->
<section id="about" class="about-section section-padding"> <div class="container"><div class="row align-items-center g-5">

<div class="col-lg-6">

 <div class="about-image-wrapper">

   <img
    src="assets/uploads/products/naturalpickel2.jpg"
    alt="Natural Pickle"
    class="about-image"
   >

   <div class="image-badge">
     <strong>100% </strong>
     <span>Homemade </span>
   </div>

 </div>

</div>

<div class="col-lg-6">

 <div class="section-heading">

   <span class="section-label">
  <?= htmlspecialchars(getSetting('about_label')) ?>
   </span>

   <h2>
    <?= htmlspecialchars(getSetting('about_title')) ?>
</h2>

 </div>

 <p class="about-text">

    <?= htmlspecialchars(getSetting('about_description')) ?>
</p> 

 <!-- <p class="about-text">
  અમારા અથાણાં શુદ્ધ મગફળીના તેલ અને પરંપરાગત વાનગીઓથી તૈયાર કરવામાં આવે છે, જેથી દરેક ભોજનમાં તમને ગુજરાતી સ્વાદની એક અનોખી અને સંપૂર્ણ અનુભૂતિ મળે.
 </p> -->

 <div class="about-points">

   <div class="about-point">
     <i class="bi bi-check-circle-fill"> </i>
     <span>Pure Groundnut Oil </span>
   </div>

   <div class="about-point">
     <i class="bi bi-check-circle-fill"> </i>
     <span>No Artificial Colours </span>
   </div>

   <div class="about-point">
     <i class="bi bi-check-circle-fill"> </i>
     <span>No Vinegar </span>
   </div>

   <div class="about-point">
     <i class="bi bi-check-circle-fill"> </i>
     <span>Traditional Gujarati Recipe </span>
   </div>

 </div>

 <a href="#products" class="btn btn-green mt-4">
  Discover Our Pickles
   <i class="bi bi-arrow-right"> </i>
 </a>

</div>

</div>

</div></section>
    </main>

    <?php include "includes/footer.php"; ?>

    <script src="assets/js/script.js"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

<!-- contact.php -->
<?php
require_once "config/database.php";
require_once "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars(getSetting('site_name')) ?> | About Us
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body>

    <?php   include "includes/navbar.php"; ?>

    <main>

<!-- =====================================================
ORDER / CONTACT SECTION
===================================================== -->
<section id="contact" class="contact-section section-padding"> <div class="container"><div class="contact-box">

<div class="row align-items-center g-4">

 <div class="col-lg-7">

   <span class="section-label">
    Get In Touch
   </span>

   <h2>
    Want To Taste
     <span>Natural Pickle? </span>
   </h2>

   <p>
    Contact us for orders, availability and courier delivery.
   </p>

 </div>


 <div class="col-lg-5">

   <div class="contact-details">

     <a
      href="tel:+919099959919"
      class="contact-item"
     >
       <i class="bi bi-telephone-fill"> </i>

       <div>
         <small>Call Us </small>
         <strong><?= htmlspecialchars(getSetting('whatsapp')) ?> </strong>
       </div>

     </a>


     <a
      href="[https://wa.me/919099959919](https://wa.me/919099959919)"
      class="contact-item"
      target=" _blank"
     >
       <i class="bi bi-whatsapp"> </i>

       <div>
         <small>WhatsApp </small>
         <strong>Chat With Us </strong>
       </div>

     </a>

<a
    href="mailto:<?= htmlspecialchars(getSetting('email')) ?>"
    class="contact-item"
>
    <i class="bi bi-envelope-fill"></i>

    <div>
        <small>Email</small>
        <strong>
            <?= htmlspecialchars(getSetting('email')) ?>
        </strong>
    </div>
</a>
   </div>

 </div>

</div>

</div>

</div></section>
</main>
<?php include "includes/footer.php"; ?>

    <script src="assets/js/script.js"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

<!-- order.php         -->
<?php
require_once "config/database.php";
require_once "includes/functions.php";

$stmt = $pdo->query("
    SELECT id, name
    FROM products
    WHERE status = 1
    ORDER BY sort_order ASC, id ASC
");

$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Place Order | <?= htmlspecialchars(getSetting('site_name', 'Natural Pickle')) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <h2 class="mb-4">Place Your Order</h2>

                    <form method="POST" action="order-submit.php">

                        <!-- Customer Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Your Name
                            </label>

                            <input
                                type="text"
                                name="customer_name"
                                class="form-control"
                                required
                            >

                        </div>


                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                name="phone"
                                class="form-control"
                                required
                            >

                        </div>


                        <!-- Address -->

                        <div class="mb-3">

                            <label class="form-label">
                                Delivery Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="3"
                                required
                            ></textarea>

                        </div>


                        <!-- Product -->

                        <div class="mb-3">

                            <label class="form-label">
                                Select Pickle
                            </label>

                            <select
                                name="product_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select a product
                                </option>

                                <?php foreach ($products as $product): ?>

                                    <option value="<?= $product['id'] ?>">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- Weight -->

                        <div class="mb-3">

                            <label class="form-label">
                                Weight
                            </label>

                            <select
                                name="weight"
                                class="form-select"
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

                        </div>


                        <!-- Quantity -->

                        <div class="mb-4">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input
                                type="number"
                                name="quantity"
                                class="form-control"
                                value="1"
                                min="1"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="btn btn-success w-100"
                        >
                            Place Order
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>

<!-- order-sumbit.php -->

<?php
require_once "config/database.php";
require_once "includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: order.php");
    exit;
}

$customer_name = trim($_POST["customer_name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$address = trim($_POST["address"] ?? "");
$product_id = (int) ($_POST["product_id"] ?? 0);
$weight = trim($_POST["weight"] ?? "");
$quantity = (int) ($_POST["quantity"] ?? 0);


// Basic validation
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


// Get product
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


// Get price
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


// Calculate total
$total = $price * $quantity;


// Save order
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


// Get new order ID
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

    <title>Order Successful | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow-sm">

                <div class="card-body p-5 text-center">

                    <h2 class="text-success mb-3">
                        Order Received!
                    </h2>

                    <p class="mb-4">
                        Thank you,
                        <strong>
                            <?= htmlspecialchars($customer_name) ?>
                        </strong>.
                    </p>

                    <p>
                        Your order number is:
                    </p>

                    <h3 class="mb-4">
                        #<?= htmlspecialchars($order_id) ?>
                    </h3>

                    <div class="text-start bg-light rounded p-3 mb-4">

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

                    <a
                        href="index.php"
                        class="btn btn-success"
                    >
                        Back to Home
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>


<!-- order-sumbit.php -->
<?php
require_once "config/database.php";
require_once "includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: order.php");
    exit;
}

$customer_name = trim($_POST["customer_name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$address = trim($_POST["address"] ?? "");
$product_id = (int) ($_POST["product_id"] ?? 0);
$weight = trim($_POST["weight"] ?? "");
$quantity = (int) ($_POST["quantity"] ?? 0);


// Basic validation
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


// Get product
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


// Get price
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


// Calculate total
$total = $price * $quantity;


// Save order
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


// Get new order ID
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

    <title>Order Successful | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow-sm">

                <div class="card-body p-5 text-center">

                    <h2 class="text-success mb-3">
                        Order Received!
                    </h2>

                    <p class="mb-4">
                        Thank you,
                        <strong>
                            <?= htmlspecialchars($customer_name) ?>
                        </strong>.
                    </p>

                    <p>
                        Your order number is:
                    </p>

                    <h3 class="mb-4">
                        #<?= htmlspecialchars($order_id) ?>
                    </h3>

                    <div class="text-start bg-light rounded p-3 mb-4">

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

                    <a
                        href="index.php"
                        class="btn btn-success"
                    >
                        Back to Home
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>

<!-- price-list.php -->


<?php
require_once "config/database.php";
require_once "includes/functions.php";

$priceStmt = $pdo->query("
    SELECT
        p.id,
        p.name,
        MAX(CASE WHEN pp.weight = '250g' THEN pp.price END) AS price_250g,
        MAX(CASE WHEN pp.weight = '500g' THEN pp.price END) AS price_500g,
        MAX(CASE WHEN pp.weight = '1Kg' THEN pp.price END) AS price_1kg
    FROM products p
    LEFT JOIN product_prices pp
        ON p.id = pp.product_id
    WHERE p.status = 1
    GROUP BY p.id, p.name
    ORDER BY p.sort_order ASC
");

$priceList = $priceStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars(getSetting('site_name')) ?> | About Us
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body>

    <?php   include "includes/navbar.php"; ?>

    <main>

<!-- =====================================================
PRICE LIST
===================================================== -->
<section id="price" class="price-section section-padding"> 
  <div class="container">
    <div class="text-center section-heading">

<span class="section-label">
Simple & Transparent
</span>

<h2>
Pickle <span>Price List</span>
</h2>

<p>
Available in 250 gm, 500 gm and 1 Kg packaging.
</p>

</div>

<div class="price-box">

<div class="price-search">

 <i class="bi bi-search"> </i>

 <input
  type="text"
  id="search"
  placeholder="Search pickle..."
 >

</div>

<div class="table-responsive">

 <table id="priceTable">

   <thead>

     <tr>
       <th>Pickle </th>
       <th>250 gm </th>
       <th>500 gm </th>
       <th>1 Kg </th>
     </tr>

   </thead>


     <tbody>

<?php foreach ($priceList as $price): ?>

    <tr>

        <td>
            <?= htmlspecialchars($price['name']) ?>
        </td>

        <td>
            ₹<?= number_format($price['price_250g'], 0) ?>
        </td>

        <td>
            ₹<?= number_format($price['price_500g'], 0) ?>
        </td>

        <td>
            ₹<?= number_format($price['price_1kg'], 0) ?>
        </td>

    </tr>

<?php endforeach; ?>

</tbody>


 </table>

</div>

<div class="price-note">
<i class="bi bi-info-circle"></i>
Courier delivery available. Courier charges extra.
</div>

</div>

</div></section>

</main>

    <?php include "includes/footer.php"; ?>

    <script src="assets/js/script.js"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

<!-- products.php -->
 <?php
require_once "config/database.php";
require_once "includes/functions.php";

$stmt = $pdo->query("
    SELECT *
    FROM products
    WHERE status = 1
    ORDER BY sort_order ASC
");

$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars(getSetting('site_name')) ?> | About Us
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body>

    <?php   include "includes/navbar.php"; ?>

    <main>

<!-- =====================================================
PRODUCTS SECTION
===================================================== -->
<section id="products" class="products-section section-padding"> 
  <div class="container">
    <div class="text-center section-heading">

<span class="section-label">
Our Collection
</span>

<h2>
Taste of <span>Gujarat</span>
</h2>

<p>
Discover our delicious range of homemade pickles.
</p>

</div>

<!-- <div class="row g-4 product-grid">

 Product 1 
<div class="col-sm-6 col-lg-4">

 <div class="product-card">

   <div class="product-icon">
    
   </div>

   <h3>Keri Gunda </h3>

   <p>
    Traditional mango and gunda pickle with authentic Gujarati
    flavours.
   </p>

   <span class="product-tag">
    Bestseller
   </span>

 </div>

</div>
 -->

<!-- <div class="row g-4 product-grid">


   Product 1 
  <div class="col-sm-6 col-lg-4">

    <div class="product-card">

      <div class="product-icon">
        🥭
      </div>

      <h3>Keri Gunda</h3>

      <p>
        Traditional mango and gunda pickle with authentic Gujarati
        flavours.
      </p>

      <span class="product-tag">
        Bestseller
      </span>

    </div>

  </div> -->
<!--  -->
<div class="row g-4 product-grid">

<?php 
$icons123 = ['🥭', '🥭', '🌶️', '🧄', '🍋', '🌿', '🥒', '🥭', '🍋'];

foreach ($products as $index => $product): 
?>
    <div class="col-sm-6 col-lg-4">   
        <div class="product-card">

            <div class="product-icon">
                <?= $icons123[$index] ?? '📦' ?>
            </div>

            <h3><?= $product['name'] ?></h3>
            
            <p><?= $product['description'] ?></p>

            <?php if (!empty($product['tag'])): ?>
                <span class="product-tag"><?= $product['tag'] ?></span>
            <?php endif; ?>

        </div>
    </div>
<?php endforeach; ?>

</div>
</section>

</main>

<?php include "includes/footer.php"; ?>

    <script src="assets/js/script.js"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
<!-- includes/footer.php -->

<!-- =====================================================
FOOTER
===================================================== --><footer class="footer"> <div class="container"><div class="row g-4">

<div class="col-lg-6">

 <img
  src="assets/uploads/products/Naturalpickel.png"
  alt="Natural Pickle"
  class="footer-logo"
 >

 <p>
  Homemade Gujarati pickles made with traditional taste,
  pure groundnut oil and quality ingredients.
 </p>

</div>

<div class="col-sm-6 col-lg-3">

 <h4>Quick Links </h4>

 <ul>

   <li>
     <a href="#home">Home </a>
   </li>

   <li>
     <a href="#about">About </a>
   </li>

   <li>
     <a href="#products">Products </a>
   </li>

   <li>
     <a href="#price">Price List </a>
   </li>

 </ul>

</div>

<div class="col-sm-6 col-lg-3">

 <h4>Contact </h4>

 <p>
   <i class="bi bi-person"> </i>
  Amit Khira
 </p>

 <p>
   <i class="bi bi-telephone"> </i>
<a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', getSetting('whatsapp')) ?>">    <?= htmlspecialchars(getSetting('whatsapp')) ?>
   </a>
 </p>

</div>

</div>

<hr>

<div class="footer-bottom">

<span>
© <span id="year"></span> Natural Pickle. All Rights Reserved.
</span>

<span>
Homemade Taste of Gujarat
</span>

</div>

</div></footer><!-- =====================================================
FLOATING WHATSAPP
===================================================== --><a
href="https://wa.me/919099959919"
class="whatsapp-float"
target="_blank"
aria-label="Contact on WhatsApp"
></a>
<a
    href="mailto:<?= htmlspecialchars(getSetting('email')) ?>"
    class="contact-item"
>
    <i class="bi bi-envelope-fill"></i>

    <div>
        <small>Email</small>
        <strong>
            <?= htmlspecialchars(getSetting('email')) ?>
        </strong>
    </div>
</a>
<i class="bi bi-whatsapp"></i>
</a>

<!-- Bootstrap JS --><script
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js">
</script><!-- Custom JS --><script src="assets/js/script.js"></script></body>


<!-- includes/header.php -->

<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= e($pageTitle ?? SITE_NAME) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body></body>

this is code of my website give me premium design for my website give me a stylesheet code premium aniumation ,design etc


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/regular.min.css" integrity="sha512-qiqIzB1QO9jGOxfzFFbQipiNRu0pLW2NOASTcXCf72M6MFHk4JAsDj/BnTJ0YKQ6xb0N500LJPwPJNf+AVU0HQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
 
<?php

$pageTitle = "Natural Pickle | Homemade Taste of Gujarat";

require_once 'includes/header.php';
require_once 'includes/navbar.php';

?>
<!-- <nav class="navbar navbar-expand-lg fixed-top" id="navbar">

    <div class="container">

        <a class="navbar-brand" href="index.php">
            <img
                src="assets/uploads/products/Naturalpickel.png"
                alt=" // htmlspecialchars(getSetting('site_name')) ?>"
                height="55"
            >
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu"
        >
            <i class="bi bi-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="price-list.php">Price List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a class="btn btn-primary" href="order.php">
                        Order Now
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </li>

                <li class="nav-item ms-lg-2">
                    <a class="nav-admin-login" href="admin/login.php">
                        <i class="bi bi-person-lock"></i>
                        Admin Login
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav> -->

<nav class="navbar navbar-expand-lg fixed-top premium-navbar" id="navbar">

    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand premium-brand" href="index.php">

            <img
                src="assets/uploads/products/Naturalpickel.png"
                alt="<?= htmlspecialchars(getSetting('site_name')) ?>"
            >

        </a>


        <!-- Mobile Toggle -->
        <button
            class="navbar-toggler premium-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu"
            aria-controls="navMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <!-- <i class="bi bi-list"></i> -->
             <i class="fa-solid fa-bars" style="color:white"></i>
        </button>


        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- Home -->
                <li class="nav-item">
                    <a
                        class="nav-link premium-nav-link"
                        href="index.php"
                    >
                        Home
                    </a>
                </li>


                <!-- About -->
                <li class="nav-item">
                    <a
                        class="nav-link premium-nav-link"
                        href="about.php"
                    >
                        About
                    </a>
                </li>


                <!-- Products -->
                <li class="nav-item">
                    <a
                        class="nav-link premium-nav-link"
                        href="products.php"
                    >
                        Products
                    </a>
                </li>


                <!-- Price List -->
                <li class="nav-item">
                    <a
                        class="nav-link premium-nav-link"
                        href="price-list.php"
                    >
                        Price List
                    </a>
                </li>


                <!-- Contact -->
                <li class="nav-item">
                    <a
                        class="nav-link premium-nav-link"
                        href="contact.php"
                    >
                        Contact
                    </a>
                </li>


                <!-- Order -->
                <li class="nav-item order-nav-item">

                    <a
                        class="premium-order-btn"
                        href="order.php"
                    >
                        <span style="color:white;">Order Now</span>
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                </li>


                <!-- Admin Login -->
                <li class="nav-item admin-nav-item">

                    <a
                        class="premium-admin-btn"
                        href="admin/login.php"
                    >
                        <i class="bi bi-person-lock"></i>
                        <span>Admin</span>
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
<!-- HERO SECTION -->

<!-- ABOUT SECTION -->

<!-- PRODUCTS SECTION -->

<!-- PRICE SECTION -->

<!-- CONTACT SECTION -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

/* ==========================================================================
   NATURAL PICKLE - PREMIUM STYLESHEET
   Theme: Warm Culinary Amber & Deep Forest Accent
   ========================================================================== */

/* 1. ROOT VARIABLES & DESIGN SYSTEM */
:root {
  --primary: #c0392b;
  --primary-hover: #962d22;
  --secondary: #d35400;
  --accent-gold: #f39c12;
  --accent-gold-light: #f1c40f;
  --dark-green: #1e392a;
  --bg-cream: #faf6f0;
  --bg-surface: #ffffff;
  --text-dark: #2c3e50;
  --text-muted: #6c757d;
  --text-light: #f8f9fa;
  
  --font-heading: 'DM Serif Display', Georgia, serif;
  --font-body: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;

  --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
  --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.08);
  --shadow-lg: 0 16px 32px rgba(0, 0, 0, 0.12);
  --shadow-gold: 0 10px 25px rgba(243, 156, 18, 0.3);

  --transition-fast: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  --radius-sm: 8px;
  --radius-md: 16px;
  --radius-lg: 24px;
}

/* 2. BASE STYLES & RESET */
html {
  scroll-behavior: smooth;
}

body {
  font-family: var(--font-body);
  color: var(--text-dark);
  background-color: var(--bg-cream);
  line-height: 1.6;
  overflow-x: hidden;
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--font-heading);
  letter-spacing: 0.3px;
  color: var(--dark-green);
}

a {
  text-decoration: none;
  transition: var(--transition-fast);
}

.section-padding {
  padding: 90px 0;
}

/* Section Headings */
.section-heading {
  margin-bottom: 50px;
}

.section-label {
  display: inline-block;
  padding: 6px 16px;
  background: rgba(243, 156, 18, 0.15);
  color: var(--secondary);
  font-weight: 700;
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  border-radius: 50px;
  margin-bottom: 12px;
}

.section-heading h2 {
  font-size: 2.75rem;
  font-weight: 700;
}

.section-heading h2 span {
  color: var(--primary);
  position: relative;
}

/* 3. HERO SECTION */
.hero {
  position: relative;
  background: linear-gradient(135deg, rgba(30, 57, 42, 0.92), rgba(12, 24, 17, 0.95)),
              url('../uploads/products/naturalpickel2.jpg') center/cover no-repeat;
  color: var(--text-light);
  min-height: 100vh;
  display: flex;
  align-items: center;
}

.hero-content {
  padding-top: 40px;
  animation: fadeInUp 1s ease-out;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.12);
  backdrop-filter: blur(8px);
  padding: 8px 18px;
  border-radius: 50px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  font-size: 0.9rem;
  color: var(--accent-gold-light);
  margin-bottom: 24px;
}

.hero-title {
  font-size: 4rem;
  line-height: 1.1;
  margin-bottom: 20px;
  color: #ffffff;
}

.hero-title span {
  color: var(--accent-gold);
  font-style: italic;
}

.hero-content p {
  font-size: 1.2rem;
  opacity: 0.9;
  max-width: 580px;
  margin-bottom: 32px;
}

.hero-buttons {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.btn-gold {
  background: linear-gradient(135deg, var(--accent-gold), var(--secondary));
  color: #fff !important;
  font-weight: 600;
  border: none;
  padding: 14px 32px;
  border-radius: 50px;
  box-shadow: var(--shadow-gold);
  transition: var(--transition-smooth);
}

.btn-gold:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 30px rgba(243, 156, 18, 0.4);
}

.btn-outline-light {
  border-radius: 50px;
  padding: 14px 32px;
  border-width: 2px;
  font-weight: 600;
  transition: var(--transition-smooth);
}

.btn-outline-light:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateY(-3px);
}

.hero-features {
  display: flex;
  gap: 24px;
  flex-wrap: wrap;
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  padding-top: 24px;
}

.hero-features div {
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  gap: 8px;
  color: rgba(255, 255, 255, 0.85);
}

.hero-features i {
  color: var(--accent-gold-light);
}

.hero-scroll {
  position: absolute;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.8rem;
  animation: bounce 2s infinite;
}

/* 4. WHY CHOOSE US / FEATURES */
.feature-card {
  background: var(--bg-surface);
  padding: 35px 25px;
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border: 1px solid rgba(0, 0, 0, 0.03);
  text-align: center;
  height: 100%;
  transition: var(--transition-smooth);
}

.feature-card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-lg);
  border-color: rgba(243, 156, 18, 0.3);
}

.feature-icon {
  width: 70px;
  height: 70px;
  background: linear-gradient(135deg, rgba(243, 156, 18, 0.15), rgba(211, 84, 0, 0.15));
  color: var(--secondary);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  margin: 0 auto 20px;
  transition: var(--transition-smooth);
}

.feature-card:hover .feature-icon {
  background: linear-gradient(135deg, var(--accent-gold), var(--secondary));
  color: #fff;
  transform: rotateY(180deg);
}

.feature-card h3 {
  font-size: 1.25rem;
  margin-bottom: 12px;
}

/* 5. ABOUT SECTION */
.about-image-wrapper {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.about-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: var(--transition-smooth);
}

.about-image-wrapper:hover .about-image {
  transform: scale(1.04);
}

.image-badge {
  position: absolute;
  bottom: 25px;
  right: 25px;
  background: rgba(30, 57, 42, 0.9);
  backdrop-filter: blur(10px);
  color: var(--text-light);
  padding: 15px 25px;
  border-radius: var(--radius-md);
  border: 1px solid rgba(255, 255, 255, 0.2);
  text-align: center;
  box-shadow: var(--shadow-md);
}

.image-badge strong {
  display: block;
  font-size: 1.8rem;
  color: var(--accent-gold);
  line-height: 1;
}

.about-points {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
  margin: 24px 0;
}

.about-point {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 500;
}

.about-point i {
  color: var(--primary);
  font-size: 1.1rem;
}

.btn-green {
  background-color: var(--dark-green);
  color: #fff;
  padding: 12px 28px;
  border-radius: 50px;
  font-weight: 600;
  transition: var(--transition-smooth);
}

.btn-green:hover {
  background-color: #12241a;
  color: #fff;
  transform: translateY(-2px);
}

/* 6. PRODUCTS CARD GRID */
.product-card {
  background: var(--bg-surface);
  border-radius: var(--radius-md);
  padding: 30px;
  position: relative;
  border: 1px solid rgba(0,0,0,0.04);
  box-shadow: var(--shadow-sm);
  transition: var(--transition-smooth);
  height: 100%;
  display: flex;
  flex-direction: column;
}

.product-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-md);
}

.product-icon {
  font-size: 3rem;
  margin-bottom: 15px;
  display: inline-block;
  transition: transform 0.3s ease;
}

.product-card:hover .product-icon {
  transform: scale(1.2) rotate(5deg);
}

.product-card h3 {
  font-size: 1.4rem;
  margin-bottom: 10px;
}

.product-card p {
  color: var(--text-muted);
  font-size: 0.95rem;
  flex-grow: 1;
}

.product-tag {
  position: absolute;
  top: 20px;
  right: 20px;
  background: var(--primary);
  color: #fff;
  font-size: 0.75rem;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: 50px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* 7. PRICE TABLE SECTION */
.price-box {
  background: var(--bg-surface);
  border-radius: var(--radius-lg);
  padding: 40px;
  box-shadow: var(--shadow-md);
}

.price-search {
  position: relative;
  margin-bottom: 25px;
}

.price-search i {
  position: absolute;
  left: 18px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-muted);
}

.price-search input {
  width: 100%;
  padding: 12px 20px 12px 48px;
  border-radius: 50px;
  border: 1px solid #e0e0e0;
  outline: none;
  transition: var(--transition-fast);
}

.price-search input:focus {
  border-color: var(--secondary);
  box-shadow: 0 0 0 3px rgba(211, 84, 0, 0.15);
}

#priceTable {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

#priceTable th {
  background-color: var(--dark-green);
  color: #fff;
  padding: 16px;
  font-weight: 600;
}

#priceTable th:first-child { border-top-left-radius: var(--radius-sm); }
#priceTable th:last-child { border-top-right-radius: var(--radius-sm); }

#priceTable td {
  padding: 16px;
  border-bottom: 1px solid #eee;
  color: var(--text-dark);
}

#priceTable tbody tr {
  transition: var(--transition-fast);
}

#priceTable tbody tr:hover {
  background-color: rgba(243, 156, 18, 0.05);
}

.price-note {
  margin-top: 20px;
  font-size: 0.88rem;
  color: var(--text-muted);
  display: flex;
  align-items: center;
  gap: 6px;
}

/* 8. CONTACT & ORDER CARDS */
.contact-box {
  background: linear-gradient(135deg, var(--dark-green), #14281d);
  color: #fff;
  border-radius: var(--radius-lg);
  padding: 50px;
  box-shadow: var(--shadow-lg);
}

.contact-box h2 {
  color: #fff;
  font-size: 2.5rem;
}

.contact-box h2 span {
  color: var(--accent-gold);
}

.contact-details {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 16px;
  background: rgba(255, 255, 255, 0.08);
  padding: 16px 20px;
  border-radius: var(--radius-md);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: var(--transition-smooth);
}

.contact-item:hover {
  background: rgba(255, 255, 255, 0.18);
  color: var(--accent-gold-light);
  transform: translateX(5px);
}

.contact-item i {
  font-size: 1.5rem;
  color: var(--accent-gold);
}

/* Order Form Glass Style */
.card {
  border: none;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-lg);
}

.form-control, .form-select {
  padding: 12px 16px;
  border-radius: var(--radius-sm);
  border: 1px solid #e2e8f0;
}

.form-control:focus, .form-select:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.15);
}

/* 9. FOOTER & FLOATING WHATSAPP */
.footer {
  background-color: #121e17;
  color: rgba(255, 255, 255, 0.75);
  padding: 70px 0 30px;
}

.footer-logo {
  max-width: 160px;
  margin-bottom: 20px;
}

.footer h4 {
  color: #fff;
  font-size: 1.2rem;
  margin-bottom: 20px;
  position: relative;
}

.footer ul {
  list-style: none;
  padding: 0;
}

.footer ul li {
  margin-bottom: 10px;
}

.footer ul li a {
  color: rgba(255, 255, 255, 0.75);
}

.footer ul li a:hover {
  color: var(--accent-gold);
  padding-left: 5px;
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 25px;
  font-size: 0.88rem;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.whatsapp-float {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 60px;
  height: 60px;
  background-color: #25d366;
  color: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
  box-shadow: 0 10px 20px rgba(37, 211, 102, 0.4);
  z-index: 1000;
  transition: var(--transition-smooth);
}

.whatsapp-float:hover {
  transform: scale(1.1) rotate(10deg);
  color: #fff;
}

/* 10. ANIMATIONS */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translate(-50%, 0); }
  40% { transform: translate(-50%, -10px); }
  60% { transform: translate(-50%, -5px); }
}

/* 11. RESPONSIVE BREAKPOINTS */
@media (max-width: 991px) {
  .hero-title {
    font-size: 3rem;
  }
  .contact-box {
    padding: 30px;
  }
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 2.4rem;
  }
  .about-points {
    grid-template-columns: 1fr;
  }
  .footer-bottom {
    flex-direction: column;
    gap: 10px;
    text-align: center;
  }
}

/* =========================================================
   PREMIUM NAVBAR
========================================================= */

.premium-navbar {
    background: rgba(3, 39, 25, 0.94);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    border-bottom: 1px solid rgba(242, 212, 119, 0.12);

    padding: 12px 0;

    transition:
        background 0.35s ease,
        padding 0.35s ease,
        box-shadow 0.35s ease;
}


/* Navbar after scrolling */

.premium-navbar.scrolled {
    background: rgba(3, 39, 25, 0.98);

    padding: 8px 0;

    box-shadow:
        0 10px 35px rgba(0, 0, 0, 0.18);
}


/* =========================================================
   LOGO
========================================================= */

.premium-brand {
    display: flex;
    align-items: center;

    text-decoration: none;
}

.premium-brand img {
    width: 105px;
    height: auto;

    object-fit: contain;

    transition:
        transform 0.3s ease,
        filter 0.3s ease;
}

.premium-brand:hover img {
    transform: scale(1.04);
}


/* =========================================================
   NAV LINKS
========================================================= */

.premium-nav-link {
    position: relative;

    color: rgba(255, 255, 255, 0.78) !important;

    font-size: 15px;
    font-weight: 600;

    padding: 10px 15px !important;

    transition:
        color 0.3s ease,
        transform 0.3s ease;
}


/* Underline animation */

.premium-nav-link::after {
    content: "";

    position: absolute;

    left: 15px;
    right: 15px;
    bottom: 3px;

    height: 2px;

    background: var(--gold-light);

    transform: scaleX(0);
    transform-origin: center;

    transition: transform 0.3s ease;

    border-radius: 10px;
}


.premium-nav-link:hover {
    color: var(--gold-light) !important;

    transform: translateY(-1px);
}


.premium-nav-link:hover::after {
    transform: scaleX(1);
}


/* Active link */

.premium-nav-link.active {
    color: var(--gold-light) !important;
}

.premium-nav-link.active::after {
    transform: scaleX(1);
}


/* =========================================================
   ORDER BUTTON
========================================================= */

.order-nav-item {
    margin-left: 12px;
}


.premium-order-btn {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 11px 20px;

    min-width: 125px;

    border-radius: 50px;

    background: linear-gradient(
        135deg,
        var(--gold-light),
        var(--gold)
    );

    color: var(--green-deep) !important;

    font-size: 14px;
    font-weight: 800;

    text-decoration: none;

    box-shadow:
        0 8px 22px rgba(212, 167, 44, 0.22);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.premium-order-btn i {
    font-size: 15px;

    transition:
        transform 0.3s ease;
}


.premium-order-btn:hover {
    color: var(--green-deep) !important;

    transform: translateY(-2px);

    box-shadow:
        0 12px 30px rgba(212, 167, 44, 0.32);
}


.premium-order-btn:hover i {
    transform: translate(2px, -2px);
}


/* =========================================================
   ADMIN BUTTON
========================================================= */

.admin-nav-item {
    margin-left: 9px;
}


.premium-admin-btn {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 7px;

    padding: 10px 15px;

    border-radius: 50px;

    color: var(--gold-light) !important;

    border: 1px solid rgba(242, 212, 119, 0.38);

    background: rgba(255, 255, 255, 0.035);

    font-size: 13px;
    font-weight: 700;

    text-decoration: none;

    transition:
        all 0.3s ease;
}


.premium-admin-btn i {
    font-size: 15px;
}


.premium-admin-btn:hover {
    color: var(--green-deep) !important;

    background: var(--gold-light);

    border-color: var(--gold-light);

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(212, 167, 44, 0.2);
}


/* =========================================================
   MOBILE NAVBAR
========================================================= */

.premium-toggler {
    border: 1px solid rgba(242, 212, 119, 0.35) !important;

    border-radius: 10px;

    padding: 7px 10px;

    color: var(--gold-light) !important;

    background: rgba(255, 255, 255, 0.04);

    box-shadow: none !important;
}


.premium-toggler i {
    font-size: 25px;
}


.premium-toggler:focus {
    box-shadow: 0 0 0 3px rgba(242, 212, 119, 0.12) !important;
}


/* =========================================================
   MOBILE LAYOUT
========================================================= */

@media (max-width: 991.98px) {

    .premium-navbar {
        padding: 10px 0;
    }


    .premium-brand img {
        width: 95px;
    }


    .navbar-collapse {
        margin-top: 15px;

        padding: 15px;

        border-radius: 18px;

        background: rgba(3, 39, 25, 0.98);

        border: 1px solid rgba(242, 212, 119, 0.12);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, 0.2);
    }


    .premium-nav-link {
        padding: 12px 10px !important;
    }


    .premium-nav-link::after {
        display: none;
    }


    .order-nav-item {
        margin: 10px 0 0;
    }


    .admin-nav-item {
        margin: 8px 0 0;
    }


    .premium-order-btn,
    .premium-admin-btn {
        width: 100%;
    }

}