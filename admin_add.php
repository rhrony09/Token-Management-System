<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $filename = $_FILES['photo']['name'];
    if (!empty($filename)) {
        move_uploaded_file($_FILES['photo']['tmp_name'], './library/images/' . $filename);
    }

    //password hass
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (firstname, lastname, username, role, password, photo, created_on) VALUES ('$firstname', '$lastname', '$username', '$role', '$password', '$filename', NOW())";
    if ($role == 0 && $conn->query($sql)) {
        $_SESSION['success'] = 'Employee added successfully';
    } elseif ($role == 1 && $conn->query($sql)) {
        $_SESSION['success'] = 'Admin added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: admin.php');
