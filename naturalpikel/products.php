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