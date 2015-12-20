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
        <li class="active treeview">
          <a href="#">
            <i class="ion ion-person"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-speakerphone"></i>
            <span>Stacks</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add Stack Category</a></li>
            <li><a href="<?php echo base_url(); ?>Member_profile/add_stacks"><i class="fa fa-circle-o"></i> Add Stacks</a></li>
            <li><a href="<?php echo base_url(); ?>member_profile"><i class="fa fa-circle-o"></i> Edit/Delete Stacks</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-speakerphone"></i>
            <span>Events</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Member_profile/add_event"><i class="fa fa-circle-o"></i> Add Event</a></li>
            <li><a href="<?php echo base_url(); ?>member_profile"><i class="fa fa-circle-o"></i> Add College Fest</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="ion ion-ios-cog"></i> <span>Trending</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-ios-cog"></i>
            <span>Workshops</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>member_profile/display_workshop_form1"><i class="fa fa-circle-o"></i> Add Workshop</a></li>
            <li><a href="<?php echo base_url(); ?>member_profile/add_stacks"><i class="fa fa-circle-o"></i> View Reg Stats</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-ios-cog"></i>
            <span>Elibrary</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>member_profile/display_elibrary_form"><i class="fa fa-circle-o"></i> Add Resource</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>