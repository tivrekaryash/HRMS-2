<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal update -->
<div class="modal fade" id="modal_update_qualif<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Qualifications Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update your qualification details here:</h2><br>
                    <form name="emp_upd" action="emp_upd_qualif_query.php" method="POST">

                        <div class="form-group">
                            <label for="fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="fname_upd" name="fname_upd" value="<?php echo $res["employee_name"]; ?>" disabled>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="qualif_upd" class="form-label">Qualifications: </label>
                            <input type="text" class="form-control" id="qualif_upd" name="qualif_upd" value="<?php echo $row["qualifications_file_location"]; ?>" required>
                        </div>
                        <br>

                        <input type="hidden" id="eid" name="eid" value="<?php echo $res["employee_id"]; ?>">

                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>