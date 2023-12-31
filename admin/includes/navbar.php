<header class="main-header">
    <!-- PAGE TITLE (LOGO) -->
    <a href="home.php" class="logo">
      <span class="logo-mini">
        <b>CPSU</b>Library
      </span>
      <span class="logo-lg">
        <b>CPSU</b> LIBRARY
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='../images/cpsu_logo.webp' class="user-image" alt="User Image">
              <span class="hidden-xs">CPSU - Moises Padilla Library</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='../images/cpsu_logo.webp' class="img-circle" alt="User Image">

                <p>
                  Library Admin
                  <small>Official Library Management Account</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>