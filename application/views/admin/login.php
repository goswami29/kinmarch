<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo HEADER ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- slimscroll -->
        <link href="<?php echo base_url() ?>assets/css/jquery.slimscroll.css" rel="stylesheet">
        <!-- Fontes -->
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/glyphicons.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/simple-line-icons.css" rel="stylesheet">
        <!-- all buttons css -->
        <link href="<?php echo base_url() ?>assets/css/buttons.css" rel="stylesheet">
        <!-- animate css -->
        <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
        <!-- The Wolf main css -->
        <link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
        <!-- theme css -->
        <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet">
        <!-- media css for responsive  -->
        <link href="<?php echo base_url() ?>assets/css/main.media.css" rel="stylesheet">

        <!-- demo  -->
        <link href="<?php echo base_url() ?>assets/css/appdemo.css" rel="stylesheet">
        <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->
    </head>
    <body class="login">
        <div class="middle-box text-center loginscreen ">
            <div class="widgets-container">
                <?php
                $error = $this->session->flashdata('err');
                if (isset($error) && !empty($error)) {
                    ?>
                    <div class="alert alert-danger">
                        <span><?php echo $error ?></span>
                    </div>
                <?php } ?>
                <div>
                    <img width="250px;" src="<?php echo base_url('assets/images/logo.png') ?>">
                </div>
                <!--<h3>India SCM Leadership Summit</h3>-->
                <br>
                <p>Login in. To see it in action.</p>
                <form action="" class="top15" method="POST">
                    <div class="form-group">
                        <input type="text" required="required" placeholder="Username" name="user_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" required="required" placeholder="Password" name="password" class="form-control">
                    </div>
                    <button class="btn aqua block full-width bottom15" type="submit">Login</button>

                </form>

            </div>
        </div>
        <!-- demo  -->
        <script src="<?php echo base_url() ?>assets/js/appdemo.js"></script>
    </body>
</html>