<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cutting_master WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Cutting master deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select cutting master to delete first';
}

header('location: cutting_master.php');
