<?php
include '../login_validate.php';
include '../config.php';
if((isset($_POST['submit']) || isset($_POST['id'])) && !empty($_POST['id']))
{
  $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
  or die('cannot connect to the server');
  $id=$_POST['id'];
  $dt=$_POST['clsdt'];
  $sql = "CALL ATT_CARD_PUNCH_FIRST_CLASS(".$id.",'".$dt."')";
  $res1=mysqli_query($ser_con,$sql);
  while($row=mysqli_fetch_array($res1))
	{
    if($row['MESSAGE']=='FAILURE'){
      $message='Update Failed!!';
    }
    else if($row['MESSAGE']=='INVALID'){
      $message='Invalid ID No.!!';
    }
    else if($row['MESSAGE']=='N'){
      $message='Fees Not Paid!!';
    }
    else if($row['MESSAGE']=='Y'){
      $message=$id;
      $ser_con2=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
      or die('cannot connect to the server');
      $sql2 = 'CALL ATT_UI_GET_STUDENT_CLASS('.$id.')';
      $res2=mysqli_query($ser_con2,$sql2);
      while($row=mysqli_fetch_array($res2))
    	{
        $name =$row['NAME'];
        $classdone =$row['CLASS_DONE'];
        $classrem =$row['CLASS_REM'];
        $daysrem =$row['DAYS_REM'];
        $expdt =$row['EXP_DATE'];
      }
    }
  }
}
else {
  $message='Blank ID!!';
  $id=7567;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SWSSTUDIO | ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <?php include '../modules/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Scan ID or Enter ID no.</b></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
          <div class="box-body" >
            <div class="form-group">
              <br/><br/><label for="inputEmail3" class="col-sm-2 control-label">ID no.</label>

              <div class="col-sm-9">
                <input type="number" class="form-control" id="id" name="id" placeholder="Scan/Enter ID no." autofocus>
              </div>

            </div>

            <!-- Date -->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Date:</label>
              <div class="col-sm-9">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="clsdt" >
              </div>
              <!-- /.input group -->
            </div></div><br/><br/>
            <table class="table table-striped" >
              <col width="40%">
              <col width="60%">
              <h4 align="center"><b><?php if(isset($_POST['submit']) || isset($_POST['id'])){
                 echo $message;}
                 else echo "..."; ?></b></h4>
              <tr>
                <td><b>Name</b></td>
                <td><?php if((isset($_POST['submit']) || isset($_POST['id'])) && ($message==$id)){
                   echo $name;}
                   else echo "..."; ?></td>

              </tr>
              <tr>
                <td><b>Class Done</b></td>
                <td><?php if((isset($_POST['submit']) || isset($_POST['id'])) && ($message==$id)){
                   echo $classdone;}
                   else echo "..."; ?></td>

              </tr>
              <tr>
                <td><b>Class Remaining</b></td>
                <td><?php if((isset($_POST['submit']) || isset($_POST['id'])) && ($message==$id)){
                   echo $classrem;}
                   else echo "..."; ?></td>


              </tr>
              <tr>
                <td><b>Days Remaining</b></td>
                <td><?php if((isset($_POST['submit']) || isset($_POST['id'])) && ($message==$id)){
                   echo $daysrem;}
                   else echo "..."; ?></td>

              </tr>
              <tr>
                <td><b>Expiry Date</b></td>
                <td><?php if((isset($_POST['submit']) || isset($_POST['id'])) && ($message==$id)){
                   echo $expdt;}
                   else echo "..."; ?></td>

              </tr>
            </table>
          </div>


          <!-- /.box-body -->
          <div class="box-footer">
            <button type="button" class="btn btn-default" onClick="location.reload();">Cancel</button>
            <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include'../modules/footer.php'; ?>

  <?php //include'../modules/controller-sidebar.php';
  ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
$(function () {
  //Date picker
  $('#datepicker').datepicker({
    multidate: true,
    format: 'yyyy-mm-dd'
  });
  $('#id').keydown(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
      $('#id').attr('readonly', true);
        $('#id').attr('readonly', 'readonly');
      return false;
    }
  });
})
</script>

</body>
</html>
