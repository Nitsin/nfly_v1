
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>nFly.in- Password Reset</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="background">
        <img src="<?php echo base_url(); ?>/dist/img/background.jpg">
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand topnav" href="#" style="margin-top:-5px;font-size:28px;margin-top:10px;margin-left:30px;color:#fff"><span class="logo-mini"><img src="<?php echo base_url(); ?>dist/img/logo.png" style="width:70px;height:70px" ></span>&nbsp&nbspnFly.in</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" style="margin-top:30px;margin-right:60px">
            <li><a href="#">Go Premium</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Sign In</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
               <div class="col-md-8">
                <h1 class="intro-message-left" style="font-size:80px">Your whole campus life served at one place!</h1>
                    
               </div>
               <div class="col-md-4">
                <div class="intro-message" style="margin-top:80px">
                    <?php

                    echo form_open('Manage/reset_password_validation');
                    echo "<h4>Forgot password? No Worries!</h4><br>";
                    if ($this->session->flashdata('msg') != ''){
                        echo $this->session->flashdata('msg');
                    }
                    echo "<br>";     
                    echo validation_errors();
                    echo  "<div class=\"form-group\">";
                    echo form_input('email', 'Enter your email',"class='form-control input-lg'");
                    echo  "</div>";
                    echo form_submit('loginSubmit', 'Send me the Reset link',"class='btn btn-success btn-block btn-lg'");
                    echo  "<br>";
                    echo "<small>Once you enter the email and hit submit. We will send you an email, just follow the link in the email to reset your password.</small>";
                    echo form_close();
                    ?>
                </div>
               </div>
                
            </div>

        </div>
        <!-- /.container -->

    </div>
    <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.js"></script>
     

</body>

</html>
