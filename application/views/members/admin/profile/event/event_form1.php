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

            echo form_open_multipart('Member_profile/add_event_form2');
            echo "<h1>Add Event Details (<b>Step 1 of 2</b>)</h1><br>";
            echo validation_errors();
            echo "<label>Event Name:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_name', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Event organised by:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_organised_by', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Event Cover Image:</label>";
            echo  "<div class=\"form-group\">";
            echo "<input type=\"file\" name=\"event_cover_image\" class=\"form-control\">";
            echo  "</div>";
            $items = array('shadow_night','ash','earthly','dirty_fog','candy','winter','forever_lost','almost','aqualicious','kyoto','vasily','blurry_beach','namn','day_tripper','miaka','shrimpy','influenza','calm_darya','bourbon','opa','sea_blizz','midnight_city','moss','sunrise','aubergine','bloody_mary','mango_pulp','rose_water','lemon_twist','emerald_water','intuitive_purple');
            $bg_color=$items[array_rand($items)];
            echo form_hidden('event_bg_color', $bg_color);
            echo  "<div class=\"form-group\">";
            echo "<label>Type of Event:</label>";
            $options = array(
                              'Seminar'  => 'Seminar',
                              'Guest Lecture'    => 'Guest Lecture',
                              'Meetup'   => 'Meetup',
                            );

            echo form_dropdown('event_type', $options, '', "class='form-control'");
            echo  "</div>";
            echo "<label>Event Date:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_start_time', 'YYYY-MM-DD',"class='form-control'");
            echo  "</div>";
            echo "<label>Event Ticket Price:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('event_ticket_price', '',"class='form-control'");
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