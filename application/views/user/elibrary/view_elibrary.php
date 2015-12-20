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
      <div class="col-md-6">
        <?php
        foreach($resource_info as $row)
        {
          echo "<div class=\"box box-solid\">";
            echo "<div class=\"box-header with-border\">";
              echo "<b>".$row->resource_name."</b>";
              echo "<div class=\"box-tools\">";
                  echo "<a href=\"\"><span class=\"label label-danger\">".$row->resource_type."</span></a>";
              echo "</div><br>";
            echo "</div>";
            echo "<div class=\"box-body\">";
              echo "<div class=\"row\">";
                echo "<div class=\"col-md-4\">";
                  echo "<img src=\"".base_url()."dist/uploads/".$row->resource_cover_image."\" style=\"width:100%;height:150px\">";
                echo "</div>";
                echo "<div class=\"col-md-8\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\" style=\"font-size:16px\">".$row->resource_desc."";
                    echo "</div>";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-6 col-xs-6\">";
                        echo "<br><h4><i class=\"ion ion-bag\"></i>&nbsp&nbsp<b>Free</b></h4>";
                      echo "</div>";
                      echo "<div class=\"col-md-6 col-xs-6\">";
                        echo "<br><a href=\"".$row->resource_link."\" class=\"btn btn-danger btn-block\" target=\"_blank\">Download</a>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";
          echo "</div>";

        }
          
        ?>
        
      </div>
      <!-- Trending -->
      <div class="col-md-3 trending">
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