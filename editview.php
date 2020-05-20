<?php
include 'includes/dbh.inc.php';

$recordId =  isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT * FROM students WHERE id=?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $recordId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $person = mysqli_fetch_assoc($result);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Edit Information</h2>
    </div>

    <div>
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">

                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "sqlerror") {
                        echo '<p style="color: red;">There is a Connection error, Please try again!</p>';
                    } elseif ($_GET['error'] == "inserterror") {
                        echo '<p style="color: red;">Invalid information provided, please check your data!</p>';
                    }
                } elseif (isset($_GET['transaction'])) {
                    if ($_GET['transaction'] == "success") {
                        echo '<div class="alert alert-success">Information has been updated...</div>';
                    }
                }
                ?>

                <form class="needs-validation" action="includes/edit.inc.php" method="post" novalidate>

                    <input name="recordId" type="hidden" value="<?php echo $person['id']; ?>">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="mb-3">
                                    <label for="emiratesId">Emirates ID/Passport No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="emiratesId" value="<?php echo $person['emiratesid']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Emirates ID!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="firstName">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="firstName" value="<?php echo $person['first_name']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid First Name!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="lastName">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="lastName" value="<?php echo $person['last_name']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Last Name!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nationality">Nationality</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nationality" value="<?php echo $person['nationality']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Nationality!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="job">Job</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="job" value="<?php echo $person['job']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Job!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $person['phone']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Phone!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" value="<?php echo $person['address']; ?>">
                                        <div class="invalid-feedback" style="width: 100%;">invalid Address!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary btn-lg btn-block" name="edit-submit" type="submit">Edit Information</button>
                    <div style="text-align: center; margin-top: 10px;">
                        <a href="search.php" role="button">Back to search</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js"></script>
<script src="js/form-validation.js"></script>
</body>
</html>
