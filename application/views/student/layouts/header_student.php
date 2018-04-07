<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>

	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/starter-template.css">
</head>
<body>

 <?php if($this->session->has_userdata('logged_in') == TRUE) { ?>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="<?= base_url()?>student/index">Angelicum College</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>student/index">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
      
        		 <li class="nav-item">
           			 <div class="nav-link">Logged in as <?= $this->session->userdata('firstname'); ?> <?= $this->session->userdata('lastname'); ?></div>
          		 </li>

          		  <li class="nav-item">
           			 <a href="<?= base_url() ?>student/logout" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          		 </li>
     
        </ul>
      </div>
    </nav>   
<?php }?>