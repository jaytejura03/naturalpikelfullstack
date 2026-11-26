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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php   include "includes/footer.php"; ?>
</html>