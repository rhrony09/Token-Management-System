<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? './library/images/' . $user['photo'] : './library/images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MANAGE</li>

      <li><a href="tokens.php"><i class="fa fa-ticket"></i> All Token</a></li>
      <li><a href="token_printed.php"><i class="fa fa-file-text-o"></i> Printed Token</a></li>
      <li><a href="token_not_printed.php"><i class="fa fa-print"></i> Not Printed Token</a></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-question-circle "></i>
          <span>Status</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="tokens_view_month.php"><i class="fa fa-circle-o"></i> Total This Month</a></li>
          <li><a href="tokens_view_today.php"><i class="fa fa-circle-o"></i> Total Today</a></li>
          <li><a href="tokens_view_stocked.php"><i class="fa fa-circle-o"></i> Total Stock</a></li>
          <li><a href="tokens_view_returned.php"><i class="fa fa-circle-o"></i> Total Returned</a></li>
          <li><a href="tokens_view_delivered.php"><i class="fa fa-circle-o"></i> Total Delivered</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Factory Employees</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="cutting_master.php"><i class="fa fa-circle-o"></i> Cutting Master</a></li>
          <li><a href="embroidery_master.php"><i class="fa fa-circle-o"></i> Embroidery Master</a></li>
          <li><a href="swing_master.php"><i class="fa fa-circle-o"></i> Swing Master</a></li>
        </ul>
      </li>

      <?php if ($user['role'] == 1) : ?>
        <li class="header">Admin Area</li>
        <li><a href="admin.php"><i class="fa fa-bug"></i> <span>Admins</span></a></li>
      <? endif ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>