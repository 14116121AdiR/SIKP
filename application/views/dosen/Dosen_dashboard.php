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
    
      <div class="container">
      <div class="row content">
      <div class="row" style="font-family: times; font-size:20px; font-style: bold;">
      </div>
      <div class="row">
          <?php $this->load->view('dosen/side_page'); ?>
        
          <div class="right_cont">
          <div class = "title1">
            <p>List Pendaftar KP</p>
          </div>
          <div class = "art1" style="border-bottom: 1px solid #c8c7c4; border-left: 1px solid #c8c7c4; border-right: 1px solid #c8c7c4">
            <table class="table">
              <tr>
                <th width="250px">Nama</th>
                <th width="100px">NIM</th>
                <th width="250px">Dosen Pembimbing</th>
                <th width="100px">Validasi</th>
              </tr>
                  <?php      
                  foreach ($this->session->userdata('data') as $data => $r){ ?>
                  <tr>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['nim'] ?></td>
                    <td><?php echo $r['dosen_pembimbing']?></td>
                    <td><?php echo $r['st_validasi']?></td> 
                    <td><form action="<?php echo site_url('KP/pendaftaran/'. $r['nim']) ?>">
                      <button class="btn btn-info btn-sm">Lihat</button>
                    </form></td> 
                  </tr>
                 <?php } ?>
            </table>            
          </div>
          <div class = "title2">
            <p>Note :</p>
          </div>
          <div class = "art2">
            <p>Klik Lihat Untuk Melihat Detail Pendaftaran KP</p>
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

