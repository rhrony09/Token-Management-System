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
        return $row['status'];
    } else {
        return "N/A";
    }
}

function echo_print_status()
{
    global $row;
    if ($row['print_status'] == 0) {
        return 'Not Printed';
    } elseif ($row['print_status'] == 1) {
        return 'Printed';
    } else {
        return 'N/A';
    }
}

function echo_date($x)
{
    $date = date_create($x);
    return date_format($date, "d M, Y");
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
    if ($row['status'] == 'Delivered' || $row['print_status'] == 0) {
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
                                <div class="col-xs-4">
                                    Status: <span class="<?= statusColor() ?>"><?= echo_status() ?></span>
                                </div>
                                <div class="col-xs-8">
                                    Print Status: <?= echo_print_status() ?>
                                </div>
                                <div class="col-xs-4">
                                    Stock Date: <?= echo_date($row['stock_date']) ?>
                                </div>
                                <div class="col-xs-3">
                                    Delivery Date: <?= echo_date($row['delivery_date']) ?>
                                </div>
                                <div class="col-xs-5">
                                    Return Date: <?= echo_date($row['return_date']) ?>
                                </div>
                                <div style="padding-top: 30px;" class="col-xs-12">
                                    <h3>Actions</h3>
                                    <hr>
                                    <a href='<?php echo "token_update.php?update=token&id=" . $id; ?>' class="btn btn-info <?= disableUpdateButton() ?>">Update</a>
                                    <button class="stock-btn btn btn-warning" data-id="<?= $id ?>" <?= disableStockedButton() ?>>Stocked</button>
                                    <button class="deliver-btn btn btn-success" data-id="<?= $id ?>" <?= disableDeliveredButton() ?>>Delivered</button>
                                    <button class="return-btn btn btn-primary" data-id="<?= $id ?>" <?= disableReturnedButton() ?>>Returned</button>
                                    <?php if ($user['role'] == 1 && disableDeleteButton() != "disabled") : ?>
                                        <button class="delete-btn btn btn-danger" data-id="<?= $id ?>">Delete</button>
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
    <script>
        $(".stock-btn").click(function() {
            var dataId = $(this).attr("data-id");
            Swal.fire({
                title: 'Are you sure?',
                text: "Status will be changed to Stocked!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Updated!',
                        'Status has been Updated.',
                        'success',
                        window.location.href = "token_stocked.php?update=token&id=" + dataId
                    )
                }
            })
        });
        $(".deliver-btn").click(function() {
            var dataId = $(this).attr("data-id");
            Swal.fire({
                title: 'Are you sure?',
                text: "Status will be changed to Delivered!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Updated!',
                        'Status has been Updated.',
                        'success',
                        window.location.href = "token_delivered.php?update=token&id=" + dataId
                    )
                }
            })
        });
        $(".return-btn").click(function() {
            var dataId = $(this).attr("data-id");
            Swal.fire({
                title: 'Are you sure?',
                text: "Status will be changed to Returned!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Updated!',
                        'Status has been Updated.',
                        'success',
                        window.location.href = "token_returned.php?update=token&id=" + dataId
                    )
                }
            })
        });
        $(".delete-btn").click(function() {
            var dataId = $(this).attr("data-id");
            Swal.fire({
                title: 'Are you sure?',
                text: "This token will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Token has been Deleted.',
                        'success',
                        window.location.href = "token_delete.php?delete=token&id=" + dataId
                    )
                }
            })
        });
    </script>

</body>

</html>