<?php
include 'includes/session.php';
include 'includes/header.php';
if (!isset($_POST['add'])) {
    header('location: token_add_new.php');
}

?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <style>
                td {
                    border: 0 !important;
                }
            </style>
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body" style="max-width: 1300px;">
                            <?php
                            if (isset($_POST['add'])) : ?>
                                <?php for ($x = 1; $x <= 9; $x++) : ?>
                                    <?php
                                    $invoice_no = $_POST['invoice_no' . $x];
                                    $order_date = $_POST['order_date' . $x];
                                    $product_code = $_POST['product_code' . $x];
                                    $customer_name = $_POST['customer_name' . $x];
                                    $length = $_POST['length' . $x];
                                    $body = $_POST['body' . $x];
                                    $sleeve = $_POST['sleeve' . $x];
                                    $cutting = $_POST['cutting' . $x];
                                    $embroidery = $_POST['embroidery' . $x];
                                    $swing = $_POST['swing' . $x];
                                    $note = $_POST['note' . $x];

                                    //Token no Generate
                                    $token_count = "SELECT COUNT(*) as total FROM token";
                                    $token_count_queray = mysqli_query($conn, $token_count);
                                    $assoc = mysqli_fetch_assoc($token_count_queray);
                                    $numbers = str_pad(++$assoc['total'], 3, "0", STR_PAD_LEFT);
                                    $letters = 'Abohon-';
                                    $token_no = $letters . $numbers;

                                    //Get Who Created Token
                                    $created_by = $user['firstname'] . ' ' . $user['lastname'];
                                    ?>
                                    <?php
                                    if (!empty($invoice_no)) : ?>
                                        <?php
                                        $sql = "INSERT INTO token (invoice_no, order_date, customer_name, length, body, sleeve, cutting, embroidery, swing, token_no, product_code, note, created_by, created_on) VALUES ('$invoice_no', '$order_date', '$customer_name', '$length', '$body', '$sleeve', '$cutting', '$embroidery', '$swing', '$token_no','$product_code','$note', '$created_by', NOW())";
                                        $conn->query($sql);
                                        ?>
                                        <div style="width: 33.33%; font-size: 12px; float: left; padding: 15px 5px;">
                                            <table class="table table-bordered" style="margin: 0;">
                                                <tr>
                                                    <td class="table-borderless" colspan="3">Name: <?= $customer_name ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="2">Date: <?= $order_date ?></td>
                                                    <td class="table-borderless">Invoice: <?= $invoice_no ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="2">Token No: <?= $token_no ?></td>
                                                    <td class="table-borderless">Product: <?= $product_code ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless">Length: <?= $length ?></td>
                                                    <td class="table-borderless">Body: <?= $body ?></td>
                                                    <td class="table-borderless">Sleeve: <?= $sleeve ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="3">Cutting Master: <?= $cutting ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="3">Embroidery Master: <?= $embroidery ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="3">Swing Master: <?= $swing ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-borderless" colspan="3">Note: <?= $note ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <? endif ?>
                                <? endfor ?>
                            <? endif ?>
                        </div>
                    </div>
                </div>
            </div>

            </section>
            <!-- right col -->
        </div>

    </div>
    <!-- ./wrapper -->


    <?php include 'includes/scripts.php'; ?>

</body>

</html>