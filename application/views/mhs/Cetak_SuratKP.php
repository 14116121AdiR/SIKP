<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KP | INSTITUT TEKNOLOGI SUMATERA</title>

      <!-- Custom Stylesheet -->

      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/afterlogin.css">

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


      <div class="container">
      <div class="row content">
      <div class="row" style="font-family: times; font-size:20px; font-style: bold;">
      </div>
      <div class="row">
        <?php $this->load->view('mhs/side_page'); ?>                   

        <div class="col-sm-6" style="margin-left: 20px; margin-top: 50px; border-top: 1px solid brown; ">
        <div class="row" style="margin-top: 10px;">

          <p><strong>SURAT PENGANTAR DARI JURUSAN KE INSTANSI</strong></p>
          <?php if($st_val=='sudah'){?>
          <form action="<?php echo site_url('KP/surat_pengantar/'.$id) ?> ">
            <button class="btn btn-success btn-md">Unduh</button>
          </form>
          <?php }else{ ?> 
          <form action="<?php echo site_url('KP/cetaksuratkp/'.$id) ?> ">
            <button class="btn btn-warning btn-md" disabled="">Unduh</button><p style="color: red">Pendaftaran KP anda belum divalidasi </p>
          </form>
          <?php } ?>

          <p style="margin-top: 40px;"><strong>SURAT TUGAS DARI JURUSAN KE INSTANSI</strong></p>
          <?php if($st_pend=='selesai'){?>
          <form action="<?php echo site_url('KP/surat_tugas/'.$id) ?> ">
            <button class="btn btn-success btn-md">Unduh</button>
          </form>
          <?php }else{ ?> 
          <form action="<?php echo site_url('KP/cetaksuratkp/'.$id) ?> ">
            <button class="btn btn-warning btn-md" disabled="">Unduh</button><p style="color: red">Pendaftaran KP anda belum selesai </p>
          </form>
          <?php } ?>

        </div>
        </div> 
      </div>
      </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('footer'); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/script.js"></script>
  </body>
</html>
