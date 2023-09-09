<?php
include("functions/userfunctions.php");
include('includes/header.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <div class="text-center fs-2 fw-bold text-white">Click a Year to View Excos</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach (range(2000, date("Y")) as $value) {
                            echo "<div class='col-3'><a href='viewExcos.php?year=$value'>$value</a></div>";
                        }; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>