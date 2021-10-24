<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM token WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Token deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select Token to delete first';
}

header('location: tokens.php');
