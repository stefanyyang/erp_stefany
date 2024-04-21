<div class="card card-info">
              <div class="card-header">
               
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_jadwal')?>" method="post">
        <input type="hidden" name="id" value="<?= $octa->id_jadwal?>">
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Kelas<span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_kelas" class="form-control" id="id_kelas" required>
              <option value="<?= $octa->id_kelas?>"><?= $octa->nama_kelas?></option>

              <?php 
              foreach ($a as $kelas) {
              ?>

              <option value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Laboratium<span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_lab" class="form-control" id="id_lab" required>
              <option value="<?= $octa->id_lab?>"><?= $octa->nama_lab?></option>

              <?php 
              foreach ($b as $lab) {
              ?>

              <option value="<?php echo $lab->id_lab ?>"><?php echo $lab->nama_lab ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Blok<span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_blok" class="form-control " id="id_blok" required>
              <option value="<?= $octa->id_blok?>"><?= $octa->nama_blok?></option>

              <?php 
              foreach ($c as $blok) {
              ?>

              <option value="<?php echo $blok->id_blok ?>"><?php echo $blok->nama_blok ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Pelajaran<span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_pelajaran" class="form-control" id="id_pelajaran" required>
              <option value="<?= $octa->id_pelajaran?>"><?= $octa->nama_pelajaran?></option>

              <?php 
              foreach ($d as $pelajaran) {
              ?>

              <option value="<?php echo $pelajaran->id_pelajaran ?>"><?php echo $pelajaran->nama_pelajaran ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Jam <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="jam" name="jam" placeholder="Jam " required="required" class="form-control col-12 " value="<?= $octa->jam?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Sesi <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="sesi" name="sesi" placeholder="Sesi " required="required" class="form-control col-12 " value="<?= $octa->sesi?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Tahun Ajaran<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_tahun" name="nama_tahun" placeholder="Tahun Ajaran" required="required" class="form-control col-12 " value="<?= $octa->nama_tahun?>">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Tanggal<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="tanggal_jadwal" name="tanggal_jadwal" placeholder="Tanggal" required="required" class="form-control col-12 " value="<?= $octa->tanggal_jadwal?>">
          </div>
        </div>
        <h1></h1>
          <div class="col-12">
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/jadwal" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
            </div>