<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/logo.png" style="width:46px;height:48px;margin-top:-3px"><b style="font-size:24px;color:#fff">nFLY.in</b></span>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- /.messages-menu -->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                echo "<img src=\"".base_url()."uploads/".$profile_pic."\" class=\"user-image\" alt=\"User Image\">";
              ?>
              <span class="hidden-xs"><?php echo $name; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <?php
                echo "<img src=\"".base_url()."uploads/".$profile_pic."\" class=\"img-circle\" alt=\"User Image\">";
                ?>

                <p>
                  <?php echo $name; ?>
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Report an Issue</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Security Settings</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="<?php echo base_url(); ?>Landing/logout" class="btn btn-danger btn-block" style="color:#fff">Sign out</a>
              </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>