<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-overtime Update -->
<div class="modal fade" id="modal_update_otp<?php echo $row["set_pay_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Overtime Pay Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update details here:</h2><br>
                    <form name="dept_upd_form" action="overtimetp_update.php" method="POST">

                        <div class="form-group">
                            <label for="otpdesig_upd" class="form-label">Select Designation: </label>
                            <select id="otpdesig_upd" class="custom-select" name="otpdesig_upd" style="width:100%;" required>
                                <?php
                                // retrieving all Designation
                                $result_des = $conn->query("select * from designations");

                                while ($row_des = $result_des->fetch_assoc()) {
                                    // displaying each Designation in the list
                                    if ($row["designation_id"] == $row_des["designation_id"])
                                        echo "<option value = '$row_des[designation_id]' selected='selected'>" . $row_des["designation"] . "</option>";
                                    else
                                        echo "<option value = '$row_des[designation_id]'>" . $row_des["designation"] . "</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <div class="form-inline">
                            <label for="otpamt_upd" class="form-label">Amount-Per-Hour(Rs): </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="otpamt_upd" name="otpamt_upd" required>
                            </div>
                        </div>
                        <br>

                        <input type="hidden" id="otpid" name="otpid" value="<?php echo $row["set_pay_id"]; ?>">

                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Modal -->