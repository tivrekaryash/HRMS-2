<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-Designation Update -->
<div class="modal fade" id="modal_update_desg<?php echo $row["designation_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Designation Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update details here:</h2><br>
                    <form name="desg_upd_form" action="designation_upd_query.php" method="POST">

                        <div class="form-group">
                            <label for="deptname_upd" class="form-label">Department: </label>
                            <input type="text" class="form-control" id="deptname_upd" name="deptname_upd" value="<?php echo $res["department_name"]; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="desgname_upd" class="form-label">Designation: </label>
                            <input type="text" class="form-control" id="desgname_upd" name="desgname_upd" value="<?php echo $row["designation"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="basesal_upd" class="form-label">Base Salary: </label>
                            <input type="number" class="form-control" id="basesal_upd" name="basesal_upd" value="<?php echo $row["base_salary"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="otp_amt_upd" class="form-label">Overtime Pay: </label>
                            <input type="number" class="form-control" id="otp_amt_upd" name="otp_amt_upd" value="<?php echo $row["amt_per_hour"]; ?>" placeholder="Amount-per-hour(Rs)" required>
                        </div>
                        <br>

                        <input type="hidden" id="desgid" name="desgid" value="<?php echo $row["designation_id"]; ?>">

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
<!-- /.Modal -->