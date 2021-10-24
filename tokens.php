<?php
include 'includes/session.php';
include 'includes/header.php';
$sql = "SELECT * FROM token";
$query = $conn->query($sql);
?>

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
                            <div class="box-header with-border">
                                <a href="token_add_new.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Created On</th>
                                            <th>Created By</th>
                                            <th>Invoice No</th>
                                            <th>Order Date</th>
                                            <th>Product Code</th>
                                            <th>Customer Name</th>
                                            <th>Length</th>
                                            <th>Body</th>
                                            <th>Sleeve</th>
                                            <th>Cutting</th>
                                            <th>Embroidery</th>
                                            <th>Swing</th>
                                            <th>Token No</th>
                                            <th>Note</th>
                                            <?php if ($user['role'] == 1) : ?>
                                                <th>Action</th>
                                            <? endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM token ORDER BY id desc";
                                        $query = $conn->query($sql);

                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['created_on']; ?></td>
                                                <td><?php echo $row['created_by']; ?></td>
                                                <td><?php echo $row['invoice_no']; ?></td>
                                                <td><?php echo $row['order_date']; ?></td>
                                                <td><?php echo $row['product_code']; ?></td>
                                                <td><?php echo $row['customer_name']; ?></td>
                                                <td><?php echo $row['length']; ?></td>
                                                <td><?php echo $row['body']; ?></td>
                                                <td><?php echo $row['sleeve']; ?></td>
                                                <td><?php echo $row['cutting']; ?></td>
                                                <td><?php echo $row['embroidery']; ?></td>
                                                <td><?php echo $row['swing']; ?></td>
                                                <td><?php echo $row['token_no']; ?></td>
                                                <td><?php echo $row['note']; ?></td>
                                                <?php if ($user['role'] == 1) : ?>
                                                    <td>
                                                        <a href='<?php echo "token_delete.php?delete=role&id=" . $row['id']; ?>' class=" btn btn-danger btn-sm delete btn-flat"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                <? endif ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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