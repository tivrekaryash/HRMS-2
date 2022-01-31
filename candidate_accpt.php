   <!-- Modal-Acceptance -->
   <div class="modal fade" id="modal_accept<?php echo $row["candidate_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Acceptance form: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-5 my-2 border">
                        <h2>Assign designation:</h2><br>
                        <form name="accp_form" action="emp_info.php?acc=<?php echo $row["candidate_id"]; ?>" method="POST">

                            <div class="form-group">
                                <label for="fname" class="form-label">Full Name: </label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row["candidate_fullname"]; ?>" disabled>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="dname" class="form-label">Select Designation: </label>
                                <select id="dname" class="form-control select2bs4" name="dname" style="width: 100%;" required>
                                    <?php
                                    // retrieving all Designation
                                    $result = $conn->query("select * from designations");

                                    while ($row = $result->fetch_assoc()) {
                                        // displaying each Designation in the list
                                        echo "<option value = '$row[designation_id]'>" . $row["designation"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div><br>

                            <input type="hidden" id="canid" name="canid" value="<?php echo $row["candidate_id"]; ?>">

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