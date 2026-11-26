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
