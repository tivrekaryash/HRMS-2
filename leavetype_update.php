
<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- modal_upadte_leave_type -->
<div class="modal fade" id="modal_update_leavetype<?php echo $row["type_id"]; ?>" data-backdrop="static" data-keyboard="false" style="overflow:hidden;" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave Type Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Enter details here:</h2><br>
                    <form name="attendace_form" action="leavetype_update_query.php" method="POST">

                        <div class="form-group">
                            <label for="leavetype_upd" class="form-label">Leave type: </label>
                            <input type="text" class="form-control" id="leavetype_upd" name="leavetype_upd" value="<?php echo $row["types"] ?>" required>
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