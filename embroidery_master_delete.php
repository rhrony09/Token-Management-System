<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM embroidery_master WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Embroidery master deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select embroidery master to delete first';
}

header('location: embroidery_master.php');
