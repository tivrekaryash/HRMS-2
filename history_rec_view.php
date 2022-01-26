<?php
// db connection file
include 'db_conn.php';

$count = $_GET["c"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS | History</title>

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
                            <h1 class="m-0">...</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index_admin.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="index_admin.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">History Records</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid p-3">
                    <div>
                        <h2>History Records: </h2>
                    </div>
                    <br>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="hisTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 0) echo "active"; ?>" id="HisJob-tab" data-toggle="tab" href="#HisJob" role="tab" aria-controls="HisJob" aria-selected="<?php if ($count == 0) echo "true";
                                                                                                                                                                                            else echo "false"; ?>">Job History</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 1) echo "active"; ?>" id="disc-tab" data-toggle="tab" href="#disc" role="tab" aria-controls="disc" aria-selected="<?php if ($count == 1) echo "true";
                                                                                                                                                                                    else echo "false"; ?>">Disciplinary History</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 2) echo "active"; ?>" id="salHis-tab" data-toggle="tab" href="#salHis" role="tab" aria-controls="salHis" aria-selected="<?php if ($count == 2) echo "true";
                                                                                                                                                                                            else echo "false"; ?>">Salary History</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- jobHistory -->
                        <div class="tab-pane fade <?php if ($count == 0) echo "show active"; ?>" id="HisJob" role="tabpanel" aria-labelledby="HisJob-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_HisJob" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-plus"></i> Add New

                            </button>
                            <br><br>
                            <?php

                            // retrieves all job History information records
                            $sql = "SELECT * FROM job_history";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "History ID" . "</th><th>" . "Employee" . "</th><th>" . "Designation" . "</th><th>" . "Start Date" . "</th><th>" . "End Date" . "</th><th>" . "Description" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["history_id"] . "</td><td>" . $row["employee_id"] . "</td><td>" . $row["designation_id"] . "</td><td>" . $row["job_start_date"] . "</td><td>" . $row["job_end_date"] . "</td><td>" . $row["job_description"] ."</td>";

                            ?>

                                    <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update_HisJob<?php echo $row["history_id"]; ?>">Update</button></td>
                                    <td><a href="HisJob_delete.php?del=<?php echo $row["history_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                                    </tr>

                            <?php
                                    include 'HisJob_upd.php';
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";

                                // resetting counter in case there are no records (CHeck if there are any tables to be reset)

                                $sql = "ALTER TABLE job_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);
                            }

                            ?>
                        </div><!-- /.jobHistory -->

                        <!-- disciplinary -->
                        <div class="tab-pane fade <?php if ($count == 1) echo "show active"; ?>" id="disc" role="tabpanel" aria-labelledby="disc-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_disc" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-plus"></i> Add New

                            </button>
                            <br><br>
                            <?php

                            // retrieves all disciplinary history information records
                            $result = $conn->query("SELECT * FROM designations");

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Designation ID" . "</th><th>" . "Department" . "</th><th>" . "Designation" . "</th><th>" . "Base Salary(Rs.)" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {

                                    $res = $conn->query("select * from department where department_id = $row[department_id]");
                                    $res = $res->fetch_assoc();

                                    echo "<tr><td>" . $row["designation_id"] . "</td><td>" . $res["department_name"] . "</td><td>" . $row["designation"] . "</td><td>" . $row["base_salary"] . "</td>";

                            ?>

                                    <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update_desg<?php echo $row["designation_id"]; ?>">Update</button></td>
                                    <td><a href="designation_delete.php?del=<?php echo $row["designation_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                                    </tr>

                            <?php
                                    include 'designation_upd.php';
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";

                                // resetting counter in case there are no records (CHeck if there are any tables to be reset)

                                $sql = "ALTER TABLE designations AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);
                            }

                            ?>
                        </div><!-- /.disciplinary -->

                        <!-- Salary Hsitory -->
                        <div class="tab-pane fade <?php if ($count == 1) echo "show active"; ?>" id="salHis" role="tabpanel" aria-labelledby="salHis-tab">
                        <p>To be discussed - Base Salary Hsitory or just Salary History (cleared status)</p>
                        </div><!-- /.Salary Hsitory -->


                    </div><!-- /.Tab-panes -->

                    <!-- Modal-Department Insert -->
                    <div class="modal fade" id="modal_insert_dept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Department form: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container p-5 my-2 border">
                                        <h2>Enter Department details here:</h2><br>
                                        <form name="dept_form" action="department_insert.php" method="POST">

                                            <div class="form-group">
                                                <label for="deptname" class="form-label">Department Name: </label>
                                                <input type="text" class="form-control" id="deptname" name="deptname" required>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="deptloc" class="form-label">Department Location: </label>
                                                <textarea type="text" class="form-control" rows="5" cols="33" id="deptloc" name="deptloc" required></textarea>
                                            </div>
                                            <br>

                                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.Modal -->

                    <!-- Modal-Designation Insert -->
                    <div class="modal fade" id="modal_insert_desg" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Designation form: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container p-5 my-2 border">
                                        <h2>Enter Designation details here:</h2><br>
                                        <form name="desg_form" action="designation_insert.php" method="POST">

                                            <div class="form-group">
                                                <label for="deptname" class="form-label">Select Department: </label>
                                                <select id="deptname" class="form-control select2bs4" name="deptname" style="width: 100%;" required>
                                                    <?php
                                                    // retrieving all departments
                                                    $result = $conn->query("select * from department");

                                                    while ($row = $result->fetch_assoc()) {
                                                        // displaying each department in the list
                                                        echo "<option>" . $row["department_name"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div><br>

                                            <div class="form-group">
                                                <label for="desgname" class="form-label">Designation: </label>
                                                <input type="text" class="form-control" id="desgname" name="desgname" required>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="basesal" class="form-label">Base Salary: </label>
                                                <input type="number" class="form-control" id="basesal" name="basesal" required>
                                            </div>
                                            <br>

                                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.Modal -->


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021-2022 <a href="#">EVA</a>.</strong>
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