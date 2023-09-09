<?php
include('../middleware/adminAuthenticator.php');
/**myfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');

?>
<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white">All Members
                        <span class="float-end">Total Members : <span><?= mysqli_num_rows(getAllAlumniExcos()); ?></span></span>
                    </h4>
                </div>
                <div class="card-body table-responsive" id="category_table">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FIRSTNAME</th>
                                <th>LASTNAME</th>
                                <th>GENDER</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allMembers = getAllAlumniExcos();

                            if (mysqli_num_rows($allMembers) > 0) {
                                foreach ($allMembers as $eachMember) {
                            ?>
                                    <tr>
                                        <td><?= $eachMember['id']; ?></td>
                                        <td><?= $eachMember['first_name']; ?></td>
                                        <td><?= $eachMember['last_name']; ?></td>
                                        <td><?= $eachMember['gender']; ?></td>
                                        <td><a href="viewMember.php?id=<?= $eachMember['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Registered Members.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>