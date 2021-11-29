<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add New Tokens</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Add New Tokens</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error']))
                {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success']))
                {
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
                    <div class="col-xs-11">
                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal" method="POST" action="token_print.php" enctype="multipart/form-data">
                                    <?php
                                    for ($i = 1; $i <= 9; $i++) : ?>
                                        <section style="background-color: #e9e9e9; padding: 20px; margin: 10px 0;">
                                            <h3>For Product <?= $i ?></h3>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label for="invoice_no<?= $i ?>" class="control-label">Invoice Number</label>
                                                    <input type="text" class="form-control" id="invoice_no<?= $i ?>" name="invoice_no<?= $i ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="date<?= $i ?>" class="control-label">Order Date</label>
                                                    <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="" class="form-control" id="date<?= $i ?>" name="order_date<?= $i ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="product_code<?= $i ?>" class="control-label">Product Code</label>
                                                    <input type="text" class="form-control" id="product_code<?= $i ?>" name="product_code<?= $i ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="color<?= $i ?>" class="control-label">Color</label>
                                                    <input type="text" class="form-control" id="color<?= $i ?>" name="color<?= $i ?>">
                                                </div>
                                            </div>
                                            <h4 style="margin-top: 30px; font-weight: 600; text-decoration: underline;">Measurement</h4>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label for="length<?= $i ?>" class="control-label">Length</label>
                                                    <input type="text" class="form-control" id="length<?= $i ?>" name="length<?= $i ?>" placeholder="Enter Value in Inches">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="body<?= $i ?>" class="control-label">Body</label>
                                                    <input type="text" class="form-control" id="body<?= $i ?>" name="body<?= $i ?>" placeholder="Enter Value in Inches">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sleeve<?= $i ?>" class="control-label">Sleeve</label>
                                                    <input type="text" class="form-control" id="sleeve<?= $i ?>" name="sleeve<?= $i ?>" placeholder="Enter Value in Inches">
                                                </div>
                                            </div>
                                            <h4 style="margin-top: 30px; font-weight: 600; text-decoration: underline;">Working Status</h4>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label for="cutting<?= $i ?>" class="control-label">Cutting Assigned To</label>
                                                    <select class="form-control" name="cutting<?= $i ?>" id="cutting<?= $i ?>">
                                                        <option value="" selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM cutting_master";
                                                        $query = $conn->query($sql);
                                                        while ($prow = $query->fetch_assoc())
                                                        {
                                                            echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="embroidery<?= $i ?>" class="control-label">Embroidery Assigned To</label>
                                                    <select class="form-control" name="embroidery<?= $i ?>" id="embroidery<?= $i ?>">
                                                        <option value="" selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM embroidery_master";
                                                        $query = $conn->query($sql);
                                                        while ($prow = $query->fetch_assoc())
                                                        {
                                                            echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="swing<?= $i ?>" class="control-label">Swing Assigned To</label>
                                                    <select class="form-control" name="swing<?= $i ?>" id="swing<?= $i ?>">
                                                        <option value="" selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM swing_master";
                                                        $query = $conn->query($sql);
                                                        while ($prow = $query->fetch_assoc())
                                                        {
                                                            echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="note<?= $i ?>" class="control-label">Note</label>
                                                    <textarea class="form-control" name="note<?= $i ?>" id="note<?= $i ?>" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </section>
                                    <? endfor ?>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Add Now</button>
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