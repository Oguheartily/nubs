<?php
include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="fw-bold">Full website Preview</div>
    <div>to see a proper view, click on "<a href="../index.php">As User</a>" from navbar / sidebar.</div>
</div>
<iframe src="../index.php" frameborder="0" style="width: 100%; height: 100vh"></iframe>

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- /.container-fluid -->

<?php
include('includes/footer.php');
?>