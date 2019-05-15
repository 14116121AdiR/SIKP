        <div class="row" style="margin-left: 0px;">

          <form class="form" method="post" action="<?php echo site_url("KP/suratbalasan/". $id_pen) ?>" style="margin-top: 20px;"
            enctype="multipart/form-data">

          <div class="form-group" style="margin-top: 15px">
            <label class="btn btn-primary btn-md" for="balasan">Apakah Anda Diterima KP oleh Instansi ? </label>
            <br><input type="radio" name="balasan" value="true"/>  Diterima 
            <input type="radio" name="balasan" value="false"/>  Tidak Diterima
          </div>  
          <div class="form-group" style="margin-top: 15px">
            <label class="btn btn-info btn-md" for="surat_balasan">Jika Diterima Silahkan Upload Surat Balasan Dari Instansi :</label>
            <input style="margin-top: 10px;" name = "surat_balasan" type="file" class="form-control-file" required="">
          </div>
          
          <button type="submit" class="btn btn-info btn-lg"s style="background-color: #DAA520; color:white;">Submit</button>
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