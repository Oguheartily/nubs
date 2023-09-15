<!-- herder -->
<?php
include('functions/userfunctions.php');
/** check if user is logged in and redirect to index page */
if (isset($_SESSION['auth'])) {
    redirecter("index.php", "You are already Logged in");
    /**the exit function prevents the if code block from executing continuously */
}
include("includes/header.php");
?>
<!-- end header -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <?php unset($_SESSION['message']);
            } ?>
            <div class="card">
                <div class="card-header text-center py-3 regHeader">
                    <h4>Registration</h4>
                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Lastname</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter username" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <div class="form-check form-check-inline ms-4">
                                <input type="radio" class="form-check-input" name="select-gender" id="maleOption" value="male">
                                <label for="maleOption" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline ms-4">
                                <input type="radio" class="form-check-input" name="select-gender" id="femaleOption" value="female">
                                <label for="femaleOption" class="form-check-label">Female</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@mail.com" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phonenumber" placeholder="Enter phone number" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Institution</label>
                            <input type="text" name="school" class="form-control" placeholder="Enter school attended / attending" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>NUBS Position</label>
                            <input type="text" name="currentNubsPost" class="form-control" placeholder="Enter position eg: member..." required />
                        </div>
                        <div class="form-group mb-3">
                            <label>NUBS Position</label>
                            <select name="currentNubsPost"class="form-select" required>
                                <option value="">select post</option>
                                <?php
                                /**function gets all the compounds fom database */
                                $getHierarchy = getNubsHierarchy();
                                if (mysqli_num_rows($getHierarchy) > 0) {
                                    foreach ($getHierarchy as $eachHierarchy) {
                                ?>
                                        <option value="<?= $eachHierarchy['hierarchy']; ?>"><?= $eachHierarchy['hierarchy']; ?></option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option value="Null">No data in database</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Active Year </label> <span class="fas fa-info-circle"></span><em> members, use current year.</em>
                            <input type="text" name="activeNubsYear" class="form-control" placeholder="Enter active year for Excos eg: 2020...">
                        </div>
                        <div class="form-group mb-3">
                            <label>Excos Unique Code </label> <span class="fas fa-info-circle"></span><em> if you are not an Exco, leave blank</em>
                            <input type="text" name="excosUniquCode" class="form-control" placeholder="Enter Excos identity code">
                        </div>
                        <div class="form-group mb-3">
                            <label>Current State of Schooling</label>
                            <select name="select-state" class="form-select" required>
                                <option value="">select state</option>
                                <?php
                                /**function gets all the states fom database */
                                $getStates = getAllStates();
                                if (mysqli_num_rows($getStates) > 0) {
                                    foreach ($getStates as $eachPolo) {
                                ?>
                                        <option value="<?= $eachPolo['states']; ?>"><?= $eachPolo['states']; ?></option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option value="Null">No data in database</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Compound</label>
                            <select name="select-compound"class="form-select" required>
                                <option value="">select polo</option>
                                <?php
                                /**function gets all the compounds fom database */
                                $getPolo = getAllCompounds();
                                if (mysqli_num_rows($getPolo) > 0) {
                                    foreach ($getPolo as $eachPolo) {
                                ?>
                                        <option value="<?= $eachPolo['compound']; ?>"><?= $eachPolo['compound']; ?></option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option value="Null">No data in database</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <textarea name="userAddress" id="" rows="3" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <div class="d-flex">
                                <input type="password"class="form-control me-1" style="width: 90%" name="password" placeholder="Password" id="passWord" />
                                <div class="p-2" id="togglePassword"><span class="fas fa-eye" id="theEye"></span></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="register_btn" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="mx-3 mb-3 p-1">I already have a membership. proceed to <a href="login.php">Login</a></div>
            </div>

        </div>
    </div>
    <div class="py-4 mb-2 d-block d-lg-none"></div>
</div>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const theEye = document.querySelector("#theEye");
        const password = document.querySelector("#passWord");

        togglePassword.addEventListener("click", () => {
            if (password.getAttribute("type") === "password") {
                // toggle the icon
                theEye.classList.remove("fa-eye-slash");
                theEye.classList.add("fa-eye");
                password.setAttribute("type", "text");
            }
            else if (password.getAttribute("type") === "text") {
                // toggle the icon
                theEye.classList.remove("fa-eye");
                theEye.classList.add("fa-eye-slash");
                password.setAttribute("type", "password");
            } 
        });
</script>
<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->