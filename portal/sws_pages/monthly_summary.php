<?php
include '../login_validate.php';
include '../config.php';

if(isset($_POST['submit']))
{
  $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
  or die('cannot connect to the server');

  $SQL="CALL ATT_UI_MANUAL_MONTHLY_ENTRY('$_POST[id]','$_POST[gender]','$_POST[sname]','$_POST[fname]','$_POST[phone]',null,null)";

  mysqli_query($ser_con,$SQL)
    or die("<h2>!!!Unable to execute!!!</h2>");
  $msg="<h2>!!!SAVED SUCESSFULLY!!!</h2>";
  echo "<script type='text/javascript'>alert(<?php echo $msg; ??>);</script>";
  mysqli_close($ser_con);

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
              <button type="button" class="btn btn-info" style="float: right;" data-toggle="modal" data-target="#modal-default">
                New Entry
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example" class="table table-bordered table-striped"  >
                <thead>
        					<tr >
        						<th>SNO</th>
                    <th>YEAR</th>
                    <th>MONTH</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CONTACT</th>
                    <th>CATEGORY</th>
                    <th>EXAM_YN</th>
                    <th>PAKAGE</th>
                    <th>REGISTRATION_FEES</th>
                    <th>FEE</th>
                    <th>FEE_DATE</th>
                    <th>RECEIPT_NO</th>
                    <th>FEE_DUE_DATE</th>
                    <th>TEACHER_NAME</th>
                    <th>TEACHER_PERCENT</th>
                    <th>TEACHER_AMOUNT</th>
                    <th>TEACHER_PAYMENT_DATE</th>
                    <th>BALANCE_DUE_RECEIVABLE</th>
                    <th>BALANCE_DUE_PAYABLE</th>
                    <th>FEEDBACK</th>
                    <th>FEEDBACK_DATE</th>
                    <th>FEEDBACK_TEACHER</th>
                    <th>FEEDBACK_RATING</th>
        					</tr>
        				</thead>
                <tbody id="sws_grid">
        				</tbody>
                <tfoot>
                  <tr >
        						<th>SNO</th>
                    <th>YEAR</th>
                    <th>MONTH</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CONTACT</th>
                    <th>CATEGORY</th>
                    <th>EXAM_YN</th>
                    <th>PAKAGE</th>
                    <th>REGISTRATION_FEES</th>
                    <th>FEE</th>
                    <th>FEE_DATE</th>
                    <th>RECEIPT_NO</th>
                    <th>FEE_DUE_DATE</th>
                    <th>TEACHER_NAME</th>
                    <th>TEACHER_PERCENT</th>
                    <th>TEACHER_AMOUNT</th>
                    <th>TEACHER_PAYMENT_DATE</th>
                    <th>BALANCE_DUE_RECEIVABLE</th>
                    <th>BALANCE_DUE_PAYABLE</th>
                    <th>FEEDBACK</th>
                    <th>FEEDBACK_DATE</th>
                    <th>FEEDBACK_TEACHER</th>
                    <th>FEEDBACK_RATING</th>
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

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">New Entry</h4>
          </div>
          <div class="modal-body">
            <form role="form" action='' method='POST'>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="ID No." >
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                      <select class="form-control select2" style="width: 100%;" id=gender name="gender">
                      <option value="MALE" selected="selected">Male</option>
                      <option value="FEMALE">Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="id_sname" name="sname" placeholder="Enter Student's Name">
                  </div>
                  <div class="form-group">
                    <label>Father's Name</label>
                    <input type="text" class="form-control" id="id_fname" name="fname" placeholder="Enter Father's Name">
                  </div>
                  <div class="form-group" >
                    <label>Mobile No. (Call)</label>
                    <input type="text" class="form-control" id="id_phone" name="phone" placeholder="Enter Mobile No.(Call)">
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
			data: {code: 4},
			dataType: "json",
		  success: function(response)
		  {
			for (var i = 0; i < response.length; i++) {
				 $('#sws_grid').append("<tr><td>" + response[i].SNO +
         "</td><td data-name='ATT_MONTHLY_SUMMARY-DT_YEAR' class='fixed' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].DT_YEAR +
         "</td><td data-name='ATT_MONTHLY_SUMMARY-DT_MONTH' class='fixed' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].DT_MONTH +
				 	"</td><td data-name='ATT_MONTHLY_SUMMARY-ID' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].ID +
				 	"</td><td data-name='ATT_MONTHLY_SUMMARY-NAME' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].NAME +
				 	"</td><td data-name='ATT_MONTHLY_SUMMARY-CONTACT' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].CONTACT +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-CATEGORY' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].CATEGORY +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-EXAM_YN' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].EXAM_YN +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-PAKAGE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].PAKAGE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-REGISTRATION_FEES' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].REGISTRATION_FEES +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEE_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEE_DATE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-RECEIPT_NO' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].RECEIPT_NO +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEE_DUE_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEE_DUE_DATE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-TEACHER_NAME' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].TEACHER_NAME +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-TEACHER_PERCENT' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].TEACHER_PERCENT +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-TEACHER_AMOUNT' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].TEACHER_AMOUNT +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-TEACHER_PAYMENT_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].TEACHER_PAYMENT_DATE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-BALANCE_DUE_RECEIVABLE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].BALANCE_DUE_RECEIVABLE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-BALANCE_DUE_PAYABLE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].BALANCE_DUE_PAYABLE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEEDBACK' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEEDBACK +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEEDBACK_DATE' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEEDBACK_DATE +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEEDBACK_TEACHER' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEEDBACK_TEACHER +
          "</td><td data-name='ATT_MONTHLY_SUMMARY-FEEDBACK_RATING' class='editcolumn' data-type='text' data-pk='"+response[i].SNO+"'>" + response[i].FEEDBACK_RATING +
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
