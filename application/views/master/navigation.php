<body class="hold-transition skin-blue sidebar-mini" id="no-padding">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>JMB</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Jaya Mulya Baru</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg'; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">Staff JMB</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg'; ?>" class="img-circle" alt="User Image">
                    <p>
                      Staff JMB
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url('user/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- end account -->
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
              <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Staff JMB</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
          <!-- <li>
              <a href="<?php echo base_url().'dashboard' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li> -->
            <li>
              <a href="<?php echo base_url().'faktur' ?>">
                <i class="fa fa-file" aria-hidden="true"></i> <span>Surat Muat</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'daftarmuat' ?>">
              <i class="fa fa-truck"></i> <span>Daftar Muat</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Tagihan</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'tagihan' ?>"><i class="fa fa-circle-o"></i> Daftar Buku Besar</a></li>
                <li><a href="<?php echo base_url().'tagihan' ?>"><i class="fa fa-circle-o"></i> Daftar Tagihan</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url().'truk' ?>">
                <i class="fa fa-car" aria-hidden="true"></i> <span>Truk</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>