<?php
// db connection file
require_once 'db_conn.php';
?>

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
                    <form name="desig_form" action="emp_desg_upd.php" method="POST">

                        <div class="form-group">
                            <label for="emp_fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="emp_fname_upd" name="emp_fname_upd" value="<?php echo $row["employee_name"] ?>" disabled>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="desig_upd" class="form-label">Select Designation: </label>
                            <select id="desig_upd" class="form-control select2bs4" name="desig_upd" style="width: 100%;" required>
                                <?php
                                // retrieving all Designation
                                $result_des = $conn->query("select * from designations");

                                while ($row_des = $result_des->fetch_assoc()) {
                                    // displaying each Designation in the list
                                    if($row["designation_id"] == $row_des["designation_id"])
                                        echo "<option value = '$row_des[designation_id]' selected='selected'>" . $row_des["designation"] . "</option>";
                                    else
                                        echo "<option value = '$row_des[designation_id]'>" . $row_des["designation"] . "</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $row["employee_id"]; ?>">

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