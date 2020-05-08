<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SWS Studio</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

     <script type="text/javascript">
        $(document).ready( function() {
            $('#myCarousel').carousel({
                interval:   1000
            });
            $(".carousel").swipe({

                swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

                    if (direction == 'left') $(this).carousel('next');
                    if (direction == 'right') $(this).carousel('prev');

                },
                allowPageScroll:"vertical"

            });
            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                    clickEvent = true;
                    $('.nav li').removeClass('active');
                    $(this).parent().addClass('active');		
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('.nav').children().length -1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if(count == id) {
                        $('.nav li').first().addClass('active');	
                    }
                }
                clickEvent = false;
            });         
        });
    </script>
     
</head>

<body id="page-top">
<div class="loader"></div>
<style>
/*.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/logo/2.jpg') 50% 50% no-repeat rgb(249,249,249) ;
    background-size:contain;
    background-position:center;
    opacity:0.95;
}*/
body { padding-top: 0px; }

.row.no-gutters {
  margin-right: 0;
  margin-left: 0;
}
.row.no-gutters > [class^="col-"],
.row.no-gutters > [class*=" col-"] {
  padding-right: 0;
  padding-left: 0;
}

#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
	background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}
/* The heart of the matter */ 
.horizontal-scrollable { 
    width: 100%;
    margin: 0px;
}
.horizontal-scrollable ::-webkit-scrollbar {
  height: 0px;
}
.horizontal-scrollable > .row { 
    overflow-x: auto; 
    white-space: nowrap;
} 
.horizontal-scrollable > .row > .col-xs-3 { 
    display: inline-block; 
    float: none; 
} 
/* Decorations */ 
    
.col-xs-3 { 
    color: black; 
    padding-bottom: 20px;
    padding-top: 18px;
} 
.rounded{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.h6{
    font-family:Helvetica;
}
</style>

<?php include './header.php'; ?>
    
  
<div class="container" style="width: 100%;">

    <div class="container horizontal-scrollable"> 
        <div class="row text-center "> 
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3">
                <div><a href="#"><img class="rounded" src="img/1.jpg" alt="Lights" ></a></div>
                <h5>Guitar</h5>
            </div>
        </div> 
    </div> 
    
      <br/>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
        
          <div class="item active">
            <img src="https://clubrunner.blob.core.windows.net/00000008602/Images/Kayako/2017-carousel/Join-Leaders-Alt1.jpg">
             
          </div><!-- End Item -->
   
           <div class="item ">
            <img src="https://clubrunner.blob.core.windows.net/00000008602/Images/Kayako/2017-carousel/Join-Leaders-Alt1.jpg">
             
          </div><!-- End Item -->
          
          <div class="item ">
            <img src="https://clubrunner.blob.core.windows.net/00000008602/Images/Kayako/2017-carousel/Join-Leaders-Alt1.jpg">
             
          </div><!-- End Item -->
          
          <div class="item ">
            <img src="https://clubrunner.blob.core.windows.net/00000008602/Images/Kayako/2017-carousel/Join-Leaders-Alt1.jpg">
             
          </div><!-- End Item -->
                  
        </div><!-- End Carousel Inner -->
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
      </div><!-- End Carousel -->
      <br/>
  
<!-- 
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">We are here</h1>
  
    <hr class="mt-2 mb-5">
-->
    <div class="row text-center no-gutters text-lg-left">
  
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail">
            <a href="img/1.jpg" target="_blank">
              <img src="img/1.jpg" alt="Lights" style="width:100%">
            </a>
            <h5>Guitar Classes</h5>
          </div>
      </div>
      
    </div>
  
  </div>
  <!-- /.container -->
  
    
    
   
<div class="col-lg-8 col-lg-offset-2 text-center">
<div id="footer">
<label>Site Developed and Maintained By:<a href="https://www.linkedin.com/in/salman-devinger/">Salman Khan</a></label>
</div>
</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>

</html>