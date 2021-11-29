<?php
include 'includes/session.php';

if (isset($_POST['add']))
{
    $invoice_no = $_POST['invoice_no'];
    $order_date = $_POST['order_date'];
    $product_code = $_POST['product_code'];
    $length = $_POST['length'];
    $body = $_POST['body'];
    $sleeve = $_POST['sleeve'];
    $cutting = $_POST['cutting'];
    $embroidery = $_POST['embroidery'];
    $swing = $_POST['swing'];
    $color = $_POST['color'];
    $note = $_POST['note'];

    //Token no Generate
    $token_count = "SELECT COUNT(*) as total FROM token";
    $token_count_queray = mysqli_query($conn, $token_count);
    $assoc = mysqli_fetch_assoc($token_count_queray);
    $token_no = str_pad(++$assoc['total'], 3, "0", STR_PAD_LEFT);

    $sql = "INSERT INTO token (invoice_no, order_date, length, body, sleeve, cutting, embroidery, swing, token_no, product_code, note, color, created_on) VALUES ('$invoice_no', '$order_date', '$length', '$body', '$sleeve', '$cutting', '$embroidery', '$swing', '$token_no','$product_code','$note', '$color', NOW())";
    if ($conn->query($sql))
    {
        $_SESSION['success'] = 'Token added successfully';
        header('location: token_not_printed.php');
    }
    else
    {
        $_SESSION['error'] = $conn->error;
        header('location: tokens.php');
    }
}
else
{
    $_SESSION['error'] = 'Fill up the form first';
    header('location: tokens.php');
}
