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

            echo form_open_multipart('Member_profile/update_stack');
            echo "<h1>Edit Stack</h1><br>";
            echo validation_errors();
            echo  "<div class=\"form-group\">";
            echo "<label>Stack Name:</label>";
            echo form_dropdown('stack_name', $select_stack, '', "class='form-control'");
            echo "<label>Stack Publisher:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('stack_publisher', $selected_stack->stack_publisher,"class='form-control'");
            echo  "</div>";
            echo "<label>Publisher Image:</label>";
            echo  "<div class=\"form-group\">";
            echo "<input type=\"file\" name=\"publisher_image\" class=\"form-control\">";
            echo  "</div>";
            echo "<label>Stack Text:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('stack_text', $selected_stack->stack_text,"class='form-control'");
            echo  "</div>";
            echo "<label>Stack Link:</label>";
            echo  "<div class=\"form-group\">";
            echo form_input('stack_link', $selected_stack->stack_link,"class='form-control'");
            echo  "</div>";
            echo "<label>Stack Image:</label>";
            echo  "<div class=\"form-group\">";
            echo "<input type=\"file\" name=\"stack_image\" class=\"form-control\">";
            echo  "</div>";
            echo form_hidden('stack_id', $selected_stack->news_stack_id);
            echo form_submit('regSubmit', 'Update Stack',"class='btn btn-success btn-block btn-lg'");
            echo  "<br>";
            echo form_close();
            ?>
          </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->