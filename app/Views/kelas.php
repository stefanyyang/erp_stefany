<section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>

                  <a href="<?= base_url('/home/tambah_kelas/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></a>
                  <h1></h1>
<?php }else{} ?>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Remark </th>
<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>
                      <th>Action</th>
                    </tr>
<?php }else{} ?>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($octa as $evan){
                      ?>
                      <tr>
                        <th><?php echo $no++ ?></th>
                        <td><?php echo $evan->nama_kelas?></td>
                        <td><?php echo $evan->remark_kelas?></td>
                        <td>
<?php if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>

                          <a href="<?= base_url('/home/edit_kelas/'.$evan->id_kelas)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i>Edit </button></a>
                          
                          <a href="<?= base_url('/home/delete_kelas/'.$evan->id_kelas)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i>Hapus </button></a>
                        </td>
                      </tr>
<?php }else{} ?>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>