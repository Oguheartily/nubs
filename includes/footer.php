  <?php
  $OfficeInfo = getOrganizationInfo();
  if (mysqli_fetch_array($OfficeInfo) > 0) {
    foreach ($OfficeInfo as $officedata) {
  ?>
      <footer>
        <div class="container-fluid footer pt-3 bg-dark text-white">
          <div class="row">
            <div class="col-12">
              <div class="mb-2"><span class="fas fa-phone-alt text-info"></span>&nbsp;&nbsp;<?= $officedata['office_phone']; ?></div>
              <div class="mb-2"><span class="fas fa-map-marker-alt text-info"></span>&nbsp;&nbsp;&nbsp;<?= $officedata['office_address']; ?></div>
              <div class="mb-2"><span class="fas fa-envelope text-info"></span>&nbsp;&nbsp;<a href="mailto:<?= $officedata['office_email']; ?>" id="mbemail1"><?= $officedata['office_email']; ?></a></div><br>
            </div>
            <!-- 12 col span above, 6, 6 cols below -->
            <div class="col-12">
              <hr class="light col-12">
            </div>
            <h5 class="text-center grayColor">Let's Connect</h5>
            <div class="col-12">
              <hr class="light">
            </div>
            <div class="col-6 text-center">
              <p><a href="<?= $officedata['office_facebook']; ?>" target="_blank"><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;&nbsp;facebook</a></p>
            </div>
            <div class="col-6 text-center">
              <p><a href="<?= $officedata['office_instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;instagram</a></p>
            </div>
            <div class="col-6 text-center">
              <p><a href="<?= $officedata['office_x']; ?>" data-show-count="false" target="_blank" class="pe-3"><i class="fab fa-twitter"></i>&nbsp;&nbsp;&nbsp;twitter</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></a>
              </p>
            </div>
            <div class="col-6 text-center">
              <p><a href="<?= $officedata['office_youtube']; ?>" target="_blank" class="pe-3"><i class="fab fa-youtube me-2"></i>&nbsp;youtube</a></p>
            </div>
            <div class="col-12">
              <hr class="light-100">
            </div>
            <address class="text-center" id="footnote">
              The National Union of Bille Students (NUBS), is the sole organization of all students from the
              Community of Bille Kingdom, in South-South Nigeria.
            </address>
            <hr class="light-100">
            <div class="mb-3 text-center">
              <h5 class="text-center grayColor">Links</h5>
              <span class="p-2"><a href="contact.php">Contact Us</a></span>
              <span class="p-2"><a href="about.php">About Us</a></span>
              <span class="p-2"><a href="help.php">Help & FAQ</a></span>
              <span class="p-2"><a href="privacy-policy.php">Privacy</a></span>
              <span class="p-2"><a href="cookies-policy.php">Cookies</a></span>
              <span class="p-2"><a href="terms-of-service.php">Terms of Service</a></span>
            </div>
            <div class="col-12 text-center">
              <hr class="light-100">
              <p>Copyright &copy; <span class="text-info">
                  <?php echo date('Y'); ?></span> National Union of Bille Students (NUBS)
              </p>
            </div>
          </div>
        </div>
        <div class="d-block d-lg-none pb-5"></div>
      </footer>
  <?php
    }
  } else {
  }
  ?>
  <?php include('bottomnavbar.php'); ?>
  <!-- online bootstrap js file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- jquery -->
  <script src="assets/js/jquery.js"></script>
  <!-- offline bootstrap js file -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- offline font awesome js file -->
  <script src="../fontawesome5/js/all.min.js"></script>


  <!-- Online Alertify JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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