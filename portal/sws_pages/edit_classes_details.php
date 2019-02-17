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

  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Today's Class</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example" class="table table-bordered table-striped"  >
                <thead>
        					<tr >
        						<th>SNO</th>
        						<th>ID</th>
        						<th>NAME</th>
        						<th>CATEGORY</th>
        						<th>EFF_DATE</th>
        						<th>EXP_DATE</th>
        						<th>CLASS_DONE</th>
        						<th>CLASS_REM</th>
        						<th>DAYS_REM</th>
        						<th>FEES_DATE</th>
        					</tr>
        				</thead>
                <tbody id="sws_grid">
        				</tbody>
                <tfoot>
                  <tr >
                    <th>SNO</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>EFF_DATE</th>
                    <th>EXP_DATE</th>
                    <th>CLASS_DONE</th>
                    <th>CLASS_REM</th>
                    <th>DAYS_REM</th>
                    <th>FEES_DATE</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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
<script type="text/javascript">
$( document ).ready(function() {

	function getSWS() {
		$.ajax({
		  type: "GET",
		  url: "response.php",
			data: {code: 2},
			dataType: "json",
		  success: function(response)
		  {
			for (var i = 0; i < response.length; i++) {
				 $('#sws_grid').append("<tr><td>" + response[i].SNO +
				 	"</td><td data-name='ATT_STUDENT_CLASS-ID' class='fixed' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].ID +
				 	"</td><td data-name='ATT_STUDENT_CLASS-NAME' class='fixed' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].NAME +
				 	"</td><td data-name='ATT_STUDENT_CLASS-COURSE' class='fixed' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].COURSE +
				 	"</td><td data-name='ATT_STUDENT_CLASS-EFF_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].EFF_DATE +
				 	"</td><td data-name='ATT_STUDENT_CLASS-EXP_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].EXP_DATE +
				 	"</td><td data-name='ATT_STUDENT_CLASS-CLASS_DONE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].CLASS_DONE +
				 	"</td><td data-name='ATT_STUDENT_CLASS-CLASS_REM' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].CLASS_REM +
				 	"</td><td data-name='ATT_STUDENT_CLASS-DAYS_REM' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].DAYS_REM +
				 	"</td><td data-name='ATT_STUDENT_CLASS-FEES_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEES_DATE +
				 	"</td></tr>");

			 }
       $('#example').DataTable({
         'paging'      : true,
         'lengthChange': true,
         'searching'   : true,
         'ordering'    : true,
         'info'        : true,
         'autoWidth'   : true
       });
		  },
		 error: function(jqXHR, textStatus, errorThrown) {
			 alert("loading error data " + errorThrown);
		 }
		});
	}
  function make_editable_col(table_selector,column_selector,ajax_url,title) {
		$(table_selector).editable({
			selector: column_selector,
			url: ajax_url,
			title: title,
			type: "POST",
			dataType: 'json'
		  });
		  $.fn.editable.defaults.mode = 'inline';
		}

	getSWS();

	make_editable_col('#sws_grid','td.editcolumn','response.php?action=edit','Editables');

	function ajaxAction(action) {
		data = $("#frm_"+action).serializeArray();
		$.ajax({
		  type: "POST",
		  url: "response.php",
		  data: data,
		  dataType: "json",
		  success: function(response)
		  {
			$('#'+action+'_model').modal('hide');
			$("#sws_grid").bootgrid('reload');
		  }
		});
	}
});

</script>

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
</body>
</html>
