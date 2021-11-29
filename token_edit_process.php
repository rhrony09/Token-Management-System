<?php
include 'includes/session.php';

if (isset($_POST['update']))
{
    $id = $_POST['id'];
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
    $status = $_POST['status'];

    $sql = "UPDATE token SET invoice_no = '$invoice_no', order_date = '$order_date', product_code = '$product_code', length = '$length', body = '$body', sleeve = '$sleeve', cutting = '$cutting', embroidery = '$embroidery', swing = '$swing', color = '$color', note = '$note', status = '$status' WHERE id = $id";
    if ($conn->query($sql))
    {
        $_SESSION['success'] = 'Token updated successfully';
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
