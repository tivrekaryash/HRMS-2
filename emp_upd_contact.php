<?php
// db connection file
require_once 'db_conn.php';

//$res = $conn->query("select * from employee_information where employee_id = $row[employee_id]");
//$res = $res->fetch_assoc();
?>

<!-- Modal update -->
<div class="modal fade" id="modal_update_contact<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update your contact details here:</h2><br>
                    <form name="emp_upd" action="emp_upd_cont_query.php" method="POST">

                        <div class="form-group">
                            <label for="fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="fname_upd" name="fname_upd" value="<?php echo $res["employee_name"]; ?>" disabled>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_hm" class="form-label">Phone (Home) number: (+91) </label>
                            <input type="tel" class="form-control" id="phnum_hm" name="phnum_hm" value="<?php echo $row["phnum_home"]; ?>"  maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter a valid 10 digits contact number">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_wk" class="form-label">Phone (work) number: (+91) </label>
                            <input type="tel" class="form-control" id="phnum_wk" name="phnum_wk" value="<?php echo $row["phnum_work"]; ?>"  maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter a valid 10 digits contact number" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_mb" class="form-label">Phone (Mobile) number: (+91) </label>
                            <input type="tel" class="form-control" id="phnum_mb" name="phnum_mb" value="<?php echo $row["phnum_mobile"]; ?>" maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter a valid 10 digits contact number">
                        </div>
                        <br>

                        <input type="hidden" id="eid" name="eid" value="<?php echo $row["employee_id"]; ?>">

                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>