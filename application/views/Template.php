<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi KP</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/home.css">

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Social Icon Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


  </head>
  <body>
    <!-- Header -->
    <div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow: 0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 3px;">
        <div class="container">
          <div class="row">
        <div class="col-sm-1">
          <a href="#"><img src="<?=base_url()?>assets/img/logo.png" width="70px" style="margin-bottom: 10px"></a>
        </div>
        <div class="col-sm-5">
          <div class="row">
            <div class="col-sm-12">
              <h3>Sistem Informasi Kerja Praktik</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p><em>"Institut Teknologi Sumatera"</em></p>
            </div>
          </div>
        </div>
          <div class="row" style="margin-right: 10px;">
            <div class="col-sm-12">
              <p class="text-right" style="margin-top: 10px;">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <a href="#"><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></a>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <a href="#"><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></a>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <a href="#"><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></a>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <a href="#"><i class="fa fa-youtube fa-stack-1x fa-inverse"></i></a>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
  
    <!-- Navigation -->
    <div class="container" style="background:#daa520; height: 50px;">
      <nav>

        <ul>
            <?php 
        if($_SESSION['logged_in']!=1){
          echo  "<li><a href='".base_url()."index.php/KP/page_login'>Login</a></li>";   
        }else{
          echo  "<li><a href='".base_url()."index.php/KP/page_login'>Hi! ".$_SESSION['nama']."</a></li>";
        }
        ?>
        <li><a style="text-decoration: none;" href="<?=base_url()?>index.php/KP/panduan">Panduan Pendaftaran</a></li>
        <li><a style="text-decoration: none;" href="<?=base_url()?>index.php/KP/dashboard">Home</a></li>

        </ul>
      </nav>
     
    </div>
    
    <div class="container">
      <div class="row content">
      <div class="row">

        <div class = "banner">
         <img src="<?=base_url()?>assets/img/banner2.jpg">
        </div>

        <hr class="style1">

          <div class = "left_content">
            <div class="title">
              <h4>Informasi Magang</h4>
            </div>
          
            <table class="table" style="margin-top: 10px;">
            <?php      
            foreach ($this->session->userdata('art') as $data => $r){ 
              $tanggal = $r['tanggal_publish'];
              ?>
            <tr >
              <td><img src="<?=base_url()?>assets/upload/artikel/<?php echo $r['gambar'];?>" style="width: 140px; height: 100px; margin-left: 10px; "></td>
              <td >
                <a href="<?php echo site_url('KP/artikel_page/'. $r['id_artikel']) ?>" style="text-decoration: none; color: #000"><h4 style="padding-right: 10px"><?php echo $r['judul']  ?></h4></a>
                <h5>Informatika ITERA | <?php echo date("d F Y", strtotime($tanggal)) ?></h5>
              </td>
            </tr>
           <?php } ?>
          </table>
                  
          </div>      
        
        
        </div>

        <div class = "right_content">
          <div class="title1">
              <h4>Jadwal Seminar KP</h4>
          </div>
          <table class="table" style="margin-top: 10px;">
          <tr>
            <th width="100px">Nama</th>
            <th width="120px">Judul</th>
            <th width="30px">Waktu</th>
            <th width="20px">Ruang</th>
          </tr>
          <?php      
            foreach ($this->session->userdata('datasem') as $data => $r){ ?>
            <tr>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['judul_seminar']  ?></td>
              <td><?php echo $r['tanggal_seminar'].'/'.$r['jam'] ?></td>
              <td><?php echo $r['ruang']?></td>  
            </tr>
           <?php } ?>
          </table>
         
        </div>
    </div>
  </div>
</div>

    <div class="container footer">
      <div class="row">
        <div class="col-sm-12">
          <p class="text-center">&copy; Copyright 2019 - All rights reserved.</p>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
