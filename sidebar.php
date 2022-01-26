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

<!-- Brand Logo -->
<a href="index_admin.php" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light"> HRMS </span>
</a>
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Admin - Test</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="index_admin.php" class="nav-link">
          <i class="nav-icon fas fa-suitcase"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="candidate_details.php" class="nav-link">
          <i class="nav-icon far fa-list-alt"></i>
          <p data-toggle="tooltip" title="Pending Candidates">
            Candidate Details
            <span class="badge badge-warning right"><?php echo $cand_res["count(candidate_id)"]; ?></span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="emp_details.php" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
          <p data-toggle="tooltip" title="Total Employees">
            Employee Details
            <span class="badge badge-info right"><?php echo $emp_res["count(employee_id)"]; ?></span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="cmp_struct_view.php" class="nav-link">
          <i class="nav-icon far fa-building"></i>
          <p>
            Company Structure
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="cmp_struct_view.php?c=0" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Departments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cmp_struct_view.php?c=1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Designations</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="history_rec_view.php" class="nav-link">
          <i class="nav-icon fas fa-history"></i>
          <p>
            History Records
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="history_rec_view.php?c=0" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Job History</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="history_rec_view.php?c=1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Disciplinary History</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="history_rec_view.php?c=2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Salary History</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money-check"></i>
          <p>
            Financial Records
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Salary</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Overtime Pay</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Compensation</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>