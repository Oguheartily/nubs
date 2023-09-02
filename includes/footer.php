  <footer id="footer">
    <div class="container-fluid pt-3 bg-dark text-white">
      <div class="mb-4">
        <h6>Links</h6>
        <span class="p-2"><a href="contact.php">Contact Us</a></span>
        <span class="p-2"><a href="about.php">About Us</a></span>
        <span class="p-2"><a href="help.php">Help & FAQ</a></span>
        <span class="p-2"><a href="privacy-policy.php">Privacy</a></span>
        <span class="p-2"><a href="cookies-policy.php">Cookies</a></span>
        <span class="p-2"><a href="terms-of-service.php">Terms of Service</a></span>
      </div>
      <hr>
      <div class="pb-4 text-muted text-center">
          <p class="mb-1">All rights reserved. Nubs-Bille <?= date("Y"); ?></p>
      </div>
      <div class="col-12 py-4 mb-2 d-block d-lg-none"></div>
    </div>
  </footer>

  <?php include('bottomnavbar.php'); ?>
  <!-- online bootstrap js file -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
  <!-- jquery -->
  <script src="assets/js/jquery.js"></script>
  <!-- offline bootstrap js file -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- offline font awesome js file -->
  <script src="../fontawesome5/js/all.min.js"></script>


  <!-- Online Alertify JavaScript -->
  <!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->
  <!--  alertify offline js file -->
  <script src="assets/alertifyjs/alertify.min.js"></script>
  <!-- owl carousel offline js file -->
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- Local js file -->
  <script type="text/javascript" src="assets/js/customs.js"></script>
  <!-- alertify implementation -->
  <script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    if (isset($_SESSION['message'])) { ?>

      alertify.success('<?= $_SESSION['message']; ?>');
    <?php unset($_SESSION['message']);
    };
    ?>
  </script>

  </body>

  </html>