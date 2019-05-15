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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Header -->
    <?php $this->load->view('header'); ?>
    <!-- Navigation Menu -->
    <?php $this->load->view('navigation'); ?>
    
    <div class="container" >
      <div class="row content" style="height: 500px;">
      <div class="row" style="font-family: times; font-size:20px; font-style: bold;">
      </div>
      <div class="row">
        <?php $this->load->view('dosen/side_page'); ?>
        
        <div class="right_cont">
          <div class = "title1">
          <p>Profil Pendaftar Seminar</p>
          </div>
          <div class = "art1" style="">
            <table style="height: 300px;margin-top: 20px;">
            <tr><td width="20px;"></td><td width="200px;">Nama</td><td width="15px;">:</td><td width="580px;"><?php echo $nama_p; ?></td></tr>
            <tr><td></td><td>NIM</td><td>:</td><td><?php echo $id_p; ?></td></tr>
            <tr><td></td><td>Judul Seminar</td><td>:</td><td><?php echo $judulseminar_p; ?></td></tr>
            <tr><td></td><td>Tanggal Seminar</td><td>:</td><td><?php echo $tanggalseminar_p; ?></td></tr> 
            <tr><td></td><td>Waktu Seminar</td><td>:</td><td><?php echo $jamseminar_p; ?></td></tr>
            <tr><td></td><td>Ruang Seminar</td><td>:</td><td><?php echo $ruangseminar_p; ?></td></tr>
            <tr><td></td><td>Status Validasi</td><td>:</td><td><?php echo $statusvalidasi_p; ?></td></tr>
            </table>
            <form action="<?php echo site_url("KP/validasi_seminar/". $id_seminar) ?>" style="margin-top: 20px; margin-left: 20px">
              <button type="submit" value="Validasi" class="btn btn-info btn-lg"s style="background-color: #DAA520; color:white;">Validasi</button>           
            </form>
            </div>
        </div>  
      

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