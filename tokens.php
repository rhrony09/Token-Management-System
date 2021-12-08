<?php
include 'includes/session.php';
include 'includes/header.php';
$sql = "SELECT * FROM token ORDER BY id desc";
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
                <h1>All Tokens (<?= $query->num_rows ?>)</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">All Tokens</li>
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
                            <div class="box-header with-border not-print d-flex align-items-center">
                                <div class="col-xs-4">
                                    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> New</a>
                                </div>
                                <div class="col-xs-8 token-search">
                                    <form class="form-horizontal" method="POST" action="tokens_search.php" enctype="multipart/form-data">
                                        <div class="col-xs-3">
                                            <select class="form-control" name="search_for">
                                                <option value="" selected>- Select -</option>
                                                <option value="token_no">Token No</option>
                                                <option value="product_code">Product Code</option>
                                                <option value="length">Length</option>
                                                <option value="cutting">Cutting Master</option>
                                                <option value="embroidery">Embroidery Master</option>
                                                <option value="swing">Swing Master</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="query" placeholder="Search Query">
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="text" autocomplete="off" id="datepicker_add" class="form-control" name="date" placeholder="Date">
                                        </div>
                                        <div class="col-xs-1">
                                            <button type="submit" class="btn btn-primary btn-flat" name="search"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
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
                                            <th>Note</th>
                                            <th>Status</th>
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
                                                <td><?php echo $row['note']; ?></td>
                                                <td><?php echo echoStatus(); ?></td>
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