<!-- Modal update -->
<div class="modal fade" id="modal_update_dept<?php echo $row["department_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Department Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update details here:</h2><br>
                    <form name="emp_upd" onsubmit="return checkForm()" action="emp_upd_query.php" method="POST">

                        <div class="form-group">
                            <label for="deptname_upd" class="form-label">Department Name: </label>
                            <input type="text" class="form-control" id="deptname_upd" name="deptname_upd" value="<?php echo $row["department_name"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="deptloc_upd" class="form-label">Department Location: </label>
                            <textarea type="text" class="form-control" rows="5" cols="33" id="deptloc_upd" name="deptloc_upd"  required> <?php echo $row["department_location"]; ?> </textarea>
                        </div>
                        <br>

                        <input type="hidden" id="dptid" name="dptid" value="<?php echo $row["department_id"]; ?>">

                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>