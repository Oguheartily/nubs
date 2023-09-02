<footer class="footer py-2">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-md-between">
      <div class="col-md-6">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          &copy; <?= date('Y'); ?>,
          by <a href="https://www.pascotech.com" class="font-weight-bold" target="_blank">Ogu Heartily Pasisi</a>
        </div>
      </div>
      <div class="col-md-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-muted" target="_blank">Services</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-muted" target="_blank">Contact</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</main>

</div>
</div>

<!-- JQuery JS Offline -->
<script src="assets/js/jquery.js"></script>
<!-- Bootstrap JS Offline -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- Fontawesome JS Offline -->
<script src="../../fontawesome5/js/all.min.js"></script>
<!-- Online Alertify JavaScript -->
  <!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->
  <!--  alertify offline js file -->
  <script src="assets/alertifyjs/alertify.min.js"></script>
<!-- Alertify initialization which catches the alerts -->
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