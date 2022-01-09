<?php
// db connection file
include 'db_conn.php';

// retrieves employee id to be updated from emp_details.php
$upd_id = $_GET['upd'];

// sending employee id to be updated to emp_update_2.php
session_start();
$_SESSION['upd_id'] = $upd_id;

// Fetching existing employee information
$sql = "SELECT * FROM employee_information WHERE employee_id='$upd_id'";
$res = $conn->query($sql);
$updData = $res->fetch_assoc();

$fullname = $updData['employee_name'];
$dateofbirth = $updData['employee_dob'];
$age = $updData['employee_age'];
$gender = $updData['employee_gender'];
$address = $updData['employee_address'];
$email = $updData['employee_email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // function to perform validations
    function checkForm() {
      var fname = document.forms["emp_upd"]["fullname"].value;
      var age = document.forms["emp_upd"]["age"].value;
      var email = document.forms["emp_upd"]["email"].value;

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

</head>

<body>
  <div class="container p-1 my-1" style="margin-left: 30px">
    <button id="home" type="button" class="btn btn-outline-danger">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"></path>
      </svg>
      Home
    </button>
    <script type="text/javascript">
      document.getElementById("home").onclick = function() {
        location.href = "Dashboard_test.php";
      };
    </script>
    <br><br>
  </div>
  
  <div class="container p-5 my-2 border">
    <h2>Update your details here:</h2><br>

    <form name="emp_upd" onsubmit="return checkForm()" href="emp_update_2.php?upd=<?php echo $upd_id; ?>" action="emp_update_2.php" method="POST">

      <div>
        <label for="fullname" class="form-label">Full Name: </label>
        <input type="text" class="form-control" id="fname" name="fullname" value="<?php echo $fullname; ?>" required>
      </div>
      <br>

      <label for="select_desg" class="form-label">Designation list (select one):</label>
      <div class="col-sm-4">
        <input class="form-control" list="datalistOptions" id="select_desg" name="select_desg" placeholder="Type to search...">
        <datalist id="datalistOptions">

          <?php
          // retrieves all employee information records
          $sql = "SELECT * FROM employee_information order by employee_name";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo "<option value = '$row[employee_name]'>";
          }
          ?>

        </datalist>
      </div>
      <br>

      <div>
        <label for="dob" class="form-label">Date of Birth: </label>
        <div class="col-sm-2">
          <input type="date" class="form-control" id="dob" name="dateofbirth" value="<?php echo $dateofbirth; ?>" required>
        </div>
      </div>
      <br>

      <div>
        <label for="age" class="form-label">Age: </label>
        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
      </div>
      <br>

      <span>
        <label for="gender" class="form-label">Gender: </label>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="gender" name="gender" value="Male" checked>Male
          <label class="form-check-label" for="radio1"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="gender" name="gender" value="Female">Female
          <label class="form-check-label" for="radio1"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="gender" name="gender" value="Others">Others
          <label class="form-check-label" for="radio1"></label>
        </div>
      </span>
      <br>

      <div>
        <label for="address" class="form-label">Address: </label>
        <textarea type="text" class="form-control" rows="5" cols="33" id="address" name="address" required><?php echo $address; ?></textarea>
      </div>
      <br>

      <div>
        <label for="email" class="form-label">Email address: </label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>
      <br>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
</body>

</html>