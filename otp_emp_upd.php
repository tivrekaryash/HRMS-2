<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-Edit otp -->
<div class="modal fade" id="modal_edit_otpay<?php echo $row["otp_pay_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Overtime Pay Edit form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Edit Overtime Pay:</h2><br>
                    <form name="edit_otpay_form" action="otp_emp_upd_query.php" method="POST">

                        <div class="form-group">
                            <label for="otp_emp_name_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="otp_emp_name_upd" name="otp_emp_name_upd" value="<?php echo $emprow["employee_name"] ?>" disabled>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="otp_date_upd" class="form-label">Overtime Pay Date: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="otp_date_upd" name="otp_date_upd" value="<?php echo $row["otp_date"]; ?>" disabled>
                            </div>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="otp_hour_upd" class="form-label">Hours Worked: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="otp_hour_upd" name="otp_hour_upd" value="<?php echo $row["hrs_worked"]; ?>" disabled>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="otp_amt_upd" class="form-label">Total Amount (Rs.): </label>
                            <input type="number" class="form-control" id="otp_amt_upd" name="otp_amt_upd" value="<?php echo $row["total_amt"]; ?>" required>
                        </div>
                        <br>

                        <input type="hidden" id="otp_emp_id" name="otp_emp_id" value="<?php echo $row["otp_pay_id"]; ?>">

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