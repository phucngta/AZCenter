<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title;?></title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/flat-ui.min.css')?>"> -->
  <!-- <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet"  type="text/css"> -->

  <!-- Latest compiled and minified CSS & JS -->
  
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/ajax.js');?>"> </script>

  <?php echo $before_head;?>
</head>
<body>
  <?php
  if($this->ion_auth->logged_in()) {
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Container -->
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('admin');?>"><?php echo $this->config->item('cms_title');?></a>
        </div>

        <!-- nav.collapse -->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php echo $current_user_nav_menu?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $current_user->name;?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('admin/profile');?>">Profile page</a></li>
                <?php echo $current_user_drop_menu?>
                <li><a href="<?php echo site_url('admin/user/logout');?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <!-- End Container -->

    </nav>
    <!-- End Navigation -->
    <?php
    if($this->session->flashdata('message'))
    {
      ?>
      <div class="container" style="padding-top:40px;">
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('message');?>
          </div>
        </div>
        <?php
      }
      ?>
      <?php 
    }?>