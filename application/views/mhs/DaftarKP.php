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
        <?php $this->load->view('mhs/side_page'); ?>
        <div class="col-sm-6" style="margin-left: 40px;">
          <?php
          if($pendaftaran_p==NULL){?>
            <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Silahkan anda mengisi form untuk mendaftar KP
            </div><?php
            $this->load->view('mhs/form_pendaftaran');
          }

          else if($pendaftaran_p=='proses'){?>
            <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Pendaftaran KP Anda Sedang Diproses, Silahkan Melengkapi Berkas Yang Dibutuhkan
            </div>
          <?php 
            $this->load->view('mhs/data_pendaftaran');
                if($validasi_p=='sudah'){
                $this->load->view('mhs/surat_balasan');
                }else{?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Pendaftaran KP anda harus divalidasi terlebih dahulu oleh Kordinator KP Untuk upload Surat Balasan
                </div>
                <?php }
            }

            else if($pendaftaran_p=='gagal'){?>
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Pendaftaran KP Anda Gagal, Silahkan Daftar Kembali
            </div><?php
            $this->load->view('mhs/form_ubahpendaftaran');  
            }

            else{?>
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Pendaftaran KP anda sudah selesai
            </div><?php
            $this->load->view('mhs/data_pendaftaran'); 
            }
          ?>

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
