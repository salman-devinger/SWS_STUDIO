<?php include '../login_validate.php'; ?>
<?php
include '../config.php';
if((isset($_POST['submit']) || isset($_POST['id'])) && !empty($_POST['id']))
{
  $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
  or die('cannot connect to the server');
  $id=$_POST['id'];
  //$sql = 'CALL ATT_UPDATE_RECORD_ON_CARD_PUNCH('.$id.')';
  $sql = 'select 1 as MESSAGE';
  $res1=mysqli_query($ser_con,$sql);
  while($row=mysqli_fetch_array($res1))
	{
    if($row['MESSAGE']==1){
      $message='Update 1!!';
    }
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Scan/Enter ID No.</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="POST" id="calender_frm">
                <div class="box-body" >
              	<div class="form-group">
              	  <label for="inputEmail3" class="col-sm-1 control-label">ID no.</label>

              	  <div class="col-sm-10">
              		<input type="number" class="form-control" id="id" name="id" placeholder="Scan/Enter ID no." autofocus>
                  <input type="hidden" value="<?php if((isset($_POST['submit']) || isset($_POST['id'])) && !empty($_POST['id'])){echo $_POST['id'];}?>" class="form-control" id="id2" name="id2">
                  </div>

              	</div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
              	<button type="button" class="btn btn-default" onClick="location.reload();">Cancel</button>
              	<button type="submit" name="submit" class="btn btn-info pull-right" id="submit">Submit</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </div>
        <!-- /.col -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="../bower_components/moment/moment.js"></script>
<script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script>

/* $(document).ready(function(){
  $("#submit").click(function(){
  var id = $("#id").val();

  $('#calendar').fullCalendar({
    events    :  { //'events.php/?id='+id,
        url: "events.php",
        data: {id: $('#id').val()},
        type: "POST"
    },
      editable  : false,
      droppable : false,
  });
  return false;
  });
}); */

$(document).ready(function() {

  $('#calendar').fullCalendar({
    events    :  { //'events.php/?id='+id,
        url: "events.php",
        data: {id: $('#id2').val()},
        type: "POST"
    },
      editable  : false,
      droppable : false,
  });
      /*  $('#id').change(function () {
        //$("#calender_frm").on("submit", function(){
            var source = {
                data: {
                    id: $('#id').val()
                },
                 url : 'events.php'
            };
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', source);
        });*/
        $('#id').keydown(function(event) {
          // enter has keyCode = 13, change it if you want to use another button
          if (event.keyCode == 13) {
          //  $('#id').attr('readonly', true);
            //  $('#id').attr('readonly', 'readonly');
              var source = {
                  data: {
                      id: $('#id2').val()
                  },
                   url : 'events.php'
              };
              $('#calendar').fullCalendar('removeEvents');
              $('#calendar').fullCalendar('addEventSource', source);

            return false;
          }
        });

    });
</script>
</body>
</html>
