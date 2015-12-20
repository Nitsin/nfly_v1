<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>24<small>&nbspNov</small></h3>

            <p>Android Dev</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cog"></i>
          </div>
          <a href="<?php echo base_url(); ?>Landing" class="small-box-footer">All Workshops <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>30<small>&nbspNov</small></h3>

            <p>IOT Meetup</p>
          </div>
          <div class="icon">
            <i class="ion ion-speakerphone"></i>
          </div>
          <a href="#" class="small-box-footer">All Events <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>05<small>&nbspDec</small></h3>

            <p>Codemasters</p>
          </div>
          <div class="icon">
            <i class="ion ion-trophy"></i>
          </div>
          <a href="#" class="small-box-footer">All Hackathons <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>13<small>&nbspDec</small></h3>

            <p>HTML Level 1</p>
          </div>
          <div class="icon">
            <i class="ion ion-ribbon-a"></i>
          </div>
          <a href="#" class="small-box-footer">All Certifications <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- Profile Image -->
      <div class="col-md-3">
        <div class="box box-success">
          <div class="box-body box-success">

            <?php
              echo "<img class=\"profile-user-img img-responsive img-circle\" src=\"".base_url()."uploads/".$profile_pic."\" alt=\"User profile picture\">";
            ?>
            <h3 class="profile-username text-center"><?php echo $name; ?></h3>

            <p class="text-muted text-center"><a href="#" data-toggle="modal" data-target="#myModal">Update Profile picture</a></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>My Wallet</b> <a class="pull-right">Rs 463</a>
              </li>
              <li class="list-group-item">
                <b>Liked Stacks</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Events Attended</b> <a class="pull-right">13</a>
              </li>
            </ul>

            <a href="#" class="btn btn-success btn-block"><b>View Public Profile</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- Stacks -->
      <div class="col-md-6">
        <div class="row">
          <?php
          foreach($selected_stacks as $row)
          {
            echo "<div class=\"col-md-12\">";
            echo "<div class=\"box box-widget\">";
            echo  "<div class=\"box-header with-border\">";
            echo    "<div class=\"user-block\">";
            echo      "<img class=\"img-circle\" src=\"".base_url()."dist/uploads/".$row->publisher_image."\" alt=\"User Image\">";
            echo      "<span class=\"username\"><a href=\"#\">".$row->stack_publisher."</a></span>";
            echo      "<span class=\"description\">Shared publicly -".date ("d/m/Y h:ia",strtotime($row->upload_time))."</span>";
            echo    "</div>";
                
            echo    "<div class=\"box-tools\">";
            echo      "<a href=\"".base_url()."stacks/index/".$row->stack_name."\"><span class=\"label label-danger\">".$row->stack_name."</span></a>";
            echo    "</div>";
                
            echo  "</div>";
              
            echo  "<div class=\"box-body\">";

            echo    "<p>".$row->stack_text."</p>
                <a href=\"".$row->stack_link."\" target=\"_blank\"><img class=\"img-responsive pad\" src=\"".base_url()."dist/uploads/".$row->stack_image."\" alt=\"Photo\"></a>";

                
            echo    "<button type=\"button\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-share\"></i> Share</button>";
            echo    "<button type=\"button\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-thumbs-o-up\"></i> Like</button>&nbsp";
            echo    "<span class=\"pull-right text-muted\">127 likes - 3 shares</span>";
            echo  "</div>";
            echo  "</div>";
          echo "</div>";

          }
          
          ?>
        </div>
      </div>
      <!-- Trending -->
      <div class="col-md-3">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Trending</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="ion ion-arrow-graph-up-left"></i> Education</strong>

            <p>
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>
            <strong><i class="ion ion-arrow-graph-up-left"></i> Education</strong>

            <p>
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>
            <strong><i class="ion ion-arrow-graph-up-left"></i> Education</strong>

            <p>
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>
            <strong><i class="ion ion-arrow-graph-up-left"></i> Education</strong>

            <p>
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update your profile picture</h4>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('Profile/do_upload');?>

                <input type="file" name="userfile" size="20" />

                <br /><br />

                <input type="submit" value="upload" />

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>  
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->