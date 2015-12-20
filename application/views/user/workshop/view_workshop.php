<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
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
      <div class="col-md-5">
        <div class="row">
          <?php
            foreach($workshop_info as $row)
            {
              echo "<div class=\"col-md-12\">";
              echo "<div class=\"box box-widget widget-user\">";
              echo  "<div class=\"widget-user-header bg-".$row->bg_color."-active\">";
                  echo "<h3 class=\"widget-user-username\">".$row->workshop_name."</h3>";
                  echo "<h5 class=\"widget-user-desc\">".$row->workshop_company."</h5>";
                echo "</div>";
                echo "<div class=\"box-footer\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-4 col-xs-4 border-right\">";
                      echo "<div class=\"description-block\">";
                        echo "<h5 class=\"description-header\">".$row->workshop_date."</h5>";
                        echo "<span class=\"description-text\">Starts on</span>";
                      echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-sm-4 col-xs-4 border-right\">";
                      echo "<div class=\"description-block\">";
                        echo "<h5 class=\"description-header\">".$row->workshop_fees."</h5>";
                        echo "<span class=\"description-text\">Workshop Fees</span>";
                      echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-sm-4 col-xs-4\">";
                      echo "<div class=\"description-block\">";
                        echo "<a href=\"".base_url()."workshop/details/".$row->workshop_id."\" class=\"btn btn-danger\">Get Details</a>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";

            }
            
          ?>
          
        </div>
      </div>
      <!-- Trending -->
      <div class="col-md-4 trending">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Sponsored</h3>
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