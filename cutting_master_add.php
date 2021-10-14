<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO cutting_master (name, added_on) VALUES ('$name',NOW())";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Cutting Master added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: cutting_master.php');
