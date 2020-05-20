<?php
if (isset($_POST['search-submit'])) {

    require 'dbh.inc.php';

    $emiratesId = $_POST['emiratesId'];

    // Search the Emirates ID in Database
    $sql = "SELECT * FROM students";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../dashboard.php?error=sqlerror");
        exit();
    } else {
        //mysqli_stmt_bind_param($stmt, "s", $emiratesId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        session_start();
        $_SESSION['searchResult'] = $result;
        $_SESSION['hasSearched'] = true;

        header("Location: ../dashboard.php");
        exit();
    }
} else {
    // If the user reach Here without Clicking Search Button
    header("Location: ../dashboard.php");
    exit();
}










