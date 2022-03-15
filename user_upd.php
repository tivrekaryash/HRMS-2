 <!-- Modal-User Details update -->
 <div class="modal fade" id="modal_update_user<?php echo $row["user_id"]; ?>" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="overflow:hidden;">
     <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">User details Update form: </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container p-5 my-2 border">
                     <h2>Update your user details here:</h2><br>
                     <form name="user_upd_form" action="user_upd_query.php" method="POST">

                         <div class="form-group">
                             <label for="userrole_upd" class="form-label">Select Role: </label>
                             <select id="userrole_upd" class="form-control select2bs4" name="userrole_upd" style="width: 100%;" required>
                                 <?php
                                    // retrieving all roles
                                    $result = $conn->query("select * from user_role");

                                    while ($row = $result->fetch_assoc()) {
                                        // displaying each role in the list
                                        echo "<option value='$row[role_id]'>" . $row["role"] . "</option>";
                                    }
                                    ?>
                             </select>
                         </div><br>

                         <div class="form-group">
                             <label for="username_upd" class="form-label">User Name: </label>
                             <input type="text" class="form-control" id="username_upd" name="username_upd" required>
                         </div>
                         <br>

                         <div class="form-group">
                             <label for="pass_upd" class="form-label">Password: </label>
                             <input type="text" class="form-control" id="pass_upd" name="pass_upd" minlength="8" maxlength="15" placeholder="Minimum Password length is '8'" required>
                         </div>
                         <br>

                         <input type="hidden" id="us_id" name="us_id" value="<?php echo $row["role_id"]; ?>">

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