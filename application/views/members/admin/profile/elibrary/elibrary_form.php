<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div col="col-md-12">
        <div class="col-md-offset-2 col-md-8">
            
                
                
                <?php if ($this->session->flashdata('msg') != ''){
                        echo "<div class=\"alert alert-success alert-dismissible\">";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                        echo "<h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
                        echo $this->session->flashdata('msg');
                        echo "</div>";
                    }
          ?>
            
            
          <?php

            echo form_open_multipart('Member_profile/add_resource_to_elibrary');
            echo "<h1>Add Resource to Elibrary</h1><br>";
            echo "<label>Resource Name:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('resource_name', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Resource Type:</label>";
            $options = array(
                              'Question Paper'  => 'Question Paper',
                              'Notes'    => 'Notes',
                              'Ebook'   => 'Ebook',
                                    );

            echo form_dropdown('resource_type', $options, '', "class='form-control'");
            echo "<label>Description:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('resource_desc', '',"class='form-control'");
            echo  "</div>";
            echo "<label>File Download Link:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('resource_download_link', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Cover image:</label>";
            echo  "<div class=\"form-group\">";
            echo "<input type=\"file\" name=\"resource_cover_image\" class=\"form-control\">";
            echo  "</div>";
            echo form_submit('regSubmit', 'Submit',"class='btn btn-success btn-block btn-lg'");
            echo  "<br>";
            echo form_close();
            ?>
          </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->