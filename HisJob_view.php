<!-- Modal-HisJob Insert -->
<div class="modal fade" id="modal_insert_HisJob" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job History: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container p-5 my-2 border">
                    <h2>Job History Record:</h2><br>
                    <form name="HisJob_form" action="HisJob_insert.php" method="POST">

                        <div class="form-group">
                            <label for="ename" class="form-label">Select Employee: </label>
                            <select id="ename" class="form-control select2bs4" name="ename" style="width: 100%;" required>
                                <?php
                                // retrieving all employee_information
                                $result = $conn->query("select * from employee_information");

                                while ($row = $result->fetch_assoc()) {
                                    // displaying each employee_information in the list
                                    echo "<option value = '$row[employee_id]'>" . $row["employee_name"] . "</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <div class="form-inline">
                            <label for="start" class="form-label">Start Date : </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="start" name="start" required>
                            </div>
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