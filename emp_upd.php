<?php
// db connection file
include 'db_conn.php';

$res = $conn->query("select * from employee_phnum where employee_id = $row[employee_id]");
$res = $res->fetch_assoc();
?>

<!-- Modal update -->
<div class="modal fade" id="modal_update<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Update form: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Update your details here:</h2><br>
                    <form name="emp_upd" action=".php" method="POST">

                        <div class="form-group">
                            <label for="fullname" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="fname" name="fullname" value = "<?php echo $row["employee_name"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="dob" class="form-label">Date of Birth: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="dob" name="dateofbirth" value = "<?php echo $row["employee_dob"]; ?>" required>
                            </div>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="age" class="form-label">Age: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="age" name="age" value = "<?php echo $row["employee_age"]; ?>" required>
                            </div>
                        </div>
                        <br>

                        <div class="form-check">
                            <label for="gender" class="form-label">Gender: </label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender" name="gender" <?php if ($row["candidate_gender"]=="Male") echo "checked";?> value="Male">Male
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender" name="gender" <?php if ($row["candidate_gender"]=="Female") echo "checked";?> value="Female">Female
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender" name="gender" <?php if ($row["candidate_gender"]=="Others") echo "checked";?> value="Others">Others
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="address" class="form-label">Address: </label>
                            <textarea type="text" class="form-control" rows="5" cols="33" id="address" name="address" required><?php echo $row["employee_address"]; ?></textarea>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="email" class="form-label">Email address: </label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value = "<?php echo $row["employee_email"]; ?>" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_hm" class="form-label">Phone (Home) number: (+91) </label>
                            <input type="number_format" class="form-control" id="phnum_hm" name="phnum_hm" minlength="10" maxlength="10" value = "<?php echo $res["phnum_home"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_wk" class="form-label">Phone (work) number: (+91) </label>
                            <input type="number_format" class="form-control" id="phnum_wk" name="phnum_wk" minlength="10" maxlength="10" value = "<?php echo $res["phnum_work"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="phnum_mb" class="form-label">Phone (Mobile) number: (+91) </label>
                            <input type="number_format" class="form-control" id="phnum_mb" name="phnum_mb" minlength="10" maxlength="10" value = "<?php echo $res["phnum_mobile"]; ?>" required>
                        </div>
                        <br>


                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>