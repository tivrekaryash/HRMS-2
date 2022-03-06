<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-Edit Personal Salary -->
<div class="modal fade" id="modal_edit_personal_sal<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal Salary form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Edit Salary Amount:</h2><br>
                    <form name="desig_form" action="emp_desg_upd.php" method="POST">

                        <div class="form-group">
                            <label for="emp_fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="emp_fname_upd" name="emp_fname_upd" value="<?php echo $row["employee_name"] ?>" disabled>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="emp_psal_upd" class="form-label">Amount (Rs.): </label>
                            <input type="number" class="form-control" id="emp_psal_upd" name="emp_psal_upd" value="<?php echo $row["employee_name"] ?>" required>
                        </div>
                        <br>

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