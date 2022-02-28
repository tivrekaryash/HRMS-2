<?php
// db connection file
require_once 'db_conn.php';
?>

<!-- Modal-Edit Salary -->
<div class="modal fade" id="modal_edit_sal<?php echo $row["salary_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Salary Edit form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Edit Salary:</h2><br>
                    <form name="desig_form" action="emp_sal_query.php" method="POST">

                        <div class="form-group">
                            <label for="emp_name_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="emp_name_upd" name="emp_name_upd" value="<?php echo $emprow["employee_name"] ?>" disabled>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="Sal_date_upd" class="form-label">Salary Date: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="Sal_date_upd" name="Sal_date_upd" value="<?php echo $row["salary_date"]; ?>" disabled>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="sal_amt_upd" class="form-label">Salary Amount (Rs.): </label>
                            <input type="number" class="form-control" id="sal_amt_upd" name="sal_amt_upd" value="<?php echo $row["salary_amount"]; ?>" required>
                        </div>
                        <br>

                        <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $row["salary_id"]; ?>">

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