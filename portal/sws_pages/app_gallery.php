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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!------
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     Include the above in your HEAD tag ---------->

    <style>
        .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
        .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left; }
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
        .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
        .MultiCarousel .leftLst { left:0; }
        .MultiCarousel .rightLst { right:0; }
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
        .column {
            float: left;
            width: 200px;
            height: 180px;
            margin-right: 10px;
        }
    </style>
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
    </section><hr/>

    <!-- Main content -->
    <section class="content-header">
    <button class="btn btn-success" data-toggle="modal" data-target="#modalLoginForm" >Upload</button></section>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title"><b>Upload Image</b></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="" method="POST" id="uploadForm">
                <div class="box-body" >
                    <br/><br/>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;" id= "cat" name="cat" value="" required>
                        <?php
                            $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
                            or die('cannot connect to the server');
                            $sql= 'CALL APP_UI_GET_GALLERY_TYPE()';
                            $res=mysqli_query($ser_con,$sql);
                            while($data=mysqli_fetch_array($res))
                            {
                        ?>
                        <option value="<?php echo $data['IMG_CODE'];?>"><?php echo $data['IMG_TYPE'];?></option>
                        <?php }
                        mysqli_close($ser_con);
                        ?>
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
                    </table>
                </div>
                </div>
                <br/>

            <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-default" onClick="location.reload();" >Cancel</button>
                <button type="submit" name="submit" id="submit_gallery" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
            </div>
        </div>
    </div>


    <section class="content">

            
            <?php 
                // Image extensions
                $image_extensions = array("png","jpg","jpeg","gif");

                $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
                or die('cannot connect to the server');
                $db_con=mysqli_select_db($ser_con,$dbname)
                or die("!!!DATABASE NOT FOUND!!!");
                $SQL="CALL APP_UI_GET_GALLERY_TYPE();";
                $result=mysqli_query($ser_con,$SQL)
                or die("!!!TABLE NOT FOUND!!!");

                while($db_fld=mysqli_fetch_assoc($result)){
            ?>
            
            <div class="container">        
            <legend><?php echo $db_fld["IMG_CODE"]; ?>:</legend>
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">
            <?php
                // Target directory
                $dir = '../../img/app/'.$db_fld["IMG_CODE"].'/';
                if (is_dir($dir)){
                
                    if ($dh = opendir($dir)){
                        $count = 1;

                        // Read files
                        while (($file = readdir($dh)) !== false){

                            if($file != '' && $file != '.' && $file != '..'){
                        
                                // Thumbnail image path
                                $thumbnail_path = $dir.$file;

                                // Image path
                                $image_path = $dir.$file;
                            
                                $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                                $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                                // Check its not folder and it is image file
                                if(!is_dir($image_path) && 
                                    in_array($thumbnail_ext,$image_extensions) && 
                                    in_array($image_ext,$image_extensions)){
            ?>


                                    
                                        
                                                
                                    <div class="item">
                                        <div class="pad15">
                                            <a target="_blank" href="<?php echo $thumbnail_path; ?>" >
                                                <img src="<?php echo $image_path; ?>" class="column" alt="SWS IMG" >
                                            </a>
                                           
                                           <a href="./delete.php?filename_gallery=<?php echo $image_path;?>" >
                                            <button class="btn btn-danger" style="margin : 10px;"  >Delete</button>
                                            </a>
                                        </div>
                                    </div>

                                            
                                    
                                    <!-- --- -->
                                    <?php
                                    $count++;
                                }
                            }
        
                        }
                    }
                } ?>

                </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>


                <?php
                }
                ?>
 
                
            </div>


            </div>
        

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>


<script>
    $(document).ready(function () {
        // UPLOAD CODE
        $('#output').hide();
        $('#uploadForm').submit(function(e) {
            if($('#up_file').val()) {

                e.preventDefault();
                $('#submit_gallery').attr('disabled', 'disabled');
                    $(this).ajaxSubmit({
                        url: "upload.php",
                        type: "POST",
                        target: '#targetLayer',
                        beforeSubmit: function() {
                            $("#progress-bar").width('0%');
                        },
                        uploadProgress: function (event, position, total, percentComplete){
                            //var perProg = Math.round((event.loaded / event.total) * 100);
                            $("#progress-bar").width(percentComplete + '%');
                            $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
                        },
                        success:function (){
                            $('#submit_gallery').removeAttr('disabled');
                            $('#output').show();
                            alert('Upload Success');
                            //$("#progress-bar").width('0%');
                        },
                        resetForm: true
                });
                // return false;
            }
        });


        // CROUSEL CODE
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            }
            else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });
</script>
<!-- Script -->

</body>
</html>
