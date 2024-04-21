<section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
<?php if(session()->get('level')== 1 ||session()->get('level')== 2 ||session()->get('level')== 3) { ?>
                  <a href="<?= base_url('/home/tambah_pengguna/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></a>
                   <h1></h1>
<?php }else{} ?>
                    <?php if(session()->get('level')== 1 ||session()->get('level')== 2 ||session()->get('level')== 3) { ?>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                    <?php }else{} ?>

                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($octa as $evan){
                      ?>
                      <tr>
                          <?php if(session()->get('level')== 1 ||session()->get('level')== 2 ||session()->get('level')== 3) { ?>

                        <th><?php echo $no++ ?></th>
                        <td><?php echo $evan->username?></td>
                        <td><?php echo $evan->nik?></td>
                        <td><?php echo $evan->nama?></td>
                        <td><?php echo $evan->nama_kelas?></td>
                        <td><?php echo $evan->ttl?></td>
                        <td><?php echo $evan->jk?></td>
                        <td><?php echo $evan->alamat?></td>
                        <td>
                          
   <?php }else{} ?>
                          <a href="<?= base_url('/home/edit_pengguna/'.$evan->id_user)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i>Edit </button></a>
                          <a href="<?= base_url('/home/delete_pengguna/'.$evan->id_user)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i>Hapus </button></a>
                        </td>
                      </tr>
                   
                    <?php }?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>