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

            echo form_open('Member_profile/display_workshop_form2');
            echo "<h1>Add Workshop Details (<b>Step 1 of 3</b>)</h1><br>";
            echo validation_errors();
            echo "<label>Workshop Name:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('workshop_name', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Company:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('company', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Workshop Fees:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('fees', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Workshop Date:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('date', 'YYYY-MM-DD',"class='form-control'");
            echo  "</div>";
            echo "<label>Maximum Seats:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('max_seats', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Venue:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('venue', '',"class='form-control'");
            echo  "</div>";
            echo "<label>Certification:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('certification', '',"class='form-control'");
            echo  "</div><br>";
            $items = array('shadow_night','ash','earthly','dirty_fog','candy','winter','forever_lost','almost','aqualicious','kyoto','vasily','blurry_beach','namn','day_tripper','miaka','shrimpy','influenza','calm_darya','bourbon','opa','sea_blizz','midnight_city','moss','sunrise','aubergine','bloody_mary','mango_pulp','rose_water','lemon_twist','emerald_water','intuitive_purple');
            $bg_color=$items[array_rand($items)];
            echo form_hidden('bg_color', $bg_color);
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