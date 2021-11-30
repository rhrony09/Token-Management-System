<?php
include 'includes/session.php';
if (isset($_GET['view'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM token WHERE id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    if ($query->num_rows <= 0) {
        $_SESSION['error'] = 'Invalid Token';
        header('location: tokens.php');
    }
} else {
    $_SESSION['error'] = 'Select Token first';
    header('location: tokens.php');
}

include 'includes/header.php';

function echo_status()
{
    global $row;
    if ($row['status'] != "") {
        echo $row['status'];
    } else {
        echo "N/A";
    }
}

function disableDeleteButton()
{
    global $row;
    if ($row['status'] == 'Stocked' || $row['status'] == 'Returned' || $row['status'] == 'Delivered') {
        return 'disabled';
    }
}
function disableUpdateButton()
{
    global $row;
    if ($row['status'] == 'Returned' || $row['status'] == 'Delivered') {
        return 'disabled';
    }
}

function disableStockedButton()
{
    global $row;
    if ($row['status'] == 'Stocked' || $row['status'] == 'Returned' || $row['status'] == 'Delivered' || $row['print_status'] == 0) {
        return 'disabled';
    }
}

function disableDeliveredButton()
{
    global $row;
    if ($row['status'] == 'Delivered' || $row['status'] == 'Returned' || $row['print_status'] == 0) {
        return 'disabled';
    }
}

function disableReturnedButton()
{
    global $row;
    if ($row['status'] == 'Returned' || $row['print_status'] == 0) {
        return 'disabled';
    }
}

function statusColor()
{
    global $row;
    if ($row['status'] == 'Delivered') {
        return "delivered";
    } elseif ($row['status'] == 'Returned') {
        return "returned";
    } elseif ($row['status'] == 'Stocked') {
        return "stocked";
    } else {
        return "default_status";
    }
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>View Token Details</h1>
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
                                <div class="col-xs-7">
                                    Order Date: <?= $row['order_date'] ?>
                                </div>
                                <div class="col-xs-5">
                                    Invoice No: <?= $row['invoice_no'] ?>
                                </div>
                                <div class="col-xs-7">
                                    Token No: <?= $row['token_no'] ?>
                                </div>
                                <div class="col-xs-5">
                                    Product Code: <?= $row['product_code'] ?>
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
                                <div class="col-xs-4">
                                    Cutting: <?= $row['cutting'] ?>
                                </div>
                                <div class="col-xs-3">
                                    Swing: <?= $row['swing'] ?>
                                </div>
                                <div class="col-xs-5">
                                    Embroidery: <?= $row['embroidery'] ?>
                                </div>
                                <div class="col-xs-12">
                                    Note: <?= $row['note'] ?>
                                </div>
                                <div class="col-xs-12">
                                    Status: <span class="<?= statusColor() ?>"><?= echo_status() ?></span>
                                </div>
                                <div class="col-xs-4">
                                    Stock Date: <?= $row['stock_date'] ?>
                                </div>
                                <div class="col-xs-3">
                                    Delivery Date: <?= $row['delivery_date'] ?>
                                </div>
                                <div class="col-xs-5">
                                    Return Date: <?= $row['return_date'] ?>
                                </div>
                                <div style="padding-top: 30px;" class="col-xs-12">
                                    <h3>Actions</h3>
                                    <hr>
                                    <a href='<?php echo "token_update.php?update=token&id=" . $id; ?>' class="btn btn-info <?= disableUpdateButton() ?>">Update</a>
                                    <a href='<?php echo "token_stocked.php?update=token&id=" . $id; ?>' class="btn btn-warning <?= disableStockedButton() ?>">Stocked</a>
                                    <a href='<?php echo "token_delivered.php?update=token&id=" . $id; ?>' class="btn btn-success <?= disableDeliveredButton() ?>">Delivered</a>
                                    <a href='<?php echo "token_returned.php?update=token&id=" . $id; ?>' class="btn btn-primary <?= disableReturnedButton() ?>">Returned</a>
                                    <?php if ($user['role'] == 1 && disableDeleteButton() != "disabled") : ?>
                                        <a href='<?php echo "token_delete.php?delete=token&id=" . $id; ?>' class="btn btn-danger">Delete</a>
                                    <? endif ?>
                                </div>
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