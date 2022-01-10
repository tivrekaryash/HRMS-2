<!-- modal update -->
<div class="modal fade" id="modal_update<?php echo $row["candidate_id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate Update form: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-5 my-2 border">
                        <h2>Update your details here:</h2><br>
                        <form name="candidate_info" action="candidate_insert.php" method="POST">

                            <div class="form-group">
                                <label for="fullname" class="form-label">Full Name: </label>
                                <input type="text" class="form-control" id="fname_upd" name="fullname" value = "<?php echo $row["candidate_fullname"]; ?>" required>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="dob" class="form-label">Date of Birth: </label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="dob_upd" name="dateofbirth" value = "<?php echo $row["candidate_dob"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="age" class="form-label">Age: </label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="age_upd" name="age" value = "<?php echo $row["candidate_age"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-check">
                                <label for="gender" class="form-label">Gender: </label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender_upd" name="gender" value="Male" checked>Male
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender_upd" name="gender" value="Female">Female
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender_upd" name="gender" value="Others">Others
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="address" class="form-label">Address: </label>
                                <textarea type="text" class="form-control" rows="5" cols="33" id="address_upd" name="address" value = "<?php echo $row["candidate_address"]; ?>" required></textarea>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="phnum" class="form-label">Phone number: (+91) </label>
                                <input type="number_format" class="form-control" id="phnum_upd" name="phnumber" minlength="10" maxlength="10" value = "<?php echo $row["phnum"]; ?>" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email" class="form-label">Email address: </label>
                                <input type="email" class="form-control" id="email_upd" name="email" aria-describedby="emailHelp" value = "<?php echo $row["candidate_email"]; ?>" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <br>

                            <div class="form-inline">
                                <label for="workexp" class="form-label">Total work experience (in years): </label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="workexp_upd" name="workexperience" value = "<?php echo $row["experience_in_years"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="qualif" class="form-label">Qualifications: </label>
                                <input type="text" class="form-control" id="qualif_upd" name="qualifications" required>
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