<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi KP</title>

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
        <?php $this->load->view('staff/side_page'); ?>

        <div class="col-sm-6" style="margin-left: 40px;">
        <div class="row">
          <form class="form" method="post" action="<?php echo site_url("KP/ubahkp/". $id_pen) ?>" style="margin-top: 20px;">
          <div class="form-group">
            <label for="Nama_instansi">Nama Instansi :</label>
            <input name = "Nama_instansi" type="text" class="form-control"  value='<?php echo $instansi_p; ?>'>
          </div>
          <div class="form-group">
            <label for="Alamat_instansi">Alamat Instansi :</label>
            <input name = "Alamat_instansi" type="text" class="form-control"  required="" value='<?php echo $alamat_instansi_p; ?>'></input> 
          </div>
          <div class="form-group">
            <label for="No_instansi">No. Telp Instansi :</label>
            <input name = "No_instansi" type="number" class="form-control" required="" value=<?php echo $telpinstansi_p; ?>>
          </div>
          <div class="form-group">
            <label for="divisi">Divisi/Departemen :</label>
            <input name = "divisi" type="text" class="form-control" required="" value='<?php echo $div_p; ?>'>
          </div>
          <div class="form-group">
            <label for="Bidang">Bidang :</label>
            <select name = "Bidang" type="text" class="form-control" >
              <option value='<?php echo $bidang_p; ?>'><?php echo $bidang_p; ?></option>
              <option value="Software Engineer">Software Engineer</option>
              <option value="Game Developer">Game Developer</option>
              <option value="System Analyst dan System Integrator">System Analyst dan System Integrator</option>
              <option value="Konsultan IT">Konsultan IT</option>
              <option value="Database Engineer / Database Administrator">Database Engineer / Database Administrator</option>
              <option value="Web Engineer / Web Administrator">Web Engineer / Web Administrator</option>
              <option value="Programmer">Programmer</option>
              <option value="Intelligent System Developer">Intelligent System Developer</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Posisi">Posisi :</label>
            <select name = "Posisi" type="text" class="form-control">
              <option value='<?php echo $posisi_p; ?>'><?php echo $posisi_p; ?></option>
              <option value="Front End Developer">Front End Developer</option>
              <option value="Back End Developer">Back End Developer</option>
              <option value="Data Analyst">Data Analyst</option>
              <option value="Data Scientist">Data Scientist</option>
              <option value="Quality Assurance">Quality Assurance</option>
              <option value="UI/UX Designer">UI/UX Designer</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Waktu_pelaksanaan">Waktu Pelaksanaan :</label>
            <input name = "Waktu_pelaksanaan" type="date" class="form-control" required="" value=<?php echo $waktum_p; ?>>
            <label>Hingga</label>
            <input name = "Waktu_selesai" type="date" class="form-control" required="" value=<?php echo $waktus_p; ?>>
          </div>
          <div class="form-group">
            <input name ="Nim" type="hidden" class="form-control" required="" value= <?php echo $id_p; ?> >
          </div>
          
          <button type="submit" value="upload" class="btn btn-info btn-lg"s style="background-color: #DAA520; color:white;">Submit</button>          
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