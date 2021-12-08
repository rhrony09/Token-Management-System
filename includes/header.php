<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Abohon Token Management System</title>
  <link rel="shortcut icon" href="includes/icon.jpg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./library/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./library/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./library/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./library/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./library/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="./library/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="./library/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="./library/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./library/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .mt20 {
      margin-top: 20px;
    }

    .bold {
      font-weight: bold;
    }

    /* chart style*/
    #legend ul {
      list-style: none;
    }

    #legend ul li {
      display: inline;
      padding-left: 30px;
      position: relative;
      margin-bottom: 4px;
      border-radius: 5px;
      padding: 2px 8px 2px 28px;
      font-size: 14px;
      cursor: default;
      -webkit-transition: background-color 200ms ease-in-out;
      -moz-transition: background-color 200ms ease-in-out;
      -o-transition: background-color 200ms ease-in-out;
      transition: background-color 200ms ease-in-out;
    }

    #legend li span {
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      width: 20px;
      height: 100%;
      border-radius: 5px;
    }

    /*Ensure that the demo table scrolls */
    th,
    td {
      white-space: nowrap;
    }

    div.dataTables_wrapper {
      margin: 0 auto;
    }

    div.container {
      width: 80%;
    }

    .token-view {
      padding: 30px;
      font-size: 16px;
      line-height: 2;
    }

    .delivered {
      background-color: #00a65a;
      color: #fff;
      padding: 0 5px;
    }

    .stocked {
      background-color: #f39c12;
      color: #fff;
      padding: 0 5px;
    }

    .returned {
      background-color: #dd4b39;
      color: #fff;
      padding: 0 5px;
    }

    .default_status {
      background-color: #00c0ef;
      color: #fff;
      padding: 0 5px;
    }

    a.disabled {
      pointer-events: none;
    }

    .modal-dialog-token {
      width: 1000px;
      -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
      -o-transform: translate(0, 0);
      transform: translate(0, 0);
      -webkit-transition: -webkit-transform .3s ease-out;
      -o-transition: -o-transform .3s ease-out;
      transition: transform .3s ease-out;
      margin: 30px auto;
      position: relative;
    }

    .swal2-popup {
      font-size: 16px !important;
    }

    .d-flex {
      display: flex;
    }

    .align-items-center {
      align-items: center;
    }

    .token-search .col-xs-1,
    .token-search .col-xs-3,
    .token-search .col-xs-4,
    .token-search .col-xs-5 {
      padding-left: 5px;
      padding-right: 5px;
    }
  </style>
</head>