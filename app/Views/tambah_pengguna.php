<!-- 
   <div class="content-wrapper">
  <form action="<?= base_url('/Home/aksi_tambah_pengguna/')?>"method="post">

    <div class="mb-3 mt-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">
    </div>


   
    <div class="mb-3 mt-3">
      <label for="ttl" class="form-label">Tempat Tanggal Lahir </label>
      <input type="ttl" class="form-control" id="ttl" placeholder="Isi Tempat Tanggal Lahir" name="ttl"  value="s<?php echo $jojo->ttl?>">
    </div>

     <div class="mb-3 mt-3">
      <label for="nik" class="form-label">NIK </label>
      <input type="text" class="form-control" id="nik" placeholder="Isi NIK" name="nik"  value="<?php echo $jojo->nik?>">
    </div>

      <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name ="jk">
                <option>Pilih</option>
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
               </div>
              </div>

                 <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_pengguna">Tanggal Pengguna<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal_pengguna" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tanggal_pengguna" placeholder="Isi Tanggal Pengguna" required="required" type="date">
            </div>
          </div>


 

     <div class="mb-3 mt-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" placeholder="Isi Alamat" name="alamat"  value="<?php echo $jojo->alamat?>">
    </div>
   
   

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
</div>

</tr>
</body>
</html> -->

<div class="card card-info">
              <div class="card-header">
            
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_pengguna')?>" method="post">

                <h1></h1>                
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">NIK<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="nik" name="nik" placeholder="NIK" required="required" class="form-control col-md-12 col-xs-12">
          </div>
        </div>

        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="nama" name="nama" placeholder="Nama" required="required" class="form-control col-md-12 col-xs-12">
          </div>
        </div>

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
          <label class="control-label col-12" >Jenis Kelamin <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
              <option>Jenis Kelamin</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>

        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Alamat<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="alamat" name="alamat" placeholder="Alamat" required="required" class="form-control col-md-12 col-xs-12">
          </div>
        </div>
        
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Tempat Tanggal Lahir<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir" required="required" class="form-control col-md-12 col-xs-12 ">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Username<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-12 text-capitalize">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Password<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="password" name="password" placeholder="Password" required="required" class="form-control col-12">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Level <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
              <option>Pilih Level</option>
              <option value="1">Admin</option>
              <option value="2">Penangung Jawab</option>
              <option value="3">Guru</option>
              <option value="4">Siswa</option>
            </select>
          </div>
        </div>
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/lab" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
            </div>