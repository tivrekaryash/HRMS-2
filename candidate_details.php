<?php
// db connection file
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS | Candidate</title>

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
                                <li class="breadcrumb-item active">Candidates</li>
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
                        <button type="button" data-toggle="modal" data-target="#modal_insert" class="btn btn-outline-success" style="float:right">
                            <i class="fas fa-user-plus"></i> Add New

                        </button>

                        <h2>Candidate Details Table:</h2>
                    </div>
                    <br>
                    <?php

                    // fetching candidate data from db
                    $result = $conn->query("SELECT * FROM candidate_information");

                    if ($result->num_rows > 0) {
                        // displaying header for table view
                        echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Sr No." . "</th><th>" . "Full name" . "</th><th>" . "Date of Birth" . "</th><th>" . "Age" . "</th><th>" . "Gender" . "</th><th>" . "Address" . "</th><th>" . "Contact number" . "</th><th>" . "E-mail" . "</th><th colspan = '3'>" . "Actions" . "</th></tr>";

                        // displaying data from db
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["candidate_id"] . "</td><td id = 'fname_td'>" . $row["candidate_fullname"] . "</td><td id = 'dob_td'>" . $row["candidate_dob"] . "</td><td id = 'age_td'>" . $row["candidate_age"] . "</td><td id = 'gender_td'>" . $row["candidate_gender"] . "</td><td id = 'address_td'>" . $row["candidate_address"] . "</td><td id = 'phnum_td'>" . $row["phnum"] . "</td><td id = 'email_td'>" . $row["candidate_email"] . "</td>";
                    ?>
                            <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update<?php echo $row["candidate_id"]; ?>">Update</button></td>
                            <td><a href="candidate_delete.php?del=<?php echo $row["candidate_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
                            <?php
                            // different button styles based on whether candidate was already accepted or not
                            if ($row["employee_id"])
                                echo "<td><button type='submit' class='btn btn-secondary' disabled>Accepted</button></td></tr>";
                            else {
                            ?>
                                <td><a href='emp_info.php?acc=<?php echo $row["candidate_id"]; ?>'><button type='submit' class='btn btn-success'>Accept</button></td>
                                </tr>
                    <?php
                            }
                            include 'candidate_upd.php';
                        }
                        echo "</table>";
                    } else {
                        echo "no records inserted";

                        // resetting counter when there are no records
                        $res = $conn->query("ALTER TABLE candidate_information AUTO_INCREMENT = 1");
                        $res = $conn->query("ALTER TABLE candidate_qualifications AUTO_INCREMENT = 1");
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


    <!-- Modal -->
    <div class="modal fade" id="modal_insert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate form: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-5 my-2 border">
                        <h2>Enter your details here:</h2><br>
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
                                <label for="phnum" class="form-label">Phone number: (+91) </label>
                                <input type="number_format" class="form-control" id="phnum" name="phnumber" minlength="10" maxlength="10" required>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="workexp" class="form-label">Total work experience (in years): </label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="workexp" name="workexperience" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="qualif" class="form-label">Qualifications: </label>
                                <input type="text" class="form-control" id="qualif" name="qualifications" required>
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
    </div>

    <!-- scripts -->
    <?php include 'scripts.php'; ?>
    <!-- /.scripts -->
</body>

</html>