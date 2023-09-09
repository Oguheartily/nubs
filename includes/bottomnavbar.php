<footer class="d-block d-lg-none fixed-bottom footer">
    <div class="container">
        <div class="row text-center pb-2 fs-4">
            <div class="col-3 p-2 text-white">
                <a href="index.php"><i class="fa fa-home text-white"></i></a>
            </div>
            <div class="col-3 p-2">
                <a href="posts.php" class="text-white"><i class="fas fa-newspaper"></i></a>
            </div>
            <div class="col-3 p-2">
                <?php
                if (isset($_SESSION['auth'])) {
                ?>
                    <a href="user-profile.php" class="text-white"><i class="fas fa-user text-white"></i></a>
                <?php
                } else {
                ?>
                    <a href="login.php" class="text-white"><i class="fas fa-user text-white"></i></a>
                <?php
                }
                ?>

            </div>
            <div class="col-3 p-2">
                <button class="navbar-toggler border-0 outline-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars text-white"></span>
                </button>
            </div>
        </div>
    </div>
</footer>