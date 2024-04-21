<div class="card card-info">
              <div class="card-header">
               
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_pengguna')?>" method="post">
                
        <input type="hidden" name="id" value="<?= $octa->id_user?>">
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >NIK<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nik" class="form-control col-12 "name="nik" required="required" placeholder="NIK" value="<?= $octa->nik?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Nama <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama" name="nama" placeholder="Nama " required="required" class="form-control col-12 " value="<?= $octa->nama?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Alamat <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="alamat" name="alamat" placeholder="Alamat " required="required" class="form-control col-12 " value="<?= $octa->alamat?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Tempat Tanggal Lahir <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir " required="required" class="form-control col-12 " value="<?= $octa->ttl?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Kelas<span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_kelas" class="form-control text-uppercase" id="id_kelas" required>
              <option class="text-uppercase" value="<?= $octa->id_kelas?>"><?= $octa->nama_kelas?></option>

              <?php 
              foreach ($ok as $kelas) {
              ?>

              <option class="text-uppercase" value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Jenis Kelamin <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
              <option value="<?= $octa->jk?>"><?= $octa->jk; ?></option>
              <!-- <option>Select Gender</option> -->
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Username<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-12" value="<?= $octa->username?>">
          </div>
        </div>
        <h1></h1>
       <div class="item form-group">
          <label class="control-label col-12" >Level <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
              <option value="<?= $octa->level?>"><?= $octa->level; ?></option>
              <option value="1">Admin</option>
              <option value="2">Penangung Jawab</option>
              <option value="3">Guru</option>
              <option value="4">Siswa</option>
            </select>
          </div>
        </div>
        <h1></h1>
          <div class="col-12">
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/Pengguna" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
            </div>