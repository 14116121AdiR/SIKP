<div class="row">
          <form class="form" method="post" action="<?php echo site_url("KP/daftarulang_kp/". $id_pen) ?>" style="margin-top: 20px;"
            enctype="multipart/form-data">
          <div class="form-group">
            <label for="Nama_instansi">Nama Instansi :</label>
            <input name = "Nama_instansi" type="text" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="Alamat_instansi">Alamat Instansi :</label>
            <textarea name = "Alamat_instansi" type="text" class="form-control" rows="3" required=""></textarea> 
          </div>
          <div class="form-group">
            <label for="No_instansi">No. Telp Instansi :</label>
            <input name = "No_instansi" type="number" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="divisi">Divisi/Departemen :</label>
            <input name = "divisi" type="text" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="Bidang">Bidang :</label>
            <select name = "Bidang" type="text" class="form-control">
							<option value="-Pilih-">-Pilih-</option>
              <option value="Software Engineer">Software Engineer</option>
              <option value="Game Developer">Game Developer</option>
              <option value="System Analyst dan System Integrator">System Analyst dan System Integrator</option>
              <option value="Konsultan IT">Konsultan IT</option>
              <option value="Database Engineer / Database Administrator">Database Engineer / Database Administrator</option>
              <option value="Web Engineer / Web Administrator">Web Engineer / Web Administrator</option>
              <option value="Programmer">Programmer</option>
              <option value="Intelligent System Developer">Intelligent System Developer</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Posisi">Posisi :</label>
            <select name = "Posisi" type="text" class="form-control">
							<option value="-Pilih-">-Pilih-</option>
              <option value="Front End Developer">Front End Developer</option>
              <option value="Back End Developer">Back End Developer</option>
              <option value="Data Analyst">Data Analyst</option>
              <option value="Data Scientist">Data Scientist</option>
              <option value="Quality Assurance">Quality Assurance</option>
              <option value="UI/UX Designer">UI/UX Designer</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Waktu_pelaksanaan">Waktu Pelaksanaan :</label>
            <input name = "Waktu_pelaksanaan" type="date" class="form-control" required="">
            <label>Hingga</label>
            <input name = "Waktu_selesai" type="date" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="Transkrip">Transkrip :</label>
            <input name = "berkas" type="file" class="form-control-file" required="">
          </div>
          <div class="form-group">
            <input name ="Nim" type="hidden" class="form-control" required="" value= <?php echo $id; ?> >
          </div>
            <button type="submit" value="upload" class="btn btn-info btn-lg"s style="background-color: #DAA520; color:white;">Submit</button>         
  
          <?php
            if($res>=1){
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