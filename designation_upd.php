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
                            <label for="deptname_upd" class="form-label">Select Department: </label>
                            <select id="deptname_upd" class="form-control select2bs4" name="deptname_upd" style="width: 100%;" required>
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
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