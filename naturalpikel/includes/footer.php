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
    href="https://wa.me/<?= preg_replace('/[^0-9]/', '', getSetting('whatsapp')) ?>"
    class="whatsapp-float"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Contact on WhatsApp"
>
    <i class="bi bi-whatsapp"></i>
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
<i class="bi bi-whatsapp"></i>
</a>

<!-- Bootstrap JS --><script
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js">
</script><!-- Custom JS --><script src="assets/js/script.js"></script></body>