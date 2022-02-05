<!-- Modal-HisJob Insert -->
<div class="modal fade" id="modal_view_HisJob<?php echo $row["employee_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
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
                    <?php

                    // retrieves all job History information records
                    $result = $conn->query("SELECT * FROM job_history");

                    if ($result->num_rows > 0) {
                        // displaying header for tabular form
                        echo "<table style='text-align:center; background-color:white;' class='table table-bordered'>" . "<tr><th>" . "Employee ID" . "</th><th>" . "Employee" . "</th><th>" . "Designation" . "</th><th>" . "Start Date" . "</th></tr>";

                        // displaying data
                        while ($row = $result->fetch_assoc()) {

                            $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
                            $emprow = $res->fetch_assoc();
                            $res = mysqli_query($conn, "select * from designations where designation_id = '$row[designation_id]'");
                            $desrow = $res->fetch_assoc();

                            echo "<tr><td>" . $emprow["employee_id"] . "</td><td>" . $emprow["employee_name"] . "</td><td>" . $desrow["designation"] . "</td><td>" . $row["job_start_date"] . "</td>";

                    ?>
                            </tr>

                    <?php
                        }

                        echo "</table>";
                    } else {
                        echo "no records inserted";

                        // resetting counter in case there are no records (CHeck if there are any tables to be reset)
                        $res = $conn->query("ALTER TABLE job_history AUTO_INCREMENT = 1");
                    }

                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div><!-- /.Modal -->