<?php
include '../login_validate.php';
include '../config.php';


?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SWS | ADMIN PANEL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
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
          <h3 class="box-title"><b>Upload Exercise</b></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="" method="POST" id="uploadForm">
          <div class="box-body" >
            <br/><br/>
            <div class="form-group">
              <label class="col-sm-2 control-label">Song Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="song_name" name="song_name" placeholder="Enter Song Name">
              </div>
            </div>
            <br/><br/>
            <div class="form-group">
              <label class="col-sm-2 control-label">Teacher</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Enter Teacher Name">
              </div>
            </div>
            <br/><br/>
            <div class="form-group">
              <label class="col-sm-2 control-label">Level/Year</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="level" name="level" placeholder="Enter Level/Year">
              </div>
            </div>
            <br/><br/>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="col-sm-2 control-label">Category</label>
              <div class="col-sm-8">
              <select class="form-control select2" style="width: 100%;" id= "cat" name="cat" value="" required>
                <option selected="selected">Category</option>
                <?php
                    $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
                    or die('cannot connect to the server');
                    $sql= 'CALL ATT_UI_GET_CATEGORY_SUB_CATEGORY(0)';
                    $res=mysqli_query($ser_con,$sql);
                    while($data=mysqli_fetch_array($res))
                    {
                ?>
                <option value="<?php echo $data['CATEGORY_ID'];?>"><?php echo $data['CATEGORY_NAME'];?></option>
                <?php }
                mysqli_close($ser_con);
                ?>
              </select>
              </div>
            </div>
            <br/><br/>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="col-sm-2 control-label">Sub-Category</label>
              <div class="col-sm-8">
              <select class="form-control select2" style="width: 100%;" id= "sub_cat" name="sub_cat" value="" required>
                <option>Sub-Category</option>
              </select>
              </div>
            </div>
            <br/><br/>
            <div class="form-group">
              <label class="col-sm-2 control-label">File input</label>
              <div class="col-sm-8">
              <input type="file" id="up_file" class="custom-file-input" name="up_file" required >
              </div>
            </div>
            <br/><br/>
            <div class="form-group">
              <label class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
            <div class="progress">
              <div class="progress-bar progress-bar-primary progress-bar-striped" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                <span class="sr-only">40% Complete (success)</span>
              </div>
            </div>
            </div>
            </div>
            <br/>
            <div id="targetLayer">
            </div>
            <br/><br/>
            <div id="output">
            <table class="table table-striped" >
              <col width="40%">
              <col width="60%">
              <h4 align="center"><b>...</b></h4>
              <tr>
                <td><b>Status</b></td>
                <td id="fl_stat">...</td>

              </tr>
              <tr>
                <td><b>File Name</b></td>
                <td id="fl_name">...</td>

              </tr>
              <tr>
                <td><b>File Size</b></td>
                <td id="fl_size">...</td>
              </tr>

              <tr>
                <td><b>File Type</b></td>
                <td id="fl_type">...</td>

              </tr>
              <tr>
                <td><b>Artist</b></td>
                <td id="fl_artist">...</td>

              </tr>
            </table>
          </div>
          </div>
          <br/>

          <!-- /.box-body -->
          <div class="box-footer">
            <button type="button" class="btn btn-default" onClick="location.reload();">Cancel</button>
            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right">Submit</button>
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
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script>
$(document).ready(function() {
$('#output').hide();
  $('#cat').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                console.log(response);
                $("#sub_cat").html(response);
            },
        });
    });

	 $('#uploadForm').submit(function(e) {
		if($('#up_file').val()) {

			e.preventDefault();
      $('#submit').attr('disabled', 'disabled');
			$(this).ajaxSubmit({
        url: "upload.php",
        type: "POST",
				target:   '#targetLayer',
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){
          //var perProg = Math.round((event.loaded / event.total) * 100);
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
          $('#submit').removeAttr('disabled');
          $('#output').show();
          alert('Upload Success');
          //$("#progress-bar").width('0%');
				},
				resetForm: true
			});
			// return false;
		}
	});
});
</script>
</body>
</html>
