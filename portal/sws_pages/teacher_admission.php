<?php include '../login_validate.php'; ?>
<?php
include '../config.php';

if(isset($_POST['submit']))
{ $days=$ref='';
  $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
  or die('cannot connect to the server');
 /* if(!empty($_POST['course'])) {
    foreach($_POST['course'] as $check) {
            $course=$course.' '.$check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }

}*/
if(!empty($_POST['reference'])) {
    foreach($_POST['reference'] as $check) {
            $ref=$ref.' '.$check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }

}
if(!empty($_POST['days'])) {
    foreach($_POST['days'] as $check2) {
            $days=$days.' '.$check2; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }

}



          /*      $query = "CREATE TABLE IF NOT EXISTS tmp_student (
                          id int(5) NOT NULL AUTO_INCREMENT,
                          gender varchar(10) NOT NULL,
                          name varchar(100) NOT NULL,
                          fathername varchar(100) NOT NULL,
                          fatheroccupation varchar(100) NOT NULL,
                          mothername varchar(100) NOT NULL,
                          email varchar(100) NOT NULL,
                          mobile varchar(50) NOT NULL,
                          mobile_wsp varchar(50) DEFAULT NULL,
                          adress varchar(250) NOT NULL,
                          dob varchar(50) NOT NULL,
                          joining varchar(20) NOT NULL,
                          course varchar(100) NOT NULL,
                          package varchar(100) NOT NULL,
                          reference varchar(100) NOT NULL,
                          primary key (id)
                          ) ENGINE=InnoDB AUTO_INCREMENT=1 ";
               mysqli_query($ser_con, $query)
                or die("<h2>!!!TABLE NOT CREATED</h2>");




 $SQL="INSERT INTO tmp_student(name,fathername,fatheroccupation,mothername,gender,dob,mobile,email,adress,mobile_wsp,course,package,joining,reference) VALUES('$_POST[sname]','$_POST[fname]','$_POST[foccup]','$_POST[mname]','$_POST[gender]','$_POST[dob]','$_POST[phone]','$_POST[email]','$_POST[adress]','$_POST[phonewsp]','$_POST[course]','$_POST[package]','$_POST[joining]','$ref')";
      */

  $SQL="CALL ATT_INSERT_TEACHER_DATA('$_POST[id]','$_POST[gender]','$_POST[sname]','$_POST[fname]',
  '$_POST[email]','$_POST[phone]','$_POST[phonewsp]','$_POST[adress]','$_POST[dob]','$_POST[joining]',
  '$_POST[course]','$_POST[package]','$days','$ref')";

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

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Admission Form</h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action='' method='POST'>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Scan ID</label>
                  <input value="<?php if(isset($_REQUEST['sno'])){ echo $name;} ?>" type="text" class="form-control" id="id" name="id" placeholder="Scan/Enter ID No." autofocus>
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
                  <label>Email</label>
                  <input type="text" class="form-control" id="id_email" name="email" placeholder="Enter E-Mail ID">
                </div>
                <div class="form-group" >
                  <label>Mobile No. (Call)</label>
                  <input type="text" class="form-control" id="id_phone" name="phone" placeholder="Enter Mobile No.(Call)">
                </div>
                <div class="form-group" >
                  <label>Mobile No. (Whatsapp)</label>
                  <input type="text" class="form-control" id="id_phonewsp" name="phonewsp" placeholder="Enter Mobile No.(Whatsapp)">
                </div>



              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group" >
                  <label>Address</label>
                  <input type="text" class="form-control" id="id_adress" name="adress" placeholder="Enter Full Address">
                </div>
                <!-- Date yyyy-mm-dd -->
                <div class="form-group">
                  <label>Date of Birth</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name="dob" placeholder="D.O.B" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- Date yyyy-mm-dd -->
                <div class="form-group">
                  <label>Date of Joining</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name="joining" placeholder="Joining Date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Course</label>
                  <select class="form-control select2" style="width: 100%;" id= "course" name="course" value="<?php if(isset($_REQUEST['sno'])){ echo $course;} ?>">
                    <option selected="selected">VOCAL</option>
                    <option>WESTERN VOCAL</option>
                    <option>GUITAR</option>
                    <option>SYNTHESISER</option>
                    <option>TABLA</option>
                    <option>DRUM</option>
                    <option>WESTERN DANCE</option>
                    <option>KATHAK</option>
                    <option>FLUTE</option>
                    <option>VIOLIN</option>
                    <option>SEXOPHONE</option>
                    <option>COMMON</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Package</label>
                  <select class="form-control select2" style="width: 100%;" id="package" name="package">
                    <option value="8" selected="selected">8 CLASS</option>
                    <option value="12">12 CLASS</option>
                    <option value="26">MONTHLY</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Days</label>
                  <select class="form-control select2" multiple="multiple" name="days[]" data-placeholder="Select Preffered Days"
                          style="width: 100%;">
                    <option value="Mon">Monday</option>
                    <option value="Tue">Tuesday</option>
                    <option value="Wed">Wednesday</option>
                    <option value="Thu">Thursday</option>
                    <option value="Fri">Friday</option>
                    <option value="Sat">Saturday</option>
                    <option value="Sun">Sunday</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Reference</label>
                  <select class="form-control select2" multiple="multiple" name="reference[]" data-placeholder="Select Reference(s)"
                          style="width: 100%;">
                    <option value="banner">Banner</option>
                    <option value="pamphlet">Pamphlet</option>
                    <option value="justdial">Justdial</option>
                    <option value="newspaper">Newspaper</option>
                    <option value="person">Person</option>
                    <option value="facebook">Facebook</option>
                    <option value="youtube">YouTube</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="box-footer">
              <button type="button" class="btn btn-default" onClick="location.reload();">Cancel</button>
              <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
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
<script>
  $(function () {
      $('#id').keydown(function(event) {
        // enter has keyCode = 13, change it if you want to use another button
        if (event.keyCode == 13) {
          $('#id').attr('readonly', true);
            $('#id').attr('readonly', 'readonly');
          return false;
        }
      });


      //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>
