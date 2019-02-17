<header class="main-header">

    <!-- Logo -->
    <a href="../sws_pages/index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SWS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SWS</b> ADMIN</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Rahul Kumar</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Rahul Kumar - Admin
                  <small>Director (SWS Studio)</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="http://swsstudio.in/">YoTube</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="http://swsstudio.in/">FB</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="http://swsstudio.in/">Website</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Rahul Kumar</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li class="active treeview menu-open">
          <a href="../sws_pages/index.php">
            <i class="fa fa-dashboard"></i> <span>HOME</span>

          </a>
          </li>
        <li>
          <a href="../sws_pages/admission.php">
            <i class="fa fa-th"></i> <span>ADMISSION</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../sws_pages/teacher_admission.php">
            <i class="fa fa-th"></i> <span>TEACHER</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../sws_pages/id.php">
            <i class="fa fa-th"></i> <span>ID PUNCH</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>VIEW DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../sws_pages/view_student.php"><i class="fa fa-circle-o"></i> Student</a></li>
            <li><a href="../sws_pages/index.php"><i class="fa fa-circle-o"></i> Classes</a></li>
            <li><a href="../sws_pages/monthly_summary.php"><i class="fa fa-circle-o"></i> Monthly</a></li>
            <li><a href="../sws_pages/index.php"><i class="fa fa-circle-o"></i> Fees</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>EDIT DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../sws_pages/edit_student_details.php"><i class="fa fa-circle-o"></i> Student</a></li>
            <li><a href="../sws_pages/edit_classes_details.php"><i class="fa fa-circle-o"></i> Classes</a></li>
            <li><a href="../sws_pages/monthly_summary.php"><i class="fa fa-circle-o"></i> Monthly</a></li>
            <li><a href="../sws_pages/index.php"><i class="fa fa-circle-o"></i> Fees</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>COURSE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../sws_pages/upload_exercise.php"><i class="fa fa-circle-o"></i> Upload</a></li>
            <li><a href="../sws_pages/view_exercise.php"><i class="fa fa-circle-o"></i> View</a></li>
            <li><a href="../sws_pages/view_exercise.php"><i class="fa fa-circle-o"></i> Edit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../sws_pages/index.php">><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="../sws_pages/index.php"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="../sws_pages/calendar.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../sws_pages/demo.php">
            <i class="fa fa-envelope"></i> <span>Demo</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../sws_pages/first_class.php">
            <i class="fa fa-envelope"></i> <span>First Class</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>


        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Video</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
