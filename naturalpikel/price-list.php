
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