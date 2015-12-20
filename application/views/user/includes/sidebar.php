<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            echo "<img src=\"".base_url()."uploads/".$profile_pic."\" class=\"user-image\" alt=\"User Image\">";
          ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url(); ?>">
            <i class="ion ion-ios-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-person"></i> <span>My Profile</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Public Profile</a></li>
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Academic Profile</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>event">
            <i class="ion ion-speakerphone"></i> <span>Events</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>workshop">
            <i class="ion ion-ios-cog"></i> <span>Workshops</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-trophy"></i>
            <span>Hackathons</span>
            
          </a>
          </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-ribbon-a"></i>
            <span>Tests & Certifications</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>elibrary">
            <i class="ion ion-ios-book"></i> <span>E-Library</span>
            
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>