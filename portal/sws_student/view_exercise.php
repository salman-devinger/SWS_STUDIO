<?php include '../login_validate.php'; ?>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">

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

  <?php //include '../modules/header_student.php'; ?>
  <?php include '../config.php'; ?>

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
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Exercise List</b></h3>
              <a href="../logout.php" class="btn btn-default btn-info">Sign out</a><br/>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Position</th>
                    <th>Exercise Name</th>
                    <th>Download</th>
                    <th>Play</th>
                    <th class="nosort">Level</th>
                    <th class="nosort">Category</th>
                    <th class="nosort">Sub-Category</th>
                    <th>Teacher</th>
                    <th>File Type</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
                  or die('cannot connect to the server');
                  $db_con=mysqli_select_db($ser_con,$dbname)
                  or die("!!!DATABASE NOT FOUND!!!");
                  $SQL="CALL ATT_UI_GET_EDITABLE_DATA(5)";
                  $result=mysqli_query($ser_con,$SQL)
                  or die("!!!TABLE NOT FOUND!!!");

                  while($db_fld=mysqli_fetch_assoc($result))
                      {  ?>
                <tr>
                  <td><?php echo $db_fld["SNO"];?></td>
                  <td><?php echo $db_fld["EXERCISE_NAME"];?></td>
                  <td><a href="./download.php?filename=<?php echo $db_fld['FILE_NAME'] ;?>" >DOWNLOAD</a></td>
                  <td><a href="../upload/<?php echo $db_fld['FILE_NAME'] ?>" target="_blank">PLAY</a></td>
                  <td>1</td>
                  <td><?php echo $db_fld["CATEGORY_ID"];?></td>
                  <td><?php echo $db_fld["SUB_CATEGORY_ID"];?></td>
                  <td><?php echo $db_fld["ARTIST"];?></td>
                  <td><?php echo $db_fld["FILE_TYPE"];?></td>
                </tr>
              <?php }
              mysqli_close($ser_con);
              ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Position</th>
                    <th>Exercise Name</th>
                    <th>Download</th>
                    <th>Play</th>
                    <th>Level</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Teacher</th>
                    <th>File Type</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
        }],
      //"dom"         : 'l<"toolbar">frtip',
      initComplete  : function () {
          for ( i=0; i<this.api().columns().nodes().length; i++ ){
            //var k = JSON.parse(this.api().column(1));
            //var columns2 = this.api().settings().init().columns;
            //var k = this.api().columns(1).name;
            var col = ["Position","Download","Play", "Exercise Name", "Level", "Category", "Sub-Category","Teacher", "File Type"];
            k=col[i];
            arr = [4,5,6];
            //if ($.inArray(i,col)>-1) {
            if ($.inArray(i, arr) > -1) {
              this.api().columns(i).every( function () {
                  var column = this;
                  //var select = $('<html>'+k+': <select class="form-control select2" style="width: 25%;"><option value="">'+k+'</option></select>&nbsp;&nbsp;&nbsp;</html>')
                  var select = $('<select><option value="">'+k+'</option></select>')
                      //.appendTo( $("div.toolbar"))
                      .appendTo($(column.header()))
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );

                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );

                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
                } );
              }
            }
        }
    })
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
