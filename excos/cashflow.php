<?php
include('../middleware/excosAuthenticator.php');
include('includes/header.php');

if (isset($_SESSION['auth'])) {
  $venId = $_SESSION['auth_user']['user_id'];
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Cashflow</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
  </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  /** if user is not verified, status is 3 so dont display any income */
  $qry_run = mysqli_query($con, "SELECT `status` FROM `users` WHERE `id`='$venId' ");
  $currentExcosStatus = mysqli_fetch_array($qry_run);
  if ($currentExcosStatus['status'] == 3) { ?>
    <h3>Verify Account in <a href="excos_profile.php">profile page</a> to see cashflow</h3>
  <?php
  } else {
    /**this works like a refresh of the database, we already inserted the necessary values during customer purchase checkout in placeorder . php */
    $cashflow_qry_run = mysqli_query($con, "SELECT * FROM `income_table` WHERE `excos_id`='$venId' ");
    if ($cashflow_qry_run) {
      $cashflow = mysqli_fetch_array($cashflow_qry_run);
      $current_balance = $cashflow['total_sales'] - $cashflow['completed_withdrawal'] - $cashflow['pending_withdrawal'];
      $currBalUpdate_qry_run = mysqli_query($con, "UPDATE `income_table` SET `current_balance`='$current_balance' WHERE `excos_id`='$venId' ");
    }
  ?>

    <!-- Content Row -->
    <div class="row">
      <!-- Total sales -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                  Total Sales</div>
                <div class="h5 mb-0 text-gray-800">
                  &#8358; <span><?= number_format($cashflow['total_sales'], 0, '.', ','); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Current Balance -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-success text-uppercase mb-1">
                  Current Balance</div>
                <div class="h5 mb-0 text-gray-800">
                  &#8358; <span><?= number_format($cashflow['current_balance'], 0, '.', ','); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Completed Withdrawals -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-success text-uppercase mb-1">Completed Withdrawals
                </div>
                <div class="h5">
                  &#8358; <span><?= number_format($cashflow['completed_withdrawal'], 0, '.', ','); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Withdrawals -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning bg-dark text-white shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                  Pending Withdrawal</div>
                <div class="h5 mb-0 text-gray-800">
                  &#8358; <span><?= number_format($cashflow['pending_withdrawal'], 0, '.', ','); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <span class="fas fa-hourglass-half fa-2x text-gray-300"></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 pt-3">
        <div class="row">
          <div class="col-8 mb-4">
            <!-- form -->
            <form action="code.php" method="post">
              <input type="hidden" name="excosId" value="<?= $venId; ?>">
              <input type="hidden" name="oldPendingWithdrawal" value="<?= $cashflow['pending_withdrawal']; ?>">
              <input type="hidden" name="currentBalance" value="<?= $cashflow['current_balance']; ?>">
              <input type="hidden" name="totalSales" value="<?= $cashflow['total_sales']; ?>">
              <label class="fw-bold">Amount to Withdraw</label>
              <input type="text" class="form-control py-2 mb-3" name="withdrawalAmount" placeholder="withdrawal amount must not exceed current balance">
              <button type="submit" name="request_withdrawalBtn" class="btn w-50 btn-primary py-2">Request Withdrawal</button>
            </form>
          </div>
          <div class="col-4">
            <form action="" method="post">
              <button class="btn btn-sm btn-warning fw-bold py-2 border">Cancel Withdrawal Request</button>
            </form>
          </div>
        </div>

      </div>


    </div>
    <!-- row end -->
  <?php
  }
  ?>
</div>
<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?>