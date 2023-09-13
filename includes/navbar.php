<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <?php
            $getlogo = getSiteLogo();
            if (mysqli_num_rows($getlogo) > 0) {
                $logo = mysqli_fetch_array($getlogo);
            ?>
                <img src="<?= $logo['site_icons']; ?>" width="80px" alt="<?= $logo['icon_name']; ?>">
            <?php
            } else {
                echo "<h2>NUBS</h2>";
            }
            ?>
        </a>
        <button class="navbar-toggler border-0 outline-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts.php">News & Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="excos.php">Excos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mr & Miss bille</a>
                </li>
                <?php
                /**if user is loggen in, show only l */
                if (isset($_SESSION['auth'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['auth_user']['username']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            if ($_SESSION['role_as'] == "2") {
                            ?>
                                <a class="dropdown-item" href="excos/index.php">Dashboard</a>
                                <a class="dropdown-item" href="excos/excos_profile.php">Profile</a>
                            <?php
                            } else if ($_SESSION['role_as'] == "1") {
                            ?>
                                <a class="dropdown-item" href="admin/index.php">Dashboard</a>
                                <a class="dropdown-item" href="admin/admin_profile.php">Profile</a>
                            <?php
                            } else {
                            ?>
                                <a class="dropdown-item" href="user-profile.php">Profile</a>
                            <?php
                            }
                            ?>
                            <a class="dropdown-item" href="logout.php">
                                Logout</a>
                        </div>
                    </li>
                <?php
                } else {
                    /** show register and login buttons */
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php
                }
                ?>


            </ul>
        </div>
    </div>
</nav>