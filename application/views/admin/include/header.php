<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo HEADER; ?></title>
        <!-- Checkedit-->
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- slimscroll -->
        <link href="<?php echo base_url(); ?>assets/css/jquery.slimscroll.css" rel="stylesheet">
        <!-- project -->
        <link href="<?php echo base_url(); ?>assets/css/project.css" rel="stylesheet">
        <!--timeline_horizontal-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/horizontalTimeLine.css">
        <!-- dataTables -->
        <link href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/responsive.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/fixedHeader.dataTables.min.css" rel="stylesheet">
        <!-- Fontes -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/glyphicons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/ameffectsanimation.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/buttons.css" rel="stylesheet">
        <!-- animate css -->
        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <!-- The Wolf main css -->
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <!-- fullcalendar -->
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.css' rel='stylesheet' />
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- icheck -->
        <link href="<?php echo base_url(); ?>assets/css/skins/all.css" rel="stylesheet">
        <!-- The Wolf demo css-->
        <!--<link href="<?php echo base_url(); ?>assets/css/The Wolfdemo.css" rel="stylesheet">-->
        <!-- theme css -->
        <link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet">
        <!-- media css for responsive  -->
        <link href="<?php echo base_url(); ?>assets/css/main.media.css" rel="stylesheet">

        <!-- demo  -->
        <link href="<?php echo base_url(); ?>assets/css/appdemo.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body class="page-header-fixed page-sidebar-menu-border  page-sidebar-fixed ">
        <div class="page-header navbar fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo site_url('admin/Dashboard') ?>"> <img class="logo-default" alt="logo" src="<?php echo base_url('assets/images/logo.png') ?>"> </a>
                </div>
                <!-- END LOGO -->
                <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
                <a class="mobile-sub-link hidden-md-up"><i class="fa fa-ellipsis-v"></i></a>
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">  
                    <div class="hor-menu hidden-sm-down">
                        <ul class="nav">
                            <li class="nav-item"> <a onclick="toggleFullScreen()" href="javascript:;" class="nav-link fullscreen"><span class="glyphicon glyphicon-fullscreen"> </span></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav pull-right hidden-sm-down">
                        <!-- START USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <?php $user = $this->session->userdata('admin_logged_in'); ?>
                            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                                <img src="<?php echo base_url(); ?>assets/images/not-available.png" class="rounded-circle" alt="" >
                                <span class="username username-hide-on-mobile">
                                     Hello <?php echo(isset($user) && !empty($user['user_name'])) ? $user['user_name'] : '' ?></span>
                                <i class="fa fa-angle-down"></i> </a>

                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo site_url('admin/setting') ?>"> <i class="icon-key"></i> Change Password </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/Login/logout') ?>"> <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <!-- Start page sidebar wrapper -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar sidebar-light">
                    <ul class="page-sidebar-menu  page-header-fixed ">

                        <li class="nav-item <?php echo (isset($active) && $active == 1) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Home</span><span class="arrow"></span> 
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Slider') ?>"> <span class="title">Home Slider</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Welcome') ?>"> <span class="title">Home Welcome</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Product') ?>"> <span class="title"> Kinmarche Products</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Contact') ?>"> <span class="title">Contact Details</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/SupermarketImage') ?>"> <span class="title">Home Supermarket Images</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/StoreImage') ?>"> <span class="title">Store Header Image</span> </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 2) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Aboutus') ?>"> <i class="fa fa-th-large"></i> <span class="title">About Us</span> </a>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 6) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Category') ?>"><i class="fa fa-th-large"></i> <span class="title"> Product Category </span> </a>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 8) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Supermarket') ?>"> <i class="fa fa-th-large"></i> <span class="title">Super Market</span> </a>
                        </li>
                        
                        <li class="nav-item <?php echo (isset($active) && $active == 3) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Testimonial') ?>"><i class="fa fa-th-large"></i> <span class="title">Testimonials</span> </a>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 9) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Brand') ?>"><i class="fa fa-th-large"></i> <span class="title">Brands</span> </a>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 4) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Contact Us</span><span class="arrow"></span> 
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Contactus') ?>"> <span class="title">Contact Us List</span> </a>
                                </li>
                                <li>
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Contactenquiry') ?>"> <span class="title">Contact Enquiry List</span> </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item <?php echo (isset($active) && $active == 5) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="<?php echo site_url('admin/Ourshops') ?>"> <i class="fa fa-th-large"></i> <span class="title">Our Stores</span> </a>
                        </li>

                        <li class="nav-item <?php echo (isset($active) && $active == 7) ? 'active open' : ''; ?>">
                            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">News & Event</span><span class="arrow"></span> 
                            </a>
                            <ul class="sub-menu">
                                <!-- <li class="nav-item">
                                    <a class="nav-link nav-toggle" href="<?php //echo site_url('admin/Newscategory') ?>"> <span class="title">News Category List</span> </a>
                                </li> -->
                                <li>
                                    <a class="nav-link nav-toggle" href="<?php echo site_url('admin/News') ?>"> <span class="title">News List</span> </a>
                                </li>
                            </ul>
                        </li>
                      
   
                    </ul>
                </div>
            </div>
        </div>