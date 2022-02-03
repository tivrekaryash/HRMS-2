<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-Set Designations -->
    <div class="modal fade" id="modal_set_desg" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
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
                        <h2>Assign designation:</h2><br>
                        <form name="set_desg_form" action="" method="POST">

                            <div class="form-group">
                                <label for="ename" class="form-label">Select Employee: </label>
                                <select id="ename" class="form-control select2bs4" name="ename" style="width: 100%;" required>
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
                                <label for="dpt" class="form-label">Select Department: </label>
                                <select id="dpt" class="form-control select2bs4" name="dpt" style="width: 100%;" required>
                                    <?php
                                    // retrieving all Designation
                                    $result = $conn->query("select * from departments");

                                    while ($row = $result->fetch_assoc()) {
                                        // displaying each Designation in the list
                                        echo "<option value = '$row[department_id]'>" . $row["department_name"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="desg" class="form-label">Select Designation: </label>
                                <select id="desg" class="form-control select2bs4" name="desg" style="width: 100%;" required>
                                    <?php
                                    // retrieving all Designation
                                    $result = $conn->query("select * from designations");

                                    while ($row = $result->fetch_assoc()) {
                                        // displaying each Designation in the list
                                        echo "<option value = '$row[designation_id]'>" . $row["designation"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div><br>

                            <input type="hidden" id="empid" name="empid" value="<?php echo $row["employee_id"]; ?>">

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

<!-- Modal-Update Designations -->
<div class="modal fade" id="modal_update_desg<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
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
                    <h2>Assign designation:</h2><br>
                    <form name="desg_form" action="#" method="POST">

                        <div class="form-group">
                            <label for="fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="fname_upd" name="fname_upd" disabled>
                        </div>
                        <br>


                        <div class="form-group">
                            <label for="dpt_upd" class="form-label">Select Department: </label>
                            <select id="dpt_upd" class="form-control select2bs4" name="dpt_upd" style="width: 100%;" required>
                                <?php
                                // retrieving all Designation
                                $result = $conn->query("select * from departments");

                                while ($row = $result->fetch_assoc()) {
                                    // displaying each Designation in the list
                                    echo "<option value = '$row[department_id]'>" . $row["department_name"] . "</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <div class="form-group">
                            <label for="desg_upd" class="form-label">Select Designation: </label>
                            <select id="desg_upd" class="form-control select2bs4" name="desg_upd" style="width: 100%;" required>
                                <?php
                                // retrieving all Designation
                                $result = $conn->query("select * from designations");

                                while ($row = $result->fetch_assoc()) {
                                    // displaying each Designation in the list
                                    echo "<option value = '$row[designation_id]'>" . $row["designation"] . "</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <input type="hidden" id="empid" name="empid" value="<?php echo $row["employee_id"]; ?>">

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