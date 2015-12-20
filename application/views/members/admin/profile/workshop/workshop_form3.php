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

            echo form_open('Member_profile/workshop_submit');
            echo "<h1>Add Workshop Details (<b>Step 3 of 3</b>)</h1><br>";
            echo "<textarea id=\"myTextarea\" name=\"workshop_desc\">Hello World</textarea>";
            echo form_hidden('workshop_id', $workshop_id);
            echo "<br>";
            echo form_submit('regSubmit', 'Finish',"class='btn btn-success btn-block btn-lg'");
            echo  "<br>";
            echo form_close();
            ?>
          </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->