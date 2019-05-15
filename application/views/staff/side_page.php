
        <div class="col-sm-3">
          <div class="row">
          <img src="<?=base_url()?>assets/upload/foto_profil/<?php echo $this->session->userdata('foto');?>" style="width: 140px; height: 180px; margin-left: 60px; border: 3px solid #DAA520; margin-left: 90px;">
          <button style="margin-left: 120px; margin-top: 10px;" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Ganti Foto</button>
          </div>
          <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
               <div class="list-group">
                  <ul style="list-style-type: none;">
                   <li class="list-group-item"><a href="<?=base_url()?>index.php/KP/profile" style="color: #555; text-decoration: none; display: block;">List Pendaftar KP</a></li>
                   <li class="list-group-item"><a href="<?=base_url()?>index.php/KP/listmahasiswa" style="color: #555; text-decoration: none; display: block;">List Mahasiswa</a></li>
                   <li class="list-group-item"><a href="<?=base_url()?>index.php/KP/" style="color: #555; text-decoration: none; display: block;">Gambar</a></li>
                   <li class="list-group-item"><a href="<?=base_url()?>index.php/KP/artikel" style="color: #555; text-decoration: none; display: block;">Pengumuman</a></li>
                   <li class="list-group-item"><a href="<?=base_url()?>index.php/KP/index" style="color: #555; text-decoration: none; display: block;">Logout</a></li>
                   </ul>
          </div>
            </div>
          </div>

          <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Photo</h4>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                <?php 
                $da['tabel']='tbl_staff';
                $this->session->set_userdata($da); 
                ?>
                <form method="post" action="<?=base_url()?>index.php/KP/aksi_upload" enctype="multipart/form-data"> 
                <input class="btn btn-info btn-md" type="file" name="berkas" /> 
                <br /><br /> 
                <input class="btn btn-primary btn-md" type="submit" value="upload" />
              </form>
              </div>
            </div>
          </div>
        </div>          
        </div>