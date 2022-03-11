<?php
// db connection file
include 'db_conn.php';

// fetching candidate data from db
$cand_res = $conn->query("SELECT count(candidate_id) FROM candidate_information where employee_id is null");
$cand_res = $cand_res->fetch_assoc();
// fetching employee data from db
$emp_res = $conn->query("SELECT count(employee_id) FROM employee_information");
$emp_res = $emp_res->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRMS | Dashboard</title>

  <!-- style-sheet links -->
  <?php include 'style_links.php'; ?>
  <!-- /.style-sheet links -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader 
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <?php include 'sidebar.php' ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index_admin.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4 style="font-weight:bold;">Candidates</h4>
                  <h4>Pending: <?php echo $cand_res["count(candidate_id)"]; ?> </h4>

                </div>

                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="candidate_details.php" class="small-box-footer">View Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h4 style="font-weight:bold;">Employees</h4>
                  <h4>Total: <?php echo $emp_res["count(employee_id)"]; ?> </h4>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="emp_details.php?c=0" class="small-box-footer">View Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h4 style="font-weight:bold;">User Registrations</h4>
                  <h4>Total: (44)</h4>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">View Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4 style="font-weight:bold;">Company Structure</h4>
                  <h4><br></h4>
                </div>
                <div class="icon">
                  <i class="far fa-building"></i>
                </div>
                <a href="cmp_struct_view.php?c=0" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h4 style="font-weight:bold;">History Records</h4>
                  <h4><br></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-history"></i>
                </div>
                <a href="history_rec_view.php?c=0" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h4 style="font-weight:bold;">Financial Records</h4>
                  <h4><br></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <a href="finance_rec_view.php?c=0" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4 style="font-weight:bold;">Time and Attendance</h4>
                  <h4><br></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-clock"></i>
                </div>
                <a href="time_rec_view.php?c=0" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021-2022 <a href="https://twitter.com/evangelion_co?lang=en">EVA</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.1.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- scripts -->
  <?php include 'scripts.php'; ?>
  <!-- /.scripts -->
</body>

</html>