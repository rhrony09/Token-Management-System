<?php
include 'includes/session.php';

if (isset($_GET['update']))
{
    $id = $_GET['id'];
    $sql = "UPDATE token SET status = 'Returned' WHERE id = '$id'";
    if ($conn->query($sql))
    {
        $_SESSION['success'] = 'Status update successfully';
    }
    else
    {
        $_SESSION['error'] = $conn->error;
    }
}
else
{
    $_SESSION['error'] = 'Select Token first';
}
$url = 'token_view.php?view=token&id=' . $id;

header("location: $url");
