<?php
// db connection file
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS | Company</title>

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
                                <li class="breadcrumb-item active">Company Structure</li>
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
                        <h2>Company Structure: </h2>
                    </div>
                    <br>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="cmpTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="department-tab" data-toggle="tab" href="#department" role="tab" aria-controls="department" aria-selected="true">Departments</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="designation-tab" data-toggle="tab" href="#designation" role="tab" aria-controls="designation" aria-selected="false">Designations</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- department -->
                        <div class="tab-pane fade show active" id="department" role="tabpanel" aria-labelledby="department-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_dept" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-plus"></i> Add New

                            </button>
                            <br><br>
                            <?php

                            // retrieves all department information records
                            $sql = "SELECT * FROM department";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Department ID" . "</th><th>" . "Name" . "</th><th>" . "Location" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["department_id"] . "</td><td>" . $row["department_name"] . "</td><td>" . $row["department_location"] . "</td>";

                            ?>

                                    <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update_dept<?php echo $row["department_id"]; ?>">Update</button></td>
                                    <td><a href="department_delete.php?del=<?php echo $row["department_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                                    </tr>

                            <?php
                                    include 'department_upd.php';
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";

                                // resetting counter in case there are no records (CHeck if there are any tables to be reset)

                                $sql = "ALTER TABLE employee_qualifications AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE employee_phnum AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE job_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE disciplinary_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE base_salary_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE employee_information AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);
                            }

                            ?>
                        </div><!-- /.department -->

                        <!-- designation -->
                        <div class="tab-pane fade" id="designation" role="tabpanel" aria-labelledby="designation-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_desg" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-plus"></i> Add New

                            </button>
                            <br><br>
                            <?php

                            // retrieves all employee information records
                            $sql = "SELECT * FROM designations";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Designation ID" . "</th><th>" . "Department" . "</th><th>" . "Designation" . "</th><th>" . "Base Salary(Rs.)" ."</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["designation_id"] . "</td><td>" . $row["department_id"] . "</td><td>" . $row["designation"] . "</td><td>" . $row["base_salary"] ."</td>";

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

                                $sql = "ALTER TABLE employee_qualifications AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE employee_phnum AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE job_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE disciplinary_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE base_salary_history AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);

                                $sql = "ALTER TABLE employee_information AUTO_INCREMENT = 1";
                                $res = $conn->query($sql);
                            }

                            ?>
                        </div><!-- /.designation -->


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
                                        <form name="candidate_info" action="department_insert.php" method="POST">

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
                    <div class="modal fade" id="modal_insert_desg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <form name="candidate_info" action="department_insert.php" method="POST">

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