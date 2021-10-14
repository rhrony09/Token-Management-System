<?php
include 'includes/session.php';

if (isset($_GET['edit'])) {
    $admin_id = $_GET['id'];
    $role = $_GET['role'];

    $sql = "UPDATE admin SET role = '$role' WHERE id = '$admin_id'";
    if ($role == 0 && $conn->query($sql)) {
        $_SESSION['success'] = 'User Permission set to Employee';
    } elseif ($role == 1 && $conn->query($sql)) {
        $_SESSION['success'] = 'User Permission set to Admin';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select Admin to edit first';
}

header('location: admin.php');
