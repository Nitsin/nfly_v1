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

            echo form_open('Member_profile/event_submit');
            echo "<h1>Add Workshop Details (<b>Step 2 of 2</b>)</h1><br>";

            echo "<label>Event Venue:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_venue', '',"class='form-control'");
            echo  "</div>";

            echo "<label>Event organiser details:</label>";
            echo "<textarea id=\"myTextarea\" name=\"event_organiser_detail\">Hello World</textarea>";
            echo "<br>";

            echo "<label>Event_ details</label>";
            echo "<textarea id=\"myTextarea1\" name=\"event_details\">Hello World</textarea>";
            echo "<br>";

            echo "<label>Event Location:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_location', '',"class='form-control'");
            echo  "</div>";

            echo form_hidden('event_id', $event_id);
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