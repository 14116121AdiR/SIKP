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


        <div class="col-sm-6" style="margin-left: 40px;">
          <div class="row">
          <form class="form" method="post" action="<?=base_url()?>index.php/KP/submit_seminar" style="margin-top: 20px;"
            enctype="multipart/form-data">
          <div class="form-group">
            <input name ="id_daftar_kp" type="hidden" class="form-control" required="" value= <?php echo $id_kp; ?> >
          </div>  
          <div class="form-group">
            <label for="Judul">Judul Seminar :</label>
            <input name = "judul" type="text" class="form-control" required="">
          </div>        
          <div class="form-group">
            <label for="Waktu_pelaksanaan">Tanggal Seminar :</label>
            <input name = "Waktu_pelaksanaan" type="date" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="jam">Waktu Seminar :</label>
            <input name = "jam" type="text" class="form-control" required="">
          </div>  
          <div class="form-group">
            <label for="ruang">Ruang Seminar :</label>
            <input name = "ruang" type="text" class="form-control" required="">
          </div>

          <div class="form-group">
            <label for="laporan">Laporan :</label>
            <input name = "laporan" type="file" class="form-control-file" required="">
          </div>

          <div class="form-group">
            <label for="logbook">Logbook :</label>
            <input name = "logbook" type="file" class="form-control-file" required="">
          </div>
          
          <button type="submit" class="btn btn-info btn-lg"s style="background-color: #DAA520; color:white;">Submit</button>
          <?php
            if($res){
              echo '<div class="alert-box success form-feedback"> Data yang diinputkan sukses</div>';
              $res=NULL;
            }elseif ($res!=NULL&&$res<1){
              echo '<div class="alert-box success form-feedback"> Data yang diinputkan gagal</div>';
               $res=NULL;
            }else{
              $res=NULL;
            }
          ?>
          
        </form>
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
