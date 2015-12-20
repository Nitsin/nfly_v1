<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Registration Successful!

        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
        
        <div class="callout callout-success">
          <h4>Congratulations</h4>

          <p>You have successfully registered with us. Just one more step before you can access your public profile.</p>
        </div>
        <div class="box box-default">
          <div class="box-body">
            <h1 style="text-align:center">Academic Info</h1>
            <p style="text-align:center">Note- Provide in with the correct details so that we can fetch you relevant information.</p>
            <div class="col-md-offset-3 col-md-6">
            <?php

                    echo form_open('Register/update_additional_info');
                    
                    if ($this->session->flashdata('msg') != ''){
                        echo $this->session->flashdata('msg');
                    }
                    echo  "<div class=\"form-group\">";
                    echo "<label>College Name:</label>";

                    echo form_dropdown('college', $select_options, '', "class='form-control input-lg'");
                    echo  "</div>";
                    echo  "<div class=\"form-group\">";
                    echo "<label>Course pursuing:</label>";
                    $options = array(
                                      'be'  => 'BE/B-Tech',
                                      'bca'    => 'BCA/MCA',
                                      'oth'   => 'Others',
                                    );

                    echo form_dropdown('course', $options, '', "class='form-control input-lg'");
                    echo  "</div>";
                    echo  "<div class=\"form-group\">";
                    echo "<label>Branch selected:</label>";

                    echo form_dropdown('branch', $select_options_branch, '', "class='form-control input-lg'");
                    echo  "</div>";
                    echo  "<div class=\"form-group\">";
                    echo "<label>Year studying in:</label>";
                    $options = array(
                                      'first'  => 'First',
                                      'second'    => 'Second',
                                      'third'   => 'Third',
                                      'fourth' => 'Fourth',
                                    );

                    

                    echo form_dropdown('year', $options, '', "class='form-control input-lg'");
                    echo  "</div>";
                    echo form_submit('regSubmit', 'Take me to my Profile',"class='btn btn-success btn-block btn-lg'");
                    echo  "<br>";
                    echo form_close();
                    ?>
                    </div>
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>