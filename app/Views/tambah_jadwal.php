<div class="card card-info">
              <div class="card-header">
               
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_jadwal')?>" method="post">
                <h1></h1>
  
    <div class="item form-group">
          <label class="control-label col-12">Nama Kelas <span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_kelas" class="form-control text-capitalize" id="id_kelas" required>
              <option>Pilih Kelas</option>
              <?php 
              foreach ($octa as $kelas) {
              ?>
              <option value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
            <div class="item form-group">
          <label class="control-label col-12">Nama Laboratium <span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_lab" class="form-control text-capitalize" id="id_lab" required>
              <option>Pilih Laboratium</option>
              <?php 
              foreach ($a as $lab) {
              ?>
              <option value="<?php echo $lab->id_lab ?>"><?php echo $lab->nama_lab ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Blok <span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_blok" class="form-control text-capitalize" id="id_blok" required>
              <option>Pilih Blok</option>
              <?php 
              foreach ($b as $blok) {
              ?>
              <option value="<?php echo $blok->id_blok ?>"><?php echo $blok->nama_blok ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12">Nama Pelajaran <span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_pelajaran" class="form-control text-capitalize" id="id_pelajaran" required>
              <option>Pilih Pelajaran</option>
              <?php 
              foreach ($c as $pelajaran) {
              ?>
              <option value="<?php echo $pelajaran->id_pelajaran ?>"><?php echo $pelajaran->nama_pelajaran ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Jam<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="jam" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jam" required="required" placeholder="Jam">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Sesi <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="sesi" name="sesi" placeholder="Sesi " required="required" class="form-control col-12">
          </div>
        </div>

        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Tahun Ajaran <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_tahun" name="nama_tahun" placeholder="Tahun Ajaran " required="required" class="form-control col-12">
          </div>
        </div>
        
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Tanggal <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="date" id="tgl" name="tgl" placeholder="Tanggal " required="required" class="form-control col-12">
          </div>
        </div>
        
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/jadwal" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
            </div>