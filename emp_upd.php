<?php
// db connection file
require_once 'db_conn.php';

$res = $conn->query("select * from employee_phnum where employee_id = $row[employee_id]");
$res = $res->fetch_assoc();
?>

<script>
    // function to perform validations
    function checkForm() {
        var fname = document.forms["emp_upd"]["fname_upd"].value;
        var age = document.forms["emp_upd"]["age_upd"].value;
        var email = document.forms["emp_upd"]["email_upd"].value;

        // checking for digits in full name
        if (!(/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/.test(fname))) {
            window.alert("Full name is invalid");
            return false;
        }

        // checking for age, valid age is 18 to 60
        if (!(/^\d{2}$/.test(age)) || age > 60 || age < 18) {
            window.alert("age is invalid");
            return false;
        }

        // checking validity of email
        if (!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(email))) {
            window.alert("email is invalid");
            return false;
        }

        return true;
    }
</script>

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
                    <form name="emp_upd" onsubmit="return checkForm()" action="emp_upd_query.php" method="POST">

                        <div class="form-group">
                            <label for="fname_upd" class="form-label">Full Name: </label>
                            <input type="text" class="form-control" id="fname_upd" name="fname_upd" value="<?php echo $row["employee_name"]; ?>" required>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label for="dob_upd" class="form-label">Date of Birth: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="dob_upd" name="dob_upd" value="<?php echo $row["employee_dob"]; ?>" required>
                            </div>
                        </div>
                        <br>

                        <div class="form-check">
                            <label for="gender_upd" class="form-label">Gender: </label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender_upd" name="gender_upd" <?php if ($row["employee_gender"] == "Male") echo "checked"; ?> value="Male">Male
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender_upd" name="gender_upd" <?php if ($row["employee_gender"] == "Female") echo "checked"; ?> value="Female">Female
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender_upd" name="gender_upd" <?php if ($row["employee_gender"] == "Others") echo "checked"; ?> value="Others">Others
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="address_upd" class="form-label">Address: </label>
                            <textarea type="text" class="form-control" rows="5" cols="33" id="address_upd" name="address_upd" required><?php echo $row["employee_address"]; ?></textarea>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="email_upd" class="form-label">Email address: </label>
                            <input type="email" class="form-control" id="email_upd" name="email_upd" aria-describedby="emailHelp" value="<?php echo $row["employee_email"]; ?>" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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