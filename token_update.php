<?php
include 'includes/session.php';

if (isset($_GET['update'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM token WHERE id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    if ($row['status'] == 'Returned' || $row['status'] == 'Delivered' || $query->num_rows <= 0) {
        $_SESSION['error'] = "You don't have permission to edit.";
        header('location: tokens.php');
    }
} else {
    $_SESSION['error'] = 'Select Token first';
    header('location: tokens.php');
}

function statusColor()
{
    global $row;
    if ($row['status'] == 'Stocked') {
        echo "stocked";
    } elseif ($row['status'] == 'Delivered') {
        echo "delivered";
    } elseif ($row['status'] == 'Returned') {
        echo "returned";
    } else {
        echo "default_status";
    }
}

include 'includes/header.php';
?>

<style>
    .token-view .col-xs-1,
    .token-view .col-xs-10,
    .token-view .col-xs-11,
    .token-view .col-xs-2,
    .token-view .col-xs-3,
    .token-view .col-xs-4,
    .token-view .col-xs-5,
    .token-view .col-xs-6,
    .token-view .col-xs-7,
    .token-view .col-xs-8,
    .token-view .col-xs-9,
    .token-view .col-xs-12 {
        padding: 0;
        margin: 2px 0;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Edit Token No: <?= $row['token_no'] ?></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">View Token</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>

                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body token-view">
                                <form class="form-horizontal" method="POST" action="token_edit_process.php" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="col-xs-7">
                                        <div class="col-xs-3">Order Date:</div>
                                        <div class="col-xs-4">
                                            <div class='input-group date'>
                                                <input type="text" autocomplete="off" class="form-control" id="datepicker_add" name="order_date" value="<?= $row['order_date'] ?>">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="col-xs-4">Invoice No:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="invoice_no" name="invoice_no" value="<?= $row['invoice_no'] ?>"></div>
                                    </div>
                                    <div class="col-xs-7">
                                        Token No: <?= $row['token_no'] ?>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="col-xs-4">Product Code:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="product_code" name="product_code" value="<?= $row['product_code'] ?>"></div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="col-xs-4">Long:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="length" name="length" value="<?= $row['length'] ?>"></div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="col-xs-4">Body:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="body" name="body" value="<?= $row['body'] ?>"></div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="col-xs-4">Sleeve:</div>
                                        <div class="col-xs-3"><input type="text" class="form-control" id="sleeve" name="sleeve" value="<?= $row['sleeve'] ?>"></div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="col-xs-4">Color:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="color" name="color" value="<?= $row['color'] ?>"></div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="col-xs-3">Cutting:</div>
                                        <div class="col-xs-5"><input type="text" class="form-control" id="cutting" name="cutting" value="<?= $row['cutting'] ?>"></div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="col-xs-4">Swing:</div>
                                        <div class="col-xs-7"><input type="text" class="form-control" id="swing" name="swing" value="<?= $row['swing'] ?>"></div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="col-xs-4">Embroidery:</div>
                                        <div class="col-xs-4"><input type="text" class="form-control" id="embroidery" name="embroidery" value="<?= $row['embroidery'] ?>"></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-1">Note:</div>
                                        <div class="col-xs-6"><input type="text" class="form-control" id="note" name="note" value="<?= $row['note'] ?>"></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-1">Status:</div>
                                        <div class="col-xs-6"><input type="text" class="form-control" id="status" name="status" value="<?= $row['status'] ?>"></div>
                                    </div>
                                    <div style="margin-top: 50px;" class="col-xs-12">
                                        <button type="submit" class="btn btn-info" name="update">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- right col -->
        </div>
        <?php include 'includes/footer.php'; ?>

    </div>
    <!-- ./wrapper -->


    <?php include 'includes/scripts.php'; ?>

</body>

</html>