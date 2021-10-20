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
                <h1>Swing Master</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Swing Master</li>
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
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%; text-align: center;">S/N</th>
                                            <th>Name</th>
                                            <th>Added On</th>
                                            <?php if ($user['role'] == 1) : ?>
                                                <th>Action</th>
                                            <? endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM swing_master";
                                        $query = $conn->query($sql);
                                        $i = 1;
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width: 10%; text-align: center;"><?php echo $i;
                                                                                            $i++; ?></td>
                                                <td style="width: 50%;"><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['added_on']; ?></td>
                                                <?php if ($user['role'] == 1) : ?>
                                                    <td>
                                                        <a href='<?php echo "swing_master_delete.php?delete=role&id=" . $row['id']; ?>' class=" btn btn-danger btn-sm delete btn-flat"><i class="fa fa-trash"></i> Delete</a>
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
        <?php include 'includes/swing_master_modal.php'; ?>

    </div>
    <!-- ./wrapper -->


    <?php include 'includes/scripts.php'; ?>

</body>

</html>