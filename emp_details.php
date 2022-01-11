<?php
// db connection file
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS | Employee</title>

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
                                <li class="breadcrumb-item"><a href="index_admin.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employees</li>
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
                        <h2>Employee Details Table:</h2>
                    </div>
                    <br>

                    <?php

                    // retrieves all employee information records
                    $sql = "SELECT * FROM employee_information";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // displaying header for tabular form
                        echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Sr No." . "</th><th>" . "Full name" . "</th><th>" . "Date of Birth" . "</th><th>" . "Age" . "</th><th>" . "Gender" . "</th><th>" . "Address" . "</th><th>" . "E-mail" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                        // displaying data along with adding buttons for update and delete
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["employee_id"] . "</td><td>" . $row["employee_name"] . "</td><td>" . $row["employee_dob"] . "</td><td>" . $row["employee_age"] . "</td><td>" . $row["employee_gender"] . "</td><td>" . $row["employee_address"] . "</td><td>" . $row["employee_email"] . "</td>";

                    ?>

                            <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update<?php echo $row["employee_id"]; ?>">Update</button></td>
                            <td><a href="emp_delete.php?del=<?php echo $row["employee_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>

                    <?php
                        include 'emp_upd.php';
                        }

                        echo "</table>";
                    } else {
                        echo "no records inserted";

                        // resetting counter in case there are no records

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

                    // closing connection
                    $conn->close();

                    ?>
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