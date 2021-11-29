<?php
include 'includes/session.php';
include 'includes/header.php';
if (!isset($_POST['add']))
{
    header('location: token_add_new.php');
}

?>

<link rel="stylesheet" href="includes/token_print.css">

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
                                    $length = $_POST['length' . $x];
                                    $body = $_POST['body' . $x];
                                    $sleeve = $_POST['sleeve' . $x];
                                    $cutting = $_POST['cutting' . $x];
                                    $embroidery = $_POST['embroidery' . $x];
                                    $swing = $_POST['swing' . $x];
                                    $color = $_POST['color' . $x];
                                    $note = $_POST['note' . $x];

                                    //Token no Generate
                                    $token_count = "SELECT COUNT(*) as total FROM token";
                                    $token_count_queray = mysqli_query($conn, $token_count);
                                    $assoc = mysqli_fetch_assoc($token_count_queray);
                                    $token_no = str_pad(++$assoc['total'], 3, "0", STR_PAD_LEFT);

                                    ?>
                                    <?php
                                    if (!empty($invoice_no || $length)) : ?>
                                        <?php
                                        $sql = "INSERT INTO token (invoice_no, order_date, length, body, sleeve, cutting, embroidery, swing, token_no, product_code, note, color, created_on) VALUES ('$invoice_no', '$order_date', '$length', '$body', '$sleeve', '$cutting', '$embroidery', '$swing', '$token_no','$product_code','$note', '$color', NOW())";
                                        $conn->query($sql);
                                        ?>
                                        <div class="col-xs-4 pdf">
                                            <div class="col-xs-12 bordered">
                                                <div class="col-xs-7">
                                                    Date: <?= $order_date ?>
                                                </div>
                                                <div class="col-xs-5">
                                                    Invoice: <?= $invoice_no ?>
                                                </div>
                                                <div class="col-xs-7">
                                                    Token: <?= $token_no ?>
                                                </div>
                                                <div class="col-xs-5">
                                                    Code: <?= $product_code ?>
                                                </div>
                                                <div class="col-xs-2">
                                                    Long: <?= $length ?>
                                                </div>
                                                <div class="col-xs-2">
                                                    Body: <?= $body ?>
                                                </div>
                                                <div class="col-xs-3">
                                                    Sleeve: <?= $sleeve ?>
                                                </div>
                                                <div class="col-xs-5">
                                                    Color: <?= $color ?>
                                                </div>
                                                <div class="col-xs-7">
                                                    Cutting: <?= $cutting ?>
                                                </div>
                                                <div class="col-xs-5">
                                                    Swing: <?= $swing ?>
                                                </div>
                                                <div class="col-xs-12">
                                                    Embroidery: <?= $embroidery ?>
                                                </div>
                                                <div class="col-xs-12">
                                                    Note: <?= $note ?>
                                                </div>
                                            </div>
                                        </div>
                                    <? endif ?>
                                <? endfor ?>
                            <? endif ?>
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