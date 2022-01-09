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

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

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

                            <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update">Update</button></td>
                            <td><a href="emp_delete.php?del=<?php echo $row["employee_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>

                    <?php

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

    <!-- Modal NOTE; DID NOT INCLUDED PHP WORK-->
    <div class="modal fade" id="modal_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Update form: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-5 my-2 border">
                        <h2>Update your details here:</h2><br>
                        <form name="candidate_info" action="candidate_insert.php" method="POST">

                            <div class="form-group">
                                <label for="fullname" class="form-label">Full Name: </label>
                                <input type="text" class="form-control" id="fname" name="fullname" required>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="dob" class="form-label">Date of Birth: </label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="dob" name="dateofbirth" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="age" class="form-label">Age: </label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="age" name="age" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-check">
                                <label for="gender" class="form-label">Gender: </label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender" name="gender" value="Male" checked>Male
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender" name="gender" value="Female">Female
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender" name="gender" value="Others">Others
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="address" class="form-label">Address: </label>
                                <textarea type="text" class="form-control" rows="5" cols="33" id="address" name="address" required></textarea>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email" class="form-label">Email address: </label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="phnum_hm" class="form-label">Phone (Home) number: (+91) </label>
                                <input type="number_format" class="form-control" id="phnum_hm" name="phnum_hm" minlength="10" maxlength="10" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="phnum_wk" class="form-label">Phone (work) number: (+91) </label>
                                <input type="number_format" class="form-control" id="phnum_wk" name="phnum_wk" minlength="10" maxlength="10" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="phnum_wk" class="form-label">Phone (Mobile) number: (+91) </label>
                                <input type="number_format" class="form-control" id="phnum_wk" name="phnum_wk" minlength="10" maxlength="10" required>
                            </div>
                            <br>


                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <?php include 'scripts.php'; ?>
    <!-- /.scripts -->
</body>

</html>