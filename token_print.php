<?php
include 'includes/session.php';
if (!isset($_GET['print'])) {
    $_SESSION['error'] = 'Nothing to Print';
    header('location: token_not_printed.php');
}
include 'includes/header.php';

$sql = "SELECT * FROM token WHERE print_status = 0";
$query = $conn->query($sql);
?>

<link rel="stylesheet" href="includes/token_print.css">

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <?php
                            $i = 0;
                            while ($row = $query->fetch_assoc()) {
                                $i++;
                                $id = $row['id'];
                                $status = "UPDATE token SET print_status = 1 WHERE id = $id";
                                $conn->query($status);
                            ?>
                                <div class="col-xs-6 pdf">
                                    <div class="col-xs-12 bordered">
                                        <div class="col-xs-7">
                                            Date: <?= $row['order_date'] ?>
                                        </div>
                                        <div class="col-xs-5">
                                            Invoice: <?= $row['invoice_no'] ?>
                                        </div>
                                        <div class="col-xs-7">
                                            Token: <?= $row['token_no'] ?>
                                        </div>
                                        <div class="col-xs-5">
                                            Code: <?= $row['product_code'] ?>
                                        </div>
                                        <div class="col-xs-2">
                                            Long: <?= $row['length'] ?>
                                        </div>
                                        <div class="col-xs-2">
                                            Body: <?= $row['body'] ?>
                                        </div>
                                        <div class="col-xs-3">
                                            Sleeve: <?= $row['sleeve'] ?>
                                        </div>
                                        <div class="col-xs-5">
                                            Color: <?= $row['color'] ?>
                                        </div>
                                        <div class="col-xs-7">
                                            Cutting: <?= $row['cutting'] ?>
                                        </div>
                                        <div class="col-xs-5">
                                            Swing: <?= $row['swing'] ?>
                                        </div>
                                        <div class="col-xs-12">
                                            Embroidery: <?= $row['embroidery'] ?>
                                        </div>
                                        <div class="col-xs-12">
                                            Note: <?= $row['note'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($i == 14 || $i == 28 || $i == 42) {
                                    echo "<div class='page-break'></div>";
                                }
                                ?>
                            <?php
                            }
                            ?>
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