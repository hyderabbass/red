<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0
Version: 1.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?php echo $title; ?> </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo asset_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo asset_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"
          rel="stylesheet" type="text/css"/>


    <link href="<?php echo asset_url(); ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo asset_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo asset_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="<?php echo asset_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">
            <img src="<?php echo asset_url(); ?>assets/img/logo.png" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="<?php echo asset_url(); ?>assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <img alt="" src="<?php echo asset_url(); ?>assets/img/avatar1_small.jpg"/>
                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a>
                    <li class="divider"></li>
            </li>
            <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a>
            </li>
            <li><a href="<?php echo base_url('user/logout'); ?>"><i class="icon-key"></i> Log Out</a>
            </li>
        </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active ">
                <a href="">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
         
            <li class="">
                <a href="javascript:;">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Perf. Evolution</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li>
                        <a href="<?php echo base_url('global'); ?>">
                            Global</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            By Outlet type
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Boutiques</a></li>
                            <li><a href="#">Snacks</a></li>
                            <li><a href="#">Tabagies</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            By Category
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Emerald</a></li>
                            <li><a href="#">Gold</a></li>
                            <li><a href="#">Silver</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Channel Managers</a>
                    </li>
                    <li>
                        <a href="#">
                            Users</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Perf. Comparison</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            By Outlets</a>
                    </li>
                    <li>
                        <a href="#">
                            By Category</a>
                    </li>
                    <li>
                        <a href="#">
                            By Region</a>
                    </li>
                    <li>
                        <a href="#">
                            By Channel Managers</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Outlet type by Category</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            Boutique</a>
                    </li>
                    <li>
                        <a href="#">
                            Snacks</a>
                    </li>
                    <li>
                        <a href="#">
                            Tabagies</a>
                    </li>
                    <li>
                        <a href="#">
                            Channel Managers</a>
                    </li>
                    <li>
                        <a href="#">
                            Region</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:;">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Monthly Evolution</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo base_url('monthly_report'); ?>">
                           By Region</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('monthly_report_by_outlet_type'); ?>">
                           By Channel</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('monthly_report_by_outlet_classification'); ?>">
                           By Classification</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->