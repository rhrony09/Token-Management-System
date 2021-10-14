<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM swing_master WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Swing master deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select swing master to delete first';
}

header('location: swing_master.php');
