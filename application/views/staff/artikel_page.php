<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi KP</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/list_pendaftar.css">

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Social Icon Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>
    <!-- Header -->
    <?php $this->load->view('header'); ?>
    <!-- Navigation Menu -->
    <?php $this->load->view('navigation'); ?>
    
      <div class="container">
      <div class="row content">
      <div class="row" >
        <h5 style="font-weight: bold; margin-left: 10%"><?php echo date("d F Y", strtotime($tanggal)) ?></h5>
        <h3 style="margin-left: 10%; margin-right: 20%; font-weight: bolder;"><?php echo $judul ?></h3>
        <h5 style="margin-left: 10%"><?php echo 'Admin Informatika ITERA' ?></h5>
        <img style="margin-left: 10%; width: 60%"  src="<?=base_url()?>assets/upload/artikel/<?php echo $gambar;?>">
        <h5 style="margin-left: 10%; margin-right: 20%; margin-top: 30px; line-height: 25px; text-align: justify;"; ><?php echo $isi?></h5>
      </div>
      
      </div>
      </div>
<!---->
    <div class="container footer">
      <div class="row">
        <div class="col-sm-12">
          <p class="text-center">&copy; Copyright 2019. SiKaPe</p>
        </div>
      </div>
    </div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/script.js"></script>
  </body>
</html>