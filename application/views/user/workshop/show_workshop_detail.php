<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=809782969143423";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $workshop_name; ?>
          
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url()?>workshop">Workshops</a></li>
          <li class="#"><?php echo $title ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                        <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="chart">
                          <?php
                          echo "<img src=\"".base_url()."dist/uploads/".$workshop_cover_image."\" style=\"width:100%;height:320px;padding:.2%\">";
                          ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- ./box-body -->
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="description-block border-right">
                          <h5 class="description-header"><?php echo $max_seats; ?></h5>
                          <span class="description-text">MAXIMUM SEATS</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-xs-12">
                        <div class="description-block border-right">
                          <h5 class="description-header"><?php echo $workshop_date; ?></h5>
                          <span class="description-text">STARTS ON</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-xs-12">
                        <div class="description-block border-right">
                          <h5 class="description-header">INR&nbsp<?php echo $fees; ?></h5>
                          <span class="description-text">WORKSHOP FEE</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-xs-12">
                        <div class="description-block">
                          <a href="" class="btn btn-danger btn-block btn-flat">Register Now</a>
                        </div>
                        <!-- /.description-block -->
                      </div>
                    </div>
                          <!-- /.row -->
                  </div>
                        <!-- /.box-footer -->
                </div>
              </div>
              <div class="col-md-12">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab"><b>About the Workshop</b></a></li>
                      <li><a href="#tab_2" data-toggle="tab"><b>Syllabus</b></a></li>
                      <li><a href="#tab_3" data-toggle="tab"><b>Faculty</b></a></li>
                      <li><a href="#tab_4" data-toggle="tab"><b>Contacts</b></a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <?php echo $workshop_desc; ?>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_2">
                        The European languages are members of the same family. Their separate existence is a myth.
                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                        new common language would be desirable: one could refuse to pay expensive translators. To
                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                        words. If several languages coalesce, the grammar of the resulting language is more simple
                        and regular than that of the individual languages.
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                      </div>
                      <!-- /.tab-pane -->
                    
                    <!-- /.tab-content -->
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="fb-post" style="width:100%">
                  <div class="fb-comments" data-href="http://nfly.in/workshop/details/Quadcopter" data-width="100%" data-numposts="10"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <i class="ion ion-ios-home"></i>

                    <h3 class="box-title">Organised By</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <p><?php echo $workshop_company; ?></p>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <i class="ion ion-ios-home"></i>

                    <h3 class="box-title">Venue</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <p><?php echo $venue; ?></p>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <i class="ion ion-ribbon-b"></i>

                    <h3 class="box-title">Certification</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <p><?php echo $certification; ?></p>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <i class="ion ion-settings"></i>

                    <h3 class="box-title">Kit Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">You may be interested in</h3>
                    </div>
                <?php
                foreach($other_workshop_details as $row)
                {
                  echo "<div class=\"box-body\">";
                      echo "<ul class=\"products-list product-list-in-box\">";
                        echo "<li class=\"item\">";
                          echo "<div class=\"product-img\">";
                            echo "<img src=\"".base_url()."dist/uploads/".$row->workshop_cover_image."\" alt=\"Product Image\">";
                          echo "</div>";
                          echo "<div class=\"product-info\">";
                            echo "<a href=\"javascript::;\" class=\"product-title\">".$row->workshop_name."
                               <span class=\"label label-warning pull-right\">Rs&nbsp".$row->workshop_fees."</span></a>
                                <span class=\"product-description\">By&nbsp".$row->workshop_company."</span>";
                          echo "</div>";
                        echo "</li>";
                      echo "</ul>";
                    echo "</div>";
                    

                }
                ?>
                <div class="box-footer text-center">
                <a href="<?php echo base_url();?>workshop" class="uppercase">View All Products</a>
                </div>
                  
                    
                  
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.1
      </div>
      <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">nFLY Internet LLP</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>