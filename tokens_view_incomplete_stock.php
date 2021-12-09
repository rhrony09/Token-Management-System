<?php
include 'includes/session.php';
include 'includes/header.php';

$sql = "SELECT * FROM token WHERE status = '' UNION SELECT * FROM token WHERE status IS NULL";
$query = $conn->query($sql);
?>

<link rel="stylesheet" href="includes/token_list_print.css">

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Incomplete Stock (<?= $query->num_rows ?>)</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Incomplete Stock</li>
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
                            <div class="box-header with-border not-print">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="token-list">
                                    <thead>
                                        <tr>
                                            <th class="not-print">Action</th>
                                            <th>Token</th>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Code</th>
                                            <th>Long</th>
                                            <th>Body</th>
                                            <th>Sleeve</th>
                                            <th>Color</th>
                                            <th>Cutting</th>
                                            <th>Embroidery</th>
                                            <th>Swing</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function echoStatus()
                                        {
                                            global $row;
                                            if ($row['status'] == 'Returned') {
                                                $status = $row['status'] . "<span class='status-date'>" . $row['return_date'] . "</span>";
                                                return $status;
                                            } elseif ($row['status'] == 'Delivered') {
                                                $status = $row['status'] . "<span class='status-date'>" . $row['delivery_date'] . "</span>";
                                                return $status;
                                            } elseif ($row['status'] == 'Stocked') {
                                                $status = $row['status'] . "<span class='status-date'>" . $row['stock_date'] . "</span>";
                                                return $status;
                                            } else {
                                                $status = $row['status'];
                                                return $status;
                                            }
                                        }
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="not-print">
                                                    <a href='<?php echo "token_view.php?view=token&id=" . $row['id']; ?>' class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i> View</a>
                                                </td>
                                                <td><?php echo $row['token_no']; ?></td>
                                                <td><?php echo $row['order_date']; ?></td>
                                                <td><?php echo $row['invoice_no']; ?></td>
                                                <td><?php echo $row['product_code']; ?></td>
                                                <td><?php echo $row['length']; ?></td>
                                                <td><?php echo $row['body']; ?></td>
                                                <td><?php echo $row['sleeve']; ?></td>
                                                <td><?php echo $row['color']; ?></td>
                                                <td><?php echo $row['cutting']; ?></td>
                                                <td><?php echo $row['embroidery']; ?></td>
                                                <td><?php echo $row['swing']; ?></td>
                                                <td><?php echo echoStatus(); ?></td>
                                                <td><?php echo $row['note']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="col-xs-12 text-center not-print" style="padding: 30px 0 20px 0">
                                    <button class="btn btn-primary btn-md" onclick="window.print()">Print All</button>
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
    <?php include 'includes/token_modal.php'; ?>

</body>

</html>