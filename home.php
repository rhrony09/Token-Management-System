<?php
include 'includes/session.php';
include './library/timezone.php';
$today = date('Y-m-d');
$year = date('Y');
$mydate = getdate(date("U"));
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}
?>
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
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM token";
                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>";
                ?>

                <p>Total Tokens</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="tokens.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM token WHERE MONTH(created_on) = '$mydate[mon]' AND YEAR(created_on) = '$mydate[year]'";
                $total_query = $conn->query($sql);
                $total = $total_query->num_rows;

                echo "<h3>" . $total . "</h3>";
                ?>

                <p>Token Created This Month</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="tokens.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM token WHERE created_on = '$today'";
                $today_query = $conn->query($sql);

                echo "<h3>" . $today_query->num_rows . "</h3>"
                ?>

                <p>Token Created Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="tokens.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
                <?php
                $sql_cutting = "SELECT * FROM cutting_master";
                $cutting_count = $conn->query($sql_cutting);

                $sql_embroidery = "SELECT * FROM embroidery_master";
                $embroidery_count = $conn->query($sql_embroidery);

                $sql_swing = "SELECT * FROM swing_master";
                $swing_count = $conn->query($sql_swing);

                $total_employee = $cutting_count->num_rows + $embroidery_count->num_rows + $swing_count->num_rows;

                echo "<h3>" . $total_employee . "</h3>"
                ?>

                <p>Total Factory Employee</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
              <a href="cutting_master.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Monthly Token Create Report</h3>
                <div class="box-tools pull-right">
                  <!-- <form class="form-inline">
                    <div class="form-group">
                      <label>Select Year: </label>
                      <select class="form-control input-sm" id="select_year">
                        <?php
                        // for ($i = 2021; $i <= 2025; $i++) {
                        //   $selected = ($i == $year) ? 'selected' : '';
                        //   echo "
                        //     <option value='" . $i . "' " . $selected . ">" . $i . "</option>
                        //   ";
                        // }
                        ?>
                      </select>
                    </div>
                  </form> -->
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <br>
                  <div id="legend" class="text-center"></div>
                  <canvas id="barChart" style="height:350px"></canvas>
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

  <!-- Chart Data -->
  <?php
  $months = array();
  $tokens = array();
  for ($m = 1; $m <= 12; $m++) {
    $sql = "SELECT * FROM token WHERE MONTH(created_on) = '$m' AND YEAR(created_on) = '$mydate[year]'";
    $oquery = $conn->query($sql);
    array_push($tokens, $oquery->num_rows);

    $num = str_pad($m, 2, 0, STR_PAD_LEFT);
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $tokens = json_encode($tokens);

  ?>
  <!-- End Chart Data -->
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = {
        labels: <?php echo $months; ?>,
        datasets: [{
            label: 'Tokens',
            fillColor: 'rgba(60,141,188,0.9)',
            strokeColor: 'rgba(60,141,188,0.8)',
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: <?php echo $tokens; ?>
          },
          {}
        ]
      }
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      }

      barChartOptions.datasetFill = false
      var myChart = barChart.Bar(barChartData, barChartOptions)
      document.getElementById('legend').innerHTML = myChart.generateLegend();
    });
  </script>
  <script>
    $(function() {
      $('#select_year').change(function() {
        window.location.href = 'home.php?year=' + $(this).val();
      });
    });
  </script>
</body>

</html>