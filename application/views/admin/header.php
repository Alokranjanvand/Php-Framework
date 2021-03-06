<!DOCTYPE html>
<html lang="en">
<head>
  <title>Provast</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
   
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
  <header>
<div class="container">
  <div class="row">
<div class="col-md-3">
  <div class="logo ">
    <a href="index.html"><img src="<?= base_url('assets/img/aikya_logo.png');?>" height="80"></a>
  </div>
</div>
<div class="col-md-5">
  <h2 class="text-center serviveportal">Dashboard Panel</h2>
  </div>
<div class="col-md-4">
 <div class="col-md-12 ">
<div class="row">
  <div class="col-md-12">
    <div class="topright">
      <div class="ftb1">
        <span>Calendar</span>
      </div>
      <div class="ftb">
        <span id="demo"></span>
      </div>
      <div class="ftb">
            <i class="fa fa-calendar"></i>
            <form name="clockForm">
            <input type="text" name="clockButton" class="showdate border-0"/>
            </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div id="info"></div>
  </div>
</div><!-- row -->
<div class="row">
<div class="col-md-3 col-sm-4 col-3" >
  <div class="ftbtimezone" >
      <p>Time Zone:  </p>
  </div>
</div>
<div class="col-md-8 col-sm-8 col-9">
  <div class="row pd-left">
    <div class="timezone">
      <div class="te">
      <span id="timezone"></span>
      </div>
    </div>
  </div>
</div>
</div><!-- row -->
</div>
</div>
</div>
</header>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbg" id="navbar">
    <div class="container">
  <a class="navbar-brand" href="<?= site_url('admin');?>">Dashboard</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <!-- Dropdown -->
    
    
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('admin/add');?>">
        Add Data
      </a>
     
    </li>
   <li class="nav-item">
      <a class="nav-link" href="<?= site_url('admin/view');?>">
        view Data
      </a>
     
    </li>
   
    
    </ul>
    <ul class="navbar-nav">
  
  <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown">
          <i class="fa fa-bell" style="font-size:20px;">
            <span class="badge badge-danger">11</span>
          </i>
         
        </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Notification 1</a>
        <a class="dropdown-item" href="#">Notification 2</a>
    <a class="dropdown-item" href="#">Notification 3</a>
    <a class="dropdown-item" href="#">Notification 4</a>
    <a class="dropdown-item" href="#">Notification 5</a>
      </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php
        echo ucfirst($this->session->userdata('user_name'));
        ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('admin/changepassword');?>">Change Password</a>
        <a class="dropdown-item" href="<?= site_url('admin/logout');?>">Logout</a>
      </div>
    </li>
    </ul>
    
  </div>
  </div>
</nav>
