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
                <h1>
                    Admin List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Admins</li>
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered" width="100%">
                                    <thead>
                                        <th>Username</th>
                                        <th>Photo</th>
                                        <th width="30%">Name</th>
                                        <th>Role</th>
                                        <?php if ($user['role'] == 1) : ?>
                                            <th>Action</th>
                                        <? endif ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM admin";
                                        $query = $conn->query($sql);

                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><img src="<?php echo (!empty($row['photo'])) ? './library/images/' . $row['photo'] : './library/images/profile.jpg'; ?>" width="30px" height="30px"></td>
                                                <td width="30%"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                <td><?php if ($row['role'] == 1) {
                                                        echo "Admin";
                                                    } else {
                                                        echo "Employee";
                                                    } ?></td>

                                                <td>
                                                    <?php if ($row['username'] != $user['username'] && $row['username'] != 'rony' && $user['role'] == 1) : ?>
                                                        <a href='<?php echo "admin_delete.php?delete=role&id=" . $row['id']; ?>' class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                        <?php if ($row['role'] == 1) : ?>
                                                            <a href='<?php echo "admin_edit.php?edit=role&role=0&id=" . $row['id']; ?>' class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Assign as Employee</a>
                                                        <? else : ?>
                                                            <a href='<?php echo "admin_edit.php?edit=role&role=1&id=" . $row['id']; ?>' class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Assign as Admin</a>
                                                        <? endif; ?>
                                                    <? endif ?>
                                                </td>
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
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/admin_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>