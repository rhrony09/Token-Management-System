<!-- jQuery 3 -->
<script src="./library/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./library/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="./library/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./library/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="./library/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="./library/bower_components/raphael/raphael.min.js"></script>
<script src="./library/bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="./library/bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="./library/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="./library/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="./library/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="./library/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./library/bower_components/moment/min/moment.min.js"></script>
<script src="./library/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="./library/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="./library/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="./library/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="./library/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./library/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./library/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./library/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./library/dist/js/demo.js"></script>
<!-- SweetAlart -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(function() {
    $('#example1').DataTable({
      'responsive': false,
      'order': [
        [1, "desc"]
      ],
      'scrollX': true,
      'lengthMenu': [
        [16, 32, 48, -1],
        [16, 32, 48, "All"]
      ],
      'searching': false,
      'ordering': false,
    });
    $('#example2').DataTable({
      'responsive': false,
      'order': [
        [1, "desc"]
      ],
      'scrollX': true,
      'lengthMenu': [
        [16, 32, 48, -1],
        [16, 32, 48, "All"]
      ]
    });
    $('#example3').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
  })
</script>
<script>
  $(function() {
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

  });
</script>
<script>
  $(function() {
    //Date picker
    $('#datepicker_add').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    $('#datepicker_edit').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

  });
</script>