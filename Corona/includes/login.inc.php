<?php
if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['username'];
    $pass = $_POST['pass'];

    // Check the fields Not to be Empty
    if (empty($mailuid) || empty($pass)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        // Check the Username in Database
        $sql = "SELECT * FROM tbl_users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            // Check for Results
            if ($row = mysqli_fetch_assoc($result)) {
                // Check Password
                $pwdCheck = $row['pass'];
                if ($pwdCheck == $pass) {
                    // *********** Success Login *********
                    // using session for checking login
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['family'] = $row['family'];
                    $_SESSION['profileImg'] = $row['profile_img'];
                    $_SESSION['userType'] = $row['user_type'];
                    
                    header("Location: ../dashboard.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

} else {
    // If the user reach Here without Clicking Login Button
    header("Location: ../index.php");
    exit();
}










