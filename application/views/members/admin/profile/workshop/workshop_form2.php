<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div col="col-md-12">
        <div class="col-md-offset-2 col-md-8">
          <?php

            echo form_open_multipart('Member_profile/display_workshop_form3');
            echo "<h1>Add Workshop Details (<b>Step 2 of 3</b>)</h1><br>";
            echo validation_errors();
            echo "<label>Workshop cover image:</label>";
            echo  "<div class=\"form-group\">";
            echo "<input type=\"file\" name=\"workshop_image\" class=\"form-control\">";
            echo  "</div>";
            echo  "<div class=\"form-group\">";
            echo "<label>Suitable Branches:</label>";
            echo form_multiselect('branch[]', $select_branch, '', "class='form-control'");
            echo "</div>";
            echo form_hidden('workshop_id', $workshop_id);
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