<section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>
                  <a href="<?= base_url('/home/tambah_jadwal/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></a>
                  <h1></h1>
<?php }else{} ?>
<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { ?>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Nama Laboratium</th>
                      <th>Blok</th>
                      <th>Nama Pelajaran</th>
                      <th>Jam</th>
                      <th>Sesi</th>
                      <th>Tahun Ajaran</th>
                      <th>Tanggal</th>
<?php if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                      <!-- <th>Aksi</th> -->
                      <?php }else{} ?>
<?php }else{} ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($octa as $evan){
                      ?>
                      <tr>
<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { ?>
                        <th><?php echo $no++ ?></th>
                        <td><?php echo $evan->nama_kelas?></td>
                        <td><?php echo $evan->nama_lab?></td>
                        <td><?php echo $evan->nama_blok?></td>
                        <td><?php echo $evan->nama_pelajaran?></td>
                        <td><?php echo $evan->jam?></td>
                        <td><?php echo $evan->sesi?></td>
                        <td><?php echo $evan->nama_tahun?></td>
                        <td><?php echo $evan->tgl?></td>
                        <td>
<?php if (session()->get('level')== 1 || session()->get('level')== 3) { ?>
                          <a href="<?= base_url('/home/edit_jadwal/'.$evan->id_jadwal)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i>Edit </button></a>
                          
                          <a href="<?= base_url('/home/delete_jadwal/'.$evan->id_jadwal)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i>Hapus </button></a>
                          
                        </td>
<?php }else{} ?>
                      </tr>
<?php }else{} ?>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>