<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'User deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select Admin to delete first';
}

header('location: admin.php');
