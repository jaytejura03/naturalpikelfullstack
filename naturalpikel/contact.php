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