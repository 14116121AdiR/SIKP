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
      <div class="row content" style="height: 950px;">
      <div class="row" style="font-family: times; font-size:20px; font-style: bold;">
      </div>
      <div class="row">
       <?php $this->load->view('dosen/side_page'); ?> 
        
        <div class="right_cont">
          <div class = "title1">
          <p>Profil Pendaftar KP</p>
          </div>
          <div class = "art1" style="">
            <table style="height: 550px;margin-top: 20px;">
            <tr><td width="20px;"></td><td width="200px;">Nama</td><td width="15px;">:</td><td width="580px;"><?php echo $nama_p; ?></td></tr>
            <tr><td></td><td>NIM</td><td>:</td><td><?php echo $id_p; ?></td></tr>
            <tr><td></td><td>Program Studi</td><td>:</td><td><?php echo $prodi_p; ?></td></tr>
            <tr><td></td><td>Alamat</td><td>:</td><td><?php echo $alamat_p; ?></td></tr>
            <tr><td></td><td>Nama Instansi</td><td>:</td><td><?php echo $instansi_p; ?></td></tr> 
            <tr><td></td><td>Alamat Instansi</td><td>:</td><td><?php echo $alamat_instansi_p; ?></td></tr>
            <tr><td></td><td>Telp. Instansi</td><td>:</td><td><?php echo $telpinstansi_p; ?></td></tr>
            <tr><td></td><td>Divisi</td><td>:</td><td><?php echo $div_p; ?></td></tr>
            <tr><td></td><td>Bidang</td><td>:</td><td><?php echo $bidang_p; ?></td></tr>
            <tr><td></td><td>Posisi</td><td>:</td><td><?php echo $posisi_p; ?></td></tr>
            <tr><td></td><td>Waktu Mulai</td><td>:</td><td><?php echo $waktum_p; ?></td></tr>
            <tr><td></td><td>Waktu Selesai</td><td>:</td><td><?php echo $waktus_p; ?></td></tr>
            <tr><td></td><td>Dosen Pembimbing</td><td>:</td><td><?php echo $dosen_p; ?></td></tr>

            <tr><td></td><td>Transkrip Nilai</td><td>:</td><td> 
              <form action= '<?=base_url()?>assets/upload/transkrip/<?php echo $transkrip_p;?>' >
              <button class="btn btn-success btn-sm">Unduh</button>
              </form>
            </td></tr>

            <tr><td></td><td>Surat Balasan</td><td>:</td><td>
              <?php if($balasan_p != NULL){?>
              <form action= '<?=base_url()?>assets/upload/transkrip/<?php echo $balasan_p;?>' >
              <button class="btn btn-success btn-sm">Unduh</button>
              </form>
              <?php }else{ ?> 
              <button class="btn btn-danger btn-sm" disabled="">Mahasiswa Belum Upload Surat Balasan</button>
              <?php } ?>
            </td></tr>

            <tr><td></td><td>Status Validasi</td><td>:</td><td><?php echo $validasi_p; ?></td></tr>
            <tr><td></td><td>Status Pendaftaran</td><td>:</td><td><?php echo $pendaftaran_p; ?></td></tr>     
            </table>

            <table>
              <tr><td></td><td>
            <form action="<?php echo site_url("KP/validasi/". $id_p) ?>" style="margin-top: 20px; margin-left: 20px">
              <button type="submit" value="Validasi" class="btn btn-success btn-md" >Validasi</button>           
            </form>              
            </td><td></td><td>
            <form action="<?php echo site_url("KP/tolak/". $id_p) ?>" style="margin-top: 20px; margin-left: 20px">
              <button type="submit" value="tolak" class="btn btn-danger btn-md" >Tolak</button>           
            </form>
            </td></tr>
            </table>



            </div>

            <div class="title1" style="margin-top: 330px;">
              <p>Dosen Pembimbing Mahasiswa KP</p>
            </div>
            
            <form class="form" action="<?=base_url()?>index.php/KP/dosenpembimbing" method="post">

            <div class="form-group">  
            <select name = "namadosen" type="text" class="form-control" style="width: 400px; margin-top: 20px;">
              <option value="-Pilih-">-Pilih-</option>              
              <option value="Imam Ekowicaksono, S.Si., M.Si">Imam Ekowicaksono, S.Si., M.Si</option>
              <option value="Rajif Agung Yunmar, S.Kom., M.Cs">Rajif Agung Yunmar, S.Kom., M.Cs</option>
              <option value="Amirul Iqbal, S.Kom., M.Eng">Amirul Iqbal, S.Kom., M.Eng</option>
              <option value="Ahmad Luky Ramdani, S.Komp., M.Kom.">Ahmad Luky Ramdani, S.Komp., M.Kom.</option>
            </select>
            </div>

            <div class="form-group">
            <input name ="id_daftar" type="hidden" class="form-control" required="" value= <?php echo $id_pen; ?> >
            </div>

            <div class="form-group">
            <input name ="NIM" type="hidden" class="form-control" required="" value= <?php echo $id_p; ?> >
            </div>

            <div class="form-group">
            <button type="submit" value="pilih" class="btn btn-success btn-md" >Pilih</button>
            </div>
          </form>
          

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