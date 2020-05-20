<?php

if (isset($_POST['edit-submit'])) {

    require 'dbh.inc.php';

    $recordId = $_POST['recordId'];
    $emiratesId = $_POST['emiratesId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $nationality = $_POST['nationality'];
    $job = $_POST['job'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $updateQuery = "UPDATE students SET first_name=?, last_name=?, emiratesid=?, 
                    nationality=?, phone=?, address=?, job=? WHERE id=?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $updateQuery)) {
        header("Location: ../editview.php?error=sqlerror");
        exit();
    } else {
        // **** run the Insert Statement ****
        mysqli_stmt_bind_param($stmt, "sssssssi", $firstName, $lastName, $emiratesId, $nationality
            , $phone, $address, $job, $recordId);

        if (mysqli_stmt_execute($stmt)) {
            // return user to new order page with Success Message
            header("Location: ../editview.php?transaction=success&id=". $recordId);
            exit();
        } else {
            header("Location: ../editview.php?error=inserterror");
            exit();
        }
    }
} else {
    // If the user reach Here without Clicking Sign UP Button
    header("Location: ../index.php");
    exit();
}