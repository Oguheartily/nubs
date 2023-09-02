<?PHP
include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Earnings (Annual)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Color System -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card bg-primary text-white shadow">
        <div class="card-body">
          Primary
          <div class="text-white-50 small">#4e73df</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-success text-white shadow">
        <div class="card-body">
          Success
          <div class="text-white-50 small">#1cc88a</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-info text-white shadow">
        <div class="card-body">
          Info
          <div class="text-white-50 small">#36b9cc</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-warning text-white shadow">
        <div class="card-body">
          Warning
          <div class="text-white-50 small">#f6c23e</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-danger text-white shadow">
        <div class="card-body">
          Danger
          <div class="text-white-50 small">#e74a3b</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-secondary text-white shadow">
        <div class="card-body">
          Secondary
          <div class="text-white-50 small">#858796</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-light text-black shadow">
        <div class="card-body">
          Light
          <div class="text-black-50 small">#f8f9fc</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-dark text-white shadow">
        <div class="card-body">
          Dark
          <div class="text-white-50 small">#5a5c69</div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
<?php
include('includes/footer.php');
?>