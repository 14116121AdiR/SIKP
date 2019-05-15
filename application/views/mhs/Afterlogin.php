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
  <!---->

      <div class="container">
      <div class="row content">
      <div class="row" style="font-family: times; font-size:20px; font-style: bold;">
      </div>
      <div class="row">
        <?php $this->load->view('mhs/side_page'); ?>

        <div class="col-sm-6">
          <div class="info" >
            <div class="box" style="background: #ffea00">
              <img src="<?=base_url()?>assets/img/kp.png">
              <p><br><?php echo $this->session->userdata('info_kp') ?><br></p>
            </div>
            <div class="box" style="background: #ffb600">
              <img src="<?=base_url()?>assets/img/pembimbing.png">
              <p><br><?php echo $this->session->userdata('info_pem') ?><br></p>
            </div>
            <div class="box" style="background: #ff7200">
              <img src="<?=base_url()?>assets/img/seminar.png">
              <p><br><?php echo $this->session->userdata('info_sem1').' / '.$this->session->userdata('info_sem2') ?><br></p>
            </div>
            <div class="box" style="background: #ff3600">
              <img src="<?=base_url()?>assets/img/laporan.png">
              <p><br><?php echo $this->session->userdata('info_lap') ?><br></p>
            </div>         
          </div>
          
          <div class="biodata">
          <table style="height: 250px;margin-top: 20px;">
            <tr><td width="50px"></td><td width="150px">Nama</td><td width="20px">:</td><td width="550px"><?php echo $nama; ?></td></tr>
            <tr><td></td><td>NIM</td><td>:</td><td><?php echo $id; ?></td></tr>
            <tr><td></td><td>Program Studi</td><td>:</td><td><?php if($prodi=='IF'){
                  echo 'Teknik Informatika';
                  }?></td></tr>
            <tr><td></td><td>Jenis Kelamin</td><td>:</td><td><?php if($jenis_kelamin=='L'){
                  echo 'Laki-Laki';
                  }else{echo 'Perempuan';}?> </td></tr>
            <tr><td></td><td>Email</td><td>:</td><td><?php echo $username; ?></td></tr> 
            <tr><td></td><td>Alamat</td><td>:</td><td><?php echo $alamat; ?></td></tr>
            <tr><td></td><td>No.Telepon</td><td>:</td><td><?php echo $telp; ?></td></tr>
           </table> 
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