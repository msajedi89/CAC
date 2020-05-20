<?php

require'includes/dbh.inc.php';

if (isset($_POST['search-submit'])) {

    $emiratesId = $_POST['emiratesId-search'];
    $firstName = $_POST['firstName-search'];
    $lastName = $_POST['lastName-search'];
    $nationality = $_POST['nationality-search'];
    $job = $_POST['job-search'];
    $phone = $_POST['phone-search'];
    $address = $_POST['address-search'];

    // Search by Emirates ID
    if ($emiratesId != "") {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (emiratesid LIKE '%$emiratesId%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by First Name
    if ($firstName != "") {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (first_name LIKE '%$firstName%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by Last Name
    if ($lastName != "") {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (last_name LIKE '%$lastName%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    // Search by First name AND Last name
    if (($firstName != "") && ($lastName != "")) {
        $sql = "SELECT * FROM students WHERE (first_name LIKE '%$firstName%') AND (last_name LIKE '%$lastName%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by Nationality
    if ($nationality != "") {
        $sql = "SELECT * FROM students WHERE (nationality LIKE '%$nationality%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    // Search by First name AND Nationality
    if (($firstName != "") && ($nationality != "")) {
        $sql = "SELECT * FROM students WHERE (first_name LIKE '%$firstName%') AND (nationality LIKE '%$nationality%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    // Search by Nationality AND Last name
    if (($lastName != "") && ($nationality != "")) {
        $sql = "SELECT * FROM students WHERE (last_name LIKE '%$lastName%') AND (nationality LIKE '%$nationality%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    // Search by Nationality AND First name AND Last name
    if (($firstName != "") && ($lastName != "") && ($nationality != "")) {
        $sql = "SELECT * FROM students WHERE (first_name LIKE '%$firstName%') AND (last_name LIKE '%$lastName%') AND (nationality LIKE '%$nationality%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by Job
    if ($job != "") {
        $sql = "SELECT * FROM students WHERE (job LIKE '%$job%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by Phone
    if ($phone != "") {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (phone LIKE '%$phone%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Search by Home Address
    if ($address != "") {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (address LIKE '%$address%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    // Search by Nationality AND Job
    if (($nationality != "") && ($job != "")) {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (nationality LIKE '%$nationality%') AND (job LIKE '%$job%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    
    // Search by Nationality AND Home Address
    if (($nationality != "") && ($address != "")) {
        // Search the Emirates ID in Database
        $sql = "SELECT * FROM students WHERE (nationality LIKE '%$nationality%') AND (address LIKE '%$address%')";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }
    }
    
    

} else {

    $sql = "SELECT * FROM students";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Import Data From Excel or CSV File to Mysql</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <script src='js/Chart.min.js'></script>
    <script src='js/utils.js'></script>
</head>
<body>
    <aside class="side-nav" id="show-side-navigation1">
  <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
  <div class="heading">
    <img src="http://clipart-library.com/images/kTKo7BB8c.png" alt="">
    <div class="info">
      <h3><a href="#">Admin</a></h3>
      <p>Administrator.</p>
    </div>
  </div>
        <ul class="categories">
            <li>
                <a href="/dashboard.php"><img src="images/dashboard-24.png" alt=""> &nbsp;&nbsp;&nbsp;  Dashboard        </a>
            </li>
            <li>
                <a href="/search.php"><img src="images/search-24.png" alt=""> &nbsp;&nbsp;&nbsp;  Search        </a>
            </li>
        </ul>
</aside>

<section id="contents">

  
  <section class="admins">
    <div class="container-fluid">
      <div class="">
    <div class="panel panel-default">
        <div class="panel-heading">
         <div class="welcome">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-1"><img class="mb-4" src="images/logocac.png" alt="" width="90" height="90"></div>
        <div class="col-md-11">
          <div class="content">
            <a href="importview.php" class="btn btn-primary" role="button">Import New Persons</a>
                               <a href="index.php" class="btn btn-danger" role="button" style="margin-left: 10px;">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
        <div class="panel-body">
            <div class="table-responsive">
                <span id="message"></span>
                <br />
                <form method="post" class="form-search table-dark" novalidate>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div>
                                    <label for="firstName">Emirates ID/ Passport No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="emiratesId-search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="lastName">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="firstName-search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="firstName">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="lastName-search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="lastName">Nationality</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nationality-search">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="firstName">Job</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="job-search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="firstName">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone-search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="firstName">Home Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address-search">
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="firstName" style="font-size: x-large; color: #fff;">Total</label>
                                    <div class="input-group">
                                        <p style="color: black;"> <span style="font-size: x-large; color: #fff;"> Results : <?php echo $result->num_rows; ?></span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px; text-align: center; padding-bottom: 20px;">
                            <button name="search-submit" class="btn btn-success" style="width: 200px; margin-left: 20px;" type="submit">Search</button>
                            <button name="cancel-submit" class="btn btn-primary" style="width: 100px; margin-left: 20px;" type="submit">Clear</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive " style="margin-bottom: 50px;">
        <table class="table table-dark table-hover table-striped">
            <thead>
            <tr >
                <th>Emirates ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nationality</th>
                <th>Job</th>
                <th>Phone No</th>
                <th>Home Address</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>

            <?php $i=0; ?>
            <?php foreach ($result as $student): ?>
                <?php $i = $i + 1; ?>
                <?php if (($i % 2) == 0): ?>
                    <tr>
                        <td><?php echo $student['emiratesid']; ?></td>
                        <td><?php echo $student['first_name']; ?></td>
                        <td><?php echo $student['last_name']; ?></td>
                        <td><?php echo $student['nationality']; ?></td>
                        <td><?php echo $student['job']; ?></td>
                        <td><?php echo $student['phone']; ?></td>
                        <td><?php echo $student['address']; ?></td>
                        <td><a href="editview.php?id=<?php echo $student['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                    </tr>
                <?php else: ?>
                    <tr >
                        <td><?php echo $student['emiratesid']; ?></td>
                        <td><?php echo $student['first_name']; ?></td>
                        <td><?php echo $student['last_name']; ?></td>
                        <td><?php echo $student['nationality']; ?></td>
                        <td><?php echo $student['job']; ?></td>
                        <td><?php echo $student['phone']; ?></td>
                        <td><?php echo $student['address']; ?></td>
                        <td><a href="editview.php?id=<?php echo $student['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    
</div>

  
    </div>



<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>