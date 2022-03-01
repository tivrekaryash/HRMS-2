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
    <title>HRMS | Finance</title>

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
                                <li class="breadcrumb-item active">Finance</li>
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
                        <h2>Finance Records: </h2>
                    </div>
                    <br>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="finTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 0) echo "active"; ?>" id="Sal-tab" data-toggle="tab" href="#Sal" role="tab" aria-controls="Sal" aria-selected="<?php if ($count == 0) echo "true";
                                                                                                                                                                                    else echo "false"; ?>">Salary</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 1) echo "active"; ?>" id="setOtp-tab" data-toggle="tab" href="#setOtp" role="tab" aria-controls="setOtp" aria-selected="<?php if ($count == 1) echo "true";
                                                                                                                                                                                            else echo "false"; ?>">Set Overtime Payment</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 2) echo "active"; ?>" id="Otp-tab" data-toggle="tab" href="#Otp" role="tab" aria-controls="Otp" aria-selected="<?php if ($count == 2) echo "true";
                                                                                                                                                                                    else echo "false"; ?>">Overtime Payment</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($count == 3) echo "active"; ?>" id="Comp-tab" data-toggle="tab" href="#Comp" role="tab" aria-controls="Comp" aria-selected="<?php if ($count == 3) echo "true";
                                                                                                                                                                                        else echo "false"; ?>">Compensation</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Salary -->
                        <div class="tab-pane fade <?php if ($count == 0) echo "show active"; ?>" id="Sal" role="tabpanel" aria-labelledby="Sal-tab">
                            <a href="emp_add_sal.php"><button type="button" class="btn btn-outline-success" style="float:right">
                                    <i class="fas fa-wallet"></i> Add New

                                </button></a>
                            <br><br>
                            <?php

                            // retrieves all salary records
                            $result = $conn->query("SELECT * FROM employee_salary where clearance = 'pending' order by employee_id");

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Employee ID" . "</th><th>" . "Employee" . "</th><th>" . "Amount (Rs.)" . "</th><th>" . "Date" . "</th><th>" . "Clearance" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {

                                    $emprow = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
                                    $emprow = $emprow->fetch_assoc();

                                    echo "<tr><td>" . $emprow["employee_id"] . "</td><td>" . $emprow["employee_name"] . "</td><td>" . $row["salary_amount"] . "</td><td>" . $row["salary_date"] . "</td><td>" . $row["clearance"] . "</td>";

                                    if ($row["clearance"] == "cleared") {
                                        echo "<td><button type='submit' class='btn btn-secondary' disabled>Cleared</button></td></tr>";
                                    } else {
                            ?>
                                        <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_sal<?php echo $row["salary_id"]; ?>">Edit</button></td>
                                        <td><a href='emp_sal_clear.php?clr=<?php echo $row["salary_id"]; ?>'><button type='submit' class='btn btn-success'>Clear</button></a></td>
                                        </tr>
                            <?php
                                    }
                                    include 'emp_sal_upd.php';
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";

                                // resetting counter in case there are no records (CHeck if there are any tables to be reset)
                                $res = $conn->query("ALTER TABLE employee_salary AUTO_INCREMENT = 1");
                            }

                            ?>
                        </div><!-- /.Salary -->

                        <!-- Set Overtime Pay -->
                        <div class="tab-pane fade <?php if ($count == 1) echo "show active"; ?>" id="setOtp" role="tabpanel" aria-labelledby="setOtp-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_setOtp" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-coins"></i> Set Overtime

                            </button>
                            <br><br>
                            <?php

                            // retrieves all Set Overtime information records
                            $result = $conn->query("SELECT * FROM overtime_pay_set");

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Designation  ID" . "</th><th>" . "Designation" . "</th><th>" . "Amount-Per-hour(Rs)" . "</th><th colspan = '2'>" . "Actions" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["designation_id"] . "</td><td>" . $row["designation"] . "</td><td>" . $row["amt_per_hour"] . "</td>";

                            ?>

                                    <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update_otp<?php echo $row["set_pay_id"]; ?>">Update</button></td>
                                    <td><a href="overtimepay_delete.php?del=<?php echo $row["set_pay_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                                    </tr>

                            <?php
                                    include 'overtimepay_upd.php';
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";
                            }

                            ?>
                        </div><!-- /.Set Overtime Pay  -->

                        <!-- Overtime Pay -->
                        <div class="tab-pane fade <?php if ($count == 2) echo "show active"; ?>" id="Otp" role="tabpanel" aria-labelledby="Otp-tab">
                            <button type="button" data-toggle="modal" data-target="#" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-wallet"></i> Clear Due

                            </button>
                            <br><br>
                            To be discussed
                        </div><!-- /.Overtime Pay  -->

                        <!-- Compensation -->
                        <div class="tab-pane fade <?php if ($count == 3) echo "show active"; ?>" id="Comp" role="tabpanel" aria-labelledby="Comp-tab">
                            <button type="button" data-toggle="modal" data-target="#modal_insert_comp" class="btn btn-outline-success" style="float:right">
                                <i class="fas fa-file-invoice"></i>&nbsp; Add New

                            </button>
                            <br><br>
                            <?php

                            // retrieves all compensation records
                            $result = $conn->query("SELECT * FROM compensation order by employee_id");

                            if ($result->num_rows > 0) {
                                // displaying header for tabular form
                                echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Employee ID" . "</th><th>" . "Employee" . "</th><th>" . "Type" . "</th><th>" . "Description" . "</th><th>" . "Amount" . "</th><th>" . "Date" . "</th><th>" . "Clearance" . "</th><th>" . "Clear" . "</th></tr>";

                                // displaying data along with adding buttons for update and delete
                                while ($row = $result->fetch_assoc()) {

                                    $emprow = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
                                    $emprow = $emprow->fetch_assoc();

                                    echo "<tr><td>" . $emprow["employee_id"] . "</td><td>" . $emprow["employee_name"] . "</td><td>" . $row["compensation_type"] . "</td><td>" . $row["compensation_description"] . "</td><td>" . $row["compensation_amt"] . "</td><td>" . $row["cmp_Date"] . "</td><td>" . $row["clearance"] . "</td>";

                                    if ($row["clearance"] == "cleared") {
                                        echo "<td><button type='submit' class='btn btn-secondary' disabled>Cleared</button></td></tr>";
                                    } else {
                            ?>
                                        <td><a href='comp_clear.php?acc=<?php echo $row["compensation_id"]; ?>'><button type='submit' class='btn btn-success'>Clear</button></td>
                                        </tr>
                            <?php
                                    }
                                }

                                echo "</table>";
                            } else {
                                echo "no records inserted";

                                // resetting counter in case there are no records (CHeck if there are any tables to be reset)
                                $res = $conn->query("ALTER TABLE compensation AUTO_INCREMENT = 1");
                            }

                            ?>
                        </div><!-- /.Compensation -->

                    </div><!-- /.Tab-panes -->

                    <!-- Modal-Compensation Insert -->
                    <div class="modal fade" id="modal_insert_comp" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Compensation form: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container p-5 my-2 border">
                                        <h2>Enter Compensation Record:</h2><br>
                                        <form name="Comp_form" action="comp_insert.php" method="POST">

                                            <div class="form-inline">
                                                <label for="compdate" class="form-label">Date : </label>
                                                <div class="col-sm-2">
                                                    <input type="date" class="form-control" id="compdate" name="compdate" required>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="emp" class="form-label">Select Employee: </label>
                                                <select id="emp" class="form-control select2bs4" name="emp" style="width: 100%;" required>
                                                    <?php
                                                    // retrieving all employee_information
                                                    $result = $conn->query("select * from employee_information");

                                                    while ($row = $result->fetch_assoc()) {
                                                        // displaying each employee_information in the list
                                                        echo "<option value = '$row[employee_id]'>" . $row["employee_name"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div><br>

                                            <div class="form-group">
                                                <label for="comptype" class="form-label">Type: </label>
                                                <input type="text" class="form-control" id="comptype" name="comptype" required>
                                            </div>
                                            <br>

                                            <div class="form-inline">
                                                <label for="compamt" class="form-label">Amount (Rs): </label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="compamt" name="compamt" required>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="compdesc" class="form-label">Description: </label>
                                                <textarea type="text" class="form-control" rows="5" cols="33" id="compdesc" name="compdesc"></textarea>
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

                    <!-- Modal-overtime Update -->
                    <div class="modal fade" id="modal_insert_setOtp" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Overtime Payment form: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container p-5 my-2 border">
                                        <h2>Enter details here:</h2><br>
                                        <form name="otp_insert_form" action="overtimetp_insert.php" method="POST">

                                        <div class="form-group">
                                                <label for="otpdesig" class="form-label">Select Department: </label>
                                                <select id="otpdesig" class="form-control select2bs4" name="otpdesig" style="width: 100%;" required>
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

                                            <div class="form-inline">
                                                <label for="otpamt" class="form-label">Amount-Per-Hour(Rs): </label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="otpamt" name="otpamt" required>
                                                </div>
                                            </div>
                                            <br>

                                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.Modal -->

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